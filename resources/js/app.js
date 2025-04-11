import "../css/app.css";
import "./bootstrap";

import "@fortawesome/fontawesome-free/css/brands.min.css";
import "@fortawesome/fontawesome-free/css/fontawesome.min.css";
import "@fortawesome/fontawesome-free/css/solid.min.css";
import { createInertiaApp } from "@inertiajs/vue3";
import "animate.css"; // Make sure to import animate.css if not already included elsewhere
import { resolvePageComponent } from "laravel-vite-plugin/inertia-helpers";
import { createApp, h } from "vue";
import { ZiggyVue } from "../../vendor/tightenco/ziggy";
import useScrollAnimation from "./Composables/useScrollAnimation";

const appName = import.meta.env.VITE_APP_NAME || "Laravel";

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) =>
        resolvePageComponent(
            `./Pages/${name}.vue`,
            import.meta.glob("./Pages/**/*.vue")
        ),
    setup({ el, App, props, plugin }) {
        const app = createApp({ render: () => h(App, props) });

        app.use(plugin);
        app.use(ZiggyVue);

        // Make the scroll animation composable globally available
        app.config.globalProperties.$scrollAnimation = useScrollAnimation();

        return app.mount(el);
    },
    progress: {
        color: "#4B5563",
    },
});
