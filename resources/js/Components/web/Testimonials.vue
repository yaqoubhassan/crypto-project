<template>
  <section ref="sectionRef" id="testimonials" class="py-20 gradient-bg overflow-hidden">
    <div class="container mx-auto px-4">
      <div
        class="text-center mb-16"
        :class="{
          'animate__animated animate__fadeInDown': isVisible,
          'animate__animated animate__fadeOut animate__faster': !isVisible,
        }"
      >
        <h2 class="text-3xl font-bold text-white mb-4">What Our Users Say</h2>
        <p class="text-xl text-white max-w-2xl mx-auto">
          Join thousands of satisfied traders worldwide
        </p>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <div
          v-for="(testimonial, index) in testimonials"
          :key="index"
          class="bg-gray-100 p-8 rounded-xl shadow-lg"
          :class="getTestimonialAnimationClasses(index)"
          :style="getAnimationDelay(index)"
        >
          <div class="flex items-center mb-4">
            <div class="text-yellow-500">
              <i
                v-for="n in 5"
                :key="n"
                :class="
                  n <= testimonial.rating
                    ? 'fas fa-star'
                    : n - 0.5 <= testimonial.rating
                    ? 'fas fa-star-half-alt'
                    : 'far fa-star'
                "
              ></i>
            </div>
          </div>
          <p class="text-gray-600 mb-6">"{{ testimonial.comment }}"</p>
          <div class="flex items-center">
            <img
              :src="testimonial.image"
              :alt="testimonial.name"
              class="w-12 h-12 rounded-full mr-4"
            />
            <div>
              <h4 class="font-bold text-gray-800">{{ testimonial.name }}</h4>
              <p class="text-gray-500 text-sm">{{ testimonial.title }}</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script setup>
import useScrollAnimation from "@/Composables/useScrollAnimation";
import { ref } from "vue";

const testimonials = ref([
  {
    name: "Alex Johnson",
    title: "Day Trader",
    image: "/assets/images/testimonials/img_01.jpg",
    comment:
      "The trading interface is intuitive and powerful. I can execute complex trades quickly and the fees are the best I've found.",
    rating: 5,
  },
  {
    name: "Sarah Martinez",
    title: "Crypto Investor",
    image: "/assets/images/testimonials/img_02.jpg",
    comment:
      "I was looking for a secure platform with good liquidity and reasonable fees. CryptoX ticks all the boxes and their support team is fantastic.",
    rating: 4.5,
  },
  {
    name: "Michael Chen",
    title: "Portfolio Manager",
    image: "/assets/images/testimonials/img_03.jpg",
    comment:
      "The API access and advanced charting tools have been essential for my automated trading strategies. Performance is rock solid.",
    rating: 5,
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
  staggerDelay: 0.15,
});

// Helper function to get testimonial animations based on index
const getTestimonialAnimationClasses = (index) => {
  return {
    animate__animated: true,
    animate__fadeInLeft: isVisible.value && index === 0,
    animate__fadeInUp: isVisible.value && index === 1,
    animate__fadeInRight: isVisible.value && index === 2,
    "animate__fadeOut animate__faster": !isVisible.value,
  };
};
</script>

<style scoped>
.animate__animated {
  animation-duration: 1s;
}

.animate__faster {
  animation-duration: 0.5s;
}
</style>
