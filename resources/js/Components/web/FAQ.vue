<script setup>
import { ref } from "vue";

const faqs = ref([
  {
    question: "How do I create an account?",
    answer:
      'Simply click on the "Sign Up" button, provide your email address and create a password. You\'ll need to complete our KYC verification process which typically takes less than 10 minutes.',
  },
  {
    question: "What are the fees for trading?",
    answer:
      "Our fees start at 0.2% for Basic users, 0.1% for Pro users, and can go as low as 0.05% for Enterprise customers. There are no hidden fees or charges.",
  },
  {
    question: "Is my crypto safe on your platform?",
    answer:
      "We maintain the highest security standards in the industry with 95% of assets stored in cold wallets, regular security audits, and insurance coverage for digital assets held in our custody.",
  },
  {
    question: "What payment methods do you accept?",
    answer:
      "We accept bank transfers, credit/debit cards, and cryptocurrency deposits. Payment methods may vary by region due to regulatory requirements.",
  },
  {
    question: "How long do withdrawals take?",
    answer:
      "Cryptocurrency withdrawals are processed instantly after approval. Fiat withdrawals typically take 1-3 business days depending on your bank.",
  },
  {
    question: "Which countries do you support?",
    answer:
      "CryptoX is available in over 100 countries worldwide. Some features and services may be limited in certain jurisdictions due to local regulations.",
  },
]);

const activeFaq = ref(null);
const toggleFaq = (index) => {
  activeFaq.value = activeFaq.value === index ? null : index;
};
</script>

<template>
  <section id="faq" class="py-20 bg-white">
    <div class="container mx-auto px-4">
      <div class="text-center mb-16">
        <h2 class="text-3xl font-bold text-gray-800 mb-4">Frequently Asked Questions</h2>
        <p class="text-xl text-gray-600 max-w-2xl mx-auto">
          Find answers to common questions about our platform
        </p>
      </div>

      <div class="max-w-3xl mx-auto">
        <div
          v-for="(item, index) in faqs"
          :key="index"
          class="mb-6 border border-gray-200 rounded-lg overflow-hidden"
        >
          <div
            @click="toggleFaq(index)"
            class="flex justify-between items-center p-4 bg-gray-100 cursor-pointer hover:bg-gray-200 transition-colors"
          >
            <h3 class="text-lg font-semibold text-gray-800">{{ item.question }}</h3>
            <i
              :class="[
                'fas',
                activeFaq === index ? 'fa-chevron-up' : 'fa-chevron-down',
                'text-gray-600 transition-transform',
              ]"
            ></i>
          </div>
          <div
            class="overflow-hidden transition-all duration-300 ease-in-out"
            :class="{ 'max-h-0': activeFaq !== index, 'max-h-60': activeFaq === index }"
          >
            <div class="p-4 bg-white border-t border-gray-200">
              <p class="text-gray-600">{{ item.answer }}</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<style scoped>
.max-h-0 {
  max-height: 0;
}
.max-h-60 {
  max-height: 15rem;
}
</style>
