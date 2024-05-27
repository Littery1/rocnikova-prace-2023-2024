<template>

    <Head title="Upravení akce" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Upravit Akci</h2>
        </template>
        <div class="py-12">
            <FormEditEvent :event="event" />
        </div>
    </AuthenticatedLayout>

</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import FormEditEvent from '@/Components/FormEditEvent.vue';
import { defineProps } from 'vue';

defineProps({
    event: {
        type: Object,
        required: true,
    },
});
</script>