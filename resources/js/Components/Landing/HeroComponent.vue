<template>
    <!-- 1st version -->
    <div class="justice-slider" id="justice-slider">
        <!-- <ShootingStar /> -->
        <!-- <ParticleStar /> -->
        <div class="bg-overlay"></div>
        <vue-particles id="tsparticles" class="particles-container" @particles-loaded="particlesLoaded"
            :options="options" :full-screen="false" />

        <div class="container-fluid content-section h-100 overflow-visible">
            <div class="row w-100">

                <div :class="['col-12', windowWidth >= 768 ? 'col-md-6 col-lg-6' : '', 'hc-content-section']"
                    data-aos="fade-right" data-aos-duration="1000" data-aos-delay="200">
                    <div class="slide-content py-md-5">
                        <div class="slide-header">
                            <h2 class="slide-subtitle" data-aos="fade-up" data-aos-delay="300">{{
                                slides[currentSlide].subtitle }}</h2>
                            <h1 class="slide-title" data-aos="fade-up" data-aos-delay="400">{{
                                slides[currentSlide].title }}</h1>
                        </div>

                        <p class="slide-description" data-aos="fade-up" data-aos-delay="500">
                            {{ slides[currentSlide].description }}
                        </p>

                        <button class="cta-button" @click="handleCTAClick" data-aos="zoom-in" data-aos-delay="600">
                            {{ slides[currentSlide].ctaText }}
                            <svg class="cta-arrow" width="20" height="20" viewBox="0 0 24 24" fill="none">
                                <path d="M5 12H19M19 12L12 5M19 12L12 19" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </button>
                    </div>
                </div>


                <div :class="['col-12', windowWidth >= 768 ? 'col-md-6 col-lg-6' : '', 'image-section']"
                    data-aos="fade-left" data-aos-duration="1000" data-aos-delay="300">
                    <div class="justice-image-container w-100">
                        <img :src="slides[currentSlide].image" alt="Lady Justice" class="justice-image"
                            id="justice-lady-image" ref="imgRef" :key="currentSlide" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref, onMounted, onUnmounted } from 'vue'
import { gsap } from "gsap"
import { ScrollTrigger } from "gsap/ScrollTrigger";
import { useMediaQuery } from '@vueuse/core';
import { computed } from 'vue';
import { usePage } from '@inertiajs/inertia-vue3';

const currentSlide = ref(0)
const windowWidth = ref(typeof window !== 'undefined' ? window.innerWidth : 1200)
const isMobile = useMediaQuery('(max-width: 767px)');
const page = usePage();

gsap.registerPlugin(ScrollTrigger)
const imgRef = ref(null)


const options = computed(() => {

    let particlesCount = 80;
    if(isMobile.value) {
        particlesCount = 40
    }
    return {
        "autoPlay": true,
        // "background": {
        //     color: '#0ff',
        //     image: "linear-gradient(135deg, #0ea5e9 0%, white 100%)",

        //     "position": "50% 50%",
        //     "repeat": "no-repeat",
        //     "size": "cover",
        //     "opacity": 1
        // },
        "fullScreen": {
            "enable": false,
            "zIndex": 0
        },
        particles: {
            number: {
                value: particlesCount, // number of particles
            },
            color: {
                value: ["#153f83"], // particle color
            },
            links: {
                enable: true,
                distance: 150, // max distance to connect
                color: ["#1e56a0",],
                opacity: 0.3,
                width: 1,
                triangles: {
                    enable: false, // ✅ this makes triangles appear
                    color: ["#2e86de"],
                    opacity: 0
                }
            },
            move: {
                enable: true,
                speed: 1
            }
        },
        interactivity: {
            events: {
                onHover: { enable: true, mode: "grab" },
                onClick: { enable: false, mode: "push" }
            },
            modes: {
                grab: { distance: 200, links: { opacity: 0.5 } },
                push: { quantity: 4 }
            }
        }
    };
})


function particlesLoaded() {
    console.log('particles loaded');
}

const slides = ref([
    {
        id: 1,
        title: page.props.value.dashboard_data.heroSection.title,
        subtitle: page.props.value.dashboard_data.heroSection.subtitle,
        description: page.props.value.dashboard_data.heroSection.description,
        ctaText: "Get Legal Help",
        image: assetUrl(page.props.value.dashboard_data.heroSection.media_file)
    }
])

const handleResize = () => {
    windowWidth.value = window.innerWidth
}

const handleCTAClick = () => {
    // Emit event or handle CTA action
    console.log('CTA clicked for slide:', slides.value[currentSlide.value].id)
}

onMounted(() => {
    window.addEventListener('resize', handleResize)
    let parallaxSpeed = 0;

    if (windowWidth.value >= 768) {
        parallaxSpeed = -30;
    } else {
        parallaxSpeed = -50;
    }

    // parallax effect on hero image
    gsap.to(imgRef.value, {
        yPercent: parallaxSpeed, // move slower upwards (adjust strength here)
        ease: "none",
        scrollTrigger: {
            trigger: "#justice-slider",
            start: "top top",    // when hero section hits top
            end: "bottom top",   // until hero section scrolls out
            scrub: true          // smooth scrubbing
        }
    })
})

onUnmounted(() => {
    window.removeEventListener('resize', handleResize)

    ScrollTrigger.getAll().forEach(st => st.kill()) // cleanup
})
</script>

<style lang="scss" scoped>
$primary-color: #153f83;
$secondary-color: #D4AF37;

.justice-slider {
    position: relative;
    height: 700px;
    overflow: hidden;
    // min-height: 600px;
    // max-height: 700px;
    // background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);

    font-family: 'Poppins', sans-serif;

    // &::before {
    //     position: absolute;
    //     content: '';
    //     left: 0px;
    //     right: 0px;
    //     bottom: 0px;
    //     height: 50px;
    //     z-index: 10;
    //     background-color: white;
    //     clip-path: polygon(15% 60%, 100% 0, 100% 100%, 0 100%, 0 0);
    // }

    .bg-overlay {
        background: url('/images/aboutbg3.jpg') no-repeat center center/cover;
        position: absolute;
        inset: 0;
        opacity: 0.4;
    }

    & .particles-container {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        // z-index: 1;

        & canvas {
            position: absolute !important;
        }
    }
}


.hc-content-section {
    // padding: 2rem 3rem;
    display: flex;
    align-items: center;
    position: relative;
    z-index: 3;
}

.slide-content {
    max-width: 600px;
}

.slide-header {
    margin-bottom: 2rem;
}

.slide-subtitle {
    color: $secondary-color;
    font-family: 'Poppins', sans-serif;
    font-size: 1.1rem;
    font-weight: 500;
    text-transform: uppercase;
    letter-spacing: 2px;
    margin-bottom: 0.5rem;
    opacity: 0;
    animation: slideUp 0.8s ease-out 0.2s forwards;
}

.slide-title {
    color: $primary-color;
    font-family: 'Playfair Display', serif;
    font-size: 3.5rem;
    font-weight: 700;
    line-height: 1.2;
    margin-bottom: 0;
    opacity: 0;
    animation: slideUp 0.8s ease-out 0.4s forwards;
}

.slide-description {
    color: #6c757d;
    font-size: 1.1rem;
    line-height: 1.7;
    margin-bottom: 2.5rem;
    opacity: 0;
    animation: slideUp 0.8s ease-out 0.6s forwards;
}

.cta-button {
    background: linear-gradient(135deg, $primary-color 0%, lighten($primary-color, 10%) 100%);
    color: white;
    border: none;
    padding: 1rem 2.5rem;
    // border-radius: 50px;
    font-family: 'Poppins', sans-serif;
    font-weight: 500;
    font-size: 1rem;
    text-transform: uppercase;
    letter-spacing: 1px;
    cursor: pointer;
    transition: all 0.3s ease;
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    box-shadow: 0 4px 15px rgba($primary-color, 0.3);
    opacity: 0;
    animation: slideUp 0.8s ease-out 0.8s forwards;

    &:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 25px rgba($primary-color, 0.4);
        background: linear-gradient(135deg, lighten($primary-color, 10%) 0%, $primary-color 100%);

        .cta-arrow {
            transform: translateX(3px);
        }
    }
}

.cta-arrow {
    transition: transform 0.3s ease;
}

.image-section {
    position: relative;
    height: 100%;
    // height: auto;
    display: flex;
    align-items: center;
    justify-content: center;
}

.justice-image-container {
    position: relative;
    height: 100%;
    //   max-width: 500px;
    //   height: 70vh;
    overflow: visible;
    border-radius: 20px;
    //   box-shadow: 0 20px 60px rgba($primary-color, 0.2);
}

.justice-image {
    // width: 100%;
    inset: 0;
    height: 900px;
    object-fit: cover;
    object-position: 0 0;
    position: absolute;
    // z-index: 100;
    // transition: transform 0.8s ease;
    opacity: 1;
    // animation: fadeInScale 1s ease-out 0.3s forwards;
}

.image-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    //   background: linear-gradient(45deg, rgba($primary-color, 0.1) 0%, rgba($secondary-color, 0.05) 100%);
}

.slider-navigation {
    position: absolute;
    bottom: 2rem;
    left: 3rem;
    // transform: translateX(-50%);
    display: flex;
    align-items: center;
    gap: 2rem;
    z-index: 4;
}

.nav-btn {
    background: rgba($primary-color, 0.1);
    backdrop-filter: blur(10px);
    border: 2px solid rgba($primary-color, 0.2);
    width: 50px;
    height: 50px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.3s ease;
    color: $primary-color;

    &:hover {
        background: rgba($primary-color, 0.9);
        color: white;
        transform: scale(1.1);
    }
}

.pagination-dots {
    display: flex;
    gap: 1rem;
}

.dot {
    width: 12px;
    height: 12px;
    border-radius: 50%;
    border: none;
    background: rgba($primary-color, 0.3);
    cursor: pointer;
    transition: all 0.3s ease;

    &.active {
        background: $secondary-color;
        transform: scale(1.2);
    }

    &:hover {
        background: $secondary-color;
        transform: scale(1.1);
    }
}

@keyframes slideUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }

    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes fadeInScale {
    from {
        opacity: 0;
        transform: scale(1.1);
    }

    to {
        opacity: 1;
        transform: scale(1);
    }
}

// Mobile Responsiveness
@media (max-width: 767px) {
    .justice-slider {
        height: auto;
    }

    .hc-content-section {
        padding: 2rem 1.5rem;
        text-align: center;
    }

    .slide-title {
        font-size: 2.5rem;
    }

    .slide-description {
        font-size: 1rem;
    }

    .image-section {
        height: 60vh;
        margin-top: 2rem;
        padding: 0 1.5rem;
    }

    .justice-image-container {
        height: 30vh;
        max-width: 300px;
    }

    .slider-navigation {
        position: relative;
        bottom: auto;
        margin-top: 2rem;
    }

    .nav-btn {
        width: 40px;
        height: 40px;
    }
}

@media (max-width: 576px) {
    .hc-content-section {
        padding: 1.5rem 1rem;
    }

    .slide-title {
        font-size: 2rem;
    }

    .slide-subtitle {
        font-size: 0.9rem;
    }

    .slide-description {
        font-size: 0.95rem;
        margin-bottom: 2rem;
    }

    .cta-button {
        padding: 0.8rem 2rem;
        font-size: 0.9rem;
    }

    .image-section {
        height: 40vh;
        margin-top: 1rem;
    }

    .justice-image-container {
        height: 50vh;
        max-width: 100%;
    }

    .justice-image {
        height: auto;
        width: 100%;
    }

    .slider-navigation {
        gap: 1.5rem;
    }
}

@media (min-width: 768px) and (max-width: 991px) {
    .slide-title {
        font-size: 3rem;
    }

    .hc-content-section {
        padding: 2rem;
    }
}
</style>
