<template>
  <!-- CTA -->
  <section class="py-20 gradient-bg">
    <div class="container mx-auto px-4 text-center">
      <h2 class="text-3xl font-bold text-white mb-6">Ready to Start Trading?</h2>
      <p class="text-xl text-gray-300 mb-8 max-w-2xl mx-auto">
        Join our secure platform and start trading crypto in minutes with the lowest fees
        in the industry.
      </p>
      <div
        class="flex flex-col sm:flex-row justify-center space-y-4 sm:space-y-0 sm:space-x-4"
      >
        <Link
          :href="route('register')"
          class="bg-white text-blue-600 px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition duration-300"
          >Create Account</Link
        >
        <a
          href="#features"
          class="bg-transparent border border-white text-white px-8 py-3 rounded-lg font-semibold hover:bg-white hover:text-blue-600 transition duration-300"
          >Learn More</a
        >
      </div>
    </div>
  </section>
</template>
