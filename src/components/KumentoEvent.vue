<template>
    <div class="kumento_event_post">
      <h1>{{ msg }}</h1>
  
      <pre>
          {{ settings }}
      </pre>
    </div>
  </template>
  <script setup>
  import { ref } from 'vue'
  
  defineProps({
    msg: String,
  })
  </script>
  <style scoped>
  </style>