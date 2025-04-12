<template>
  <div class="bg-gray-100 font-sans">
    <Header />
    <main>
      <slot></slot>
    </main>
    <Footer />
  </div>
</template>

<script setup>
import Footer from "@/Components/web/Footer.vue";
import Header from "@/Components/web/Header.vue";
</script>

<style>
.gradient-bg {
  background: linear-gradient(135deg, #1e3a8a 0%, #3b82f6 100%);
}
</style>
