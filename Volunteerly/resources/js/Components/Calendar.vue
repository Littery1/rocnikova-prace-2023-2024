<template>
    <div class=" p-6">
        <table class="mx-auto ">
            <!-- First row: Month abbreviations -->
            <tr>
                <td v-for="(abbreviation, index) in monthAbbreviations" :key="index"
                    class="text-center px-4 py-1 bg-blue-500 border-4 border-white">
                    <p class="text-white  text-sm">{{ abbreviation }}</p>
                </td>
            </tr>
            <!-- Second row: Checkmarks -->
            <tr>
                <td v-for="(abbreviation, index) in monthAbbreviations" :key="'checkmark-' + index" class="text-center">
                    <p v-if="eventMonths.includes(abbreviation)" class="text-white text-2xl bg-green-400">✓</p>
                    <div v-else class="h-10"></div>
                </td>

            </tr>
        </table>

    </div>
    <div class="flex justify-center items-center mt-4">
        <fwb-button class="mr-4" @click="previousYear">←</fwb-button>
        <span>{{ currentYear }}</span>
        <fwb-button class="ml-4" @click="nextYear">→</fwb-button>
    </div>
</template>

<script setup>
import { computed, ref } from 'vue';
import { FwbButton } from 'flowbite-vue';

const props = defineProps({
    event: {
        type: Object,
        required: true,
    },
});

// Define an array of month abbreviations
const monthAbbreviations = [
    "Led", // Leden (January)
    "Úno", // Únor (February)
    "Bře", // Březen (March)
    "Dub", // Duben (April)
    "Kvě", // Květen (May)
    "Čer", // Červen (June)
    "Čvc", // Červenec (July)
    "Srp", // Srpen (August)
    "Zář", // Září (September)
    "Říj", // Říjen (October)
    "Lis", // Listopad (November)
    "Pro" // Prosinec (December)
];

// Calculate the range of months of the event
const eventMonths = computed(() => {
    const startMonth = new Date(props.event.data.dateStart).getMonth();
    const endMonth = new Date(props.event.data.dateEnd).getMonth();
    const startYear = new Date(props.event.data.dateStart).getFullYear();
    const endYear = new Date(props.event.data.dateEnd).getFullYear();
    const months = [];

    if (currentYear.value >= startYear && currentYear.value <= endYear) {
        let month = currentYear.value === startYear ? startMonth : 0;
        let monthEnd = currentYear.value === endYear ? endMonth : 11;

        for (; month <= monthEnd; month++) {
            months.push(monthAbbreviations[month]);
        }
    }

    return months;
});

const currentYear = ref(new Date().getFullYear());
// Methods to navigate between years
const nextYear = () => currentYear.value++;
const previousYear = () => currentYear.value--;
</script>