<script setup>
import { ref } from 'vue';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';

const showingNavigationDropdown = ref(false);
</script>

<template>
  <Dropdown align="right" width="48">
    <template #trigger>
      <button type="button" aria-label="Otevřít profilový dropdown"
        class="inline-flex items-center justify-center p-1 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 group">
        <svg
          class="w-10 h-10 me-2 text-gray-400 group-hover:text-gray-500 dark:text-gray-500 dark:group-hover:text-gray-300"
          aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20"
          style="--darkreader-inline-fill: currentColor;" data-darkreader-inline-fill="">
          <path
            d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z">
          </path>
        </svg>
      </button>
    </template>

    <template #content>
      <DropdownLink :href="route('profile.edit')"> Profil </DropdownLink>
      <DropdownLink :href="route('my-events') "> Moje Akce </DropdownLink>

      <DropdownLink :href="route('logout')" method="post" as="button">
        Odhlásit se
      </DropdownLink>
    </template>
  </Dropdown>
</template>
