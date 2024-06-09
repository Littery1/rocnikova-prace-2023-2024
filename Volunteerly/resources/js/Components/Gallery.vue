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
        <div class="flex flex-wrap justify-center m-2">
            <div class="grid grid-cols-3 gap-4">
                <div v-for="image in visibleImages" :key="image.id" class="relative">
                    <div class="absolute top-0 left-0 mt-2 ml-2" @click="deleteImage(image.id)"
                        v-if="showTrashBin && image">
                        <img alt="Trash Can" class="w-5 h-auto" src="/images/TrashCan.png">
                    </div>
                    <img v-if="image" alt="gallery"
                        class="block object-fill w-44 h-44 rounded-lg object-center"
                        :src="formatImagePath(image.path)" />
                </div>
            </div>
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
</script>

<style scoped>
.arrow-btn:hover .arrow-icon {
    transform: scale(1.2);
    transition: transform 0.3s ease;
}

.image-container {
    width: 100%;
    padding-bottom: 75%;
    /* Aspect ratio: 4:3 */
    position: relative;
    overflow: hidden;
    border-radius: 0.5rem;
    /* Optional: For rounded corners */
}

.image-container img {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
}
</style>
