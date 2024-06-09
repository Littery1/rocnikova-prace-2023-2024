<template>
    <component :is="isAuthenticated ? NavbarAuthorized : NavbarUnauthorized" />
        <div>
            <h1 class="text-blue-600 text-4xl text-center font-bold mt-6">{{ event.data.name }}</h1>

            <Gallery :images="images" :event="event" :show-trash-bin="false" class=" flex items-center min-h-screen" style="transform: scale(0.8);" />       

                <Details :event="event" />

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
    images: {
        type: Object,
        required: true,
    },
});
</script>
