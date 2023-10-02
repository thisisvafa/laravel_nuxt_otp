<script setup>
const config = useRuntimeConfig()

const { pending, data: countries } = useFetch(`get-code`, {
  baseURL: config.public.apiURL,
})
</script>

<template>
    <div class="flex justify-center items-center">
        <div class="w-[550px] p-10">
            <div class="grid space-y-4">
                <div class="flex space-x-4 space-x-reverse">
                    <div class="w-full">
                        <div>
                            <div class="flex justify-between">
                                <label for="code_number_id" class="text-sm font-bold text-gray-600">جستجو بر اساس</label>
                            </div>
                            <select name="code_number_id" id="code_number_id" class="block w-full px-4 py-2 mt-2 placeholder-red-400 bg-white border border-gray-200 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500">
                                <option value="">آیتم 1</option>                            
                                <option value="">آیتم 2</option>                            
                                <option value="">آیتم 3</option>                            
                                <option value="">آیتم 4</option>                            
                                <option value="">آیتم 5</option>                            
                                <option value="">آیتم 6</option>                            
                                <option value="">آیتم 7</option>                            
                            </select>
                        </div>
                    </div>
                </div>

                <div class="flex space-x-4 space-x-reverse">
                    <div class="w-5/6">
                        <div>
                            <div class="flex justify-between">
                                <label for="mobile" class="text-sm font-bold text-gray-600">شماره مرتبط به این تراکنش</label>
                            </div>
                            <input type="text" name="mobile" id="mobile" class="block w-full px-4 py-2 mt-2 placeholder-red-400 bg-white border border-gray-200 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500" />
                        </div>
                    </div>
                    <div class="w-1/6">
                        <div>
                            <div class="flex justify-between">
                                <label for="code_number_id" class="text-sm font-bold text-gray-600">کد کشور</label>
                            </div>
                            <select name="code_number_id" id="code_number_id" class="block w-full px-4 py-2 mt-2 placeholder-red-400 bg-white border border-gray-200 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500">
                                <option v-for="country in countries.data" :key="country.id" :value="country.id" :selected="country.phonecode === 98">
                                    {{ country.phonecode }}+
                                </option>                                  
                            </select>
                        </div>
                    </div>
                </div>

                <div class="mt-6">
                    <button type="submit" class="w-full px-4 py-2 tracking-wide text-white transition-colors duration-200 transform bg-red-600 rounded-md hover:bg-red-700 focus:ring-opacity-50">
                        ثبت
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>