<script setup>
import { useAuthStore } from "~/stores/useAuthStore";

definePageMeta({
    middleware: ['guest'],
})

const auth = useAuthStore();

const form = ref({
    mobile: "",
});

async function handleLogin() {
    const {error} = await auth.login(form.value);
    if(error){
        return navigateTo("/customer/create");
    }
}

useHead({
  title: 'ورود',
})
</script>

<template>
    {{ auth }}
    <div class="h-screen flex justify-center items-center">
        <div class="w-96 p-10">
            <div class="space-y-4">
                <h2 class="mb-8 text-center">
                    <img src="/logo.png" class="inline w-16" alt="">
                </h2>
            </div>
            <div class="mt-16 grid space-y-4">
                <form @submit.prevent="handleLogin">
                    <div>
                        <div class="flex justify-between mb-1">
                            <label for="mobile" class="text-base text-gray-600">شماره موبایل</label>
                        </div>
                        <input type="text" name="mobile" id="mobile" v-model="form.mobile" class="block w-full px-4 py-2 mt-2 placeholder-red-400 bg-white border border-gray-200 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500 " />
                    </div>

                    <div class="mt-6">
                        <button type="submit" class="w-full px-4 py-2 tracking-wide text-white transition-colors duration-200 transform bg-red-600 rounded-md hover:bg-red-700 focus:ring-opacity-50">
                            ورود
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>