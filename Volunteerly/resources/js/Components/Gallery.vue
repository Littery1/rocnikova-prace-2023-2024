<template>
    <div class="container mx-auto px-5 py-2 lg:px-32 lg:pt-24 relative">
        <div class="absolute left-0 top-1/2 transform -translate-y-1/2">
            <button @click="previous"
                class="arrow-btn bg-gray-800 text-white rounded-full w-10 h-10 flex items-center justify-center -ml-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 arrow-icon" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </button>
        </div>
        <div class="absolute right-0 top-1/2 transform -translate-y-1/2">
            <button @click="next"
                class="arrow-btn bg-gray-800 text-white rounded-full w-10 h-10 flex items-center justify-center -mr-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 arrow-icon" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </button>
        </div>
        <div class=" flex flex-wrap m-2">
            <div class="flex w-1/2 flex-wrap">
                <div class="w-1/2 p-1 md:p-2">
                    <img alt="gallery" class="block h-full w-full rounded-lg object-cover object-center"
                        src="\images\BlankPhoto.jpg" />
                </div>
                <div class="w-1/2 p-1 md:p-2">
                    <img alt="gallery" class="block h-full w-full rounded-lg object-cover object-center"
                        src="\images\BlankPhoto.jpg" />
                </div>
                <div class="w-full p-1 md:p-2">
                    <img alt="gallery" class="block h-full w-full rounded-lg object-cover object-center"
                        src="\images\BlankPhoto.jpg" />
                </div>
            </div>
            <div class="flex w-1/2 flex-wrap">
                <div class="w-full p-1 md:p-2">
                    <img alt="gallery" class="block h-full w-full rounded-lg object-cover object-center"
                        src="\images\BlankPhoto.jpg" />
                </div>
                <div class="w-1/2 p-1 md:p-2">
                    <img alt="gallery" class="block h-full w-full rounded-lg object-cover object-center"
                        src="\images\BlankPhoto.jpg" />
                </div>
                <div class="w-1/2 p-1 md:p-2">
                    <img alt="gallery" class="block h-full w-full rounded-lg object-cover object-center"
                        src="\images\BlankPhoto.jpg" />
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref } from 'vue';

const previous = () => {
    // Add logic for previous action
};

const next = () => {
    // Add logic for next action
};
</script>

<style>
.arrow-btn:hover .arrow-icon {
    transform: scale(1.2);
    transition: transform 0.3s ease;
}
</style>
