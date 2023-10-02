<script setup>
import { storeToRefs } from "pinia";
import { useAuthStore } from '~/stores/useAuthStore';

const authStore = useAuthStore();
const auth = storeToRefs(authStore)

onMounted(() => {
    auth
})
</script>

<template>
    <slot />
</template>