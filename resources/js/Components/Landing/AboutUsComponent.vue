<template>
    <div>
        <section class="about-section" data-aos="fade-up" data-aos-duration="1000">
            <div class="container-fluid content-section">
                <div class="row">
                    <!-- Left Content -->
                    <div class="col-lg-8 mb-5 mb-lg-0" data-aos="fade-right" data-aos-duration="1000"
                        data-aos-delay="200">
                        <div class="about-content">
                            <div class="d-flex">
                                <p class="company-tag" data-aos="fade-up" data-aos-delay="300">
                                    ABOUT COMPANY
                                </p>
                            </div>
                            <h1 class="about-title" data-aos="fade-up" data-aos-delay="400">
                                {{ setting.title }}
                            </h1>
                            <p class="about-description" data-aos="fade-up" data-aos-delay="500">
                                {{ setting.description }}
                            </p>
                        </div>

                        <!-- Primary Image with Video Icon -->
                        <div class="primary-image-container" data-aos="zoom-in" data-aos-delay="600">
                            <img :src="assetUrl(setting.primary_image)" alt="Business professionals working"
                                class="img-fluid rounded primary-image" />
                            <!-- Pulsating Video Icon -->
                            <div class="video-play-btn" @click="showVideoPlayer = true" data-aos="zoom-in"
                                data-aos-delay="700">
                                <div class="pulse-ring"></div>
                                <div class="pulse-ring pulse-ring-2"></div>
                                <i class="fas fa-play"></i>
                            </div>
                        </div>
                    </div>

                    <!-- Right Content -->
                    <div class="col-lg-4" data-aos="fade-left" data-aos-duration="1000" data-aos-delay="300">
                        <Link :href="route('about')" class="btn btn-primary learn-more-btn" data-aos="fade-up"
                            data-aos-delay="400">
                        LEARN MORE
                        <i class="fas fa-arrow-right ms-2"></i>
                        </Link>

                        <div class="about-images-wrapper" data-aos="zoom-in" data-aos-delay="500">
                            <!-- Secondary Image with Stats -->
                            <div class="secondary-image-container">
                                <img :src="assetUrl(setting.secondary_image)" alt="Team collaboration"
                                    class="img-fluid rounded secondary-image" data-aos="fade-up" data-aos-delay="600" />

                                <!-- Rotating Contact Button -->
                                <div class="rotating-btn">
                                    <div class="rotating-circle">
                                        <svg viewBox="0 0 100 100" class="rotating-text">
                                            <path id="circle-path"
                                                d="M 50,50 m -30,0 a 30,30 0 1,1 60,0 a 30,30 0 1,1 -60,0"
                                                fill="none" />
                                            <text fill="currentColor">
                                                <textPath href="#circle-path" startOffset="0%">
                                                    • CONTACT US • CONTACT US • GROWTH • SUCCESS
                                                </textPath>
                                            </text>
                                        </svg>
                                    </div>
                                </div>

                                <a href="#contact-us" class="center-icon">
                                    <i class="fas fa-phone"></i>
                                </a>
                            </div>

                            <!-- Stats Boxes -->
                            <div class="stats-grid" data-aos="fade-up" data-aos-delay="900">
                                <div class="stat-box" v-for="(stat, index) in stats" :key="index">
                                    <div class="stat-number">{{ stat.number }}</div>
                                    <div class="stat-label">{{ stat.label }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <VideoPlayer :url="setting.about_us_video" :show="showVideoPlayer" @close="showVideoPlayer = false" />
    </div>
</template>


<script setup>
import { usePage } from '@inertiajs/inertia-vue3';
import { computed } from 'vue';
import { ref } from 'vue';
import VideoPlayer from './VideoPlayer.vue';
import { Link } from '@inertiajs/inertia-vue3';


const showVideoPlayer = ref(false);
const page = usePage();
const setting = page.props.value.dashboard_data.aboutUsSection || {};
const assetUrl = window.assetUrl;
const stats = computed(() => {
    return page.props.value.dashboard_data.aboutUsSection.quick_stats.map((item) => {
        return { label: item.title, number: item.number }
    }) || [
            { number: '150+', label: 'Projects Completed' },
            { number: '100%', label: 'Client Satisfaction' },
            { number: '50+', label: 'Expert Team Members' },
            { number: '10+', label: 'Years of Experience' },
        ];
})

const playVideo = () => {
    // Video play functionality
    console.log('Playing video...')
}

const contactUs = () => {
    // Contact us functionality
    console.log('Contact us clicked...')
}


</script>

<style lang="scss" scoped>
// Variables
$primary-color: #153f83;
$secondary-color: #D4AF37;
$white: #ffffff;
$gray-100: #f8f9fa;
$gray-600: #6c757d;
$gray-800: #343a40;

// Fonts

.about-section {
    min-height: 100vh;
    display: flex;
    position: relative;
    align-items: center;
    z-index: 0;

    .bg-overlay {
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        position: absolute;
        inset: 0;
        opacity: 0.2;
        z-index: 0;
    }

    >* {
        position: relative;
        z-index: 1;
    }
}


.about-content {
    .company-tag {
        font-family: 'Poppins', sans-serif;
        font-size: 0.875rem;
        font-weight: 500;
        color: $gray-600;
        letter-spacing: 1px;
        margin-bottom: 1rem;
        text-transform: uppercase;
        background-color: white;
        padding-inline: 0.68rem;
        padding-block: 0.2rem;
        // border-radius: 50%;
    }

    .about-title {
        font-family: 'Playfair Display', serif;
        font-size: 3.5rem;
        font-weight: 600;
        color: $primary-color;
        line-height: 1.2;
        margin-bottom: 1.5rem;

        @media (max-width: 768px) {
            font-size: 2.5rem;
        }
    }

    .about-description {
        font-family: 'Poppins', sans-serif;
        font-size: 1.1rem;
        color: $gray-600;
        line-height: 1.6;
        margin-bottom: 2rem;
    }

}

.learn-more-btn {
    font-family: 'Poppins', sans-serif;
    font-weight: 600;
    font-size: 0.875rem;
    letter-spacing: 1px;
    padding: 1rem 2rem;
    background: $primary-color;
    border: none;
    // border-radius: 50px;
    color: $white;
    text-transform: uppercase;
    transition: all 0.3s ease;

    &:hover {
        background: darken($primary-color, 10%);
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba($primary-color, 0.3);
    }

    i {
        transition: transform 0.3s ease;
    }

    &:hover i {
        transform: translateX(5px);
    }
}

.primary-image-container {
    position: relative;
    margin-block: 2rem;

    .primary-image {
        width: 100%;
        height: 400px !important;
        object-fit: cover;
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);

        @media screen and (max-width: 575px) {
            height: 300px !important;
        }
    }

    .video-play-btn {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 80px;
        height: 80px;
        background: $white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
        transition: all 0.3s ease;

        &:hover {
            transform: translate(-50%, -50%) scale(1.1);
        }

        i {
            font-size: 1.5rem;
            color: $primary-color;
            margin-left: 3px;
        }

        .pulse-ring {
            position: absolute;
            width: 100%;
            height: 100%;
            border: 3px solid $secondary-color;
            border-radius: 50%;
            animation: pulse 2s infinite;
            opacity: 0.6;

            &.pulse-ring-2 {
                animation-delay: 1s;
            }
        }
    }
}

.stats-grid {
    // position: absolute;
    // bottom: -30px;
    // right: 20px;
    display: grid;
    margin-top: 2rem;
    grid-template-columns: repeat(2, 1fr);
    gap: 15px;
    z-index: 10;

    .stat-box {
        background: $white;
        padding: 20px 15px;
        border-radius: 10px;
        text-align: center;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
        min-width: 80px;

        &:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
        }

        .stat-number {
            font-family: 'Playfair Display', serif;
            font-size: 3rem;
            font-weight: 700;
            color: $primary-color;
            line-height: 1;
            text-align: left;
        }

        .stat-label {
            font-family: 'Poppins', sans-serif;
            font-size: 1.25rem;
            color: black;
            margin-top: 5px;
            font-weight: 500;
            text-align: left;
        }
    }
}


.about-images-wrapper {
    position: relative;


    .secondary-image-container {
        margin-top: 2rem;
        position: relative;

        .secondary-image {
            width: 100%;
            height: 250px;
            object-fit: cover;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
        }

        .contact-btn-wrapper {
            position: absolute;
            top: 20px;
            right: 20px;

            .contact-btn {
                position: relative;
                padding: 12px 24px;
                background: transparent;
                border: 2px solid $white;
                border-radius: 30px;
                color: $white;
                font-family: 'Poppins', sans-serif;
                font-weight: 600;
                font-size: 0.875rem;
                cursor: pointer;
                overflow: hidden;
                transition: all 0.3s ease;

                .contact-btn-text {
                    position: relative;
                    z-index: 2;
                    transition: color 0.3s ease;
                }

                .contact-btn-bg {
                    position: absolute;
                    top: 0;
                    left: -100%;
                    width: 100%;
                    height: 100%;
                    background: linear-gradient(45deg, $secondary-color, lighten($secondary-color, 10%));
                    transition: left 0.3s ease;
                    z-index: 1;
                }

                &:hover {
                    transform: translateY(-2px);
                    box-shadow: 0 8px 25px rgba($secondary-color, 0.3);

                    .contact-btn-bg {
                        left: 0;
                    }

                    .contact-btn-text {
                        color: $primary-color;
                    }
                }
            }
        }

    }
}


.rotating-btn {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 150px;
    height: 150px;
}

.center-icon {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 50px;
    height: 50px;
    background: $secondary-color;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 18px;
    box-shadow: 0 8px 25px rgba($secondary-color, 0.3);
    transition: all 0.3s ease;
    text-decoration: none;
    cursor: pointer;

    &:hover {
        transform: translate(-50%, -50%) scale(1.1);
        box-shadow: 0 12px 35px rgba($secondary-color, 0.4);
    }
}

.rotating-circle {
    width: 100%;
    height: 100%;
    position: relative;
    animation: rotate 20s linear infinite;

    svg {
        width: 100%;
        height: 100%;
        background: linear-gradient(135deg, $primary-color, red);
        border-radius: 50%;
        color: white;
    }

    .rotating-text {
        font-size: 0.80rem;
        font-family: 'Poppins', sans-serif;
        font-weight: 500;
    }


}



// Animations
@keyframes pulse {
    0% {
        transform: scale(1);
        opacity: 0.6;
    }

    50% {
        transform: scale(1.2);
        opacity: 0.3;
    }

    100% {
        transform: scale(1.4);
        opacity: 0;
    }
}

// Responsive Design
@media (max-width: 992px) {
    .about-images-wrapper {
        .secondary-image-container .stats-grid {
            position: static;
            margin-top: 20px;
            grid-template-columns: repeat(4, 1fr);
        }
    }
}

@media (max-width: 576px) {
    .about-images-wrapper {
        .secondary-image-container {
            .contact-btn-wrapper {
                top: 10px;
                right: 10px;

                .contact-btn {
                    padding: 10px 20px;
                    font-size: 0.8rem;
                }
            }

            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 10px;

                .stat-box {
                    padding: 15px 10px;
                    min-width: 70px;

                    .stat-number {
                        font-size: 1.25rem;
                    }

                    .stat-label {
                        font-size: 0.7rem;
                    }
                }
            }
        }
    }
}
</style>
