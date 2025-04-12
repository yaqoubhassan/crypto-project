<template>
  <section ref="sectionRef" class="py-16 bg-gray-50 overflow-hidden">
    <div class="container mx-auto px-4">
      <div class="mb-10">
        <h2 class="text-3xl font-bold mb-2">Market Tools</h2>
        <p class="text-gray-600">
          Essential tools to analyze and make informed decisions in the crypto market
        </p>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <div
          v-for="(tool, index) in tools"
          :key="tool.id"
          class="bg-white rounded-xl shadow-md overflow-hidden transition-all duration-300 hover:shadow-lg hover:translate-y-1"
          :class="getToolAnimationClasses(index)"
          :style="getAnimationDelay(index)"
        >
          <div class="p-6">
            <div
              class="w-12 h-12 rounded-lg bg-blue-100 flex items-center justify-center mb-4"
            >
              <i :class="tool.icon + ' text-blue-600 text-2xl'"></i>
            </div>
            <h3 class="text-xl font-bold mb-2">{{ tool.name }}</h3>
            <p class="text-gray-600 mb-4">{{ tool.description }}</p>
            <button
              class="text-blue-600 hover:text-blue-700 font-medium flex items-center"
            >
              Try now
              <i class="fas fa-arrow-right ml-2"></i>
            </button>
          </div>
        </div>
      </div>

      <div class="mt-16">
        <div
          class="bg-white rounded-xl shadow-lg p-8"
          :class="{
            'animate__animated animate__fadeInUp': isVisible,
            'animate__animated animate__fadeOut animate__faster': !isVisible,
          }"
          :style="getAnimationDelay(tools.length)"
        >
          <div class="flex flex-col md:flex-row items-center justify-between">
            <div class="mb-6 md:mb-0 md:mr-8">
              <h3 class="text-2xl font-bold mb-3">Cryptocurrency Calculator</h3>
              <p class="text-gray-600 mb-4">
                Convert between cryptocurrencies and fiat currencies with real-time
                exchange rates
              </p>
              <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-4">
                <div>
                  <label class="block text-sm font-medium text-gray-700 mb-1">From</label>
                  <div class="relative">
                    <select
                      class="block w-full bg-gray-50 border border-gray-300 rounded-lg py-2 pl-3 pr-10 text-gray-700 focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                    >
                      <option value="BTC">Bitcoin (BTC)</option>
                      <option value="ETH">Ethereum (ETH)</option>
                      <option value="SOL">Solana (SOL)</option>
                      <option value="BNB">Binance Coin (BNB)</option>
                      <option value="USD">US Dollar (USD)</option>
                    </select>
                  </div>
                </div>
                <div>
                  <label class="block text-sm font-medium text-gray-700 mb-1">To</label>
                  <div class="relative">
                    <select
                      class="block w-full bg-gray-50 border border-gray-300 rounded-lg py-2 pl-3 pr-10 text-gray-700 focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                    >
                      <option value="USD">US Dollar (USD)</option>
                      <option value="EUR">Euro (EUR)</option>
                      <option value="GBP">British Pound (GBP)</option>
                      <option value="JPY">Japanese Yen (JPY)</option>
                      <option value="BTC">Bitcoin (BTC)</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                  <label class="block text-sm font-medium text-gray-700 mb-1"
                    >Amount</label
                  >
                  <input
                    type="number"
                    placeholder="1.0"
                    class="block w-full bg-gray-50 border border-gray-300 rounded-lg py-2 px-3 text-gray-700 focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                  />
                </div>
                <div>
                  <label class="block text-sm font-medium text-gray-700 mb-1"
                    >Converted Amount</label
                  >
                  <div
                    class="flex items-center bg-gray-50 border border-gray-300 rounded-lg py-2 px-3"
                  >
                    <span class="text-gray-700">$48,276.52</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="flex-shrink-0 w-full md:w-1/3 lg:w-1/4">
              <div class="bg-gray-100 rounded-lg p-4">
                <h4 class="font-medium mb-3">Market Rate</h4>
                <div class="flex justify-between mb-2">
                  <span class="text-gray-600">1 BTC</span>
                  <span class="font-medium">$48,276.52</span>
                </div>
                <div class="flex justify-between mb-2">
                  <span class="text-gray-600">1 ETH</span>
                  <span class="font-medium">$3,487.19</span>
                </div>
                <div class="flex justify-between">
                  <span class="text-gray-600">Last updated</span>
                  <span class="text-sm text-gray-500">1 min ago</span>
                </div>
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

// Sample tools data
const tools = ref([
  {
    id: 1,
    name: "Portfolio Tracker",
    description:
      "Track and manage your crypto portfolio with real-time pricing data across multiple exchanges.",
    icon: "fas fa-chart-pie",
  },
  {
    id: 2,
    name: "Price Alerts",
    description:
      "Set custom price alerts for your favorite cryptocurrencies and receive notifications.",
    icon: "fas fa-bell",
  },
  {
    id: 3,
    name: "Tax Calculator",
    description:
      "Calculate your crypto tax liabilities with our easy-to-use tax reporting tool.",
    icon: "fas fa-calculator",
  },
  {
    id: 4,
    name: "Market Scanner",
    description:
      "Identify trading opportunities with technical analysis indicators and pattern recognition.",
    icon: "fas fa-search-dollar",
  },
  {
    id: 5,
    name: "Trading Simulator",
    description:
      "Practice trading strategies without risking real money in our realistic market simulator.",
    icon: "fas fa-gamepad",
  },
  {
    id: 6,
    name: "API Integration",
    description:
      "Connect your trading bots and custom tools to our platform with our comprehensive API.",
    icon: "fas fa-code",
  },
]);

// Use the composable with specific animation options
const {
  elementRef: sectionRef,
  isVisible,
  getAnimationDelay,
  animationClasses,
} = useScrollAnimation({
  threshold: 0.1,
  animationIn: "animate__fadeInUp",
  animationOut: "animate__fadeOut",
  defaultDelay: 0,
  staggerDelay: 0.1,
});

// Helper function to get tool animations
const getToolAnimationClasses = (index) => {
  return {
    animate__animated: true,
    animate__fadeInUp: isVisible.value,
    "animate__fadeOut animate__faster": !isVisible.value,
  };
};
</script>

<style scoped>
.animate__animated {
  animation-duration: 0.8s;
}

.animate__faster {
  animation-duration: 0.5s;
}
</style>
