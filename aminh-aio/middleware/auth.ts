import {useAuthStore} from "~/stores/useAuthStore";

export default defineNuxtRouteMiddleware((to, from) => {
  const auth = useAuthStore();
  
  if (!auth.isLoggedIn) {
    if (to.path !== "/login") {
      return navigateTo("/login", {replace: true});
    }
  } else {
    if (to.path === "/login") {
      return navigateTo("/", {replace: true});
    }
  }
})