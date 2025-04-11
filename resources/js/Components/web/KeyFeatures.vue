<script setup>
import useScrollAnimation from "@/Composables/useScrollAnimation";
import { ref } from "vue";

const features = ref([
  {
    title: "Advanced Trading Tools",
    description:
      "Access sophisticated charting functions with multiple indicators and timeframes to inform your trading decisions.",
    icon: "fas fa-chart-line",
    bgColor: "bg-blue-100",
    iconColor: "text-blue-600",
  },
  {
    title: "Instant Withdrawals",
    description:
      "Withdraw your crypto immediately after purchase without waiting days for payment processing.",
    icon: "fas fa-wallet",
    bgColor: "bg-green-100",
    iconColor: "text-green-600",
  },
  {
    title: "Bank-Level Security",
    description:
      "Your assets are protected with enterprise-grade security protocols and regular third-party audits.",
    icon: "fas fa-shield-alt",
    bgColor: "bg-purple-100",
    iconColor: "text-purple-600",
  },
  {
    title: "Multi-Currency Support",
    description:
      "Buy and sell crypto with USD, CAD, GBP, EUR and other major fiat currencies.",
    icon: "fas fa-globe",
    bgColor: "bg-yellow-100",
    iconColor: "text-yellow-600",
  },
  {
    title: "Low Trading Fees",
    description:
      "Competitive trading fees starting from just 0.1% to maximize your investment returns.",
    icon: "fas fa-hand-holding-usd",
    bgColor: "bg-red-100",
    iconColor: "text-red-600",
  },
  {
    title: "24/7 Support",
    description:
      "Our dedicated team is available around the clock to assist with any questions or concerns.",
    icon: "fas fa-headset",
    bgColor: "bg-indigo-100",
    iconColor: "text-indigo-600",
  },
]);

// Use the composable with specific animation options for this component
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
</script>

<template>
  <section ref="sectionRef" id="features" class="py-20 bg-white overflow-hidden">
    <div class="container mx-auto px-4">
      <div
        class="text-center mb-16"
        :class="{
          'animate__animated animate__fadeInDown': isVisible,
          'animate__animated animate__fadeOut animate__faster': !isVisible,
        }"
      >
        <h2 class="text-3xl font-bold text-gray-800 mb-4">Why Choose CryptoX?</h2>
        <p class="text-xl text-gray-600 max-w-2xl mx-auto">
          The smart platform for both beginner and advanced traders
        </p>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        <div
          v-for="(feature, index) in features"
          :key="index"
          class="feature-card bg-white p-8 rounded-xl shadow-lg transition duration-300"
          :class="animationClasses()"
          :style="getAnimationDelay(index)"
        >
          <div
            :class="
              feature.bgColor +
              ' w-16 h-16 rounded-full flex items-center justify-center mb-6'
            "
          >
            <i :class="feature.icon + ' text-2xl ' + feature.iconColor"></i>
          </div>
          <h3 class="text-xl font-bold text-gray-800 mb-4">{{ feature.title }}</h3>
          <p class="text-gray-600">{{ feature.description }}</p>
        </div>
      </div>
    </div>
  </section>
</template>

<style scoped>
.feature-card:hover {
  transform: translateY(-5px);
}

.animate__animated {
  animation-duration: 1s;
}

.animate__faster {
  animation-duration: 0.5s;
}

/* Apply initial opacity for smoother animations */
.feature-card {
  opacity: 0;
}

.feature-card.animate__fadeInUp {
  opacity: 1;
}
</style>
