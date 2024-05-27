<template>

    <Head title="Přehled" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="relative font-semibold text-xl text-gray-800 leading-tight">Moje Akce</h2>
        </template>
        <div class="relative flex justify-end mt-4 -left-40">
            <Link href="create-event"
                class="inline-flex items-center px-4 py-4 mr-15 sm:mt-6 text-sm font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
            Vytvořit novou akci
            </Link>
        </div>
        <div class="max-w-7xl mx-auto mt-4 sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <div>

                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                            <template v-for="event in events" :key="event.id">
                                <InertiaLink :href="'/edit-event' + event.id">

                                    <div
                                        class="flex flex-col items-center justify-center p-4 bg-white border border-gray-200 rounded-lg shadow-sm">
                                        <div class="flex items
                                    -center justify-center w-20 h-20 bg-gray-200 rounded-full">
                                        </div>
                                        <div class="mt-4">
                                            <h3 class="text-lg font-semibold">{{ event.name }}</h3>
                                            <p class="text-gray-500">Začátek: {{ event.dateStart }}</p>
                                            <p class="text-gray-500">Konec: {{ event.dateEnd }}</p>
                                            <div class="flex items-center">
                                                <fwb-img alt="Map Pointer" class="w-4 h-auto m-1"
                                                    src="/images/MapPointer.png"></fwb-img>
                                                <p class="text-xs font-semibold text-gray-500 ml-2">
                                                    {{ event.location.city }}, {{ event.location.province }}
                                                </p>
                                                <p class="text-gray-500">{{ event.description }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </InertiaLink>
                            </template>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </AuthenticatedLayout>
</template>
<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
import { FwbImg } from 'flowbite-vue'
import { InertiaLink } from '@inertiajs/inertia-vue3';


const props = defineProps({
    events: {
        type: Object,
        required: true,
    },
});

const navigateToEvent = (id) => {

}
</script>
