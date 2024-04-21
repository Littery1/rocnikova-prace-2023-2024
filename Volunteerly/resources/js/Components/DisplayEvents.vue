<template>
    <div class="flex items-center justify-center min-h-screen">
        <div class="container mx-auto p-6">
            <fwb-heading tag="h1" class="text-3xl font-semibold m-4 text-center p-2">Události</fwb-heading>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 max-w-screen-lg mx-auto">
                <div v-for="event in events.data" :key="event.id"
                    class="border border-gray-300 rounded-lg overflow-hidden">
                    <fwb-img src="/images/BlankPhoto.jpg" />
                    <div class="bg-black bg-opacity-50 text-white mt-1 text-center p-4">
                        <p class="overflow-hidden whitespace-nowrap overflow-ellipsis">{{ event.description }}</p>
                    </div>
                </div>
            </div>
            <div class="flex items-center justify-center mt-4">
                <fwb-pagination v-model="currentPage" :total-items="events.meta.total"
                    :total-pages="Math.ceil(events.meta.total / events.meta.per_page)" previous-label="<<<"
                    next-label=">>>">
                    <template v-slot:page-button="{ page }">
                        <button @click="goToPage(page)" :class="[
                            'flex items-center justify-center first:rounded-l-lg last:rounded-r-lg px-3 h-8 ml-0 leading-tight text-gray-500 bg-purple-200 border border-purple-300 hover:bg-purple-300 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white',
                            { 'ml-auto mr-auto': page === currentPage }
                        ]">
                            {{ page }}
                        </button>
                    </template>
                </fwb-pagination>
            </div>
        </div>
    </div>
</template>

<script setup>
import { FwbImg, FwbHeading, FwbPagination } from 'flowbite-vue'
import { ref } from 'vue'
import { router } from '@inertiajs/vue3'
const currentPage = ref(parseInt(new URLSearchParams(window.location.search).get('page')) || 1);

function goToPage(page) {
    currentPage.value = page;
    router.visit(`/eventes?page=${page}&clickedPage=${page}`, {
        preserveScroll: true
    });
}

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
