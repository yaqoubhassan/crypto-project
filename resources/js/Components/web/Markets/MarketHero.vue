<template>
  <section ref="sectionRef" class="py-16 gradient-bg overflow-hidden">
    <div class="container mx-auto px-4 pt-6">
      <div
        class="text-center mb-10"
        :class="{
          'animate__animated animate__fadeInDown': isVisible,
          'animate__animated animate__fadeOut animate__faster': !isVisible,
        }"
      >
        <h1 class="text-4xl font-bold text-white mb-4 pt-3 mt-4">Crypto Markets</h1>
        <p class="text-xl text-white max-w-3xl mx-auto">
          Real-time cryptocurrency prices, market caps, and trading volumes across
          multiple exchanges
        </p>
      </div>

      <div
        class="bg-white p-6 rounded-xl shadow-lg"
        :class="{
          'animate__animated animate__fadeInUp': isVisible,
          'animate__animated animate__fadeOut animate__faster': !isVisible,
        }"
        :style="getAnimationDelay(1)"
      >
        <div class="flex flex-col md:flex-row justify-between items-center mb-6">
          <h2 class="text-2xl font-bold text-gray-800 mb-4 md:mb-0">Market Overview</h2>
          <div class="flex items-center space-x-2">
            <span class="text-gray-600">Global Market Cap:</span>
            <span class="font-bold text-blue-600">$2.78T</span>
            <span class="text-green-500 flex items-center">
              <i class="fas fa-caret-up mr-1"></i> 3.2%
            </span>
          </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
          <div
            v-for="(stat, index) in marketStats"
            :key="index"
            class="bg-gray-50 p-4 rounded-lg"
            :class="getStatAnimationClasses(index)"
            :style="getAnimationDelay(index + 2)"
          >
            <h3 class="text-gray-500 text-sm mb-1">{{ stat.title }}</h3>
            <div class="flex items-center justify-between">
              <span class="text-xl font-bold text-gray-800">{{ stat.value }}</span>
              <span
                :class="stat.change >= 0 ? 'text-green-500' : 'text-red-500'"
                class="flex items-center"
              >
                <i
                  :class="stat.change >= 0 ? 'fas fa-caret-up' : 'fas fa-caret-down'"
                  class="mr-1"
                ></i>
                {{ Math.abs(stat.change) }}%
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script setup>
import useScrollAnimation from "@/Composables/useScrollAnimation";
import { ref } from "vue";

const marketStats = ref([
  {
    title: "24h Trading Volume",
    value: "$127.5B",
    change: 5.7,
  },
  {
    title: "BTC Dominance",
    value: "47.2%",
    change: -0.6,
  },
  {
    title: "Active Cryptocurrencies",
    value: "12,463",
    change: 0.8,
  },
  {
    title: "ETH Gas",
    value: "24 Gwei",
    change: -12.3,
  },
]);

// Use the composable with specific animation options
const {
  elementRef: sectionRef,
  isVisible,
  getAnimationDelay,
  animationClasses,
} = useScrollAnimation({
  threshold: 0.2,
  animationIn: "animate__fadeInUp",
  animationOut: "animate__fadeOut",
  defaultDelay: 0,
  staggerDelay: 0.1,
});

// Helper function to get stat animations based on index
const getStatAnimationClasses = (index) => {
  return {
    animate__animated: true,
    animate__fadeInUp: isVisible.value,
    "animate__fadeOut animate__faster": !isVisible.value,
  };
};
</script>

<style scoped>
.animate__animated {
  animation-duration: 1s;
}

.animate__faster {
  animation-duration: 0.5s;
}
</style>
