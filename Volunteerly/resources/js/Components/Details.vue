<template>
    <div class="container mx-auto px-5 py-2 lg:px-32 lg:pt-24 relative">
        <div class="flex flex-col items-center">
            <div class="border-b border-gray-400 w-full mb-4"></div>

            <div class="flex flex-col md:flex-row justify-between w-full">
                <div class="flex flex-col md:flex-row md:ml-[20vw] space-y-2 md:space-y-0">
                    <!-- First h2 element -->
                    <div>
                        <h2 class="text-2xl font-bold text-blue-700 cursor-pointer"
                            @click="() => VueScrollTo.scrollTo('#description')">
                            Popis</h2>
                    </div>

                    <!-- Second h2 element -->
                    <div class="ml-4">
                        <h2 class="text-2xl font-bold text-blue-700 cursor-pointer"
                            @click="() => VueScrollTo.scrollTo('#map')">Mapa</h2>
                    </div>

                    <!-- Third h2 element -->
                    <div class="ml-4">
                        <h2 class="text-2xl font-bold text-blue-700 cursor-pointer"
                            @click="() => VueScrollTo.scrollTo('#rating')">
                            Hodnocení</h2>
                    </div>
                </div>
                <div class="flex items-center cursor-pointer mt-4 md:mt-0" style="margin-right: 10vw;">
                    <fwb-img class=" w-[2.5vw] md:w-[2.5vw]" src="/images/Mail.png" />
                    <h3 class="text-2xl font-bold text-blue-700 ml-2">Kontakt</h3>
                </div>
            </div>

            <div class="border-b border-gray-400 w-full mt-4"></div>
        </div>
    </div>
    <div class="flex">
        <div class="md:ml-[5vw]  bg-white rounded-xl border border-gray-300 shadow-sm w-[65vw] overflow-auto">
            <div class="m-5">
                <div class="flex items-center">
                    <h2 class="text-xl ml-2 text-blue-500 font-bold m-5">Kdy se akce koná?</h2>
                </div>
                <Calendar :event="event" />

                <div class="flex items-center m-5" id="description">
                    <fwb-img class=" w-[2.5vw]" src="/images/DocumentLogo.png" />
                    <h2 class="text-xl ml-2 text-blue-500 font-bold">Popis:</h2>
                </div>
                <p class="text-sm m-6 w-[55vw]">{{ event.data.description }}</p>
                <ShowEvent :event="event" id="map" />

                <div class="flex items-center m-5" id="rating">
                    <fwb-img class=" w-[5vw]" src="/images/Rating.png" />
                    <h2 class="text-xl ml-2 text-blue-500 font-bold">Hodnocení:</h2>
                </div>
                <Comments page-language="cs" :website-id="11002" :page-id="currentUrl" class="w-[56vw]" />
            </div>
        </div>
        <div
            class=" w-[30vw] md:ml-[1vw] md:mr-[5vw] bg-white rounded-xl border border-gray-300 shadow-sm overflow-auto">

            <div class="flex items-center m-5">
                <h2 class="text-xl ml-2 text-blue-500 font-bold m-5">Profil hostitele</h2>
            </div>
            <div class="flex items-center m-5">
                <p>{{ event.data.user.name }}</p>
            </div>
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