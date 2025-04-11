<script setup>
import { Link } from "@inertiajs/vue3";

const props = defineProps({
  formattedCryptoData: {
    type: Array,
    default: () => [],
  },
  title: {
    type: String,
  },
  description: {
    type: String,
  },
});
</script>

<template>
  <header class="bg-header-image pt-40 pb-32 bg-cover bg-center">
    <div class="container mx-auto px-4">
      <div class="flex flex-col md:flex-row items-center">
        <div class="md:w-1/2 mb-10 md:mb-0">
          <h1 class="text-4xl md:text-5xl font-bold text-white leading-tight mb-6">
            {{ title }}
          </h1>
          <p class="text-xl text-gray-300 mb-8">
            {{ description }}
          </p>
          <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4">
            <Link
              :href="route('register')"
              class="bg-blue-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-blue-700 transition duration-300 text-center"
              >Get Started</Link
            >

            <a
              href="#how-it-works"
              class="bg-transparent border border-white text-white px-8 py-3 rounded-lg font-semibold hover:bg-white hover:text-blue-600 transition duration-300 text-center"
              >Learn More</a
            >
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Live Ticker -->
  <div class="bg-gray-900 py-4 overflow-hidden bg-opacity-70">
    <div class="crypto-ticker flex items-center space-x-8 text-white whitespace-nowrap">
      <div
        v-for="(crypto, index) in formattedCryptoData"
        :key="index"
        class="flex items-center space-x-2"
      >
        <i v-if="crypto.icon" :class="crypto.icon"></i>
        <span v-if="!crypto.icon" :class="crypto.symbolClass + ' font-bold'">
          {{ crypto.symbol }}
        </span>
        <span v-else>{{ crypto.symbol }}</span>
        <span :class="crypto.priceChange >= 0 ? 'text-green-500' : 'text-red-500'">
          {{ crypto.price }}
        </span>
        <span :class="crypto.priceChange >= 0 ? 'text-green-500' : 'text-red-500'">
          {{ crypto.priceChange >= 0 ? "+" : "" }}{{ crypto.priceChange.toFixed(2) }}%
        </span>
      </div>
    </div>
  </div>
</template>

<style scoped>
.bg-header-image {
  background-image: url("/public/assets/images/crypto8.jpg");
  position: relative;
}

.bg-header-image::before {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.5);
  z-index: 1;
}

.bg-header-image > * {
  position: relative;
  z-index: 2;
}

.crypto-ticker {
  animation: ticker 30s linear infinite;
}

@media (max-width: 768px) {
  .crypto-ticker {
    animation: ticker 15s linear infinite;
  }
}

@keyframes ticker {
  0% {
    transform: translateX(100%);
  }

  100% {
    transform: translateX(-100%);
  }
}
</style>
