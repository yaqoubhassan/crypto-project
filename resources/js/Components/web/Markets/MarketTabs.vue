<template>
  <section ref="sectionRef" class="py-16 bg-gray-100 overflow-hidden">
    <div class="container mx-auto px-4">
      <div
        class="bg-white rounded-xl shadow-lg p-6"
        :class="{
          'animate__animated animate__fadeInUp': isVisible,
          'animate__animated animate__fadeOut animate__faster': !isVisible,
        }"
      >
        <div class="mb-6 border-b">
          <div class="flex flex-wrap">
            <button
              v-for="(tab, index) in tabs"
              :key="index"
              class="px-6 py-3 font-medium focus:outline-none"
              :class="[
                activeTab === index
                  ? 'text-blue-600 border-b-2 border-blue-600'
                  : 'text-gray-500 hover:text-blue-500',
              ]"
              @click="activeTab = index"
            >
              {{ tab.name }}
            </button>
          </div>
        </div>

        <div class="overflow-x-auto">
          <table class="min-w-full">
            <thead>
              <tr class="text-left text-gray-500 border-b">
                <th class="py-3 px-4">#</th>
                <th class="py-3 px-4">Name</th>
                <th class="py-3 px-4">Price</th>
                <th class="py-3 px-4">24h %</th>
                <th class="py-3 px-4">7d %</th>
                <th class="py-3 px-4">Market Cap</th>
                <th class="py-3 px-4">Volume(24h)</th>
                <th class="py-3 px-4">Circulating Supply</th>
                <th class="py-3 px-4">Last 7 Days</th>
              </tr>
            </thead>
            <tbody>
              <tr
                v-for="(crypto, index) in filteredCryptos"
                :key="crypto.id"
                class="border-b hover:bg-gray-50 cursor-pointer transition duration-150"
                :class="getRowAnimationClasses(index)"
                :style="getAnimationDelay(index)"
              >
                <td class="py-4 px-4 text-sm">{{ index + 1 }}</td>
                <td class="py-4 px-4">
                  <div class="flex items-center">
                    <div class="w-8 h-8 mr-3 flex-shrink-0">
                      <i v-if="crypto.icon" :class="crypto.icon"></i>
                      <span
                        v-else
                        class="bg-gray-200 w-8 h-8 rounded-full flex items-center justify-center text-sm font-bold"
                      >
                        {{ crypto.symbol.charAt(0) }}
                      </span>
                    </div>
                    <div>
                      <div class="font-medium">{{ crypto.name }}</div>
                      <div class="text-xs text-gray-500">{{ crypto.symbol }}</div>
                    </div>
                  </div>
                </td>
                <td class="py-4 px-4 font-medium">{{ crypto.price }}</td>
                <td
                  class="py-4 px-4"
                  :class="crypto.change24h >= 0 ? 'text-green-500' : 'text-red-500'"
                >
                  <div class="flex items-center">
                    <i
                      :class="
                        crypto.change24h >= 0 ? 'fas fa-caret-up' : 'fas fa-caret-down'
                      "
                      class="mr-1"
                    ></i>
                    {{ Math.abs(crypto.change24h) }}%
                  </div>
                </td>
                <td
                  class="py-4 px-4"
                  :class="crypto.change7d >= 0 ? 'text-green-500' : 'text-red-500'"
                >
                  <div class="flex items-center">
                    <i
                      :class="
                        crypto.change7d >= 0 ? 'fas fa-caret-up' : 'fas fa-caret-down'
                      "
                      class="mr-1"
                    ></i>
                    {{ Math.abs(crypto.change7d) }}%
                  </div>
                </td>
                <td class="py-4 px-4">{{ crypto.marketCap }}</td>
                <td class="py-4 px-4">{{ crypto.volume }}</td>
                <td class="py-4 px-4">
                  <div class="flex items-center">
                    <span>{{ crypto.supply }}</span>
                    <span class="ml-1 text-gray-500">{{ crypto.symbol }}</span>
                  </div>
                </td>
                <td class="py-4 px-4">
                  <div class="w-24 h-10 bg-gray-100 rounded">
                    <!-- Chart placeholder -->
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>

        <div class="mt-6 flex justify-between items-center">
          <div class="text-sm text-gray-500">Showing 1-10 of 100 cryptocurrencies</div>
          <div class="flex space-x-2">
            <button class="px-4 py-2 border rounded hover:bg-gray-50">
              <i class="fas fa-chevron-left"></i>
            </button>
            <button
              class="px-4 py-2 border rounded bg-blue-600 text-white hover:bg-blue-700"
            >
              1
            </button>
            <button class="px-4 py-2 border rounded hover:bg-gray-50">2</button>
            <button class="px-4 py-2 border rounded hover:bg-gray-50">3</button>
            <button class="px-4 py-2 border rounded hover:bg-gray-50">
              <i class="fas fa-chevron-right"></i>
            </button>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script setup>
import useScrollAnimation from "@/Composables/useScrollAnimation";
import { computed, ref } from "vue";

const activeTab = ref(0);

const tabs = ref([
  { name: "All Cryptocurrencies", filter: null },
  { name: "DeFi", filter: "defi" },
  { name: "NFTs", filter: "nft" },
  { name: "Metaverse", filter: "metaverse" },
  { name: "Layer-1", filter: "layer1" },
  { name: "Layer-2", filter: "layer2" },
]);

const cryptos = ref([
  {
    id: "bitcoin",
    name: "Bitcoin",
    symbol: "BTC",
    price: "$48,276.52",
    change24h: 2.7,
    change7d: 5.2,
    marketCap: "$931.25B",
    volume: "$28.95B",
    supply: "19.28M",
    icon: "fab fa-bitcoin text-yellow-500",
    category: ["layer1"],
  },
  {
    id: "ethereum",
    name: "Ethereum",
    symbol: "ETH",
    price: "$3,487.19",
    change24h: 3.5,
    change7d: 8.7,
    marketCap: "$419.62B",
    volume: "$21.34B",
    supply: "120.31M",
    icon: "fab fa-ethereum text-purple-500",
    category: ["layer1", "defi"],
  },
  {
    id: "binancecoin",
    name: "Binance Coin",
    symbol: "BNB",
    price: "$449.81",
    change24h: -0.8,
    change7d: 2.3,
    marketCap: "$74.31B",
    volume: "$2.72B",
    supply: "165.12M",
    category: ["layer1", "defi"],
  },
  {
    id: "solana",
    name: "Solana",
    symbol: "SOL",
    price: "$146.27",
    change24h: 5.3,
    change7d: 12.6,
    marketCap: "$59.85B",
    volume: "$3.18B",
    supply: "409.11M",
    category: ["layer1"],
  },
  {
    id: "cardano",
    name: "Cardano",
    symbol: "ADA",
    price: "$0.578",
    change24h: -1.5,
    change7d: -3.2,
    marketCap: "$20.34B",
    volume: "$982.51M",
    supply: "35.16B",
    category: ["layer1"],
  },
  {
    id: "avalanche",
    name: "Avalanche",
    symbol: "AVAX",
    price: "$42.16",
    change24h: 4.2,
    change7d: 9.4,
    marketCap: "$15.76B",
    volume: "$1.03B",
    supply: "374.15M",
    category: ["layer1"],
  },
  {
    id: "polkadot",
    name: "Polkadot",
    symbol: "DOT",
    price: "$8.97",
    change24h: 1.8,
    change7d: -2.1,
    marketCap: "$11.42B",
    volume: "$532.67M",
    supply: "1.27B",
    category: ["layer1"],
  },
  {
    id: "polygon",
    name: "Polygon",
    symbol: "MATIC",
    price: "$0.842",
    change24h: 2.9,
    change7d: 11.7,
    marketCap: "$8.12B",
    volume: "$642.35M",
    supply: "9.64B",
    category: ["layer2"],
  },
  {
    id: "uniswap",
    name: "Uniswap",
    symbol: "UNI",
    price: "$9.37",
    change24h: 3.1,
    change7d: 7.9,
    marketCap: "$7.03B",
    volume: "$328.91M",
    supply: "750.31M",
    category: ["defi"],
  },
  {
    id: "apecoin",
    name: "ApeCoin",
    symbol: "APE",
    price: "$1.89",
    change24h: -2.3,
    change7d: -5.6,
    marketCap: "$6.97B",
    volume: "$235.76M",
    supply: "368.59M",
    category: ["nft", "metaverse"],
  },
]);

const filteredCryptos = computed(() => {
  const filter = tabs.value[activeTab.value].filter;
  if (!filter) return cryptos.value;
  return cryptos.value.filter(
    (crypto) => crypto.category && crypto.category.includes(filter)
  );
});

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
  staggerDelay: 0.05,
});

// Helper function to get row animations
const getRowAnimationClasses = (index) => {
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
