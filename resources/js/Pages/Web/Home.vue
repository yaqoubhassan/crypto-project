<template>
  <div class="bg-gray-100 font-sans">
    <Header />
    <Hero
      :formattedCryptoData="formattedCryptoData"
      :title="'Trade Crypto with Confidence'"
      :description="'A secure, user-friendly platform with advanced trading features and instant withdrawals.'"
    />
    <KeyFeatures />
    <HowItWorks />
    <TradingPreview />
    <Testimonials />
    <CryptoMarketUpdate :cryptoData="cryptoData" />
    <FAQ />
    <Newsletter />
    <ContactForm />
    <Footer />
  </div>
</template>

<script setup>
import ContactForm from "@/Components/web/ContactForm.vue";
import CryptoMarketUpdate from "@/Components/web/CryptoMarketUpdate.vue";
import FAQ from "@/Components/web/FAQ.vue";
import Header from "@/Components/web/Header.vue";
import Hero from "@/Components/web/Hero.vue";
import HowItWorks from "@/Components/web/HowItWorks.vue";
import KeyFeatures from "@/Components/web/KeyFeatures.vue";
import Newsletter from "@/Components/web/Newsletter.vue";
import Testimonials from "@/Components/web/Testimonials.vue";
import TradingPreview from "@/Components/web/TradingPreview.vue";
import Footer from "@/Components/web/Footer.vue";
import { computed } from "vue";

const props = defineProps({
  cryptoData: {
    type: Array,
    default: () => [],
  },
});

const formattedCryptoData = computed(() => {
  if (!props.cryptoData || props.cryptoData.length === 0) {
    // Fallback data if API call fails
    return [
      {
        symbol: "BTC",
        price: "$45,678.90",
        priceChange: 2.5,
        icon: "fab fa-bitcoin text-yellow-500",
      },
      {
        symbol: "ETH",
        price: "$3,245.78",
        priceChange: 1.8,
        icon: "fab fa-ethereum text-purple-500",
      },
      {
        symbol: "BNB",
        price: "$412.65",
        priceChange: -0.7,
        symbolClass: "text-blue-500",
      },
      { symbol: "XRP", price: "$0.89", priceChange: 3.2, symbolClass: "text-gray-500" },
      {
        symbol: "SOL",
        price: "$138.42",
        priceChange: 5.6,
        symbolClass: "text-yellow-500",
      },
    ];
  }

  return props.cryptoData.map((crypto) => {
    const numericPrice = parseFloat(crypto.priceUsd);
    let formattedPrice;

    if (numericPrice > 1000) {
      formattedPrice = `$${numericPrice.toLocaleString(undefined, {
        minimumFractionDigits: 2,
        maximumFractionDigits: 2,
      })}`;
    } else if (numericPrice > 1) {
      formattedPrice = `$${numericPrice.toLocaleString(undefined, {
        minimumFractionDigits: 2,
        maximumFractionDigits: 2,
      })}`;
    } else {
      formattedPrice = `$${numericPrice.toLocaleString(undefined, {
        minimumFractionDigits: 4,
        maximumFractionDigits: 6,
      })}`;
    }

    const priceChange = parseFloat(crypto.changePercent24Hr);
    let icon = null;
    let symbolClass = "text-gray-500";

    switch (crypto.symbol) {
      case "BTC":
        icon = "fab fa-bitcoin text-yellow-500";
        break;
      case "ETH":
        icon = "fab fa-ethereum text-purple-500";
        break;
      case "BNB":
        symbolClass = "text-blue-500";
        break;
      case "SOL":
        symbolClass = "text-yellow-500";
        break;
      case "XRP":
        symbolClass = "text-gray-500";
        break;
      case "USDT":
        symbolClass = "text-green-500";
        break;
      case "USDC":
        symbolClass = "text-blue-400";
        break;
      case "DOGE":
        symbolClass = "text-yellow-400";
        break;
      case "TRX":
        symbolClass = "text-red-500";
        break;
      case "ADA":
        symbolClass = "text-blue-600";
        break;
      default:
        symbolClass = "text-gray-500";
    }

    return {
      symbol: crypto.symbol,
      name: crypto.name,
      price: formattedPrice,
      priceChange,
      icon,
      symbolClass,
    };
  });
});
</script>

<style>
.gradient-bg {
  background: linear-gradient(135deg, #1e3a8a 0%, #3b82f6 100%);
}
</style>
