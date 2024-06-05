<template>
    <div class="w-full ">
        <form @submit.prevent="$event => form.post(route('UploadImages.upload'))">
            <file-pond name="image" ref="pond" class-name="my-pond" label-idle="Přetáhněte sem fotky..."
                allows-multiple="true" accepted-file-types="image/jpeg, image/png" :server="{
                    url: '',
                    process: {
                        url: route('UploadTemporaryImages.upload'),
                        method: 'POST',
                        onload: handleFilePondLoad
                    },
                    revert: handleFilePondRevert,
                    headers: {
                        'X-CSRF-TOKEN': $page.props.csrf_token
                    }
                }" />
            <fwb-button type="submit">Nahrát fotky</fwb-button>
        </form>
    </div>

</template>
<script setup>
import vueFilePond from 'vue-filepond';
import FilePondImagePreview from 'filepond-plugin-image-preview';
import FilePondFileTypeValidation from 'filepond-plugin-file-validate-type';
import "filepond/dist/filepond.min.css";
import "filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css";
import { useForm } from '@inertiajs/inertia-vue3';
import { FwbButton } from 'flowbite-vue'
import { router } from '@inertiajs/vue3'
import { defineProps } from 'vue';


const props = defineProps({
    event: {
        type: Object,
        required: true,
    },
    errors: {
        type: Object,
    },
    images: {
        type: Object,
        required: true,
    },
});

const FilePond = vueFilePond(FilePondImagePreview, FilePondFileTypeValidation);

const form = useForm({
    images: [props.event.data.image]
});
function handleFilePondLoad(response) {
    form.images.push(response);
        return response;
    }
function handleFilePondRevert(uniqueId, load, error) {
    form.images = form.images.filter((image) => image !== uniqueId);
    router.delete('/revert/' + uniqueId);
    load();
}

</script>