<template>
    <div class="hero-container">
        <!-- Hero Carousel Section -->
        <section class="hero-section" data-aos="fade-in" data-aos-duration="1000">
            <swiper :modules="modules" :slides-per-view="1" :space-between="0" :loop="true" :autoplay="{
                delay: interval,
                disableOnInteraction: false,
                pauseOnMouseEnter: false
            }" :effect="'fade'" :fade-effect="{
                crossFade: true
            }" :speed="600" :pagination="{
                clickable: true,
                dynamicBullets: false
            }" :navigation="false" class="hero-swiper" @slideChange="onSlideChange"
                @slideChangeTransitionStart="onSlideStart" @slideChangeTransitionEnd="onSlideEnd">
                <swiper-slide v-for="(slide, index) in slides" :key="index" class="carousel-slide">
                    <div class="slide-container w-100">
                        <!-- Background Image with Zoom Effect -->
                        <div class="slide-background" :class="{ 'zoom-active': index === currentSlide && isZooming }"
                            :style="{ backgroundImage: `url(${slide.image})` }"></div>

                        <!-- Overlay -->
                        <div class="slide-overlay"></div>

                        <!-- Content -->
                        <div class="slide-content">
                            <div class="slide-subtitle" :class="{ 'animate-in': index === currentSlide && showContent }"
                                data-aos="fade-up" data-aos-delay="100">
                                {{ slide.subtitle }}
                            </div>

                            <h1 class="slide-title" :class="{ 'animate-in': index === currentSlide && showContent }"
                                data-aos="fade-up" data-aos-delay="200">
                                {{ slide.title }}
                            </h1>

                            <p class="slide-description"
                                :class="{ 'animate-in': index === currentSlide && showContent }" data-aos="fade-up"
                                data-aos-delay="300">
                                {{ slide.description }}
                            </p>

                            <div class="slide-button" :class="{ 'animate-in': index === currentSlide && showContent }"
                                data-aos="fade-up" data-aos-delay="400">
                                <button class="btn btn-authority" @click="handleCTA(slide.cta)">
                                    {{ slide.buttonText }}
                                </button>
                            </div>
                        </div>
                    </div>
                </swiper-slide>
            </swiper>
        </section>

    </div>
</template>

<script setup>
import { ref, onMounted, nextTick } from 'vue'
import { Swiper, SwiperSlide } from 'swiper/vue'
import { Navigation, Pagination, Autoplay, EffectFade } from 'swiper/modules'
import 'swiper/css'
import 'swiper/css/navigation'
import 'swiper/css/pagination'
import 'swiper/css/effect-fade'
import AOS from 'aos'
import 'aos/dist/aos.css'

// Swiper modules
const modules = [Navigation, Pagination, Autoplay, EffectFade]

// Props
const props = defineProps({
    autoplay: {
        type: Boolean,
        default: true
    },
    interval: {
        type: Number,
        default: 6000
    }
})

// Emit events
const emit = defineEmits(['cta-click', 'slide-change'])

// Reactive data
const currentSlide = ref(0)
const showContent = ref(false)
const isZooming = ref(false)

// Slides data
const slides = ref([
    {
        image: 'https://images.pexels.com/photos/5668772/pexels-photo-5668772.jpeg?auto=compress&cs=tinysrgb&w=1920&h=1280&dpr=2',
        subtitle: 'Welcome To',
        title: 'Vellume Law Firm',
        description: 'We are a leading law firm in financial & business industry. With more than 20 years of experience delivering exceptional legal solutions.',
        buttonText: 'Contact Now →',
        cta: 'contact'
    },
    {
        image: 'https://images.pexels.com/photos/8112198/pexels-photo-8112198.jpeg?auto=compress&cs=tinysrgb&w=1920&h=1280&dpr=2',
        subtitle: 'Professional',
        title: 'Legal Excellence',
        description: 'Dedicated to providing exceptional legal services with integrity, expertise, and personalized attention to every client matter.',
        buttonText: 'Get Consultation →',
        cta: 'consultation'
    },
    {
        image: 'https://images.pexels.com/photos/6077326/pexels-photo-6077326.jpeg?auto=compress&cs=tinysrgb&w=1920&h=1280&dpr=2',
        subtitle: 'Trusted',
        title: 'Legal Advisors',
        description: 'Your trusted partners in navigating complex legal matters with a proven track record of successful outcomes.',
        buttonText: 'Learn More →',
        cta: 'about'
    }
])

// Methods
const onSlideChange = (swiper) => {
    emit('slide-change', swiper.activeIndex)
}

const onSlideStart = () => {
    showContent.value = false
    isZooming.value = false
}

const onSlideEnd = (swiper) => {
    currentSlide.value = swiper.activeIndex

    nextTick(() => {
        setTimeout(() => {
            showContent.value = true
            isZooming.value = true
        }, 100)
    })
}

const handleCTA = (action) => {
    emit('cta-click', action)
}

// Lifecycle
onMounted(() => {
    // Initialize AOS
    AOS.init({
        duration: 600,
        easing: 'ease-out-cubic',
        once: true,
        offset: 50
    })

    // Initial animation
    setTimeout(() => {
        showContent.value = true
        isZooming.value = true
    }, 500)
})
</script>

<style lang="scss">
// SCSS Variables
$primary-color: #153f83;
$primary-dark: #0f2f63;
$secondary-color: #D4AF37;
$secondary-dark: #B8941F;
$coffee-color: #8B4513;
$coffee-dark: #6B3410;
$coffee-darker: #4A240B;
$accent-color: $secondary-color;
$text-light: rgba(255, 255, 255, 0.95);
$text-muted: rgba(255, 255, 255, 0.8);
$text-dark: #333333;
$text-gray: #6c757d;
$overlay-gradient: rgba(21, 63, 131, 0.7);

.hero-container {
    position: relative;
}

.hero-section {
    height: 80vh;
    min-height: 600px;
    position: relative;
    overflow: hidden;

    @media (max-width: 992px) {
        height: 70vh;
        min-height: 500px;
    }

    @media (max-width: 768px) {
        height: 60vh;
        min-height: 450px;
    }

    @media (max-width: 576px) {
        height: 55vh;
        min-height: 400px;
    }

    @media (max-width: 400px) {
        height: 50vh;
        min-height: 350px;
    }


    .hero-swiper {
        height: 100%;
        width: 100%;
        background-color: $overlay-gradient;

    }

    .carousel-slide {
        height: 100vh;
        position: relative;
    }

    .slide-container {
        height: 100%;
        position: relative;
        display: flex;
        align-items: start;
        justify-content: center;
        padding-top: 40px;

        @media (min-width: 768px) {
            align-items: start;
            padding-top: 100px;
        }
    }

    .slide-background {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        background-image: linear-gradient(to bottom, $primary-color 0%, $primary-color 100%);
        transform: scale(1);
        transition: transform 6s ease-out;

        &.zoom-active {
            transform: scale(1.08);
        }

        &:not(.no-image) {
            background-image: none;
        }
    }

    .slide-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: $overlay-gradient;
        z-index: 1;
    }

    .slide-content {
        position: relative;
        z-index: 2;
        text-align: center;
        color: $text-light;
        max-width: 900px;
        padding: 0 2rem;

        @media (max-width: 768px) {
            max-width: 600px;
            padding: 0 1.5rem;
        }

        @media (max-width: 576px) {
            padding: 0 1rem;
        }
    }

    .slide-subtitle {
        font-size: 1.1rem;
        color: $accent-color;
        font-weight: 700;
        letter-spacing: 3px;
        text-transform: uppercase;
        margin-bottom: 0.8rem;
        opacity: 0;
        transform: translateY(30px);
        transition: all 0.6s ease-out;
        filter: drop-shadow(0 2px 4px rgba(0, 0, 0, 0.3));

        &.animate-in {
            opacity: 1;
            transform: translateY(0);
            transition-delay: 0.1s;
        }

        @media (max-width: 768px) {
            font-size: 1rem;
            letter-spacing: 2px;
            margin-bottom: 0.6rem;
        }

        @media (max-width: 576px) {
            font-size: 0.9rem;
            letter-spacing: 1.5px;
        }
    }

    .slide-title {
        font-family: 'Playfair Display', serif;
        font-size: 3.5rem;
        font-weight: 700;
        margin-bottom: 1.2rem;
        line-height: 1.1;
        opacity: 0;
        transform: translateY(40px);
        transition: all 0.7s ease-out;
        text-shadow: 0 4px 8px rgba(0, 0, 0, 0.4);

        &.animate-in {
            opacity: 1;
            transform: translateY(0);
            transition-delay: 0.2s;
        }

        @media (max-width: 992px) {
            font-size: 3rem;
        }

        @media (max-width: 768px) {
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }

        @media (max-width: 576px) {
            font-size: 2rem;
            margin-bottom: 0.8rem;
        }

        @media (max-width: 400px) {
            font-size: 1.8rem;
        }
    }

    .slide-description {
        font-size: 1.2rem;
        font-weight: 400;
        line-height: 1.6;
        margin-bottom: 2rem;
        color: $text-muted;
        opacity: 0;
        transform: translateY(30px);
        transition: all 0.6s ease-out;
        text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);

        &.animate-in {
            opacity: 1;
            transform: translateY(0);
            transition-delay: 0.4s;
        }

        @media (max-width: 768px) {
            font-size: 1.1rem;
            margin-bottom: 1.5rem;
        }

        @media (max-width: 576px) {
            font-size: 1rem;
            margin-bottom: 1.2rem;
            line-height: 1.5;
        }
    }

    .slide-button {
        opacity: 0;
        transform: translateY(25px);
        transition: all 0.5s ease-out;

        &.animate-in {
            opacity: 1;
            transform: translateY(0);
            transition-delay: 0.6s;
        }
    }

    .btn-authority {
        background: $accent-color;
        border: 2px solid $accent-color;
        color: white;
        padding: 14px 40px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 2px;
        font-size: 0.9rem;
        border-radius: 0;
        transition: all 0.3s ease;
        box-shadow: 0 6px 20px rgba(212, 175, 55, 0.3);
        position: relative;
        overflow: hidden;

        &::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.1), transparent);
            transition: left 0.5s ease;
        }

        &:hover {
            background: transparent;
            color: $accent-color;
            border-color: $accent-color;
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(212, 175, 55, 0.4);

            &::before {
                left: 100%;
            }
        }

        &:active {
            transform: translateY(-1px);
        }

        @media (max-width: 768px) {
            padding: 12px 30px;
            font-size: 0.85rem;
            letter-spacing: 1.5px;
        }

        @media (max-width: 576px) {
            padding: 10px 25px;
            font-size: 0.8rem;
            letter-spacing: 1px;
        }
    }

    .swiper-slide {
        background: $primary-color;
        /* or your desired background color */
        position: relative;
    }

    // Custom Swiper Styling
    .swiper-pagination {
        position: absolute !important;
        bottom: 100px !important;
        left: 50% !important;
        transform: translateX(-50%) !important;
        display: flex !important;
        justify-content: center !important;
        gap: 12px !important;

        @media (max-width: 992px) {
            bottom: 150px !important;
            gap: 10px !important;
        }

        @media (max-width: 576px) {
            bottom: 80px !important;
            gap: 10px !important;
        }
    }

    .swiper-pagination-bullet {
        width: 14px !important;
        height: 14px !important;
        border-radius: 50% !important;
        border: 2px solid rgba(255, 255, 255, 0.4) !important;
        background: transparent !important;
        transition: all 0.4s ease !important;
        opacity: 1 !important;

        &:hover:not(.swiper-pagination-bullet-active) {
            border-color: rgba(255, 255, 255, 0.7) !important;
            transform: scale(1.1) !important;
        }

        &.swiper-pagination-bullet-active {
            background: $accent-color !important;
            border-color: $accent-color !important;
            transform: scale(1.3) !important;
            box-shadow: 0 0 15px rgba(212, 175, 55, 0.6) !important;
        }

        @media (max-width: 576px) {
            width: 12px !important;
            height: 12px !important;
        }
    }

    .swiper-button-next,
    .swiper-button-prev {
        background: rgba(255, 255, 255, 0.1) !important;
        border: 1px solid rgba(255, 255, 255, 0.2) !important;
        border-radius: 50% !important;
        width: 55px !important;
        height: 55px !important;
        transition: all 0.3s ease !important;
        backdrop-filter: blur(10px) !important;
        color: white !important;

        &:after {
            font-size: 20px !important;
            font-weight: bold !important;
        }

        &:hover {
            background: $accent-color !important;
            border-color: $accent-color !important;
            transform: scale(1.1) !important;
        }

        @media (max-width: 768px) {
            width: 50px !important;
            height: 50px !important;

            &:after {
                font-size: 18px !important;
            }
        }

        @media (max-width: 576px) {
            width: 45px !important;
            height: 45px !important;

            &:after {
                font-size: 16px !important;
            }
        }
    }

    .swiper-button-next {
        right: 30px !important;

        @media (max-width: 576px) {
            right: 15px !important;
        }
    }

    .swiper-button-prev {
        left: 30px !important;

        @media (max-width: 576px) {
            left: 15px !important;
        }
    }

    // Mobile landscape optimization
    @media (max-height: 500px) and (orientation: landscape) {
        .hero-section {
            height: 100vh;
            min-height: 400px;
        }

        .slide-title {
            font-size: 2rem;
            margin-bottom: 0.8rem;
        }

        .slide-description {
            font-size: 0.95rem;
            margin-bottom: 1rem;
        }

        .btn-authority {
            padding: 8px 20px;
            font-size: 0.75rem;
        }

        .about-section {
            margin-top: -40px;
        }
    }

    // High DPI screens
    @media (-webkit-min-device-pixel-ratio: 2),
    (min-resolution: 192dpi) {
        .slide-background {
            background-size: cover;
            image-rendering: -webkit-optimize-contrast;
            image-rendering: crisp-edges;
        }
    }
}

</style>
