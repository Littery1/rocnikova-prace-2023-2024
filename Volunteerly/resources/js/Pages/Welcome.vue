<script setup>
import { Head, Link, usePage } from '@inertiajs/vue3';
import NavbarUnauthorized from '@/Components/Navbar/NavbarUnauthorized.vue';
import NavbarAuthorized from '@/Components/Navbar/NavbarAuthorized.vue';
import { ref, onMounted } from 'vue';
import axios from 'axios';
import DisplayEvents from '@/Components/DisplayEvents.vue';
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
    events: {
        type: Object,
        required: true,
    },
    locations: {
        type: Object,
        required: true,
    },
    // canLogin: {
    //     type: Boolean,
    // },
    // canRegister: {
    //     type: Boolean,
    // },
    // laravelVersion: {
    //     type: String,
    //     required: true,
    // },
    // phpVersion: {
    //     type: String,
    //     required: true,
    // }
});


</script>

<template >
    <div class="bg-gray-100">

        <Head title="Welcome" />

        <link rel="icon" href="/images/Logo.png" type="image/png">

        <component :is="isAuthenticated ? NavbarAuthorized : NavbarUnauthorized" />
        <DisplayEvents :events="events" :locations="locations" />

     
    </div>
</template>

