<template>
    <component :is="isAuthenticated ? NavbarAuthorized : NavbarUnauthorized" />
    <div class="flex flex-col items-center min-h-screen">
        <h1 class="text-blue-600 text-4xl text-center font-bold mt-6">{{ event.data.name }}</h1>

        <Gallery :images="images" :event="event" :show-trash-bin="false" :imageWidth="'w-96'" :imageHeight="'h-72'"
            class="my-10" />

        <Details :event="event" :images="images" :events="events"/>
    </div>
</template>

<script setup>
import { defineProps } from 'vue';
import { ref, onMounted } from 'vue';

import NavbarUnauthorized from '@/Components/Navbar/NavbarUnauthorized.vue';
import NavbarAuthorized from '@/Components/Navbar/NavbarAuthorized.vue';
import Gallery from '@/Components/Gallery.vue';
import Details from '@/Components/Details.vue';

const isAuthenticated = ref(false);

onMounted(async () => {
    try {
        const response = await axios.get('/api/authenticated');
        isAuthenticated.value = response.data.authenticated;
    } catch (error) {
        console.error('Error fetching authentication state:', error);
    }
});

defineProps({
    event: {
        type: Object,
        required: true,
    },
    events: {
        type: Object,
        required: true,
    },
    images: {
        type: Object,
        required: true,
    },
});
</script>
