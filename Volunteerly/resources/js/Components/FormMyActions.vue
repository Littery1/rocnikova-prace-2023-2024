<script setup>
import { ref } from 'vue';
import ModalWindow from './ModalWindow.vue';


const showModal = ref(false);

const toggleModal = () => {
    showModal.value = !showModal.value;
};


const form = ref({
    name: '',
    coordinates: '',
    province: '',
    street: '',
    city: '',
});
const handleLocationSelected = (details) => {
    form.value.coordinates = `${details.latitude}, ${details.longitude}`;
    form.value.province = details.province;
    form.value.street = details.street;
    form.value.city = details.city;
    console.log(details);
};


</script>
<template>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <section class="bg-white dark:bg-gray-900">
                    <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
                        <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Přidat novou akci</h2>
                        <form action="#">
                            <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                                <div class="sm:col-span-2">
                                    <label for="name"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Název</label>
                                    <input type="text" name="name" id="name" v-model="form.name"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="Napište název Vaší akce" required="">
                                </div>
                                <div class="w-full relative">
                                    <label for="coordinates"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                        Souřadnice
                                    </label>
                                    <div class="flex items-center">
                                        <input type="text" name="coordinates" id="coordinates"
                                            v-model="form.coordinates" readonly
                                            class="flex-grow bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block p-2.5 pr-10 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            placeholder="Vyberte bod na mapě" required="">
                                        <img src="/images/SearchMapsLogo.png" alt="SearchMapsLogo"
                                            class="absolute right-3 bottom-2 h-6 w-6 cursor-pointer"
                                            @click="toggleModal">
                                        <ModalWindow @confirmLocation="handleLocationSelected" :isShowModal="showModal"
                                            @update:isShowModal="showModal = $event">
                                        </ModalWindow>
                                    </div>

                                </div>
                                <div class="w-full">
                                    <label for="province"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kraj</label>
                                    <input type="text" name="province" id="province" v-model="form.province"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="Kraj" required="">
                                </div>
                                <div class="w-full">
                                    <label for="street"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ulice</label>
                                    <input type="text" name="street" id="street" v-model="form.street"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="Ulice" required="">
                                </div>
                                <div class="w-full">
                                    <label for="city"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Město</label>
                                    <input type="text" name="city" id="city" v-model="form.city"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="Město" required="">
                                </div>
                                <div class="sm:col-span-2">
                                    <label for="description"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Popis</label>
                                    <textarea id="description" rows="8"
                                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="O čem bude Vaše akce?"></textarea>
                                </div>
                            </div>
                            <button type="submit"
                                class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                                Přidat akci
                            </button>
                        </form>
                    </div>
                </section>

            </div>
        </div>
    </div>

</template>
