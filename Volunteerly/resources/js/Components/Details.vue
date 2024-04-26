<template>
    <div class="ml-[15vw]">
        <div style="width: 75vw;">
            <div class="flex items-center">
                <fwb-img class="w-10" src="/images/DocumentLogo.png" />
                <h2 class="text-xl ml-2 text-blue-500 font-bold">Popis:</h2>
            </div>
            <p class="text-sm m-6">{{ event.data.description }}</p>
            <ShowEvent :event="event" />
            <div class="flex items-center">
                <fwb-img class="w-20" src="/images/Rating.png" />
                <h2 class="text-xl ml-2 text-blue-500 font-bold">Hodnocení:</h2>
            </div>
        </div>



    </div>
</template>

<script setup>
import { FwbImg } from 'flowbite-vue';
import ShowEvent from '@/Components/Maps/ShowEvent.vue';
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