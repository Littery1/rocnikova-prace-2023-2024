<template>
    <div class="h-screen bg-gray-100 p-6">
        <table class="mx-auto border border-black">
            <!-- First row: Month abbreviations -->
            <tr>
                <td v-for="(abbreviation, index) in monthAbbreviations" :key="index"
                    class="text-center px-4 py-1 border border-black">
                    <p class="text-gray-900 text-sm">{{ abbreviation }}</p>
                </td>
            </tr>
            <!-- Second row: Empty cells -->
            <tr>
                <td v-for="(abbreviation, index) in monthAbbreviations" :key="'empty-' + index"
                    class="text-center px-4 py-4 border border-black" style=""></td>
            </tr>
        </table>
    </div>
</template>

<script setup>
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
</script>

