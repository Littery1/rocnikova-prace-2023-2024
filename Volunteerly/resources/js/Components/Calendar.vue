<template>
    <div class="flex flex-col items-center p-4">
        <div class="w-full overflow-auto">
            <!-- Responsive grid container -->
            <div class="grid grid-cols-3 sm:grid-cols-4 md:grid-cols-6 lg:grid-cols-12 gap-2">
                <div v-for="(abbreviation, index) in monthAbbreviations" :key="index" class="text-center">
                    <!-- Month abbreviation -->
                    <div class="p-2 bg-blue-500 border-2 border-white">
                        <p class="text-white text-xs sm:text-sm">{{ abbreviation }}</p>
                    </div>
                    <!-- Checkmark or placeholder -->
                    <div class="border-white mt-1">
                        <p v-if="eventMonths.includes(abbreviation)"
                            class="text-white text-2xl bg-green-400 border-2 border-white">✓</p>
                        <p v-else class="invisible">✓</p> <!-- Invisible placeholder for alignment -->
                    </div>
                </div>
            </div>
        </div>
        <div class="flex justify-center items-center mt-4">
            <fwb-button class="mr-4" @click="previousYear">←</fwb-button>
            <span>{{ currentYear }}</span>
            <fwb-button class="ml-4" @click="nextYear">→</fwb-button>
        </div>
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

const monthAbbreviations = [
    "Led", "Úno", "Bře", "Dub", "Kvě", "Čer",
    "Čvc", "Srp", "Zář", "Říj", "Lis", "Pro"
];

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
const nextYear = () => currentYear.value++;
const previousYear = () => currentYear.value--;
</script>
