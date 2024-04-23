<template>
    <div class="flex items-center justify-center min-h-screen">
        <div class="container mx-auto p-6">
            <fwb-heading tag="h1" class="text-3xl font-semibold m-4 text-center p-2">Události</fwb-heading>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 max-w-screen-lg mx-auto">
                <div v-for="event in events.data.sort((a, b) => a.id - b.id)" :key="event.id"
                    class="border border-gray-300 rounded-lg overflow-hidden">
                    <fwb-img src="/images/BlankPhoto.jpg" />
                    <div class="bg-black bg-opacity-50 text-white mt-1 text-center p-4">

                        <template v-for="location in locations.data">
                            <template v-if="location.id === event.location.id">
                                <h2 class="text-xl font-semibold">ID: {{ location.id }}</h2>
                                <h2 class="text-xl font-semibold">Město: {{ location.city }}</h2>
                                <h2 class="text-xl font-semibold">Provincie: {{ location.province }}</h2>
                                <h2 class="text-xl font-semibold">Ulice: {{ location.street }}</h2>
                            </template>
                        </template>

                        <div>
                            <h2 class="text-xl font-semibold">Nazev: {{ event.name }}</h2>
                            <p>Start: {{ event.dateStart }}</p>
                            <p>Konec: {{ event.dateEnd }}</p>
                            <p class="overflow-hidden whitespace-nowrap overflow-ellipsis">Popis: {{ event.description
                                }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex items-center justify-center mt-4">
                <Pagination :events="events" :locations="locations" />
            </div>
        </div>
    </div>
</template>

<script setup>
import { FwbImg, FwbHeading } from 'flowbite-vue'
import Pagination from './Pagination.vue';
import { defineProps } from 'vue';

defineProps({
    events: {
        type: Object,
        required: true,
    },
    locations: {
        type: Object,
        required: true,
    },
});

</script>
