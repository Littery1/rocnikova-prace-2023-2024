<template>
    <component :is="isAuthenticated ? NavbarAuthorized : NavbarUnauthorized" />

        <div>
            <h1 class="text-blue-600 text-4xl text-center font-bold ">{{ event.data.name }}</h1>

            <Gallery class=" flex items-center min-h-screen" style="transform: scale(0.8);" />

                <div class="container mx-auto px-5 py-2 lg:px-32 lg:pt-24 relative">
                    <div class="flex flex-col items-center">
                        <div class="border-b border-gray-400 w-full mb-4"></div>

                        <div class="flex  ml-[-33vw]">
                            <!-- First h2 element -->
                            <div class="flex-none">
                                <h2 class="text-2xl font-bold">Popis</h2>
                            </div>

                            <!-- Second h2 element -->
                            <div class="flex-none ml-4">
                                <h2 class="text-2xl font-bold">Mapa</h2>
                            </div>

                            <!-- Third h2 element -->
                            <div class="flex-none ml-4">
                                <h2 class="text-2xl font-bold">Hodnocení</h2>
                            </div>
                        </div>

                        <div class="border-b border-gray-400 w-full mt-4"></div>
                    </div>
                </div>
                <Calendar :event="event" />

                <Details :event="event" />

        </div>

</template>

<script setup>
import { defineProps } from 'vue';
import { ref, onMounted } from 'vue';
import NavbarUnauthorized from '@/Components/Navbar/NavbarUnauthorized.vue';
import NavbarAuthorized from '@/Components/Navbar/NavbarAuthorized.vue';
import Gallery from '@/Components/Gallery.vue';
import Calendar from '@/Components/Calendar.vue';
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
});
</script>
