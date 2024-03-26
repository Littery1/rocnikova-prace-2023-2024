<script setup>
import { Head, Link, usePage } from '@inertiajs/vue3';
import NavbarUnauthorized from '@/Components/Navbar/NavbarUnauthorized.vue';
import NavbarAuthorized from '@/Components/Navbar/NavbarAuthorized.vue';
import { ref, onMounted } from 'vue';
import axios from 'axios';

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
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    laravelVersion: {
        type: String,
        required: true,
    },
    phpVersion: {
        type: String,
        required: true,
    }
});


</script>

<template>

    <Head title="Welcome" />

    <link rel="icon" href="/images/Logo.png" type="image/png">

    <component :is="isAuthenticated ? NavbarAuthorized : NavbarUnauthorized" />

    <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-gray-100 ">


    </div>
</template>

