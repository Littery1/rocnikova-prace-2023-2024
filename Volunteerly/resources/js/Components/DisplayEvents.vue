<template>
    <div>
        <h1>Events</h1>
        <ul>
            <li v-for="event in events" :key="event.id">{{ event.name }}</li>
        </ul>

        <h1>Locations</h1>
        <ul>
            <li v-for="location in locations" :key="location.id">{{ location.name }}</li>
        </ul>
    </div>
</template>
<script setup>
import { usePage } from '@inertiajs/inertia-vue3';
const { events, locations } = usePage().props.value;
</script>
