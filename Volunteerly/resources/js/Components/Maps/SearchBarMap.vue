<template>
    <div id="map" style="width:100%;height: 80vh"></div>
</template>

<script>
import { Loader } from '@googlemaps/js-api-loader';
import { defineComponent, ref, onMounted } from 'vue';

export default defineComponent({
    setup(_, { emit }) {
        let map;
        let marker;
        const loader = new Loader({
            apiKey: "AIzaSyAPH2-HtObKLcm-wKahot1g8J0N0Ks8DA4",
            version: "weekly",
            libraries: ["places"]
        });

        onMounted(async () => {
            await loader.load();
            map = new google.maps.Map(document.getElementById("map"), {
                center: { lat: 49.823433, lng: 15.7245234 },
                zoom: 6.71,
                mapId: "DEMO_MAP_ID",
            });

            // Add click event listener to the map
            map.addListener('click', handleMapClick);
        });

        const handleMapClick = (event) => {
            const latitude = event.latLng.lat();
            const longitude = event.latLng.lng();
            const geocoder = new google.maps.Geocoder();

            geocoder.geocode({ location: event.latLng }, (results, status) => {
                if (status === 'OK') {
                    if (results[0]) {
                        const addressComponents = results[0].address_components;
                        const city = addressComponents.find(component => component.types.includes('locality'))?.long_name || '';
                        const district = addressComponents.find(component => component.types.includes('administrative_area_level_2'))?.long_name || '';
                        const street = addressComponents.find(component => component.types.includes('route'))?.long_name || '';

                        // If there's already a marker, remove it from the map
                        if (marker) {
                            marker.setMap(null);
                        }

                        // Create a new marker at the clicked position
                        marker = new google.maps.Marker({
                            position: event.latLng,
                            map: map,
                            title: `${city}, ${district}, ${street}`, // Set marker title with location details
                        });
                        // Emit event containing location details
                        emit('location-selected', {
                            city,
                            district,
                            street,
                            latitude,
                            longitude,
                        });
                    } else {
                        console.error('No results found');
                    }
                } else {
                    console.error(`Geocoder failed due to: ${status}`);
                }
            });
        };
    }
});
</script>
