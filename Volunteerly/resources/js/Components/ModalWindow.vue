<template>
    <fwb-modal v-if="isShowModal" @close="closeModal">
        <template #header>
            <div class="flex items-center text-lg">
                Vyberte Místo na mapě kde se bude konat Vaše akce
            </div>
        </template>
        <template #body>

            <SearchBarMap @location-selected="handleLocationSelected">
            </SearchBarMap>

        </template>
        <template #footer>
            <div class="flex justify-between">
                <fwb-button @click="closeModal" color="alternative">
                    Zrušit
                </fwb-button>
                <fwb-button  @click="confirmLocation" color="green">
                    Potvrdit
                </fwb-button>
            </div>
        </template>
    </fwb-modal>
</template>

<script lang="ts" setup>
import { defineProps, defineEmits, defineComponent, ref, onMounted } from 'vue'
import { FwbButton, FwbModal } from 'flowbite-vue'
import SearchBarMap from './Maps/SearchBarMap.vue';

const props = defineProps({
    isShowModal: {
        type: Boolean,
        default: false,
    },
});

const emits = defineEmits(['update:isShowModal', 'confirmLocation']);

function closeModal() {
    emits('update:isShowModal', false);
}

function showModal() {
    emits('update:isShowModal', true);
}

const locationDetails = ref({
    city: null,
    province: null,
    street: null,
    latitude: null,
    longitude: null,
});

const handleLocationSelected = (details) => {
    locationDetails.value = { ...details };
};

const confirmLocation = () => {
    closeModal();
     emits('confirmLocation', locationDetails.value);
};

</script>
