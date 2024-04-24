<template>
    <div class="flex items-center justify-center min-h-screen">
        <div class="container mx-auto p-6">
            <fwb-heading tag="h1" class="text-3xl font-semibold m-4 text-center p-2">Události</fwb-heading>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 max-w-screen-lg mx-auto">
                <div v-for="event in events.data.sort((a, b) => a.id - b.id)" :key="event.id"
                    class="rounded-lg overflow-hidden">
                    <InertiaLink :href="'/event' + event.id">
                        <fwb-img src="/images/BlankPhoto.jpg" />
                    </InertiaLink>

                    <div class="bg-opacity-50 text-black mt-1 text-center p-4">
                                <div class="flex items-center mb-2">
                                    <fwb-img alt="Map Pointer" class="w-4 h-auto m-1"
                                        src="/images/MapPointer.png"></fwb-img>
                                    <h2 class="text-xs font-semibold">{{ event.location.city }}, {{ event.location.street }}</h2>
                                </div>
                        <div class="max-h-16 overflow-hidden">
                            <InertiaLink :href="'/event' + event.id" class="text-link">
                                <p class="text-sm line-clamp-2">{{ event.description }}</p>
                            </InertiaLink>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex items-center justify-center mt-4">
                <Pagination :events="events" />
            </div>
        </div>
    </div>
</template>

<script setup>
import { FwbImg, FwbHeading } from 'flowbite-vue'
import Pagination from './Pagination.vue';
import { defineProps } from 'vue';
import { InertiaLink } from '@inertiajs/inertia-vue3';
defineProps({
    events: {
        type: Object,
        required: true,
    },
});
</script>

<style>
.text-link {
    color: rgb(15, 101, 145);
    text-decoration: none;
}

.text-link:hover {
    text-decoration: underline;
}
</style>
