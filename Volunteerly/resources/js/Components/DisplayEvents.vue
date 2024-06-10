<template>
    PP
    <div class="flex items-center justify-center min-h-screen">
        <div class="container mx-auto p-6">
            <div v-bind:class="{
                'grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 max-w-screen-lg mx-auto': rows === 1,
                'grid grid-cols-1 sm:grid-cols-4 md:grid-cols-3 lg:grid-cols-4 gap-4 max-w-screen-lg mx-auto': rows === 2
            }">
                <template v-if="rows === 1">
                    <div v-for="(event, index) in events.data.sort((a, b) => a.id - b.id)" :key="event.id"
                        class="rounded-lg overflow-hidden">
                        <InertiaLink :href="'/event' + event.id">
                            <!-- Display main image or fallback blank image -->
                            <img :src="getMainImage(event.id) ? getMainImage(event.id).path : '/images/BlankPhoto.jpg'"
                                class=" w-52 h-28 object-cover" alt="Event Image" />
                        </InertiaLink>

                        <div class="bg-opacity-50 text-black mt-1 text-center p-4">
                            <div class="flex items-center mb-2">
                                <fwb-img alt="Map Pointer" class="w-4 h-auto m-1"
                                    src="/images/MapPointer.png"></fwb-img>
                                <h2 class="text-xs font-semibold max-w-40">
                                    {{ event.location.city }}
                                    <template v-if="event.location.street !== null">
                                        , {{ event.location.street }}
                                    </template>
                                </h2>
                            </div>
                            <div class=" max-h-24 max-w-52 overflow-hidden">
                                <InertiaLink :href="'/event' + event.id" class="text-link">
                                    <p class="text-sm line-clamp-2">{{ event.description }}</p>
                                </InertiaLink>
                            </div>
                        </div>
                    </div>
                </template>
                <template v-if="rows === 2">
                    <div v-for="(event, index) in events.data.sort((a, b) => a.id - b.id).slice(0, 6)" :key="event.id"
                        class="rounded-lg overflow-hidden">
                        <InertiaLink :href="'/event' + event.id">
                            <!-- Display main image or fallback blank image -->
                            <img :src="getMainImage(event.id) ? getMainImage(event.id).path : '/images/BlankPhoto.jpg'"
                                class=" w-52 h-28 object-cover" alt="Event Image" />
                        </InertiaLink>

                        <div class="bg-opacity-50 text-black mt-1 text-center p-4">
                            <div class="flex items-center mb-2">
                                <fwb-img alt="Map Pointer" class="w-4 h-auto m-1"
                                    src="/images/MapPointer.png"></fwb-img>
                                <h2 class="text-xs font-semibold max-w-40">
                                    {{ event.location.city }}
                                    <template v-if="event.location.street !== null">
                                        , {{ event.location.street }}
                                    </template>
                                </h2>
                            </div>
                            <div class=" max-h-24 max-w-52 overflow-hidden">
                                <InertiaLink :href="'/event' + event.id" class="text-link">
                                    <p class="text-sm line-clamp-2">{{ event.description }}</p>
                                </InertiaLink>
                            </div>
                        </div>
                    </div>
                </template>

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
const props = defineProps({
    events: {
        type: Object,
        required: true,
    },
    images: {
        type: Object,
        required: true,
    },
    event: {
        type: Object,
        required: true,
    },
    rows: {
        type: String,
        required: false,
        default: 1,
    },
});

const getMainImage = (eventId) => {
    const imgs = Object.values(props.images).flat();
    return imgs.find(image => image.events_id === eventId && image.type === 'main');
};
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
