<template>
    <component :is="isAuthenticated ? NavbarAuthorized : NavbarUnauthorized" />
    <div>
        <h1 class="text-blue-500 text-4xl text-center font-bold ">{{ event.data.name }}</h1>

        <Gallery class=" flex items-center min-h-screen" style="transform: scale(0.8);" />

    </div>
</template>

<script setup>
import { defineProps } from 'vue';
import { ref, onMounted } from 'vue';
import NavbarUnauthorized from '@/Components/Navbar/NavbarUnauthorized.vue';
import NavbarAuthorized from '@/Components/Navbar/NavbarAuthorized.vue';
import Gallery from '@/Components/Gallery.vue';
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
});
const formatDate = (dateString) => {
    const date = new Date(dateString);
    const options = {
        day: 'numeric',
        month: 'long',
        year: 'numeric',
        hour: 'numeric',
        minute: 'numeric',
        second: 'numeric',
        timeZone: 'UTC', // Ensure consistent formatting across different time zones
        hour12: false, // Use 24-hour format
        locale: 'cs-CZ' // Set the locale to Czech (Czech Republic)
    };
    return `${date.toLocaleDateString('cs-CZ', options)}`;
};
</script>
