<template>
  <section ref="sectionRef" class="py-16 bg-white overflow-hidden">
    <div class="container mx-auto px-4">
      <div class="mb-10">
        <h2 class="text-3xl font-bold mb-2">Market News</h2>
        <p class="text-gray-600">
          Stay updated with the latest cryptocurrency news and insights
        </p>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <div
          v-for="(article, index) in articles"
          :key="article.id"
          class="bg-white rounded-xl shadow-md overflow-hidden transition-all duration-300 hover:shadow-lg"
          :class="getArticleAnimationClasses(index)"
          :style="getAnimationDelay(index)"
        >
          <div class="h-48 bg-gray-200 relative">
            <div
              class="absolute top-0 right-0 bg-blue-600 text-white text-xs font-bold px-3 py-1 rounded-bl"
            >
              {{ article.category }}
            </div>
            <img
              :src="article.image"
              alt="Crypto news"
              class="w-full h-full object-cover"
            />
          </div>
          <div class="p-6">
            <div class="flex items-center mb-3">
              <span class="text-sm text-gray-500">{{ article.date }}</span>
              <span class="mx-2 text-gray-300">•</span>
              <span class="text-sm text-gray-500">{{ article.readTime }} min read</span>
            </div>
            <h3 class="text-xl font-bold mb-2 line-clamp-2">{{ article.title }}</h3>
            <p class="text-gray-600 mb-4 line-clamp-3">{{ article.summary }}</p>
            <div class="flex items-center justify-between">
              <div class="flex items-center">
                <div class="w-8 h-8 rounded-full bg-gray-200 mr-3">
                  <img
                    :src="article.author.avatar"
                    alt="Author"
                    class="w-full h-full rounded-full object-cover"
                  />
                </div>
                <span class="text-sm font-medium">{{ article.author.name }}</span>
              </div>
              <button
                class="text-blue-600 hover:text-blue-700 font-medium flex items-center"
              >
                Read more
                <i class="fas fa-arrow-right ml-2"></i>
              </button>
            </div>
          </div>
        </div>
      </div>

      <div class="mt-10 text-center">
        <button
          class="px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors duration-300 inline-flex items-center"
        >
          View all news
          <i class="fas fa-arrow-right ml-2"></i>
        </button>
      </div>
    </div>
  </section>
</template>

<script setup>
import { ref } from "vue";
import useScrollAnimation from "@/Composables/useScrollAnimation";

// Sample news articles data
const articles = ref([
  {
    id: 1,
    title: "Bitcoin Breaks $50,000 Barrier as Institutional Adoption Accelerates",
    summary:
      "Bitcoin has surged past $50,000 for the first time in three months, driven by renewed institutional interest and positive market sentiment.",
    date: "Apr 10, 2025",
    readTime: 5,
    image: "/api/placeholder/800/400",
    category: "Bitcoin",
    author: {
      name: "Alex Morgan",
      avatar: "/api/placeholder/100/100",
    },
  },
  {
    id: 2,
    title: "Ethereum Layer-2 Solutions See Record Growth Amid Gas Fee Concerns",
    summary:
      "Layer-2 scaling solutions for Ethereum have experienced unprecedented adoption as users seek alternatives to high gas fees on the main network.",
    date: "Apr 9, 2025",
    readTime: 4,
    image: "/api/placeholder/800/400",
    category: "Ethereum",
    author: {
      name: "Sarah Johnson",
      avatar: "/api/placeholder/100/100",
    },
  },
  {
    id: 3,
    title:
      "DeFi Protocol Launches Insurance Fund to Protect Against Smart Contract Exploits",
    summary:
      "A leading decentralized finance protocol has introduced a comprehensive insurance mechanism designed to safeguard users from potential smart contract vulnerabilities.",
    date: "Apr 8, 2025",
    readTime: 6,
    image: "/api/placeholder/800/400",
    category: "DeFi",
    author: {
      name: "Michael Chen",
      avatar: "/api/placeholder/100/100",
    },
  },
]);

// Use the composable with specific animation options
const {
  elementRef: sectionRef,
  isVisible,
  getAnimationDelay,
  animationClasses,
} = useScrollAnimation({
  threshold: 0.1,
  animationIn: "animate__fadeInUp",
  animationOut: "animate__fadeOut",
  defaultDelay: 0,
  staggerDelay: 0.1,
});

// Helper function to get article animations
const getArticleAnimationClasses = (index) => {
  return {
    animate__animated: true,
    animate__fadeInUp: isVisible.value,
    "animate__fadeOut animate__faster": !isVisible.value,
  };
};
</script>

<style scoped>
.animate__animated {
  animation-duration: 0.8s;
}

.animate__faster {
  animation-duration: 0.5s;
}

.line-clamp-2 {
  display: -webkit-box;
  -webkit-line-clamp: 2;
  -webkit-box-orient: vertical;
  overflow: hidden;
}

.line-clamp-3 {
  display: -webkit-box;
  -webkit-line-clamp: 3;
  -webkit-box-orient: vertical;
  overflow: hidden;
}
</style>
