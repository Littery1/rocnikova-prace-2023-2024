<template>
    <div class="container mx-auto px-5 py-2 lg:px-32 lg:pt-24">
        <fwb-button @click="previous"
            class="absolute left-0 top-1/2 transform -translate-y-1/2 bg-gray-800 text-white rounded-full w-10 h-10 flex items-center justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
        </fwb-button>
        <fwb-button @click="next"
            class="absolute right-0 top-1/2 transform -translate-y-1/2 bg-gray-800 text-white rounded-full w-10 h-10 flex items-center justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
        </fwb-button>

        <div class="-m-1 flex flex-wrap md:-m-2">
            <div class="flex w-1/2 flex-wrap">
                <div class="w-1/2 p-1 md:p-2">
                    <fwb-img alt="gallery" class="block h-full w-full rounded-lg object-cover object-center"
                        src="\images\BlankPhoto.jpg" />
                </div>
                <div class="w-1/2 p-1 md:p-2">
                    <fwb-img alt="gallery" class="block h-full w-full rounded-lg object-cover object-center"
                        src="\images\BlankPhoto.jpg" />
                </div>
                <div class="w-full p-1 md:p-2">
                    <fwb-img alt="gallery" class="block h-full w-full rounded-lg object-cover object-center"
                        src="\images\BlankPhoto.jpg" />
                </div>
            </div>
            <div class="flex w-1/2 flex-wrap">
                <div class="w-full p-1 md:p-2">
                    <fwb-img alt="gallery" class="block h-full w-full rounded-lg object-cover object-center"
                        src="\images\BlankPhoto.jpg" />
                </div>
                <div class="w-1/2 p-1 md:p-2">
                    <fwb-img alt="gallery" class="block h-full w-full rounded-lg object-cover object-center"
                        src="\images\BlankPhoto.jpg" />
                </div>
                <div class="w-1/2 p-1 md:p-2">
                    <fwb-img alt="gallery" class="block h-full w-full rounded-lg object-cover object-center"
                        src="\images\BlankPhoto.jpg" />
                </div>
            </div>
        </div>
    </div>
</template>
<script setup>
import { ref } from 'vue';
import { FwbImg, FwbButton } from 'flowbite-vue';

// Initialize variable to track current photo index
const currentPhotoIndex = ref(0);

// Function to navigate to the previous photo
const previous = () => {
    if (currentPhotoIndex.value > 0) {
        currentPhotoIndex.value--;
    }
};

// Function to navigate to the next photo
const next = () => {
    // Replace 5 with the total number of photos in your gallery
    if (currentPhotoIndex.value < 5 - 1) {
        currentPhotoIndex.value++;
    }
};
</script>