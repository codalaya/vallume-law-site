<template>
    <section class="hero-section" data-aos="fade-up" data-aos-duration="1000">
        <div class="container-fluid content-section">
            <div class="row min-vh-100 g-0 align-items-center">
                <!-- Left Content -->
                <div class="col-lg-7 col-md-12">
                    <div class="hero-content">
                        <!-- About Us Badge -->
                        <div class="about-badge" data-aos="fade-down" data-aos-delay="100">
                            <span class="star">✦</span>
                            {{ settings.subtitle }}
                            <span class="star">✦</span>
                        </div>

                        <!-- Main Heading -->
                        <div class="hero-title" data-aos="fade-up" data-aos-delay="200" v-html="settings.title"></div>

                        <!-- Features Section -->
                        <section class="features-section">
                            <div class="row g-0 pt-4 pt-lg-5">
                                <!-- Industry-Focused Innovation -->
                                <div class="col-lg-6 col-md-12" data-aos="fade-right" data-aos-delay="300">
                                    <div class="feature-card left-card">
                                        <div class="feature-title-wrapper">
                                            <div class="feature-icon industry-icon fa-2x"
                                                v-html="settings.point_1_icon">

                                            </div>
                                            <h3 class="feature-title">{{ settings.point_1_title }}</h3>
                                        </div>
                                        <div class="feature-content">
                                            <p class="feature-description">
                                                {{ settings.point_1_description }}
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Human-Centered AI Approach -->
                                <div class="col-lg-6 col-md-12" data-aos="fade-left" data-aos-delay="400">
                                    <div class="feature-card right-card">
                                        <div class="feature-title-wrapper">
                                            <div class="feature-icon human-icon fa-2x" v-html="settings.point_2_icon">
                                            </div>
                                            <h3 class="feature-title">{{ settings.point_2_title }}</h3>
                                        </div>
                                        <div class="feature-content">
                                            <p class="feature-description">
                                                {{ settings.point_2_description }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>

                        <!-- CTA Section -->
                        <div class="cta-section" data-aos="fade-up" data-aos-delay="500">
                            <p class="cta-text font-header">
                                {{ settings.message }}
                            </p>
                            <div>
                                <a href="#pre-registration-form" class="register-btn" @click="handleRegister"
                                    data-aos="zoom-in" data-aos-delay="600">
                                    <span class="btn-text">Register for Early Access</span>
                                    <span class="btn-arrow">→</span>
                                </a>
                                <Link :href="route('about')" class="cta-button ms-md-4" data-aos="zoom-in"
                                    data-aos-delay="700">
                                More About Us
                                </Link>
                            </div>
                            <p class="launch-info" data-aos="fade-in" data-aos-delay="800">
                                <span class="pulse-dot"></span>
                                {{ settings.launch_description }}
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Right Video Section -->
                <div class="col-lg-5 col-md-12" data-aos="zoom-in" data-aos-delay="300" data-aos-duration="1200">
                    <div class="video-section">
                        <div class="video-card">
                            <div class="video-container">
                                <video class="hero-video" autoplay muted loop playsinline ref="video">
                                    <source src="/images/gpt-launch.mp4" type="video/mp4" />
                                    Your browser does not support the video tag.
                                </video>
                                <div class="video-overlay"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <gpt-launch-floaties />
    </section>

</template>

<script setup>
import { ref, onMounted, computed } from 'vue'
import GptLaunchFloaties from './GptLaunchFloaties.vue'
const video = ref(null)
import { usePage, Link } from '@inertiajs/inertia-vue3'
const page = usePage();
const settings = page.props.value.dashboard_data.gptHeroSection;

onMounted(() => {
    if (video.value) {
        video.value.play().catch(e => console.log('Video autoplay prevented:', e))
    }
})
</script>

<style lang="scss" scoped>
// Import fonts

$primary-color: #153f83;
$secondary-color: #D4AF37;
$black-color: #0a0a0a;
// Variables
$dark-bg: $primary-color;
$text-primary: #ffffff;
$text-muted: #94a3b8;
$text-secondary: rgba(255, 255, 255, 0.7);
$industry-color: #ff6b35;
$human-color: #4a90e2;
$border-color: rgba(255, 255, 255, 0.1);

.hero-section {
    background: linear-gradient(135deg, $primary-color, $black-color);
    min-height: 100vh;
    color: #FFFFFF;
    padding: 2rem 0;
    position: relative;
    overflow: hidden;

    @media (max-width: 991px) {
        padding: 1rem 0;
    }
}

.hero-content {
    //   padding: 3rem 4rem;
    //   max-width: 600px;
    z-index: 1;
    position: relative;

    @media (max-width: 1199px) {
        // padding: 2rem 3rem;
    }

    @media (max-width: 991px) {
        // padding: 2rem;
        max-width: 100%;
        text-align: left;
    }

    @media (max-width: 767px) {
        // padding: 1.5rem;
    }
}

.about-badge {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    background: rgba(255, 255, 255, 0.05);
    border: 1px solid rgba(255, 255, 255, 0.1);
    padding: 0.5rem 1rem;
    border-radius: 25px;
    font-family: 'Inter', sans-serif;
    font-size: 0.75rem;
    font-weight: 500;
    letter-spacing: 0.5px;
    color: rgba(255, 255, 255, 0.8);
    margin-bottom: 2rem;
    text-transform: uppercase;

    .star {
        color: #D4AF37;
        font-size: 0.8rem;
    }

    @media (max-width: 767px) {
        font-size: 0.7rem;
        padding: 0.4rem 0.8rem;
    }
}

.hero-title {
    font-family: 'Inter', sans-serif;
    font-size: 3.5rem;
    font-weight: 700;
    line-height: 1.1;
    margin-bottom: 3rem;
    color: #FFFFFF;

    @media (max-width: 1199px) {
        font-size: 3rem;
    }

    @media (max-width: 991px) {
        font-size: 2.5rem;
        margin-bottom: 2.5rem;
    }

    @media (max-width: 767px) {
        font-size: 2rem;
        margin-bottom: 2rem;
    }

    .cube-icon {
        color: #4A90E2;
        margin: 0 0.3rem;
    }

    .gradient-text {
        background: linear-gradient(135deg, #FF6B35 0%, #D4AF37 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }
}


.features-section {
    border-top: 1px solid $border-color;
}

.feature-card {
    height: 100%;
    display: flex;
    flex-direction: column;
    // gap: 2rem;
    position: relative;

    @media (max-width: 991px) {
        padding: 2.5rem 2rem;
        text-align: center;
    }

    @media (max-width: 767px) {
        padding: 2rem 1.5rem;
    }

    // Border separator
    &.left-card {
        padding: 0 3rem 0 0;
        border-right: 1px solid $border-color;

        @media (max-width: 991px) {
            border-right: none;
            border-bottom: 1px solid $border-color;
            padding: 1rem 0rem;
        }

    }

    &.right-card {
        padding: 0 0 0 3rem;

        @media (max-width: 991px) {
            border-bottom: none;
            padding: 1rem 0rem;
        }
    }
}

.feature-title-wrapper {
    display: flex;
    align-items: flex-start;
    text-align: start;

    @media (max-width: 991px) {
        justify-content: center;
        margin-bottom: 1rem;
    }
}

.feature-icon {
    width: 56px;
    height: 56px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;

    &.industry-icon {
        background: rgba($industry-color, 0.1);
        border: 2px solid rgba($industry-color, 0.3);
        color: $industry-color;
    }

    &.human-icon {
        background: rgba($human-color, 0.1);
        border: 2px solid rgba($human-color, 0.3);
        color: $human-color;
    }

    svg {
        width: 24px;
        height: 24px;
    }
}

.feature-content {
    flex: 1;
}

.feature-title {
    font-family: 'Inter', sans-serif;
    font-size: 1.5rem;
    font-weight: 600;
    color: $text-primary;
    margin-bottom: 1rem;
    line-height: 1.3;
    margin-left: 1.5rem;

    @media (max-width: 1199px) {
        font-size: 1.375rem;
    }

    @media (max-width: 767px) {
        font-size: 1.25rem;
        margin-bottom: 0;
    }
}

.feature-description {
    font-family: 'Inter', sans-serif;
    font-size: 1rem;
    font-weight: 400;
    color: $text-secondary;
    line-height: 1.6;
    margin: 0;
    text-align: start;

    @media (max-width: 767px) {
        font-size: 0.95rem;
    }
}

// Responsive adjustments
@media (max-width: 991px) {
    .row {
        flex-direction: column;
    }
}

.cta-button {
    margin-top: 2rem;
    background: transparent;
    border: 2px solid #D4AF37; // golden outline instead of solid fill
    padding: 18px 40px;
    border-radius: 25px;
    font-family: 'Inter', sans-serif;
    font-size: 1rem;
    font-weight: 500;
    color: #D4AF37; // gold text
    cursor: pointer;
    transition: all 0.3s ease;

    &:hover {
        background: linear-gradient(135deg, #B8860B 0%, #D4AF37 100%);
        color: #000; // switch to black text when filled
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(212, 175, 55, 0.25);
    }

    @media (max-width: 767px) {
        padding: 0.8rem 1.5rem;
        font-size: 0.9rem;
    }
}


.cta-section {
    text-align: center;
    margin-top: 2rem;


    .cta-text {
        font-size: 1.25rem;
        color: $text-muted;
        margin-bottom: 25px;
    }
}

.register-btn {
    background: linear-gradient(135deg, $secondary-color, darken($secondary-color, 10%));
    color: $dark-bg;
    border: none;
    padding: 18px 40px;
    font-size: 1.1rem;
    font-weight: 600;
    border-radius: 50px;
    display: inline-flex;
    align-items: center;
    gap: 10px;
    transition: all 0.3s ease;
    box-shadow: 0 8px 30px rgba($secondary-color, 0.4);
    position: relative;
    overflow: hidden;

    &::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
        transition: left 0.5s;
    }

    &:hover {
        transform: translateY(-3px);
        box-shadow: 0 15px 40px rgba($secondary-color, 0.5);

        &::before {
            left: 100%;
        }

        .btn-arrow {
            transform: translateX(5px);
        }
    }

    .btn-arrow {
        transition: transform 0.3s ease;
        font-size: 1.2rem;
    }
}

.launch-info {
    margin-top: 20px;
    font-size: 0.9rem;
    color: $text-muted;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;

    .pulse-dot {
        width: 8px;
        height: 8px;
        background: $secondary-color;
        border-radius: 50%;
        animation: pulse 1.5s infinite;
        box-shadow: 0 0 10px rgba($secondary-color, 0.5);
    }
}


.video-section {
    // padding: 2rem;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: end;
    z-index: 1;
    position: relative;

    @media (max-width: 991px) {
        padding: 1rem;
        margin-top: 2rem;
    }

    @media (max-width: 575px) {
        justify-content: center;
    }

}

.video-card {
    position: relative;
    max-width: 450px;
    width: 100%;
}

.top-badge {
    background: linear-gradient(135deg, #E91E63 0%, #9C27B0 50%, #673AB7 100%);
    padding: 1rem 1.25rem;
    border-radius: 15px 15px 0 0;
    font-family: 'Inter', sans-serif;
    font-size: 0.9rem;
    font-weight: 500;
    color: #FFFFFF;
    text-align: left;

    @media (max-width: 767px) {
        font-size: 0.8rem;
        padding: 0.8rem 1rem;
    }
}

.simplified-badge {
    position: absolute;
    top: 1rem;
    right: 1rem;
    background: rgba(0, 0, 0, 0.7);
    backdrop-filter: blur(10px);
    padding: 0.5rem 1rem;
    border-radius: 20px;
    font-family: 'Inter', sans-serif;
    font-size: 0.8rem;
    font-weight: 500;
    color: #FFFFFF;
    display: flex;
    align-items: center;
    gap: 0.5rem;
    z-index: 2;

    .lightning-icon {
        color: #FFD700;
        font-size: 0.9rem;
    }

    @media (max-width: 767px) {
        font-size: 0.75rem;
        padding: 0.4rem 0.8rem;
    }
}

.video-container {
    position: relative;
    //   aspect-ratio: 16 / 10;
    overflow: hidden;
    border-radius: 15px 15px;
    background: #000000;
}

.hero-video {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
}

.video-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(135deg,
            rgba(233, 30, 99, 0.2) 0%,
            rgba(156, 39, 176, 0.2) 30%,
            rgba(103, 58, 183, 0.2) 60%,
            rgba(63, 81, 181, 0.2) 100%);
    pointer-events: none;
}

// Mobile responsive
@media (max-width: 991px) {
    .row {
        flex-direction: column;
    }

    .hero-content {
        order: 1;
    }

    .video-section {
        order: 2;
    }
}
</style>
