<template>
  <section class="py-16 bg-gray-100">
    <div class="container mx-auto px-4">
      <div class="text-center mb-12">
        <h2 class="text-3xl font-bold text-gray-800 mb-4">Market Update</h2>
        <p class="text-xl text-gray-600">
          Stay informed with real-time cryptocurrency prices
        </p>
      </div>

      <div class="bg-white rounded-xl shadow-lg overflow-hidden w-full">
        <div class="w-full overflow-x-auto">
          <table class="w-full">
            <thead>
              <tr class="bg-gray-50">
                <th
                  class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider w-12"
                >
                  #
                </th>
                <th
                  class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                >
                  Name
                </th>
                <th
                  class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                >
                  Last Price
                </th>
                <th
                  class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                >
                  24h %
                </th>
                <th
                  class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                >
                  Market Cap
                </th>
              </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
              <tr v-if="!cryptoData || cryptoData.length === 0" class="text-center">
                <td colspan="5" class="px-6 py-4">Loading market data...</td>
              </tr>
              <tr
                v-for="(crypto, index) in cryptoData"
                :key="crypto.id"
                class="hover:bg-gray-50"
              >
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                  {{ index + 1 }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="flex items-center">
                    <div class="flex-shrink-0 h-8 w-8 flex items-center justify-center">
                      <div
                        :class="getCryptoIconClass(crypto.symbol)"
                        class="w-6 h-6 flex items-center justify-center text-white font-bold text-xs"
                      >
                        {{ crypto.symbol.substring(0, 1) }}
                      </div>
                    </div>
                    <div class="ml-4">
                      <div class="text-sm font-medium text-gray-900">
                        {{ crypto.name }}
                      </div>
                      <div class="text-sm text-gray-500">{{ crypto.symbol }}</div>
                    </div>
                  </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="text-sm font-semibold text-gray-900">
                    ${{ formatPrice(crypto.priceUsd) }}
                  </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                  <div
                    :class="getChangeClass(crypto.changePercent24Hr)"
                    class="text-sm font-medium"
                  >
                    {{ formatChange(crypto.changePercent24Hr) }}
                  </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                  ${{ formatMarketCap(crypto.marketCapUsd) }}
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="py-3 px-6 bg-gray-50 border-t border-gray-200 flex justify-end">
          <a
            href="#"
            class="text-blue-600 hover:text-blue-800 font-medium transition duration-300"
          >
            See All Coins →
          </a>
        </div>
      </div>
    </div>
  </section>
</template>

<script setup>
const props = defineProps({
  cryptoData: {
    type: Array,
    default: () => [],
  },
});

const formatPrice = (price) => {
  const numPrice = parseFloat(price);
  if (isNaN(numPrice)) return "N/A";

  if (numPrice > 1000) {
    return numPrice.toLocaleString(undefined, {
      minimumFractionDigits: 2,
      maximumFractionDigits: 2,
    });
  } else if (numPrice > 1) {
    return numPrice.toLocaleString(undefined, {
      minimumFractionDigits: 2,
      maximumFractionDigits: 2,
    });
  } else {
    return numPrice.toLocaleString(undefined, {
      minimumFractionDigits: 4,
      maximumFractionDigits: 6,
    });
  }
};

const formatChange = (change) => {
  const numChange = parseFloat(change);
  if (isNaN(numChange)) return "N/A";

  const sign = numChange >= 0 ? "+" : "";
  return `${sign}${numChange.toFixed(2)}%`;
};

const formatMarketCap = (marketCap) => {
  const numMarketCap = parseFloat(marketCap);
  if (isNaN(numMarketCap)) return "N/A";

  if (numMarketCap >= 1_000_000_000) {
    return `${(numMarketCap / 1_000_000_000).toFixed(2)}B`;
  } else if (numMarketCap >= 1_000_000) {
    return `${(numMarketCap / 1_000_000).toFixed(2)}M`;
  } else {
    return numMarketCap.toLocaleString();
  }
};

const getChangeClass = (change) => {
  const numChange = parseFloat(change);
  if (isNaN(numChange)) return "text-gray-500";

  return numChange >= 0 ? "text-green-600" : "text-red-600";
};

const getCryptoIconClass = (symbol) => {
  // Return an appropriate class for the crypto icon based on symbol
  switch (symbol) {
    case "BTC":
      return "crypto-icon-btc";
    case "ETH":
      return "crypto-icon-eth";
    case "USDT":
      return "crypto-icon-usdt";
    case "BNB":
      return "crypto-icon-bnb";
    case "SOL":
      return "crypto-icon-sol";
    case "XRP":
      return "crypto-icon-xrp";
    case "ADA":
      return "crypto-icon-ada";
    case "DOGE":
      return "crypto-icon-doge";
    case "USDC":
      return "crypto-icon-usdc";
    default:
      return "crypto-icon-default";
  }
};
</script>

<style scoped>
/* Cryptocurrency icon styles with white text */
.crypto-icon-btc {
  background-color: #f7931a;
  border-radius: 50%;
}
.crypto-icon-eth {
  background-color: #627eea;
  border-radius: 50%;
}
.crypto-icon-usdt {
  background-color: #26a17b;
  border-radius: 50%;
}
.crypto-icon-bnb {
  background-color: #f3ba2f;
  border-radius: 50%;
}
.crypto-icon-sol {
  background-color: #00ffbd;
  border-radius: 50%;
}
.crypto-icon-xrp {
  background-color: #23292f;
  border-radius: 50%;
}
.crypto-icon-ada {
  background-color: #0033ad;
  border-radius: 50%;
}
.crypto-icon-doge {
  background-color: #ba9f33;
  border-radius: 50%;
}
.crypto-icon-usdc {
  background-color: #2775ca;
  border-radius: 50%;
}
.crypto-icon-default {
  background-color: #8c8c8c;
  border-radius: 50%;
}
</style>
