<script setup>
  import { Head, Link } from '@inertiajs/vue3';

</script>

<template>
  <nav class=" top-0 left-0 right-0 z-10 bg-white border-gray-200 dark:bg-gray-900"  style="background-color: #111827;">
    <div class="max-w-screen-xl flex items-center justify-between mx-auto p-4">
      <a href="https://flowbite.com/" class="flex items-center space-x-3 rtl:space-x-reverse">
        <img src="/images/Logo.png" class="h-14" alt="Volunteerly Logo" />
        <span class="self-center text-2xl font-semibold whitespace-nowrap text-white">Volunteerly</span>
      </a>
      <button
        data-collapse-toggle="navbar-default"
        type="button"
        class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
        aria-controls="navbar-default"
        aria-expanded="false"
      >
        <span class="sr-only">Otevřete hlavní nabídku</span>
        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
        </svg>
      </button>

      <div class="hidden w-full md:flex md:w-auto " id="navbar-default">
        <ul class="font-medium flex flex-col md:flex-row space-y-4 md:space-y-0 md:space-x-8 rtl:space-x-reverse">
          <li>
            <a href="#" class="block py-2 px-3  bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 text-white md:dark:text-blue-500" aria-current="page">Domů</a>
          </li>
          <li>
            <a href="#" class="block py-2 px-3  rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">O nás</a>
          </li>
                    <li>
            <a href="#" class="block py-2 px-3  rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Kontakty
            </a>
          </li>
          <li v-if="!$page.props.auth.user">
            <Link
              
              :href="route('login')"
              class="block py-2 px-3 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent"
            >
              Přihlásit se
            </Link>
          </li>
          <li v-if="!$page.props.auth.user">
            <Link
              
              :href="route('register')"
              class="block py-2 px-3  rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent"
            >
              Registrovat se
            </Link>
          </li>
          <li v-if="$page.props.auth.user">
                        <Link                
                :href="route('dashboard')"
                class="font-semibold text-gray-600  dark:text-gray-400 hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                >Přehled</Link
            >
          </li>

        </ul>
      </div>
    </div>
  </nav>
</template>
