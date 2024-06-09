<template>
    <div class="container mx-auto px-5 py-2 lg:px-32 lg:pt-24">
        <div class="relative flex justify-center items-center">
            <button @click="previous"
                class="absolute left-0 bg-gray-800 text-white rounded-full w-10 h-10 flex items-center justify-center transform -translate-y-1/2"
                :style="{ marginLeft: `calc((${imageWidthClass} / 2) - 5rem)` }">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 arrow-icon" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </button>
            <div class="flex flex-wrap justify-center m-2">
                <div class="grid grid-cols-3 gap-4">
                    <div v-for="image in visibleImages" :key="image.id" class="relative">
                        <div class="absolute top-0 left-0 mt-2 ml-2" @click="deleteImage(image.id)"
                            v-if="showTrashBin && image">
                            <img alt="Trash Can" class="w-5 h-auto" src="/images/TrashCan.png">
                        </div>
                        <img v-if="image" alt="gallery"
                            :class="['block object-fill rounded-lg object-center', imageSizeClass]"
                            :src="formatImagePath(image.path)" />
                    </div>
                </div>
            </div>
            <button @click="next"
                class="absolute right-0 bg-gray-800 text-white rounded-full w-10 h-10 flex items-center justify-center transform -translate-y-1/2"
                :style="{ marginRight: `calc((${imageWidthClass} / 2) - 5rem)` }">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 arrow-icon" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </button>
        </div>
    </div>
</template>

<script setup>
import { ref, computed } from 'vue';
import { useForm } from '@inertiajs/inertia-vue3';

const props = defineProps({
    images: {
        type: Object,
        required: true,
    },
    showTrashBin: {
        type: Boolean,
        default: true,
    },
    imageWidth: {
        type: String,
        default: 'w-44', // Default width class
    },
    imageHeight: {
        type: String,
        default: 'h-44', // Default height class
    },
});

const deleteForm = useForm({});

const deleteImage = (imageId) => {
    if (confirm('Opravdu chcete smazat tuto fotku?')) {
        deleteForm.delete(route('images.destroy', imageId), {
            onSuccess: () => {
                Images.value = Images.value.filter(image => image.id !== imageId);
            },
            onError: (errors) => {
                console.error("Failed to delete image:", errors);
            },
        });
    }
};

const Images = ref(props.images);
const imagesArray = computed(() => Object.values(Images.value));
let startIndex = ref(0);

const visibleImages = computed(() => imagesArray.value.slice(startIndex.value, startIndex.value + 6));

const next = () => {
    if (startIndex.value + 6 < imagesArray.value.length) {
        startIndex.value += 6;
    }
};

const previous = () => {
    if (startIndex.value - 6 >= 0) {
        startIndex.value -= 6;
    }
};

const formatImagePath = (path) => {
    if (path.startsWith('C:')) {
        // Adjust the path to be relative to the public directory
        return path.replace(/^.*\\public\\/, '/');
    }
    return path;
};

const imageSizeClass = computed(() => `${props.imageWidth} ${props.imageHeight}`);
const imageWidthClass = computed(() => props.imageWidth);
</script>

<style scoped>
.arrow-btn:hover .arrow-icon {
    transform: scale(1.2);
    transition: transform 0.3s ease;
}
</style>
