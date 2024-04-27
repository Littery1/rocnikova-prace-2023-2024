<template>
    <div class="container mx-auto px-5 py-2 lg:px-32 lg:pt-24 relative">
        <div class="flex flex-col items-center">
            <div class="border-b border-gray-400 w-full mb-4"></div>

            <div class="flex flex-col md:flex-row ml-4 md:ml-[-33vw]">
                <!-- First h2 element -->
                <div class="flex-none mb-2 md:mb-0">
                    <h2 class="text-2xl font-bold text-blue-700 cursor-pointer"
                        @click="() => VueScrollTo.scrollTo('#description')">
                        Popis</h2>
                </div>

                <!-- Second h2 element -->
                <div class="flex-none ml-4">
                    <h2 class="text-2xl font-bold text-blue-700 cursor-pointer"
                        @click="() => VueScrollTo.scrollTo('#map')">Mapa</h2>
                </div>

                <!-- Third h2 element -->
                <div class="flex-none ml-4">
                    <h2 class="text-2xl font-bold text-blue-700 cursor-pointer"
                        @click="() => VueScrollTo.scrollTo('#rating')">
                        Hodnocení</h2>
                </div>
            </div>

            <div class="border-b border-gray-400 w-full mt-4"></div>
        </div>
    </div>

    <div class="ml-4 md:ml-[15vw] mr-4 md:mr-[7vw] bg-white rounded-xl">
        <div style="width: 100%;  " class="m-5">
            <div class="flex items-center m-5">
                <h2 class="text-xl ml-2 text-blue-500 font-bold">Kdy se akce koná?</h2>
            </div>
            <Calendar :event="event" />

            <div class="flex items-center m-5" id="description">
                <fwb-img class="w-10" src="/images/DocumentLogo.png" />
                <h2 class="text-xl ml-2 text-blue-500 font-bold">Popis:</h2>
            </div>
            <p class="text-sm m-6">{{ event.data.description }}</p>
            <ShowEvent :event="event" id="map" />

            <div class="flex items-center m-5" id="rating">
                <fwb-img class="w-20" src="/images/Rating.png" />
                <h2 class="text-xl ml-2 text-blue-500 font-bold">Hodnocení:</h2>
            </div>
            <Comments page-language="cs" :website-id="11002" :page-id="currentUrl" style="width:75vw;"/>
        </div>
    </div>
</template>


<script setup>
import { FwbImg } from 'flowbite-vue';
import ShowEvent from '@/Components/Maps/ShowEvent.vue';
import { Comments } from '@hyvor/hyvor-talk-vue';
import Calendar from '@/Components/Calendar.vue';
import VueScrollTo from 'vue-scrollto';


const currentUrl = window.location.href;
defineProps({
    event: {
        type: Object,
        required: true,
    },
});


const formatDate = (dateString) => {
    const date = new Date(dateString);
    const options = {
        day: 'numeric',
        month: 'long',
        year: 'numeric',
        hour: 'numeric',
        minute: 'numeric',
        second: 'numeric',
        timeZone: 'UTC', // Ensure consistent formatting across different time zones
        hour12: false, // Use 24-hour format
        locale: 'cs-CZ' // Set the locale to Czech (Czech Republic)
    };
    return `${date.toLocaleDateString('cs-CZ', options)}`;
};
</script>