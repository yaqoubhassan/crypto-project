<script setup>
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
</script>

<template>
  <section id="testimonials" class="py-20 gradient-bg">
    <div class="container mx-auto px-4">
      <div class="text-center mb-16">
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
