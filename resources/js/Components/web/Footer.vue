<script setup>
import { Link } from "@inertiajs/vue3";
import { computed, ref } from "vue";

const socialIcons = ref([
  { icon: "fab fa-twitter", link: "#" },
  { icon: "fab fa-facebook-f", link: "#" },
  { icon: "fab fa-linkedin-in", link: "#" },
  { icon: "fab fa-instagram", link: "#" },
]);

const quickLinks = ref([
  { text: "Home", url: "#home" },
  //   { text: "Home", url: route("home") },
  { text: "About Us", url: "#about" },
  //   { text: "About Us", url: route("about") },
  { text: "Features", url: "#features" },
  { text: "Pricing", url: "#pricing" },
  { text: "Contact", url: "#contact" },
]);

const resourceLinks = ref([
  { text: "Help Center", url: "#help" },
  { text: "Blog", url: "#blog" },
  { text: "API Documentation", url: "#api-docs" },
  { text: "Market Data", url: "#market-data" },
  { text: "Trading Guide", url: "#trading-guide" },
]);

const legalLinks = ref([
  { text: "Terms of Service", url: "#terms" },
  { text: "Privacy Policy", url: "#privacy" },
  { text: "Cookie Policy", url: "#cookies" },
  { text: "AML Policy", url: "#aml" },
  { text: "Fee Schedule", url: "#fees" },
]);

const paymentMethods = ref([
  { name: "Visa", image: "/assets/images/visa.png" },
  { name: "Mastercard", image: "/assets/images/mastercard.png" },
  { name: "PayPal", image: "/assets/images/paypal.svg" },
  { name: "Bitcoin", image: "/assets/images/bitcoin-logo.png" },
  { name: "Ethereum", image: "/assets/images/ethereum-logo.png" },
]);

const currentYear = computed(() => new Date().getFullYear());
</script>

<template>
  <footer class="bg-gray-900 text-white py-12">
    <div class="container mx-auto px-4">
      <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-8">
        <div>
          <h3 class="text-xl font-bold mb-4">CryptoX</h3>
          <p class="text-gray-400 mb-4">
            The secure, fast, and user-friendly platform for cryptocurrency trading.
          </p>
          <div class="flex space-x-4">
            <a
              v-for="(social, index) in socialIcons"
              :key="index"
              :href="social.link"
              class="text-gray-400 hover:text-white transition duration-300"
            >
              <i :class="social.icon"></i>
            </a>
          </div>
        </div>

        <div>
          <h3 class="text-lg font-semibold mb-4">Quick Links</h3>
          <ul class="space-y-2">
            <li v-for="(link, index) in quickLinks" :key="index">
              <Link
                :href="link.url"
                class="text-gray-400 hover:text-white transition duration-300"
                >{{ link.text }}</Link
              >
            </li>
          </ul>
        </div>

        <div>
          <h3 class="text-lg font-semibold mb-4">Resources</h3>
          <ul class="space-y-2">
            <li v-for="(link, index) in resourceLinks" :key="index">
              <Link
                :href="link.url"
                class="text-gray-400 hover:text-white transition duration-300"
                >{{ link.text }}</Link
              >
            </li>
          </ul>
        </div>

        <div>
          <h3 class="text-lg font-semibold mb-4">Legal</h3>
          <ul class="space-y-2">
            <li v-for="(link, index) in legalLinks" :key="index">
              <Link
                :href="link.url"
                class="text-gray-400 hover:text-white transition duration-300"
                >{{ link.text }}</Link
              >
            </li>
          </ul>
        </div>
      </div>

      <div class="border-t border-gray-800 pt-8 mt-8">
        <div class="flex flex-col md:flex-row justify-between items-center">
          <p class="text-gray-400 mb-4 md:mb-0">
            &copy; {{ currentYear }} CryptoX. All rights reserved.
          </p>
          <div class="flex space-x-4">
            <img
              v-for="(payment, index) in paymentMethods"
              :key="index"
              :src="payment.image"
              :alt="payment.name"
              class="h-6"
            />
          </div>
        </div>
      </div>
    </div>
  </footer>
</template>
