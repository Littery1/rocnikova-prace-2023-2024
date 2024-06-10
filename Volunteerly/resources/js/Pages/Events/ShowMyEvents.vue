<template>
    <AuthenticatedLayout>
        <!-- Header and other layout elements -->
        <div class="max-w-7xl mx-auto mt-4 sm:px-6 lg:px-8">
            <!-- Button to create an event -->
            <div class="flex justify-end mb-4">
                <button class="bg-blue-500 text-white px-4 py-2 rounded-lg" @click.prevent="createEvent">Vytvořit
                    akci</button>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 relative">
 <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                        <!-- Loop through events -->
                        <template v-for="event in events" :key="event.id">
                            <div
                                class="relative flex flex-col items-center justify-center p-4 bg-white border border-gray-200 rounded-lg shadow-sm">
                                <!-- Display main image -->
                                <img v-if="getMainImagePath(images, event.id)" :src="getMainImagePath(images, event.id)"
                                    alt="Main Image" class="w-20 h-20 object-cover rounded-full">
                                <!-- Trash Can Icon Link -->
                                <div class="absolute top-0 left-0 mt-2 mr-2" @click.prevent="deleteEvent(event.id)">
                                    <img alt="Trash Can" class="w-6 h-auto" src="/images/TrashCan.png">
                                </div>
                                <!-- Edit Icon Link -->
                                <Link :href="route('events.edit', { id: event.id })"
                                    class="absolute top-0 right-0 mt-2 mr-2">
                                <img alt="Edit" class="w-6 h-auto" src="/images/Edit.png">
                                </Link>
                                <!-- Event Details -->
                                <div class="mt-4">
                                    <h3 class="text-lg font-semibold">{{ event.name }}</h3>
                                    <p class="text-gray-500">Začátek: {{ event.dateStart }}</p>
                                    <p class="text-gray-500">Konec: {{ event.dateEnd }}</p>
                                    <div class="flex items-center">
                                        <img alt="Map Pointer" class="w-4 h-auto m-1" src="/images/MapPointer.png">
                                        <p class="text-xs font-semibold text-gray-500 ml-2">{{ event.location.city }},
                                            {{ event.location.province }}</p>
                                    </div>
                                    <p class="text-gray-500">{{ event.description }}</p>
                                </div>
                            </div>
                        </template>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import { Head, Link, useForm, usePage } from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { router } from '@inertiajs/vue3';

const createEvent = () => {
    router.visit(route('create-event'), { method: 'get' });
};

const props = defineProps({
    events: {
        type: Object,
        required: true,
    },
    images: {
        type: Object,
        required: true,
    },
});

const deleteForm = useForm({});

const deleteEvent = (eventId) => {
    if (confirm('Opravdu chcete smazat tuto akci?')) {
        deleteForm.delete(route('events.destroy', eventId));
    }
};

const getMainImagePath = (images, eventId) => {
    if (images[eventId]) {
        const mainImageId = Object.keys(images[eventId]).find(imageId => images[eventId][imageId].type === 'main');
        if (mainImageId) {
            return images[eventId][mainImageId].path;
        }
    }
    return '/images/BlankPhoto.jpg';
};

</script>
