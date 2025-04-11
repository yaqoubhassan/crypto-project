<script setup>
import { Link, usePage } from "@inertiajs/vue3";
import { computed, ref } from "vue";

const isMenuOpen = ref(false);
const currentRouteName = computed(() => usePage().component);

const toggleMenu = () => {
  isMenuOpen.value = !isMenuOpen.value;
};
const isActive = (routeName) => {
  console.log("Hello World!", routeName);
  console.log("currentRouteName", currentRouteName.value);
  return currentRouteName.value === routeName;
};
</script>

<template>
  <nav class="bg-white shadow-md fixed w-full z-10">
    <div class="container mx-auto px-4">
      <div class="flex justify-between items-center py-4">
        <!-- Logo -->
        <div class="flex items-center">
          <Link :href="route('home')" class="text-2xl font-bold text-blue-600"
            >CryptoX</Link
          >
        </div>

        <!-- Mobile menu button -->
        <div class="md:hidden">
          <button
            @click="toggleMenu"
            class="text-gray-500 hover:text-blue-600 focus:outline-none"
            aria-label="Toggle menu"
          >
            <svg
              class="h-6 w-6"
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor"
            >
              <path
                v-if="!isMenuOpen"
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M4 6h16M4 12h16M4 18h16"
              />
              <path
                v-else
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M6 18L18 6M6 6l12 12"
              />
            </svg>
          </button>
        </div>

        <!-- Desktop Navigation Menu -->
        <div class="hidden md:flex items-center space-x-8">
          <Link
            :href="route('home')"
            :class="{
              'text-blue-600 font-medium': isActive('Web/Home'),
              'text-gray-700 hover:text-blue-600': !isActive('Web/Home'),
            }"
            class="transition duration-300"
            >Home</Link
          >
          <Link
            :href="route('features')"
            class="text-gray-700 hover:text-blue-600 transition duration-300"
            >Features</Link
          >
          <a
            href="#how-it-works"
            class="text-gray-700 hover:text-blue-600 transition duration-300"
            >How It Works</a
          >
          <a
            href="#testimonials"
            class="text-gray-700 hover:text-blue-600 transition duration-300"
            >Testimonials</a
          >
        </div>

        <!-- Desktop Auth Buttons -->
        <div class="hidden md:flex items-center space-x-4">
          <Link
            :href="''"
            class="text-gray-700 hover:text-blue-600 transition duration-300"
            >Login</Link
          >
          <Link
            :href="route('register')"
            class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition duration-300"
            >Sign Up</Link
          >
        </div>
      </div>

      <!-- Mobile Navigation Menu -->
      <div v-show="isMenuOpen" class="md:hidden pb-3">
        <div class="flex flex-col space-y-4 pb-4">
          <Link
            :href="route('home')"
            class="text-gray-700 hover:text-blue-600 transition duration-300"
            @click="isMenuOpen = false"
            >Home</Link
          >
          <Link
            :href="route('features')"
            class="text-gray-700 hover:text-blue-600 transition duration-300"
            @click="isMenuOpen = false"
            >Features</Link
          >
          <a
            href="#how-it-works"
            class="text-gray-700 hover:text-blue-600 transition duration-300"
            @click="isMenuOpen = false"
            >How It Works</a
          >
          <a
            href="#testimonials"
            class="text-gray-700 hover:text-blue-600 transition duration-300"
            @click="isMenuOpen = false"
            >Testimonials</a
          >

          <!-- Mobile Auth Buttons - Now vertical with padding -->
          <div class="flex flex-col items-start space-y-3 pt-2 pb-3">
            <Link
              :href="''"
              class="text-gray-700 hover:text-blue-600 transition duration-300 mb-2"
              @click="isMenuOpen = false"
              >Login</Link
            >
            <Link
              :href="route('register')"
              class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition duration-300"
              @click="isMenuOpen = false"
              >Sign Up</Link
            >
          </div>
        </div>
      </div>
    </div>
  </nav>
</template>
