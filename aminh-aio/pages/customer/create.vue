<script setup>
// import { useAuthStore } from '~/stores/useAuthStore';

const config = useRuntimeConfig()
// const authStore = useAuthStore();
// const auth = storeToRefs(authStore)

// onMounted(() => {
//     auth
// })

const form = ref({
    name: '',
    last_name: '',
    mobile: '',
    code_number_id: '',
    instagram: '',
    website: '',
    country: '',
    city: '',
    other_number: '',
    description: '',
    user_id: '1',
});

const { pending, data: countries } = useFetch(`get-code`, {
  baseURL: config.public.apiURL,
})

async function handleCreate() {
    await $fetch( '/auth/customer/store', {
        baseURL: config.public.apiURL,
        method: 'POST',
        body: form.value
    });
}
</script>

<template>
    <div class="flex justify-center items-center">
        <div class="w-[550px] p-10">
            <div class="grid space-y-4">
                <form @submit.prevent="handleCreate">
                    
                    <div class="flex space-x-4 space-x-reverse">
                        <div class="w-5/6">
                            <div>
                                <div class="flex justify-between">
                                    <label for="mobile" class="text-sm font-bold text-gray-600">شماره موبایل</label>
                                </div>
                                <input type="text" name="mobile" id="mobile" v-model="form.mobile" class="block w-full px-4 py-2 mt-2 placeholder-red-400 bg-white border border-gray-200 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500" />
                            </div>
                        </div>
                        <div class="w-1/6">
                            <div>
                                <div class="flex justify-between">
                                    <label for="code_number_id" class="text-sm font-bold text-gray-600">کد کشور</label>
                                </div>
                                <select name="code_number_id" id="code_number_id" v-model="form.code_number_id" class="block w-full px-4 py-2 mt-2 placeholder-red-400 bg-white border border-gray-200 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500">
                                    <option v-for="country in countries.data" :key="country.id" :value="country.id" :selected="country.phonecode === 98">
                                        {{ country.phonecode }}+
                                    </option>                                  
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="flex space-x-4 space-x-reverse mt-3">
                        <div class="w-1/2">
                            <div>
                                <div class="flex justify-between">
                                    <label for="name" class="text-sm font-bold text-gray-600">نام</label>
                                </div>
                                <input type="text" name="name" id="name" v-model="form.name" class="block w-full px-4 py-2 mt-2 placeholder-red-400 bg-white border border-gray-200 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500" />
                            </div>
                        </div>
                        <div class="w-1/2">
                            <div>
                                <div class="flex justify-between">
                                    <label for="last_name" class="text-sm font-bold text-gray-600">نام خانوادگی</label>
                                </div>
                                <input type="last_name" name="last_name" id="mobile" v-model="form.last_name" class="block w-full px-4 py-2 mt-2 placeholder-red-400 bg-white border border-gray-200 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500" />
                            </div>
                        </div>
                    </div>

                    <div class="flex space-x-4 space-x-reverse mt-3">
                        <div class="w-full">
                            <div>
                                <div class="flex justify-between">
                                    <label for="instagram" class="text-sm font-bold text-gray-600">اینستاگرام</label>
                                </div>
                                <input type="text" name="instagram" id="instagram" v-model="form.instagram" class="block w-full px-4 py-2 mt-2 placeholder-red-400 bg-white border border-gray-200 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500" />
                            </div>
                        </div>
                    </div>

                    <div class="flex space-x-4 space-x-reverse mt-3">
                        <div class="w-full">
                            <div>
                                <div class="flex justify-between">
                                    <label for="website" class="text-sm font-bold text-gray-600">وب سایت</label>
                                </div>
                                <input type="text" name="website" id="website" v-model="form.website" class="block w-full px-4 py-2 mt-2 placeholder-red-400 bg-white border border-gray-200 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500" />
                            </div>
                        </div>
                    </div>

                    <div class="flex space-x-4 space-x-reverse mt-3">
                        <div class="w-1/2">
                            <div>
                                <div class="flex justify-between">
                                    <label for="country" class="text-sm font-bold text-gray-600">کشور</label>
                                </div>
                                <input type="text" name="country" id="country" v-model="form.country" class="block w-full px-4 py-2 mt-2 placeholder-red-400 bg-white border border-gray-200 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500" />
                            </div>
                        </div>
                        <div class="w-1/2">
                            <div>
                                <div class="flex justify-between">
                                    <label for="city" class="text-sm font-bold text-gray-600">شهر</label>
                                </div>
                                <input type="text" name="city" id="city" v-model="form.city" class="block w-full px-4 py-2 mt-2 placeholder-red-400 bg-white border border-gray-200 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500" />
                            </div>
                        </div>
                    </div>

                    <div class="flex space-x-4 space-x-reverse mt-3">
                        <div class="w-full">
                            <div>
                                <div class="flex justify-between">
                                    <label for="other_number" class="text-sm font-bold text-gray-600">سایر شماره‌ها</label>
                                </div>
                                <input type="text" name="other_number" id="other_number" v-model="form.other_number" class="block w-full px-4 py-2 mt-2 placeholder-red-400 bg-white border border-gray-200 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500" />
                            </div>
                        </div>
                    </div>

                    <div class="flex space-x-4 space-x-reverse mt-3">
                        <div class="w-full">
                            <div>
                                <div class="flex justify-between">
                                    <label for="description" class="text-sm font-bold text-gray-600">سایر توضیحات</label>
                                </div>
                                <textarea name="description" id="description" v-model="form.description" class="block w-full px-4 py-2 mt-2 placeholder-red-400 bg-white border border-gray-200 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="mt-6">
                        <button type="submit" class="w-full px-4 py-2 tracking-wide text-white transition-colors duration-200 transform bg-red-600 rounded-md hover:bg-red-700 focus:ring-opacity-50">
                            ثبت
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>