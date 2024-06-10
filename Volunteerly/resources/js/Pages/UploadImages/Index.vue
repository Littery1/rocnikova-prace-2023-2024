<template>
    <div class="w-full">
        <form @submit.prevent="handleSubmit">
            <file-pond name="image" ref="pond" class-name="my-pond" label-idle="Přetáhněte sem fotky..."
                allow-multiple="true" accepted-file-types="image/jpeg, image/png" :server="{
                    url: '',
                    process: {
                        url: route('UploadTemporaryImages.upload', { type: props.type, event: props.event.data.id }),
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
import { FwbButton } from 'flowbite-vue';
import { defineProps } from 'vue';
import { Inertia } from '@inertiajs/inertia';

const props = defineProps({
    event: {
        type: Object,
        required: true,
    },
    type: {
        type: String,
        required: true,
    },
    images: {
        type: Object,
        required: true,
    },
});

const FilePond = vueFilePond(FilePondImagePreview, FilePondFileTypeValidation);

const form = useForm({
    images: []
});

function handleSubmit() {
    Inertia.post(route('UploadImages.upload', { type: props.type, event: props.event.data.id, images: form.images }), {
        preserveScroll: true,
        preserveState: true
    });
}

function handleFilePondLoad(response) {
    form.images.push(response);
    return response;
}

function handleFilePondRevert(uniqueId, load, error) {
    form.images = form.images.filter(image => image !== uniqueId);
    Inertia.delete('/revert/' + uniqueId, {
        onFinish: load,
        preserveScroll: true,
        preserveState: true
    });
}
</script>
