<template>
  <section ref="sectionRef" class="py-16 gradient-bg overflow-hidden">
    <div class="container mx-auto px-4">
      <div
        class="flex flex-col md:flex-row items-center justify-between"
        :class="{
          'animate__animated animate__fadeIn': isVisible,
          'animate__animated animate__fadeOut animate__faster': !isVisible,
        }"
      >
        <div class="text-white mb-8 md:mb-0 text-center md:text-left">
          <h2 class="text-3xl font-bold mb-4">Ready to Start Trading?</h2>
          <p class="text-xl opacity-90 max-w-lg">
            Join millions of traders worldwide and access 100+ cryptocurrencies on our
            secure platform
          </p>
        </div>
        <div
          class="flex flex-col sm:flex-row gap-4"
          :class="{
            'animate__animated animate__fadeInRight': isVisible,
            'animate__animated animate__fadeOut animate__faster': !isVisible,
          }"
          :style="getAnimationDelay(1)"
        >
          <a
            href="#"
            class="bg-white text-blue-600 px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition duration-300 text-center"
          >
            Sign Up Now
          </a>
          <a
            href="#"
            class="bg-transparent border-2 border-white text-white px-8 py-3 rounded-lg font-semibold hover:bg-white hover:bg-opacity-10 transition duration-300 text-center"
          >
            Learn More
          </a>
        </div>
      </div>
    </div>
  </section>
</template>

<script setup>
import useScrollAnimation from "@/Composables/useScrollAnimation";

// Use the composable with specific animation options
const {
  elementRef: sectionRef,
  isVisible,
  getAnimationDelay,
  animationClasses,
} = useScrollAnimation({
  threshold: 0.3,
  animationIn: "animate__fadeIn",
  animationOut: "animate__fadeOut",
  defaultDelay: 0,
  staggerDelay: 0.2,
});
</script>

<style scoped>
.animate__animated {
  animation-duration: 1s;
}

.animate__faster {
  animation-duration: 0.5s;
}
</style>
