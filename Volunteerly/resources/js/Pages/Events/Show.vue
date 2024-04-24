<template>
    <div>
        <h1>Event Details</h1>
        <p>Event ID: {{ event }}</p>
    </div>
</template>

<script setup>
import { defineProps } from 'vue';
defineProps({
    event: {
        type: Object,
        required: true,
    },
    location: {
        type: Object,
        required: true,
    },
});
const formatDate = (dateString) => {
    const date = new Date(dateString);
    const options = {
        day: 'numeric',
        month: 'long',
        year: 'numeric',
        hour: 'numeric',
        minute: 'numeric',
        second: 'numeric',
        timeZone: 'UTC', // Ensure consistent formatting across different time zones
        hour12: false, // Use 24-hour format
        locale: 'cs-CZ' // Set the locale to Czech (Czech Republic)
    };
    return `${date.toLocaleDateString('cs-CZ', options)}`;
};
</script>
