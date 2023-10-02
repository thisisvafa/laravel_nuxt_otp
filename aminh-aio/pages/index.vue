<script setup>
import { storeToRefs } from "pinia";
import { useAuthStore } from '~/stores/useAuthStore';

definePageMeta({
    middleware: ['auth'],
})

const authStore = useAuthStore();
const auth = storeToRefs(authStore)

onMounted(() => {
    auth
})
</script>

<template>
    <div>
        {{ auth }}
        <h1>hello</h1>
    </div>
</template>