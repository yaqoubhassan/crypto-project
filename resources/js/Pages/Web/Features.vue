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
            <Link
              :href="route('home')"
              class="text-gray-700 hover:text-blue-600 transition duration-300"
              >Home</Link
            >
            <Link
              :href="route('features')"
              class="text-blue-600 font-medium transition duration-300"
              >Features</Link
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
    <header class="bg-features-header pt-40 pb-32 bg-cover bg-center relative">
      <div
        class="absolute inset-0 bg-gradient-to-r from-blue-900/70 to-blue-600/50"
      ></div>
      <div class="container mx-auto px-4 relative z-10">
        <div class="max-w-3xl">
          <h1 class="text-4xl md:text-5xl font-bold text-white leading-tight mb-6">
            Powerful Features for Every Trader
          </h1>
          <p class="text-xl text-gray-200 mb-8">
            Discover the tools and capabilities that make CryptoX the preferred platform
            for cryptocurrency traders around the world.
          </p>
          <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4">
            <Link
              :href="route('register')"
              class="bg-blue-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-blue-700 transition duration-300 text-center"
              >Get Started</Link
            >
            <a
              href="#core-features"
              class="bg-transparent border border-white text-white px-8 py-3 rounded-lg font-semibold hover:bg-white hover:text-blue-600 transition duration-300 text-center"
              >Explore Features</a
            >
          </div>
        </div>
      </div>
    </header>

    <!-- Core Features -->
    <section id="core-features" class="py-20 bg-white">
      <div class="container mx-auto px-4">
        <div class="text-center mb-16">
          <h2 class="text-3xl font-bold text-gray-800 mb-4">Core Platform Features</h2>
          <p class="text-xl text-gray-600 max-w-2xl mx-auto">
            Built with both novice and professional traders in mind
          </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-16">
          <div
            v-for="(feature, index) in coreFeatures"
            :key="index"
            class="bg-gray-50 rounded-xl p-8 shadow-lg hover:shadow-xl transition duration-300"
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
            <p class="text-gray-600 mb-6">{{ feature.description }}</p>
            <a
              href="#"
              class="text-blue-600 hover:text-blue-800 font-medium flex items-center"
            >
              Learn more
              <i class="fas fa-arrow-right ml-2 text-sm"></i>
            </a>
          </div>
        </div>
      </div>
    </section>

    <!-- Trading Platform Features -->
    <section class="py-20 bg-gray-100">
      <div class="container mx-auto px-4">
        <div class="text-center mb-16">
          <h2 class="text-3xl font-bold text-gray-800 mb-4">Advanced Trading Platform</h2>
          <p class="text-xl text-gray-600 max-w-2xl mx-auto">
            Our state-of-the-art trading interface gives you the edge in volatile markets
          </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center mb-16">
          <div>
            <div class="rounded-xl p-2 shadow-2xl overflow-hidden">
              <img
                src="/assets/images/trading-platform.jpg"
                alt="Trading Platform Interface"
                class="w-full rounded-lg"
              />
            </div>
          </div>
          <div class="space-y-8">
            <div
              v-for="(feature, index) in tradingPlatformFeatures"
              :key="index"
              class="flex"
            >
              <div class="mr-4">
                <div
                  :class="
                    feature.bgColor +
                    ' w-12 h-12 rounded-full flex items-center justify-center'
                  "
                >
                  <i :class="feature.icon + ' ' + feature.iconColor"></i>
                </div>
              </div>
              <div>
                <h3 class="text-xl font-bold text-gray-800 mb-2">{{ feature.title }}</h3>
                <p class="text-gray-600">{{ feature.description }}</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Security Features -->
    <section class="py-20 bg-white">
      <div class="container mx-auto px-4">
        <div class="text-center mb-16">
          <h2 class="text-3xl font-bold text-gray-800 mb-4">Bank-Grade Security</h2>
          <p class="text-xl text-gray-600 max-w-2xl mx-auto">
            Your assets deserve the highest level of protection
          </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
          <div class="order-2 lg:order-1 space-y-8">
            <div v-for="(feature, index) in securityFeatures" :key="index" class="flex">
              <div class="mr-4">
                <div
                  :class="
                    feature.bgColor +
                    ' w-12 h-12 rounded-full flex items-center justify-center'
                  "
                >
                  <i :class="feature.icon + ' ' + feature.iconColor"></i>
                </div>
              </div>
              <div>
                <h3 class="text-xl font-bold text-gray-800 mb-2">{{ feature.title }}</h3>
                <p class="text-gray-600">{{ feature.description }}</p>
              </div>
            </div>
          </div>
          <div class="order-1 lg:order-2">
            <div class="rounded-xl shadow-2xl overflow-hidden">
              <img
                src="/assets/images/security.jpg"
                alt="Security Infrastructure"
                class="w-full rounded-lg"
              />
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Mobile Trading -->
    <section class="py-20 bg-gray-100">
      <div class="container mx-auto px-4">
        <div class="text-center mb-16">
          <h2 class="text-3xl font-bold text-gray-800 mb-4">Trade Anywhere, Anytime</h2>
          <p class="text-xl text-gray-600 max-w-2xl mx-auto">
            Our mobile app brings the full power of CryptoX to your pocket
          </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
          <div>
            <div class="flex justify-center">
              <img src="/img/mobile-app.png" alt="Mobile App" class="h-96" />
            </div>
          </div>
          <div class="space-y-8">
            <div v-for="(feature, index) in mobileFeatures" :key="index" class="flex">
              <div class="mr-4">
                <div
                  :class="
                    feature.bgColor +
                    ' w-12 h-12 rounded-full flex items-center justify-center'
                  "
                >
                  <i :class="feature.icon + ' ' + feature.iconColor"></i>
                </div>
              </div>
              <div>
                <h3 class="text-xl font-bold text-gray-800 mb-2">{{ feature.title }}</h3>
                <p class="text-gray-600">{{ feature.description }}</p>
              </div>
            </div>
            <div
              class="mt-8 flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4"
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
          </div>
        </div>
      </div>
    </section>

    <!-- API Features -->
    <section class="py-20 bg-white">
      <div class="container mx-auto px-4">
        <div class="text-center mb-16">
          <h2 class="text-3xl font-bold text-gray-800 mb-4">Developer-Friendly API</h2>
          <p class="text-xl text-gray-600 max-w-2xl mx-auto">
            Build custom trading applications and automated strategies
          </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
          <div class="order-2 lg:order-1">
            <h3 class="text-2xl font-bold text-gray-800 mb-6">
              Powerful REST and WebSocket APIs
            </h3>
            <div class="space-y-6">
              <div v-for="(feature, index) in apiFeatures" :key="index" class="flex">
                <div class="mr-4 mt-1">
                  <i class="fas fa-check-circle text-green-500 text-xl"></i>
                </div>
                <div>
                  <h4 class="text-lg font-semibold text-gray-800 mb-1">
                    {{ feature.title }}
                  </h4>
                  <p class="text-gray-600">{{ feature.description }}</p>
                </div>
              </div>
            </div>
            <div class="mt-8">
              <a
                href="#"
                class="bg-blue-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-blue-700 transition duration-300 inline-block"
                >API Documentation</a
              >
            </div>
          </div>
          <div class="order-1 lg:order-2">
            <div class="bg-gray-900 rounded-xl p-6 shadow-xl">
              <div class="flex items-center mb-4">
                <div class="flex space-x-2">
                  <div class="w-3 h-3 rounded-full bg-red-500"></div>
                  <div class="w-3 h-3 rounded-full bg-yellow-500"></div>
                  <div class="w-3 h-3 rounded-full bg-green-500"></div>
                </div>
              </div>
              <pre class="text-green-400 font-mono text-sm overflow-x-auto p-4">
// Example API request
const response = await fetch('https://api.cryptox.com/v1/market/ticker/BTC-USD', {
  method: 'GET',
  headers: {
    'Content-Type': 'application/json',
    'X-API-Key': 'your_api_key'
  }
});

const data = await response.json();
console.log(data);

/* Example response:
{
  "symbol": "BTC-USD",
  "price": "45678.90",
  "bid": "45676.50",
  "ask": "45680.30",
  "24h_volume": "1235.46",
  "24h_change": "2.5"
}
*/</pre
              >
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Feature Comparison -->
    <section class="py-20 bg-gray-100">
      <div class="container mx-auto px-4">
        <div class="text-center mb-16">
          <h2 class="text-3xl font-bold text-gray-800 mb-4">CryptoX vs. Competitors</h2>
          <p class="text-xl text-gray-600 max-w-2xl mx-auto">
            See how our features stack up against other platforms
          </p>
        </div>

        <div class="overflow-x-auto">
          <table class="w-full bg-white rounded-xl shadow-lg">
            <thead>
              <tr class="bg-blue-600 text-white">
                <th class="py-4 px-6 text-left">Feature</th>
                <th class="py-4 px-6 text-center">CryptoX</th>
                <th class="py-4 px-6 text-center">Competitor A</th>
                <th class="py-4 px-6 text-center">Competitor B</th>
              </tr>
            </thead>
            <tbody>
              <tr
                v-for="(feature, index) in comparisonFeatures"
                :key="index"
                :class="index % 2 === 0 ? 'bg-gray-50' : 'bg-white'"
              >
                <td class="py-4 px-6 font-medium text-gray-800">{{ feature.name }}</td>
                <td class="py-4 px-6 text-center">
                  <i
                    v-if="feature.cryptox"
                    class="fas fa-check text-green-500 text-lg"
                  ></i>
                  <i v-else class="fas fa-times text-red-500 text-lg"></i>
                </td>
                <td class="py-4 px-6 text-center">
                  <i
                    v-if="feature.competitorA"
                    class="fas fa-check text-green-500 text-lg"
                  ></i>
                  <i v-else class="fas fa-times text-red-500 text-lg"></i>
                </td>
                <td class="py-4 px-6 text-center">
                  <i
                    v-if="feature.competitorB"
                    class="fas fa-check text-green-500 text-lg"
                  ></i>
                  <i v-else class="fas fa-times text-red-500 text-lg"></i>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </section>

    <!-- CTA -->
    <section class="py-20 gradient-bg">
      <div class="container mx-auto px-4 text-center">
        <h2 class="text-3xl font-bold text-white mb-6">
          Ready to Experience These Features?
        </h2>
        <p class="text-xl text-gray-300 mb-8 max-w-2xl mx-auto">
          Join thousands of traders who have chosen CryptoX for its powerful features and
          user-friendly platform.
        </p>
        <div
          class="flex flex-col sm:flex-row justify-center space-y-4 sm:space-y-0 sm:space-x-4"
        >
          <Link
            :href="route('register')"
            class="bg-white text-blue-600 px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition duration-300"
            >Create Account</Link
          >
          <Link
            :href="''"
            class="bg-transparent border border-white text-white px-8 py-3 rounded-lg font-semibold hover:bg-white hover:text-blue-600 transition duration-300"
            >Log In</Link
          >
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

// Core features section
const coreFeatures = ref([
  {
    title: "Advanced Trading Tools",
    description:
      "Sophisticated charting with multiple indicators, drawing tools, and customizable time frames to execute precise trading strategies.",
    icon: "fas fa-chart-line",
    bgColor: "bg-blue-100",
    iconColor: "text-blue-600",
  },
  {
    title: "Instant Withdrawals",
    description:
      "Access your funds immediately with our industry-leading withdrawal system that processes requests within minutes.",
    icon: "fas fa-wallet",
    bgColor: "bg-green-100",
    iconColor: "text-green-600",
  },
  {
    title: "Bank-Level Security",
    description:
      "Rest easy knowing your assets are protected with multi-signature wallets, cold storage, and 24/7 monitoring systems.",
    icon: "fas fa-shield-alt",
    bgColor: "bg-purple-100",
    iconColor: "text-purple-600",
  },
  {
    title: "Multi-Currency Support",
    description:
      "Trade over 100 cryptocurrencies paired with major fiat currencies including USD, EUR, GBP, and more.",
    icon: "fas fa-globe",
    bgColor: "bg-yellow-100",
    iconColor: "text-yellow-600",
  },
  {
    title: "Low Trading Fees",
    description:
      "Maximize your profits with our competitive fee structure that scales based on your trading volume and account level.",
    icon: "fas fa-hand-holding-usd",
    bgColor: "bg-red-100",
    iconColor: "text-red-600",
  },
  {
    title: "24/7 Support",
    description:
      "Access our knowledgeable support team anytime via live chat, email, or phone for assistance with any issues or questions.",
    icon: "fas fa-headset",
    bgColor: "bg-indigo-100",
    iconColor: "text-indigo-600",
  },
]);

// Trading platform features
const tradingPlatformFeatures = ref([
  {
    title: "Professional Charting",
    description:
      "Access 50+ technical indicators, multiple chart types, and drawing tools that professional traders rely on.",
    icon: "fas fa-chart-bar",
    bgColor: "bg-blue-100",
    iconColor: "text-blue-600",
  },
  {
    title: "Advanced Order Types",
    description:
      "Execute sophisticated strategies with market, limit, stop-loss, trailing stop, and OCO (One-Cancels-Other) orders.",
    icon: "fas fa-sliders-h",
    bgColor: "bg-green-100",
    iconColor: "text-green-600",
  },
  {
    title: "Real-time Market Data",
    description:
      "Stay informed with low-latency price feeds, detailed order books, and trade history visualizations.",
    icon: "fas fa-bolt",
    bgColor: "bg-yellow-100",
    iconColor: "text-yellow-600",
  },
  {
    title: "Customizable Interface",
    description:
      "Arrange your workspace with modular components that suit your trading style and preferences.",
    icon: "fas fa-th-large",
    bgColor: "bg-purple-100",
    iconColor: "text-purple-600",
  },
]);

// Security features
const securityFeatures = ref([
  {
    title: "Cold Storage",
    description:
      "95% of all assets are stored in offline, multi-signature wallets that are physically secured in bank vaults.",
    icon: "fas fa-snowflake",
    bgColor: "bg-blue-100",
    iconColor: "text-blue-600",
  },
  {
    title: "Two-Factor Authentication",
    description:
      "Add an essential layer of security to your account with SMS, email, or authenticator app verification.",
    icon: "fas fa-lock",
    bgColor: "bg-green-100",
    iconColor: "text-green-600",
  },
  {
    title: "Advanced Encryption",
    description:
      "All sensitive data is encrypted with military-grade AES-256 encryption both in transit and at rest.",
    icon: "fas fa-shield-alt",
    bgColor: "bg-yellow-100",
    iconColor: "text-yellow-600",
  },
  {
    title: "Insurance Coverage",
    description:
      "Digital assets held in our custody are covered by a comprehensive insurance policy against theft and security breaches.",
    icon: "fas fa-umbrella",
    bgColor: "bg-purple-100",
    iconColor: "text-purple-600",
  },
]);

// Mobile app features
const mobileFeatures = ref([
  {
    title: "Full Trading Functionality",
    description:
      "Execute trades, manage orders, and monitor your portfolio with the same capabilities as our desktop platform.",
    icon: "fas fa-exchange-alt",
    bgColor: "bg-blue-100",
    iconColor: "text-blue-600",
  },
  {
    title: "Real-time Notifications",
    description:
      "Stay informed with instant alerts for price movements, order executions, and account activities.",
    icon: "fas fa-bell",
    bgColor: "bg-green-100",
    iconColor: "text-green-600",
  },
  {
    title: "Biometric Authentication",
    description:
      "Secure your account with fingerprint or facial recognition while maintaining quick access to trading.",
    icon: "fas fa-fingerprint",
    bgColor: "bg-yellow-100",
    iconColor: "text-yellow-600",
  },
  {
    title: "Offline Mode",
    description:
      "View your portfolio, analyze charts, and prepare orders even when you're not connected to the internet.",
    icon: "fas fa-wifi",
    bgColor: "bg-purple-100",
    iconColor: "text-purple-600",
  },
]);

// API features
const apiFeatures = ref([
  {
    title: "Real-time Data Streams",
    description:
      "Connect to WebSocket endpoints for instant market data, order book updates, and trade executions.",
  },
  {
    title: "Comprehensive REST API",
    description:
      "Access all trading functionality including account management, order placement, and market data.",
  },
  {
    title: "Rate Limits",
    description:
      "Industry-leading rate limits with higher thresholds for authenticated requests.",
  },
  {
    title: "Developer Documentation",
    description:
      "Extensive guides, examples, and SDKs in multiple programming languages.",
  },
  {
    title: "Sandbox Environment",
    description:
      "Test your integrations with our staging environment before deploying to production.",
  },
]);

// Comparison table features
const comparisonFeatures = ref([
  { name: "Advanced Order Types", cryptox: true, competitorA: true, competitorB: false },
  { name: "Instant Withdrawals", cryptox: true, competitorA: false, competitorB: false },
  { name: "Cold Storage Security", cryptox: true, competitorA: true, competitorB: true },
  { name: "24/7 Live Support", cryptox: true, competitorA: false, competitorB: true },
  { name: "Mobile Trading App", cryptox: true, competitorA: true, competitorB: true },
  { name: "API Access", cryptox: true, competitorA: true, competitorB: false },
  { name: "Insurance Coverage", cryptox: true, competitorA: false, competitorB: false },
  { name: "Fiat Currency Support", cryptox: true, competitorA: true, competitorB: false },
  { name: "Trading Fee < 0.1%", cryptox: true, competitorA: false, competitorB: false },
]);

// Newsletter subscription
const newsletter = ref({
  email: "",
});

const subscribeNewsletter = () => {
  // Handle newsletter subscription
  alert("Thank you for subscribing!");
  newsletter.value.email = "";
};

// Footer links and information
const socialIcons = ref([
  { icon: "fab fa-twitter", link: "#" },
  { icon: "fab fa-facebook-f", link: "#" },
  { icon: "fab fa-linkedin-in", link: "#" },
  { icon: "fab fa-instagram", link: "#" },
]);

const quickLinks = ref([
  { text: "Home", url: route("home") },
  { text: "Features", url: route("features") },
  { text: "How It Works", url: "#how-it-works" },
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
  // Continuing the code from where it left off in the home page template

  { name: "Visa", image: "/img/payment/visa.svg" },
  { name: "Mastercard", image: "/img/payment/mastercard.svg" },
  { name: "Apple Pay", image: "/img/payment/apple-pay.svg" },
  { name: "Google Pay", image: "/img/payment/google-pay.svg" },
]);

const currentYear = computed(() => new Date().getFullYear());
</script>

<style>
.gradient-bg {
  background: linear-gradient(to right, #2563eb, #3b82f6);
}
.bg-features-header {
  background-image: url("/img/features-header.jpg");
}
</style>
