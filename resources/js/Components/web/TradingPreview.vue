<script setup>
import { ref } from "vue";

const tradingFeatures = ref([
  {
    title: "Professional Charts",
    description:
      "Multiple chart types with dozens of technical indicators and drawing tools.",
    icon: "fas fa-chart-bar",
  },
  {
    title: "Detailed Order Book",
    description:
      "See market depth and liquidity with real-time order book visualization.",
    icon: "fas fa-book-open",
  },
  {
    title: "Trade History",
    description: "Track all your transactions with comprehensive history and reporting.",
    icon: "fas fa-history",
  },
]);
</script>

<template>
  <section class="py-20 bg-white">
    <div class="container mx-auto px-4">
      <div class="text-center mb-16">
        <h2 class="text-3xl font-bold text-gray-800 mb-4">Powerful Trading Interface</h2>
        <p class="text-xl text-gray-600 max-w-2xl mx-auto">
          Our advanced yet intuitive trading platform gives you all the tools you need
        </p>
      </div>

      <div class="rounded-xl p-2 shadow-2xl">
        <div class="h-48 overflow-hidden rounded-lg">
          <img
            src="/assets/images/crypto7.jpg"
            alt="Trading Dashboard"
            class="w-full object-cover object-center"
          />
        </div>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-12">
        <div
          v-for="(feature, index) in tradingFeatures"
          :key="index"
          class="flex items-start"
        >
          <div class="bg-blue-100 p-3 rounded-full mr-4">
            <i :class="feature.icon + ' text-blue-600'"></i>
          </div>
          <div>
            <h3 class="text-lg font-bold text-gray-800 mb-2">{{ feature.title }}</h3>
            <p class="text-gray-600">{{ feature.description }}</p>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>
