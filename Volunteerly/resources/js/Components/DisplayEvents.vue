<template>
    <div class="container mx-auto">
        <fwb-heading tag="h1" class="text-3xl font-semibold m-4 text-center">Události</fwb-heading>

        <div class="flex justify-center gap-4">
            <!-- Photo 1 -->
            <div class="w-60">
                <fwb-img src="/images/BlankPhoto.jpg" style="height: 14rem;" />
                <div class="bg-black bg-opacity-50 text-white mt-1 text-center p-10" style="max-width: 15rem;">
                    <p class="overflow-hidden whitespace-nowrap overflow-ellipsis">Description for Photo 1</p>
                </div>
            </div>

            <!-- Photo 2 -->
            <div class="w-60">
                <fwb-img src="/images/BlankPhoto.jpg" style="height: 14rem;" />
                <div class="bg-black bg-opacity-50 text-white mt-1 text-center p-10" style="max-width: 15rem;">
                    <p class="overflow-hidden whitespace-nowrap overflow-ellipsis">Description for Photo 2</p>
                </div>
            </div>

            <!-- Photo 3 -->
            <div class="w-60">
                <fwb-img src="/images/BlankPhoto.jpg" style="height: 14rem;" />
                <div class="bg-black bg-opacity-50 text-white mt-1 text-center p-10" style="max-width: 15rem;">
                    <p class="overflow-hidden whitespace-nowrap overflow-ellipsis">Description for Photo 3</p>
                </div>
            </div>

            <!-- Photo 4 -->
            <div class="w-60">
                <fwb-img src="/images/BlankPhoto.jpg" style="height: 14rem;" />
                <div class="bg-black bg-opacity-50 text-white mt-1 text-center p-10" style="max-width: 15rem;">
                    <p class="overflow-hidden whitespace-nowrap overflow-ellipsis">Description for Photo 4</p>
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
