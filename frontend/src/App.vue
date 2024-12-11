<script setup lang="ts">
import { useUserStore } from './store/user';
import { reactive } from 'vue';
import { User } from './interface/user'

const user = reactive<User>({
  name: '',
  email: '',
  password: '',
})
const userStore = useUserStore();

async function handleSubmit() {
  try {
    await userStore.addUser(user);
    alert("User registered successfully!");
  } catch (error) {
    console.error("Registration failed:", error);
  }
}
</script>

<template>
  <form @submit.prevent="handleSubmit">
    <div>
      <label for="name">Name:</label>
      <input id="name" v-model="user.name" type="text" required />
    </div>
    <div>
      <label for="email">Email:</label>
      <input id="email" v-model="user.email" type="email" required />
    </div>
    <div>
      <label for="password">Password:</label>
      <input id="password" v-model="user.password" type="password" required />
    </div>
    <button type="submit">Register</button>
  </form>
</template>