<script setup>
import { ref } from "vue";

const newsletter = ref({
  email: "",
});

const subscribeNewsletter = () => {
  // Handle newsletter subscription
  alert("Thank you for subscribing!");
  newsletter.value.email = "";
};
</script>

<template>
  <section class="py-16 bg-blue-600">
    <div class="container mx-auto px-4">
      <div class="max-w-3xl mx-auto text-center">
        <h2 class="text-3xl font-bold text-white mb-4">Stay Updated</h2>
        <p class="text-xl text-blue-100 mb-8">
          Subscribe to our newsletter for market insights, platform updates, and crypto
          news
        </p>
        <form
          @submit.prevent="subscribeNewsletter"
          class="flex flex-col md:flex-row space-y-4 md:space-y-0 md:space-x-2"
        >
          <input
            v-model="newsletter.email"
            type="email"
            placeholder="Your email address"
            class="flex-1 px-4 py-3 rounded-lg focus:outline-none"
          />
          <button
            type="submit"
            class="bg-white text-blue-600 px-8 py-3 rounded-lg font-semibold hover:bg-blue-50 transition duration-300"
          >
            Subscribe
          </button>
        </form>
        <p class="text-blue-200 mt-4 text-sm">
          We respect your privacy. Unsubscribe at any time.
        </p>
      </div>
    </div>
  </section>
</template>
