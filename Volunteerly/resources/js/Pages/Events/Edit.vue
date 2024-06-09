<template>

    <Head title="Upravení akce" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl  text-gray-800 leading-tight">Upravit Akci</h2>
        </template>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-12  flex justify-center items-center">
            <div
                class="bg-white overflow-hidden shadow-sm sm:rounded-lg w-full md:w-3/4 lg:w-1/2 flex flex-col items-center">
                <FormEditEvent :event="event" />
                <div class=" w-7/12 pb-4">
                    <Gallery :images="images" :show-trash-bin="true" :imageWidth="'w-44'" :imageHeight="'h-44'" />
                </div>
                <div class=" w-7/12 pb-4">
                    <UploadImages :event="event" :images="images" type="plain" />
                </div>
            </div>
        </div>



    </AuthenticatedLayout>

</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import FormEditEvent from '@/Components/FormEditEvent.vue';
import { defineProps } from 'vue';
import UploadImages from '@/Pages/UploadImages/Index.vue';
import Gallery from '@/Components/Gallery.vue';

const props = defineProps({
    event: {
        type: Object,
        required: true,
    },
    images: {
        type: Object,
        required: true,
    },
});

</script>