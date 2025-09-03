import './bootstrap';
import "~select2/dist/js/select2.min.js";
import '../sass/app.scss'

// $primary:rgb(44, 119, 133);
import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/inertia-vue3';
import { InertiaProgress } from '@inertiajs/progress';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ZiggyVue } from 'ziggy-js';
import { route } from 'ziggy-js';
import { Ziggy } from './ziggy.js';
window.route = (name, params, absolute) => route(name, params, absolute, Ziggy);
import localization from './localization';
import authorization from './authorization';
import helper_functions from './Services/helpers';
import Toaster from '@meforma/vue-toaster';
import AOS from 'aos'
import 'aos/dist/aos.css'
import VueDatePicker from '@vuepic/vue-datepicker';
import '@vuepic/vue-datepicker/dist/main.css'
import StarRating from 'vue-star-rating'
import InstagramFeed from "vue3-instagram-feed";
import "vue3-instagram-feed/dist/style.css";
import Wizard from 'form-wizard-vue3'
import VueGoogleMaps from '@fawmi/vue-google-maps'
import CurrentLocationMixin from "@/Mixins/CurrentLocationMixin.vue";
import VueTelInput from 'vue-tel-input'
import 'vue-tel-input/vue-tel-input.css';
import Vue3Marquee from 'vue3-marquee';
import Particles from "@tsparticles/vue3";
import { loadFull } from "tsparticles";


const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'Laravel';

window.assetUrl = (url) => `${window.location.origin}/storage/${url}`;

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    setup({ el, app, props, plugin }) {
        return createApp({
            render: () => h(app, props), mounted() {
                AOS.init()
            },
        })
            .use(VueGoogleMaps, {
                load: {
                    key: 'AIzaSyCCiLJ2oj495NdwWjSm3I_fBGX7UxYYW6s',
                    // language: 'de',
                    // libraries: "places"
                },
            })
            .use(InstagramFeed)
            .use(Toaster)
            .use(plugin)
            .use(Particles, {
                init: async engine => await loadFull(engine),
            })
            .use(Vue3Marquee)
            .component('Wizard', Wizard)
            .component('star-rating', StarRating)
            .component('VueDatePicker', VueDatePicker)
            .use(ZiggyVue, Ziggy)
            .use(VueTelInput)
            .mixin(localization)
            .mixin(authorization)
            .mixin(helper_functions)
            .mixin(CurrentLocationMixin)
            .mount(el);
    },
});

InertiaProgress.init({ color: '#4B5563' });
