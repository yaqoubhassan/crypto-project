<template>
  <div class="bg-gray-100 font-sans">
    <!-- Navigation -->
    <nav class="bg-white shadow-md fixed w-full z-10">
      <div class="container mx-auto px-4">
        <div class="flex justify-between items-center py-4">
          <div class="flex items-center">
            <Link :href="route('home')" class="text-2xl font-bold text-blue-600"
              >CryptoX</Link
            >
          </div>
          <div class="hidden md:flex items-center space-x-8">
            <a
              href="#features"
              class="text-gray-700 hover:text-blue-600 transition duration-300"
              >Features</a
            >
            <a
              href="#how-it-works"
              class="text-gray-700 hover:text-blue-600 transition duration-300"
              >How It Works</a
            >
            <a
              href="#pricing"
              class="text-gray-700 hover:text-blue-600 transition duration-300"
              >Pricing</a
            >
            <a
              href="#testimonials"
              class="text-gray-700 hover:text-blue-600 transition duration-300"
              >Testimonials</a
            >
          </div>
          <div class="flex items-center space-x-4">
            <Link
              :href="''"
              class="text-gray-700 hover:text-blue-600 transition duration-300"
              >Login</Link
            >
            <Link
              :href="route('register')"
              class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition duration-300"
              >Sign Up</Link
            >
          </div>
        </div>
      </div>
    </nav>

    <!-- Hero Section -->
    <header class="bg-header-image pt-40 pb-32 bg-cover bg-center relative">
      <div class="container mx-auto px-4">
        <div class="flex flex-col md:flex-row items-center">
          <div class="md:w-1/2 mb-10 md:mb-0">
            <h1 class="text-4xl md:text-5xl font-bold text-white leading-tight mb-6">
              Trade Crypto with Confidence
            </h1>
            <p class="text-xl text-gray-300 mb-8">
              A secure, user-friendly platform with advanced trading features and instant
              withdrawals.
            </p>
            <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4">
              <Link
                :href="route('register')"
                class="bg-blue-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-blue-700 transition duration-300 text-center"
                >Get Started</Link
              >
              <a
                href="#how-it-works"
                class="bg-transparent border border-white text-white px-8 py-3 rounded-lg font-semibold hover:bg-white hover:text-blue-600 transition duration-300 text-center"
                >Learn More</a
              >
            </div>
          </div>
          <!-- <div class="md:w-1/2">
        <img
          src="/assets/hero1.svg"
          alt="Trading Dashboard Preview"
          class="rounded-lg shadow-2xl"
        />
      </div> -->
        </div>
      </div>
    </header>

    <!-- Crypto ticker positioned outside but visually at the bottom of the header -->
    <div class="bg-opacity-70 py-4 overflow-hidden -mt-16 relative z-10">
      <div class="container mx-auto">
        <div
          class="crypto-ticker flex items-center space-x-8 text-white whitespace-nowrap"
        >
          <div
            v-for="(crypto, index) in cryptoData"
            :key="index"
            class="flex items-center space-x-2"
          >
            <i v-if="crypto.icon" :class="crypto.icon"></i>
            <span v-if="!crypto.icon" :class="crypto.symbolClass + ' font-bold'">
              {{ crypto.symbol }}
            </span>
            <span v-else>{{ crypto.symbol }}</span>
            <span :class="crypto.priceChange >= 0 ? 'text-green-500' : 'text-red-500'">
              {{ crypto.price }}
            </span>
            <span :class="crypto.priceChange >= 0 ? 'text-green-500' : 'text-red-500'">
              {{ crypto.priceChange >= 0 ? "+" : "" }}{{ crypto.priceChange }}%
            </span>
          </div>
        </div>
      </div>
    </div>

    <!-- Key Features -->
    <section id="features" class="py-20 bg-white">
      <div class="container mx-auto px-4">
        <div class="text-center mb-16">
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

    <!-- How It Works -->
    <section id="how-it-works" class="py-20 bg-gray-100">
      <div class="container mx-auto px-4">
        <div class="text-center mb-16">
          <h2 class="text-3xl font-bold text-gray-800 mb-4">How It Works</h2>
          <p class="text-xl text-gray-600 max-w-2xl mx-auto">
            Start trading cryptocurrency in three simple steps
          </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
          <div v-for="(step, index) in howItWorks" :key="index" class="text-center">
            <div
              class="bg-blue-600 text-white w-16 h-16 rounded-full flex items-center justify-center text-2xl font-bold mx-auto mb-6"
            >
              {{ index + 1 }}
            </div>
            <h3 class="text-xl font-bold text-gray-800 mb-4">{{ step.title }}</h3>
            <p class="text-gray-600">{{ step.description }}</p>
          </div>
        </div>

        <div class="mt-16 text-center">
          <Link
            :href="route('register')"
            class="bg-blue-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-blue-700 transition duration-300"
            >Open Account Now</Link
          >
        </div>
      </div>
    </section>

    <!-- Trading View Preview -->
    <section class="py-20 bg-white">
      <div class="container mx-auto px-4">
        <div class="text-center mb-16">
          <h2 class="text-3xl font-bold text-gray-800 mb-4">
            Powerful Trading Interface
          </h2>
          <p class="text-xl text-gray-600 max-w-2xl mx-auto">
            Our advanced yet intuitive trading platform gives you all the tools you need
          </p>
        </div>

        <div class="rounded-xl p-2 shadow-2xl">
          <div class="h-48 overflow-hidden rounded-lg">
            <img
              src="/assets/images/crypto7.jpg"
              alt="Trading Dashboard"
              class="w-full object-cover object-center"
            />
          </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-12">
          <div
            v-for="(feature, index) in tradingFeatures"
            :key="index"
            class="flex items-start"
          >
            <div class="bg-blue-100 p-3 rounded-full mr-4">
              <i :class="feature.icon + ' text-blue-600'"></i>
            </div>
            <div>
              <h3 class="text-lg font-bold text-gray-800 mb-2">{{ feature.title }}</h3>
              <p class="text-gray-600">{{ feature.description }}</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Pricing -->
    <section id="pricing" class="py-20 bg-gray-100">
      <div class="container mx-auto px-4">
        <div class="text-center mb-16">
          <h2 class="text-3xl font-bold text-gray-800 mb-4">Transparent Fee Structure</h2>
          <p class="text-xl text-gray-600 max-w-2xl mx-auto">
            Simple, competitive pricing with no hidden fees
          </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
          <div
            v-for="(plan, index) in pricingPlans"
            :key="index"
            :class="[
              'bg-white rounded-xl shadow-lg overflow-hidden transition duration-300 hover:shadow-xl',
              plan.featured ? 'transform scale-105' : '',
            ]"
          >
            <div :class="plan.headerClass + ' p-6 text-center'">
              <h3 class="text-2xl font-bold text-white">{{ plan.name }}</h3>
              <span
                v-if="plan.featured"
                class="bg-yellow-500 text-xs text-white px-2 py-1 rounded-full uppercase"
                >Most Popular</span
              >
            </div>
            <div class="p-8">
              <div class="text-center mb-6">
                <span class="text-4xl font-bold text-gray-800">{{ plan.fee }}</span>
                <p class="text-gray-600">Per trade</p>
              </div>
              <ul class="space-y-4 mb-8">
                <li
                  v-for="(feature, idx) in plan.features"
                  :key="idx"
                  class="flex items-center text-gray-600"
                >
                  <i class="fas fa-check text-green-500 mr-2"></i>
                  {{ feature }}
                </li>
              </ul>
              <Link
                :href="route('register', { plan: plan.id })"
                :class="
                  plan.buttonClass +
                  ' block text-white text-center py-3 rounded-lg font-semibold hover:' +
                  plan.buttonHoverClass +
                  ' transition duration-300'
                "
                >{{ plan.buttonText }}</Link
              >
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Testimonials -->
    <section id="testimonials" class="py-20 bg-white">
      <div class="container mx-auto px-4">
        <div class="text-center mb-16">
          <h2 class="text-3xl font-bold text-gray-800 mb-4">What Our Users Say</h2>
          <p class="text-xl text-gray-600 max-w-2xl mx-auto">
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

    <!-- CTA -->
    <section class="py-20 gradient-bg">
      <div class="container mx-auto px-4 text-center">
        <h2 class="text-3xl font-bold text-white mb-6">Ready to Start Trading?</h2>
        <p class="text-xl text-gray-300 mb-8 max-w-2xl mx-auto">
          Join our secure platform and start trading crypto in minutes with the lowest
          fees in the industry.
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

    <!-- Mobile App Section -->
    <section class="py-20 bg-gray-100">
      <div class="container mx-auto px-4">
        <div class="flex flex-col md:flex-row items-center">
          <div class="md:w-1/2 mb-10 md:mb-0">
            <img src="/img/mobile-app.png" alt="Mobile App" class="mx-auto h-96" />
          </div>
          <div class="md:w-1/2">
            <h2 class="text-3xl font-bold text-gray-800 mb-6">Trade On The Go</h2>
            <p class="text-xl text-gray-600 mb-8">
              Download our mobile app to stay connected to the markets and never miss a
              trading opportunity.
            </p>
            <div
              class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4 mb-8"
            >
              <a
                href="#"
                class="flex items-center justify-center bg-black text-white px-6 py-3 rounded-lg hover:bg-gray-900 transition duration-300"
              >
                <i class="fab fa-apple text-2xl mr-3"></i>
                <div>
                  <div class="text-xs">Download on the</div>
                  <div class="text-lg font-semibold">App Store</div>
                </div>
              </a>
              <a
                href="#"
                class="flex items-center justify-center bg-black text-white px-6 py-3 rounded-lg hover:bg-gray-900 transition duration-300"
              >
                <i class="fab fa-google-play text-2xl mr-3"></i>
                <div>
                  <div class="text-xs">Get it on</div>
                  <div class="text-lg font-semibold">Google Play</div>
                </div>
              </a>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-md">
              <div class="flex items-center mb-4">
                <div class="text-yellow-500">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                </div>
                <span class="text-gray-600 ml-2">4.9 out of 5 stars</span>
              </div>
              <p class="text-gray-600 italic">
                "The mobile app is just as powerful as the desktop version. Push
                notifications for price alerts and order completions have helped me stay
                on top of volatile markets."
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- FAQ Section -->
    <section id="faq" class="py-20 bg-white">
      <div class="container mx-auto px-4">
        <div class="text-center mb-16">
          <h2 class="text-3xl font-bold text-gray-800 mb-4">
            Frequently Asked Questions
          </h2>
          <p class="text-xl text-gray-600 max-w-2xl mx-auto">
            Find answers to common questions about our platform
          </p>
        </div>

        <div class="max-w-3xl mx-auto">
          <div v-for="(item, index) in faqs" :key="index" class="mb-6">
            <div
              @click="toggleFaq(index)"
              class="flex justify-between items-center p-4 bg-gray-100 rounded-lg cursor-pointer"
            >
              <h3 class="text-lg font-semibold text-gray-800">{{ item.question }}</h3>
              <i
                :class="[
                  'fas',
                  activeFaq === index ? 'fa-chevron-up' : 'fa-chevron-down',
                  'text-gray-600',
                ]"
              ></i>
            </div>
            <div
              class="p-4 bg-white"
              :style="{
                maxHeight: activeFaq === index ? item.answer.length + 'px' : '0px',
              }"
            >
              <p class="text-gray-600">{{ item.answer }}</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Newsletter -->
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

    <!-- Contact Section -->
    <section id="contact" class="py-20 bg-gray-100">
      <div class="container mx-auto px-4">
        <div class="text-center mb-16">
          <h2 class="text-3xl font-bold text-gray-800 mb-4">Get In Touch</h2>
          <p class="text-xl text-gray-600 max-w-2xl mx-auto">
            Have questions or need assistance? Our team is here to help
          </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
          <div>
            <form @submit.prevent="submitContactForm">
              <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mb-6">
                <div>
                  <label for="name" class="block text-gray-700 mb-2">Your Name</label>
                  <input
                    v-model="contactForm.name"
                    type="text"
                    id="name"
                    class="w-full px-4 py-3 rounded-lg bg-white border border-gray-300 focus:border-blue-500 focus:outline-none"
                  />
                </div>
                <div>
                  <label for="email" class="block text-gray-700 mb-2"
                    >Email Address</label
                  >
                  <input
                    v-model="contactForm.email"
                    type="email"
                    id="email"
                    class="w-full px-4 py-3 rounded-lg bg-white border border-gray-300 focus:border-blue-500 focus:outline-none"
                  />
                </div>
              </div>
              <div class="mb-6">
                <label for="subject" class="block text-gray-700 mb-2">Subject</label>
                <input
                  v-model="contactForm.subject"
                  type="text"
                  id="subject"
                  class="w-full px-4 py-3 rounded-lg bg-white border border-gray-300 focus:border-blue-500 focus:outline-none"
                />
              </div>
              <div class="mb-6">
                <label for="message" class="block text-gray-700 mb-2">Message</label>
                <textarea
                  v-model="contactForm.message"
                  id="message"
                  rows="5"
                  class="w-full px-4 py-3 rounded-lg bg-white border border-gray-300 focus:border-blue-500 focus:outline-none"
                ></textarea>
              </div>
              <button
                type="submit"
                class="bg-blue-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-blue-700 transition duration-300"
              >
                Send Message
              </button>
            </form>
          </div>

          <div>
            <div class="bg-white p-8 rounded-xl shadow-lg">
              <div class="mb-8">
                <h3 class="text-xl font-bold text-gray-800 mb-4">Contact Information</h3>
                <div
                  v-for="(info, index) in contactInfo"
                  :key="index"
                  class="flex items-start mb-4"
                >
                  <div :class="info.bgColor + ' p-2 rounded-full mr-4'">
                    <i :class="info.icon + ' ' + info.iconColor"></i>
                  </div>
                  <div>
                    <h4 class="font-semibold text-gray-800">{{ info.title }}</h4>
                    <p class="text-gray-600">{{ info.value }}</p>
                  </div>
                </div>
              </div>

              <div>
                <h3 class="text-xl font-bold text-gray-800 mb-4">Operating Hours</h3>
                <div class="grid grid-cols-2 gap-4">
                  <div v-for="(hours, index) in operatingHours" :key="index">
                    <h4 class="font-semibold text-gray-800">{{ hours.service }}</h4>
                    <p class="text-gray-600">{{ hours.hours }}</p>
                  </div>
                </div>
              </div>
            </div>

            <div class="bg-white p-8 rounded-xl shadow-lg mt-8">
              <h3 class="text-xl font-bold text-gray-800 mb-4">Follow Us</h3>
              <div class="flex space-x-4">
                <a
                  v-for="(social, index) in socialMedia"
                  :key="index"
                  :href="social.link"
                  :class="
                    social.bgClass +
                    ' text-white p-3 rounded-full ' +
                    social.hoverClass +
                    ' transition duration-300'
                  "
                >
                  <i :class="social.icon"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Footer -->
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
  </div>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";
import { computed, ref } from "vue";

// Data definitions
const cryptoData = ref([
  {
    symbol: "BTC",
    price: "$45,678.90",
    priceChange: 2.5,
    icon: "fab fa-bitcoin text-yellow-500",
  },
  {
    symbol: "ETH",
    price: "$3,245.78",
    priceChange: 1.8,
    icon: "fab fa-ethereum text-purple-500",
  },
  {
    symbol: "BNB",
    price: "$412.65",
    priceChange: -0.7,
    symbolClass: "text-blue-500",
  },
  { symbol: "XRP", price: "$0.89", priceChange: 3.2, symbolClass: "text-gray-500" },
  {
    symbol: "SOL",
    price: "$138.42",
    priceChange: 5.6,
    symbolClass: "text-yellow-500",
  },
]);

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

const tradingFeatures = ref([
  {
    title: "Professional Charts",
    description:
      "Multiple chart types with dozens of technical indicators and drawing tools.",
    icon: "fas fa-chart-bar",
  },
  {
    title: "Detailed Order Book",
    description:
      "See market depth and liquidity with real-time order book visualization.",
    icon: "fas fa-book-open",
  },
  {
    title: "Trade History",
    description: "Track all your transactions with comprehensive history and reporting.",
    icon: "fas fa-history",
  },
]);

const pricingPlans = ref([
  {
    id: "basic",
    name: "Basic",
    fee: "0.2%",
    features: [
      "Market & Limit Orders",
      "Basic Charting Tools",
      "Email Support",
      "$5,000 Daily Withdrawal Limit",
    ],
    headerClass: "bg-blue-600",
    buttonClass: "bg-blue-600",
    buttonHoverClass: "bg-blue-700",
    buttonText: "Get Started",
    featured: false,
  },
  {
    id: "pro",
    name: "Pro",
    fee: "0.1%",
    features: [
      "Advanced Order Types",
      "Full Technical Analysis Suite",
      "Priority Support",
      "$25,000 Daily Withdrawal Limit",
      "API Access",
    ],
    headerClass: "bg-green-600",
    buttonClass: "bg-green-600",
    buttonHoverClass: "bg-green-700",
    buttonText: "Choose Pro",
    featured: true,
  },
  {
    id: "enterprise",
    name: "Enterprise",
    fee: "0.05%",
    features: [
      "Custom Order Types",
      "Dedicated Account Manager",
      "24/7 Phone Support",
      "Unlimited Withdrawal Limit",
      "Custom API Solutions",
      "Multi-user Access",
    ],
    headerClass: "bg-purple-600",
    buttonClass: "bg-purple-600",
    buttonHoverClass: "bg-purple-700",
    buttonText: "Contact Sales",
    featured: false,
  },
]);

const testimonials = ref([
  {
    name: "Alex Johnson",
    title: "Day Trader",
    image: "/img/testimonials/user1.jpg",
    comment:
      "The trading interface is intuitive and powerful. I can execute complex trades quickly and the fees are the best I've found.",
    rating: 5,
  },
  {
    name: "Sarah Martinez",
    title: "Crypto Investor",
    image: "/img/testimonials/user2.jpg",
    comment:
      "I was looking for a secure platform with good liquidity and reasonable fees. CryptoX ticks all the boxes and their support team is fantastic.",
    rating: 4.5,
  },
  {
    name: "Michael Chen",
    title: "Portfolio Manager",
    image: "/img/testimonials/user3.jpg",
    comment:
      "The API access and advanced charting tools have been essential for my automated trading strategies. Performance is rock solid.",
    rating: 5,
  },
]);

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

const newsletter = ref({
  email: "",
});

const subscribeNewsletter = () => {
  // Handle newsletter subscription
  alert("Thank you for subscribing!");
  newsletter.value.email = "";
};

const contactForm = ref({
  name: "",
  email: "",
  subject: "",
  message: "",
});

const submitContactForm = () => {
  // Handle contact form submission
  alert("Your message has been sent. We will contact you shortly!");
  contactForm.value = {
    name: "",
    email: "",
    subject: "",
    message: "",
  };
};

const contactInfo = ref([
  {
    title: "Email",
    value: "support@cryptox.com",
    icon: "fas fa-envelope",
    bgColor: "bg-blue-100",
    iconColor: "text-blue-600",
  },
  {
    title: "Phone",
    value: "+1 (888) 123-4567",
    icon: "fas fa-phone-alt",
    bgColor: "bg-green-100",
    iconColor: "text-green-600",
  },
  {
    title: "Address",
    value: "123 Crypto Street, San Francisco, CA 94102, USA",
    icon: "fas fa-map-marker-alt",
    bgColor: "bg-purple-100",
    iconColor: "text-purple-600",
  },
]);

const operatingHours = ref([
  {
    service: "Trading Platform",
    hours: "24/7",
  },
  {
    service: "Customer Support",
    hours: "24/7",
  },
  {
    service: "Phone Support",
    hours: "Mon-Fri, 9AM-6PM ET",
  },
  {
    service: "Office Hours",
    hours: "Mon-Fri, 9AM-5PM ET",
  },
]);

const socialMedia = ref([
  {
    name: "Twitter",
    link: "#",
    icon: "fab fa-twitter",
    bgClass: "bg-blue-500",
    hoverClass: "hover:bg-blue-600",
  },
  {
    name: "Facebook",
    link: "#",
    icon: "fab fa-facebook-f",
    bgClass: "bg-blue-600",
    hoverClass: "hover:bg-blue-700",
  },
  {
    name: "LinkedIn",
    link: "#",
    icon: "fab fa-linkedin-in",
    bgClass: "bg-blue-400",
    hoverClass: "hover:bg-blue-500",
  },
  {
    name: "Instagram",
    link: "#",
    icon: "fab fa-instagram",
    bgClass: "bg-pink-500",
    hoverClass: "hover:bg-pink-600",
  },
]);

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
  { name: "Visa", image: "/img/payment/visa.svg" },
  { name: "Mastercard", image: "/img/payment/mastercard.svg" },
  { name: "PayPal", image: "/img/payment/paypal.svg" },
  { name: "Bitcoin", image: "/img/payment/bitcoin.svg" },
  { name: "Ethereum", image: "/img/payment/ethereum.svg" },
]);

const currentYear = computed(() => new Date().getFullYear());
</script>

<style>
.bg-header-image {
  background-image: url("/public/assets/images/crypto8.jpg");
  position: relative;
}

/* Optional: Add an overlay to ensure text remains readable */
.bg-header-image::before {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.5); /* Adjust opacity as needed */
  z-index: 1;
}

/* Ensure content appears above the overlay */
.bg-header-image > * {
  position: relative;
  z-index: 2;
}

.gradient-bg {
  background: linear-gradient(135deg, #1e3a8a 0%, #3b82f6 100%);
}

.crypto-ticker {
  animation: ticker 30s linear infinite;
}

@keyframes ticker {
  0% {
    transform: translateX(100%);
  }

  100% {
    transform: translateX(-100%);
  }
}

.feature-card:hover {
  transform: translateY(-5px);
}

@media (max-width: 768px) {
  .crypto-ticker {
    animation: ticker 15s linear infinite;
  }
}
</style>
