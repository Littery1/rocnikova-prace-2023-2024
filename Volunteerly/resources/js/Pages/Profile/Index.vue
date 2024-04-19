<template>
    <fwb-table>
        <fwb-table-head>
            <fwb-table-head-cell>ID</fwb-table-head-cell>
            <fwb-table-head-cell>Jméno</fwb-table-head-cell>
            <fwb-table-head-cell>E-mail</fwb-table-head-cell>
            <fwb-table-head-cell>Je organizátor?</fwb-table-head-cell>
            <fwb-table-head-cell>Ověření e-mailu</fwb-table-head-cell>
            <fwb-table-head-cell>Založení</fwb-table-head-cell>


            <fwb-table-head-cell>
                <span class="sr-only">Edit</span>
            </fwb-table-head-cell>
        </fwb-table-head>
        <fwb-table-body>
            <fwb-table-row v-for="user in users.data" :key="user.id">
                <fwb-table-cell>{{ user.id }}</fwb-table-cell>
                <fwb-table-cell>{{ user.name }}</fwb-table-cell>
                <fwb-table-cell>{{ user.email }}</fwb-table-cell>
                <fwb-table-cell>{{ user.is_organizer }}</fwb-table-cell>
                <fwb-table-cell>{{ user.email_verified_at }}</fwb-table-cell>
                <fwb-table-cell>{{ user.created_at }}</fwb-table-cell>

                <fwb-table-cell>
                    <fwb-a href="#">
                        Edit
                    </fwb-a>
                </fwb-table-cell>
            </fwb-table-row>
        </fwb-table-body>
    </fwb-table>
</template>

<script setup>
import {
    FwbA,
    FwbTable,
    FwbTableBody,
    FwbTableCell,
    FwbTableHead,
    FwbTableHeadCell,
    FwbTableRow,
} from 'flowbite-vue'

defineProps({
    users: {
        type: Object,
        required: true,
    },
});
</script>