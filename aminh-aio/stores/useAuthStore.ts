import {defineStore} from "pinia";
import {useApiFetch} from "~/composables/useApiFetch";

type User = {
    id: number;
    name: string;
    email: string;
}

type Credentials = {
    email: string;
    password: string;
}

type RegistrationInfo = {
    name: string;
    email: string;
    password: string;
    password_confirmation: string;
}

export const useAuthStore = defineStore('auth', () => {
    const user = ref<User | null>(null)
    const isLoggedIn = computed(() => !!user.value)

    async function logout() {
        await useApiFetch("/api/logout", {method: "POST"});
        const token = useCookie('XSRF-TOKEN');
        token.value = null;
        user.value = null;
        navigateTo("/");
    }

    async function fetchUser() {
        const {data, error} = await useApiFetch("/api-services/auth/me", {
            headers: {
                'Accept': 'application/json',
            },
        });        
        user.value = data.value as User;    
    }

    async function login(credentials: Credentials) {       
        const login = await useApiFetch("/api-services/auth/login", {
            method: "POST",
            body: credentials,
        });
        
        const token = login.data.value as string;
        const authToken = useCookie('XSRF-TOKEN');

        authToken.value = token.access_token;
        
        await fetchUser(authToken.value);
        return login;
    }

    return {user, login, isLoggedIn, fetchUser, logout}
})