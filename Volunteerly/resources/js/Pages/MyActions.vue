<script setup>

import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { ref } from 'vue';
import Modal from '@/Components/Modal.vue';
import FormMyActions from '../Components/FormMyActions.vue';


</script>

<template>

    <Head title="Přehled" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Moje Akce</h2>
        </template>

        <div class="py-12">
            <FormMyActions/>

        </div>
    </AuthenticatedLayout>
</template>
