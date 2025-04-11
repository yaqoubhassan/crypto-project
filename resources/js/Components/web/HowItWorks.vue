<script setup>
import useScrollAnimation from "@/Composables/useScrollAnimation";
import { Link } from "@inertiajs/vue3";
import { ref } from "vue";

const howItWorks = ref([
  {
    title: "Create Your Account",
    description:
      "Register with your email, complete KYC verification, and secure your account with two-factor authentication.",
  },
  {
    title: "Fund Your Wallet",
    description:
      "Deposit fiat currency through bank transfer or card payment, or transfer existing cryptocurrency.",
  },
  {
    title: "Start Trading",
    description:
      "Use our intuitive platform to execute trades with market, limit, or stop orders at your convenience.",
  },
]);

// Use the composable with specific animation options
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

// Helper function to get step animations based on index
const getStepAnimationClasses = (index) => {
  return {
    animate__animated: true,
    animate__fadeInLeft: isVisible.value && index === 0,
    animate__fadeInUp: isVisible.value && index === 1,
    animate__fadeInRight: isVisible.value && index === 2,
    "animate__fadeOut animate__faster": !isVisible.value,
  };
};
</script>

<template>
  <section ref="sectionRef" id="how-it-works" class="py-20 bg-gray-100 overflow-hidden">
    <div class="container mx-auto px-4">
      <div
        class="text-center mb-16"
        :class="{
          'animate__animated animate__fadeInDown': isVisible,
          'animate__animated animate__fadeOut animate__faster': !isVisible,
        }"
      >
        <h2 class="text-3xl font-bold text-gray-800 mb-4">How It Works</h2>
        <p class="text-xl text-gray-600 max-w-2xl mx-auto">
          Start trading cryptocurrency in three simple steps
        </p>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <div
          v-for="(step, index) in howItWorks"
          :key="index"
          class="text-center"
          :class="getStepAnimationClasses(index)"
          :style="getAnimationDelay(index)"
        >
          <div
            class="bg-blue-600 text-white w-16 h-16 rounded-full flex items-center justify-center text-2xl font-bold mx-auto mb-6"
          >
            {{ index + 1 }}
          </div>
          <h3 class="text-xl font-bold text-gray-800 mb-4">{{ step.title }}</h3>
          <p class="text-gray-600">{{ step.description }}</p>
        </div>
      </div>

      <div
        class="mt-16 text-center"
        :class="animationClasses()"
        :style="getAnimationDelay(howItWorks.length)"
      >
        <Link
          :href="route('register')"
          class="bg-blue-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-blue-700 transition duration-300"
        >
          Open Account Now
        </Link>
      </div>
    </div>
  </section>
</template>

<style scoped>
.animate__animated {
  animation-duration: 1s;
}

.animate__delay-1s {
  animation-delay: 0.3s;
}

.animate__delay-2s {
  animation-delay: 0.6s;
}

.animate__faster {
  animation-duration: 0.5s;
}
</style>
