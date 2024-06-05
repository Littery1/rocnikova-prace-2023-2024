<script setup>
import { ref, onMounted } from 'vue';
import ModalWindow from './ModalWindow.vue';
import flatpickr from 'flatpickr';
import { Czech } from 'flatpickr/dist/l10n/cs.js';
import 'flatpickr/dist/themes/light.css';
import { useForm } from '@inertiajs/inertia-vue3';
import { defineProps } from 'vue';
import { router } from '@inertiajs/vue3'


const props = defineProps({
    event: {
        type: Object,
        required: true,
    },
    errors: {
        type: Object,
    },
});


const showModal = ref(false);

onMounted(() => {
    flatpickr(".flatpickr", {
        enableTime: true,
        dateFormat: "Y-m-d H:i",
        locale: Czech,
        theme: "light",
    });
});

const toggleModal = () => {
    showModal.value = !showModal.value;
};

const form = useForm({
    name: props.event.data.name,
    latitude: props.event.data.latitude,
    longitude: props.event.data.longitude,
    province: props.event.data.location.province,
    street: props.event.data.location.street,
    city: props.event.data.location.city,
    description: props.event.data.description,
    dateStart: props.event.data.dateStart,
    dateEnd: props.event.data.dateEnd,
});

const handleLocationSelected = (details) => {
    form.latitude = details.latitude;
    form.longitude = details.longitude;
    form.province = details.province;
    form.street = details.street;
    form.city = details.city;
};

const coords = props.event.data.location.latitude + ', ' + props.event.data.location.longitude; 

const submitForm = ($id) => {
  router.put('/events/' + $id, form);
};
</script>
<template>
            <div class="w-full bg-white  border-gray-200">
                <section class="bg-white dark:bg-gray-900">
                    <div class=" mx-auto max-w-2xl lg:py-16">
                        <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Upravit akci</h2>
                        <form @submit.prevent="submitForm(event.data.id)">
                            <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                                <div class="sm:col-span-2">
                                    <label for="name"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Název</label>
                                    <input type="text" name="name" id="name" v-model="form.name"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="Napište název Vaší akce">
                                </div>

                                <div class="w-full relative">
                                    <label for="coordinates"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                        Souřadnice
                                    </label>
                                    <div class="flex items-center">
                                        <input type="text" name="coordinates" id="coordinates" v-model="coords" readonly
                                            class="flex-grow bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block p-2.5 pr-10 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            placeholder="Vyberte bod na mapě">
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
                                        placeholder="Kraj">
                                </div>
                                <div class="w-full">
                                    <label for="street" 
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ulice</label>
                                    <input type="text" name="street" id="street" v-model="form.street"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="Ulice (Nepovinné)">
                                </div>
                                <div class="w-full">
                                    <label for="city"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Město</label>
                                    <input type="text" name="city" id="city" v-model="form.city"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="Město">
                                </div>
                                <div class="w-full">
                                    <label for="start"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Začátek
                                        akce</label>
                                    <div class="relative">
                                        <div
                                            class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                            <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor"
                                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                        </div>
                                        <input type="datetime-local" name="dateStart" id="start" v-model="form.dateStart"
                                            class=" flatpickr bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 pr-3 py-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="Zadejte začátek akce">
                                    </div>
                                </div>

                                <div class="w-full">
                                    <label for="end"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Konec
                                        akce</label>
                                    <div class="relative">
                                        <div
                                            class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                            <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor"
                                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                        </div>
                                        <input datepicker datepicker-autohide v-model="form.dateEnd" name="dateEnd" id="end"
                                            type="datetime-local"
                                            class="flatpickr bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 pr-3 py-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="Zadejte konec akce">
                                    </div>
                                </div>

                                <div class="sm:col-span-2  mb-6">
                                    <label for="description"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Popis</label>
                                    <textarea id="description" rows="8" name="description" v-model="form.description"
                                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="O čem bude Vaše akce?"></textarea>
                                </div>
                            </div>

                            <button type="submit" :disabled="form.processing"
                                class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                                Upravit akci
                            </button>
                        </form>
                        
                    </div>
                </section>

            </div>
</template>
