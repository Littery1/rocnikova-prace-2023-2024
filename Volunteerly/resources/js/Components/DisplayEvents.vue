<template>
    <div class="container mx-auto">
        <fwb-heading tag="h1" class="text-3xl font-semibold m-4 text-center">Události</fwb-heading>
        <div class="grid grid-cols-4 gap-4">
            <div v-for="event in events" :key="event.id" class="flex flex-col items-center">
                <fwb-img src="/images/BlankPhoto.jpg" style="height: 12rem; width: 12rem;" />
                <div class="bg-black bg-opacity-50 text-white mt-1 text-center p-10" style="width: 12rem;">
                    <p class="overflow-hidden whitespace-nowrap overflow-ellipsis">{{ event.description }}</p>
                </div>
            </div>
        </div>
    </div>
</template>


<script setup>
import { FwbImg } from 'flowbite-vue'
import { FwbHeading } from 'flowbite-vue'

defineProps({
    events: {
        type: Object,
        required: true,
    },
    locations: {
        type: Object,
        required: true,
    },

});
</script>
