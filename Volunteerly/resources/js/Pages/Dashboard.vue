<script setup>

import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import SearchBar from '../Components/SearchBar.vue';
import Map from '../Components/Maps/SearchBarMap.vue';

</script>

<template>
    <Head title="Přehled" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Přehled</h2>
        </template>
        
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <SearchBar />
                        <div class="mt-4">
                            <Map />
                        </div>.

                            </div>
                        </div>
                    </div>
                </div>
                </AuthenticatedLayout>
            </template>
