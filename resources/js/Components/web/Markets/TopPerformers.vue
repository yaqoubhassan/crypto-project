<template>
  <section ref="sectionRef" class="py-16 bg-white overflow-hidden">
    <div class="container mx-auto px-4">
      <div
        class="text-center mb-12"
        :class="{
          'animate__animated animate__fadeInDown': isVisible,
          'animate__animated animate__fadeOut animate__faster': !isVisible,
        }"
      >
        <h2 class="text-3xl font-bold text-gray-800 mb-4">Today's Top Performers</h2>
        <p class="text-xl text-gray-600 max-w-2xl mx-auto">
          Track the cryptocurrencies with the biggest price movements in the last 24 hours
        </p>
      </div>

      <div class="flex flex-col space-y-10">
        <div>
          <h3 class="text-xl font-bold text-gray-800 mb-6">Top Gainers (24h)</h3>
          <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            <div
              v-for="(crypto, index) in topGainers"
              :key="crypto.id"
              class="bg-white p-6 rounded-xl shadow-md hover:shadow-lg transition duration-300"
              :class="getCardAnimationClasses(index, 'gainers')"
              :style="getAnimationDelay(index)"
            >
              <div class="flex items-center justify-between mb-4">
                <div class="flex items-center">
                  <div class="w-10 h-10 mr-3 flex-shrink-0">
                    <i v-if="crypto.icon" :class="crypto.icon + ' text-2xl'"></i>
                    <span
                      v-else
                      class="bg-gray-200 w-10 h-10 rounded-full flex items-center justify-center text-sm font-bold"
                    >
                      {{ crypto.symbol.charAt(0) }}
                    </span>
                  </div>
                  <div>
                    <div class="font-bold text-gray-800">{{ crypto.symbol }}</div>
                    <div class="text-xs text-gray-500">{{ crypto.name }}</div>
                  </div>
                </div>
                <div
                  class="bg-green-100 text-green-600 font-medium px-3 py-1 rounded-full text-sm flex items-center"
                >
                  <i class="fas fa-caret-up mr-1"></i>{{ crypto.change24h }}%
                </div>
              </div>
              <div class="text-xl font-bold text-gray-800">{{ crypto.price }}</div>
              <div class="mt-4 h-10 bg-gray-100 rounded">
                <!-- Mini chart placeholder -->
              </div>
            </div>
          </div>
        </div>

        <div>
          <h3 class="text-xl font-bold text-gray-800 mb-6">Top Losers (24h)</h3>
          <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            <div
              v-for="(crypto, index) in topLosers"
              :key="crypto.id"
              class="bg-white p-6 rounded-xl shadow-md hover:shadow-lg transition duration-300"
              :class="getCardAnimationClasses(index, 'losers')"
              :style="getAnimationDelay(index + 4)"
            >
              <div class="flex items-center justify-between mb-4">
                <div class="flex items-center">
                  <div class="w-10 h-10 mr-3 flex-shrink-0">
                    <i v-if="crypto.icon" :class="crypto.icon + ' text-2xl'"></i>
                    <span
                      v-else
                      class="bg-gray-200 w-10 h-10 rounded-full flex items-center justify-center text-sm font-bold"
                    >
                      {{ crypto.symbol.charAt(0) }}
                    </span>
                  </div>
                  <div>
                    <div class="font-bold text-gray-800">{{ crypto.symbol }}</div>
                    <div class="text-xs text-gray-500">{{ crypto.name }}</div>
                  </div>
                </div>
                <div
                  class="bg-red-100 text-red-600 font-medium px-3 py-1 rounded-full text-sm flex items-center"
                >
                  <i class="fas fa-caret-down mr-1"></i>{{ Math.abs(crypto.change24h) }}%
                </div>
              </div>
              <div class="text-xl font-bold text-gray-800">{{ crypto.price }}</div>
              <div class="mt-4 h-10 bg-gray-100 rounded">
                <!-- Mini chart placeholder -->
              </div>
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

const topGainers = ref([
  {
    id: "injective",
    name: "Injective",
    symbol: "INJ",
    price: "$39.87",
    change24h: 18.7,
  },
  {
    id: "render",
    name: "Render Token",
    symbol: "RNDR",
    price: "$8.42",
    change24h: 15.3,
  },
  {
    id: "near",
    name: "NEAR Protocol",
    symbol: "NEAR",
    price: "$6.93",
    change24h: 12.8,
  },
  {
    id: "immutablex",
    name: "Immutable X",
    symbol: "IMX",
    price: "$3.27",
    change24h: 11.5,
    category: ["nft", "layer2"],
  },
]);

const topLosers = ref([
  {
    id: "internetcomputer",
    name: "Internet Computer",
    symbol: "ICP",
    price: "$12.36",
    change24h: -9.4,
  },
  {
    id: "optimism",
    name: "Optimism",
    symbol: "OP",
    price: "$2.84",
    change24h: -8.2,
    category: ["layer2"],
  },
  {
    id: "arbitrum",
    name: "Arbitrum",
    symbol: "ARB",
    price: "$1.15",
    change24h: -7.5,
    category: ["layer2"],
  },
  {
    id: "axieinfinity",
    name: "Axie Infinity",
    symbol: "AXS",
    price: "$8.92",
    change24h: -6.3,
    category: ["nft", "metaverse"],
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

// Helper function to get card animations
const getCardAnimationClasses = (index, type) => {
  const animations = {
    animate__animated: true,
    "animate__fadeOut animate__faster": !isVisible.value,
  };

  if (isVisible.value) {
    if (type === "gainers") {
      animations["animate__fadeInLeft"] = index === 0;
      animations["animate__fadeInUp"] = index === 1 || index === 2;
      animations["animate__fadeInRight"] = index === 3;
    } else {
      animations["animate__fadeInLeft"] = index === 0;
      animations["animate__fadeInUp"] = index === 1 || index === 2;
      animations["animate__fadeInRight"] = index === 3;
    }
  }

  return animations;
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
