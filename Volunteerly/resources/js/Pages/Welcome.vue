<template >
    <div class="bg-gray-100">

        <Head title="Welcome" />

        <link rel="icon" href="/images/Logo.png" type="image/png">
        <component :is="isAuthenticated ? NavbarAuthorized : NavbarUnauthorized" />
        <DisplayEvents :events="events" :images="images" :rows="one"/>
    </div>
</template>
<script setup>
import { Head, Link} from '@inertiajs/vue3';
import NavbarUnauthorized from '@/Components/Navbar/NavbarUnauthorized.vue';
import NavbarAuthorized from '@/Components/Navbar/NavbarAuthorized.vue';
import { ref, onMounted } from 'vue';
import axios from 'axios';
import DisplayEvents from '@/Components/DisplayEvents.vue';
const isAuthenticated = ref(false);

const one = 1;
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
    images: {
        type: Object,
        required: true,
    },
});

</script>

