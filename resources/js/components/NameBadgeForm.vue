<template>
    <div class="name-badge-form">
      <input v-model="name" placeholder="Enter name" />
      <input v-model="badge" placeholder="Enter badge URL" />
      <button @click="addNameBadge">Add</button>
    </div>
  </template>

  <script setup>
  import { ref } from 'vue';

  const name = ref('');
  const badge = ref('');

  const addNameBadge = () => {
    if (name.value && badge.value) {
      // Emit the 'addNameBadge' event with the data
      const data = { name: name.value, badge: badge.value };
      ctx.emit('addNameBadge', data);

      // Clear input fields
      name.value = '';
      badge.value = '';
    }
  };

  // Extract the context object
  const { emit: ctxEmit } = ctx;

  // Provide the 'emit' function using a different name
  const emit = (event, ...args) => ctxEmit(event, ...args);
  </script>

  <style scoped>
  .name-badge-form {
    display: flex;
    flex-direction: column;
  }
  </style>
