<script setup>
import { Head, Link } from '@inertiajs/vue3';
import Navbar from '@/Components/Navbar/NavbarUnauthorized.vue';

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
    <Head title="Welcome"/>
    
     <link rel="icon" href="/Volunteerly/public/images/Logo.png" type="image/png">
   
         <Navbar />

    <div
     class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-gray-100 "
      >


    </div>
</template>

