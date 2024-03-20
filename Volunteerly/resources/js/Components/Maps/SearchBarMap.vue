<template>
    <GoogleMap api-key="AIzaSyAPH2-HtObKLcm-wKahot1g8J0N0Ks8DA4" style="width:100%;height: 80vh" :zoom="7.71"
        :center="center">

    </GoogleMap>
</template>

<script>
import { defineComponent } from 'vue';
import { GoogleMap } from 'vue3-google-map';

export default defineComponent({
    components: {
        GoogleMap,
    },
    setup() {
        const center = { lat: 49.823433, lng: 15.7245234, };
        return {
            center,
        };
    },
});
</script>