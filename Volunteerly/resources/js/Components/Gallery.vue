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
                    <img alt="gallery" class="block h-full w-full rounded-lg object-cover object-center" :src="path1" />
                </div>
                <div class="w-1/2 p-1 md:p-2">
                    <img alt="gallery" class="block h-full w-full rounded-lg object-cover object-center" :src="path2" />
                </div>
                <div class="w-full p-1 md:p-2">
                    <img alt="gallery" class="block h-full w-full rounded-lg object-cover object-center" :src="path3" />
                </div>
            </div>
            <div class="flex w-1/2 flex-wrap">
                <div class="w-full p-1 md:p-2">
                    <img alt="gallery" class="block h-full w-full rounded-lg object-cover object-center" :src="path4" />
                </div>
                <div class="w-1/2 p-1 md:p-2">
                    <img alt="gallery" class="block h-full w-full rounded-lg object-cover object-center" :src="path5" />
                </div>
                <div class="w-1/2 p-1 md:p-2">
                    <img alt="gallery" class="block h-full w-full rounded-lg object-cover object-center" :src="path6" />
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { defineProps } from 'vue';
import { ref } from 'vue';

const props = defineProps({
    event: {
        type: Object,
        required: true,
    },
    images: {
        type: Object,
        required: true,
    },
});

const Images = ref(Object.values(props.images));
let startIndex = ref(0);

const path1 = ref(Images.value[startIndex.value]?.path || '');
const path2 = ref(Images.value[startIndex.value + 1]?.path || '');
const path3 = ref(Images.value[startIndex.value + 2]?.path || '');
const path4 = ref(Images.value[startIndex.value + 3]?.path || '');
const path5 = ref(Images.value[startIndex.value + 4]?.path || '');
const path6 = ref(Images.value[startIndex.value + 5]?.path || '');

const next = () => {
    if (startIndex.value + 6 < Images.value.length) {
        startIndex.value += 6;
        updatePaths();
    }
};

const previous = () => {
    if (startIndex.value - 6 >= 0) {
        startIndex.value -= 6;
        updatePaths();
    }
};

const updatePaths = () => {
    path1.value = Images.value[startIndex.value]?.path || '';
    path2.value = Images.value[startIndex.value + 1]?.path || '';
    path3.value = Images.value[startIndex.value + 2]?.path || '';
    path4.value = Images.value[startIndex.value + 3]?.path || '';
    path5.value = Images.value[startIndex.value + 4]?.path || '';
    path6.value = Images.value[startIndex.value + 5]?.path || '';
};

updatePaths();


</script>

<style>
.arrow-btn:hover .arrow-icon {
    transform: scale(1.2);
    transition: transform 0.3s ease;
}
</style>
