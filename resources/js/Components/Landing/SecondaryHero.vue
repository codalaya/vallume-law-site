<script setup>
import { Link, usePage } from '@inertiajs/inertia-vue3';
import { ref } from 'vue';
import VideoPlayer from './VideoPlayer.vue';
const props = defineProps({
    title: String,
    subtitle: String,
})

const page = usePage();
const settings = page.props.value.dashboard_data.headerSection || {};
const showVideo = ref(false);
const heroData = ref({
    title: settings.title,
    description: settings.description,
    primaryButton: "Watch Our Story",
    secondaryButton: "Discover More",
    image: assetUrl(settings.image)
});
</script>

<template>
<section class="hero-section">
    <div class="hero-background" data-aos="fade-in" data-aos-duration="1200">
        <img :src="'/images/banner2.jpg'" alt="Background" class="background-image">
    </div>
    <div class="hero-overlay">
        <div class="container content-section">
            <div class="row align-items-center">
                <div class="col-lg-7 hero-content" data-aos="fade-right" data-aos-duration="1000">
                    <h1 class="hero-title playfair" data-aos="fade-up" data-aos-delay="200">
                        {{ heroData.title }}
                    </h1>
                    <p class="hero-subtitle poppins" data-aos="fade-up" data-aos-delay="400" v-html="heroData.description">

                    </p>
                    <div class="hero-buttons" data-aos="fade-up" data-aos-delay="600">
                        <button class="btn btn-primary-custom btn-lg poppins" data-aos="zoom-in" data-aos-delay="800" @click="showVideo = true">
                            <i class="fas fa-play me-2"></i>
                            {{ heroData.primaryButton }}
                        </button>
                        <Link :href="route('services.listing')" class="btn btn-outline-light btn-lg poppins" data-aos="zoom-in" data-aos-delay="1000">
                            <i class="fas fa-arrow-right me-2"></i>
                            {{ heroData.secondaryButton }}
                        </Link>
                    </div>
                </div>
                <div class="col-lg-5 hero-image-section" data-aos="fade-left" data-aos-duration="1000">
                    <div class="hero-image-wrapper" data-aos="zoom-in" data-aos-delay="600">
                        <img :src="heroData.image" alt="Legal Excellence" class="hero-image">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <VideoPlayer :show="showVideo" @close="showVideo = false" :url="settings.youtube_video_link" />
</section>

</template>

<style lang="scss" scoped>
.hero-section {
    position: relative;
    max-height: 500px;
    overflow: hidden;
}

.hero-background {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: -2;

    .background-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
    }
}

.hero-overlay {
    position: relative;
    background: linear-gradient(
        135deg,
        rgba(15, 23, 42, 0.95) 0%,
        rgba(30, 41, 59, 0.85) 40%,
        rgba(51, 65, 85, 0.4) 70%,
        transparent 100%
    );
    // min-height: 100vh;
    display: flex;
    align-items: center;
    z-index: 1;
}

.hero-content {
    padding-right: 2rem;

    @media (max-width: 991.98px) {
        padding-right: 0;
        text-align: center;
        margin-bottom: 3rem;
    }
}

.hero-title {
    font-size: clamp(2.5rem, 5vw, 4rem);
    font-weight: 700;
    color: #ffffff;
    margin-bottom: 1.5rem;
    line-height: 1.2;
    letter-spacing: -0.02em;
}

.hero-subtitle {
    font-size: 1.25rem;
    color: rgba(255, 255, 255, 0.9);
    margin-bottom: 2.5rem;
    line-height: 1.6;
    max-width: 90%;

    @media (max-width: 991.98px) {
        max-width: 100%;
    }
}

.hero-buttons {
    display: flex;
    gap: 1rem;
    flex-wrap: wrap;

    @media (max-width: 575.98px) {
        flex-direction: column;
        align-items: stretch;
    }
}

.btn-primary-custom {
    background: linear-gradient(135deg, #3b82f6, #1d4ed8);
    border: none;
    padding: 0.875rem 2rem;
    font-weight: 600;
    letter-spacing: 0.025em;
    transition: all 0.3s ease;
    box-shadow: 0 4px 14px 0 rgba(59, 130, 246, 0.3);

    &:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px 0 rgba(59, 130, 246, 0.4);
        background: linear-gradient(135deg, #2563eb, #1e40af);
    }
}

.btn-outline-light {
    padding: 0.875rem 2rem;
    font-weight: 600;
    letter-spacing: 0.025em;
    border: 2px solid rgba(255, 255, 255, 0.3);
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(10px);
    transition: all 0.3s ease;

    &:hover {
        background: rgba(255, 255, 255, 0.2);
        border-color: rgba(255, 255, 255, 0.5);
        transform: translateY(-2px);
    }
}

.hero-image-section {
    position: relative;

    @media (max-width: 991.98px) {
        text-align: center;
    }
}

.hero-image-wrapper {
    position: relative;
    display: inline-block;
}

.hero-image {
    width: 320px;
    height: 320px;
    object-fit: cover;
    border-radius: 12px;
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
    border: 2px solid rgba(255, 255, 255, 0.1);

    @media (max-width: 575.98px) {
        width: 280px;
        height: 280px;
    }
}

.tech-accent {
    position: absolute;
    top: -10px;
    right: -10px;
    width: 60px;
    height: 60px;
    background: linear-gradient(135deg, #3b82f6, #06b6d4);
    border-radius: 8px;
    opacity: 0.8;

    &::before {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 30px;
        height: 30px;
        background: rgba(255, 255, 255, 0.2);
        border-radius: 4px;
        backdrop-filter: blur(10px);
    }
}

// Mobile responsiveness
@media (max-width: 991.98px) {
    .hero-overlay {
        background: linear-gradient(
            180deg,
            rgba(15, 23, 42, 0.95) 0%,
            rgba(30, 41, 59, 0.85) 50%,
            rgba(51, 65, 85, 0.6) 100%
        );
    }
}

@media (max-width: 575.98px) {
    .hero-content {
        padding: 0 1rem;
    }

    .hero-buttons {
        padding: 0 1rem;
    }
}
</style>
