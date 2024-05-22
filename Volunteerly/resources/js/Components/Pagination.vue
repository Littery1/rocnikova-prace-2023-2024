<template>
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
</template>

<script setup>
import {  FwbPagination } from 'flowbite-vue'
import { ref } from 'vue'
import { router } from '@inertiajs/vue3'

const currentPage = ref(parseInt(new URLSearchParams(window.location.search).get('page')) || 1);

function goToPage(page) {
    currentPage.value = page;
    router.visit(`/?page=${page}&clickedPage=${page}`, {
        preserveScroll: true
    });
}
defineProps({
    events: {
        type: Object,
        required: true,
    },
});
</script>
