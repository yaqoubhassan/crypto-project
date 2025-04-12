<template>
  <AppLayout>
    <MarketHero />
    <MarketTabs />
    <TopPerformers />
    <MarketNews />
    <MarketTools />
    <!-- <TradeNow /> -->
  </AppLayout>
</template>

<script setup>
import MarketHero from "@/Components/web/Markets/MarketHero.vue";
import MarketNews from "@/Components/web/Markets/MarketNews.vue";
import MarketTabs from "@/Components/web/Markets/MarketTabs.vue";
import MarketTools from "@/Components/web/Markets/MarketTools.vue";
import TopPerformers from "@/Components/web/Markets/TopPerformers.vue";
import AppLayout from "@/Layouts/AppLayout.vue";
</script>
