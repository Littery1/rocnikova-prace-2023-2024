<template>
  <input ref="datepicker" type="text" v-bind="$attrs">
</template>

<script setup>
import flatpickr from 'flatpickr';
import 'flatpickr/dist/flatpickr.min.css';

const setup = () => {
  onMounted(() => {
    flatpickr(refs.datepicker, {});
  });
};
</script>

