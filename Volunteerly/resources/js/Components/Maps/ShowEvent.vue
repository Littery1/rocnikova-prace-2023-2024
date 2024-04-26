<template>
    {{ event.data.location.coordinates }}
    <div id="map" style="width:75vw; height: 70vh"></div>

</template>
<script setup>
import { Loader } from '@googlemaps/js-api-loader';
import { ref, onMounted, defineProps } from 'vue';

const props = defineProps({
    event: {
        type: Object,
        required: true,
    },
});

const lati = props.event.data.location.coordinates.split(' ')[1];
const lngi = props.event.data.location.coordinates.split(' ')[2];
let map = null;
let marker;
const loader = new Loader({
    apiKey: "AIzaSyAPH2-HtObKLcm-wKahot1g8J0N0Ks8DA4",
    version: "weekly",
    libraries: ["places"],
    language: "cs"
});

onMounted(async () => {
    await loader.load();
    map = new google.maps.Map(document.getElementById("map"), {
        center: { lat: 49.823433, lng: 15.7245234 },
        zoom: 6.71,
        mapId: "DEMO_MAP_ID",
    });

    // Create a marker at the center of the map
    marker = new google.maps.Marker({
        position: { lat: lati, lng: lngi },
        map: map,
    });
});
</script>