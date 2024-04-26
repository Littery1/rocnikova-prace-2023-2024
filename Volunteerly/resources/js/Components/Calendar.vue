<template>

    <div class=" p-6">
        <table class="mx-auto">
            <!-- First row: Month abbreviations -->
            <tr>
                <td v-for="(abbreviation, index) in monthAbbreviations" :key="index"
                    class="text-center px-4 py-1 bg-blue-500 border-4 border-white">
                    <p class="text-white  text-sm">{{ abbreviation }}</p>
                </td>
            </tr>
            <!-- Second row: Checkmarks -->
            <tr>
                <td v-for="(abbreviation, index) in monthAbbreviations" :key="'checkmark-' + index"
                    class="text-center ">
                    <p v-if="getEventMonths.includes(abbreviation)" class="text-white text-2xl bg-green-400">✓</p>
                </td>
            </tr>
        </table>
    </div>
</template>

<script setup>
import { computed } from 'vue';

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

const getEventMonths = computed(() => {
    const eventStartMonth = new Date(props.event.data.dateStart).getMonth();
    const eventEndMonth = new Date(props.event.data.dateEnd).getMonth();
    const eventMonths = [];

    for (let i = eventStartMonth; i <= eventEndMonth; i++) {
        eventMonths.push(monthAbbreviations[i]);
    }

    return eventMonths;
});
</script>