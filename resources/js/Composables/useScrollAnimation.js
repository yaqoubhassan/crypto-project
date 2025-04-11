// useScrollAnimation.js
import { onBeforeUnmount, onMounted, ref } from "vue";

/**
 * Composable that provides scroll-triggered animations for elements
 *
 * @param {Object} options - Configuration options
 * @param {Number} options.threshold - Visibility threshold (0-1), default: 0.2
 * @param {String} options.rootMargin - Root margin value, default: '0px'
 * @param {Boolean} options.once - Whether to trigger animation only once, default: false
 * @param {String} options.animationIn - CSS class for animation when element enters viewport
 * @param {String} options.animationOut - CSS class for animation when element exits viewport
 * @param {Number} options.defaultDelay - Base delay in seconds for animations, default: 0
 * @param {Number} options.staggerDelay - Additional delay per item in staggered animations, default: 0.1
 * @returns {Object} - Refs and functions to be used in the component
 */
export default function useScrollAnimation(options = {}) {
    const {
        threshold = 0.2,
        rootMargin = "0px",
        once = false,
        animationIn = "animate__fadeIn",
        animationOut = "animate__fadeOut animate__faster",
        defaultDelay = 0,
        staggerDelay = 0.1,
    } = options;

    const elementRef = ref(null);
    const isVisible = ref(false);
    let observer = null;

    /**
     * Calculate animation delay based on index
     * @param {Number} index - Index of the item in a collection
     * @returns {String} - CSS style string for animation delay
     */
    const getAnimationDelay = (index = 0) => {
        return `animation-delay: ${defaultDelay + index * staggerDelay}s`;
    };

    onMounted(() => {
        observer = new IntersectionObserver(
            (entries) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        isVisible.value = true;
                        // If 'once' is true, unobserve the element after it becomes visible
                        if (once && observer) {
                            observer.unobserve(entry.target);
                        }
                    } else {
                        // Only set to false if we're not in 'once' mode
                        if (!once) {
                            isVisible.value = false;
                        }
                    }
                });
            },
            { threshold, rootMargin }
        );

        if (elementRef.value) {
            observer.observe(elementRef.value);
        }
    });

    onBeforeUnmount(() => {
        if (observer && elementRef.value) {
            observer.unobserve(elementRef.value);
            observer = null;
        }
    });

    /**
     * Get animation classes based on current visibility state
     * @returns {Object} - Class object for use with :class binding
     */
    const animationClasses = () => {
        return {
            animate__animated: true,
            [animationIn]: isVisible.value,
            [animationOut]: !isVisible.value && animationOut,
        };
    };

    return {
        elementRef,
        isVisible,
        getAnimationDelay,
        animationClasses,
    };
}
