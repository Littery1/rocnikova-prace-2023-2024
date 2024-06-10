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
                <div>
                    <p v-if="copied" class="text-green-500">Zkopírováno do schránky</p>
                    <div class="flex items-center cursor-pointer mt-4 md:mt-0" style="margin-right: 10vw;"
                        @click="copyEmail(event.data.user.email)">
                        <fwb-img class="w-[2.5vw] md:w-[2.5vw]" src="/images/Mail.png" />
                        <h3 class="text-2xl font-bold text-blue-700 ml-2">Kontakt:</h3>
                        <h3 class="text-sm font-bold text-blue-700 ml-2">{{ event.data.user.email }}</h3>
                    </div>
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
                <Comments page-language="cs" :website-id="11237" :page-id="currentUrl" class="w-[56vw]" />
            </div>
        </div>
        <div
            class=" w-[30vw] md:ml-[1vw] md:mr-[5vw] bg-white rounded-xl border border-gray-300 shadow-sm overflow-auto">

            <div class="flex items-center mt-5">
                <h2 class="text-xl  text-blue-500 font-bold ml-44">Další události</h2>
            </div>
            <div class="flex items-center ml-28">
                <DisplayEvents :events="events" :images="images" :event="event" :rows="two" />
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
import DisplayEvents from '@/Components/DisplayEvents.vue';
import { ref } from 'vue';

const two = 2;
const currentUrl = window.location.href;
const copied = ref(false);
const copyEmail = (email) => {
    navigator.clipboard.writeText(email).then(() => {
        copied.value = true;
        setTimeout(() => {
            copied.value = false;
        }, 2000);
    }).catch(err => {
        console.error('Nepodařilo se zkopírovat email: ', err);
    });
};
defineProps({
    event: {
        type: Object,
        required: true,
    },
    events: {
        type: Object,
        required: true,
    },
    images: {
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