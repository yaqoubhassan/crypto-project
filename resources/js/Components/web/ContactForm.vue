<script setup>
import { ref } from "vue";

const contactForm = ref({
  name: "",
  email: "",
  subject: "",
  message: "",
});

const submitContactForm = () => {
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
</script>

<template>
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
                <label for="email" class="block text-gray-700 mb-2">Email Address</label>
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
</template>
