<template>
    <div class="digital-solutions">
        <!-- Work Process Section -->
        <div class="work-process-section" data-aos="fade-up" data-aos-duration="1000">
            <div class="container-fluid content-section">
                <div class="text-center mb-5" data-aos="fade-up" data-aos-delay="100">
                    <div class="subtitle-label" :style="{ 'rj-label-color': 'red' }">Why Choose us?</div>
                    <h2 class="section-title"> Your trusted partner in anything Legal.</h2>
                </div>

                <!-- Swiper for Mobile -->
                <div class="d-lg-none">
                    <swiper :modules="modules" :slides-per-view="1.2" :space-between="20" :centered-slides="false"
                        :navigation="true" class="process-swiper">
                        <swiper-slide v-for="(step, i) in points" :key="step.id" data-aos="zoom-in"
                            :data-aos-delay="(i * 100)">
                            <div class="process-card" @click="handleCardClick(step)">
                                <div class="step-number">
                                    <div class="step-icon">
                                        <i class="fas fa-play"></i>
                                    </div>
                                    <span class="step-text">{{ i + 1 }} STEP</span>
                                </div>
                                <h4 class="step-title">{{ step.title }}</h4>
                                <p class="step-description">{{ step.description }}</p>
                            </div>
                        </swiper-slide>
                    </swiper>
                </div>

                <!-- Desktop Grid -->
                <div class="d-none d-lg-block">
                    <div class="row g-4 align-items-center">
                        <div class="col-lg-3" v-for="(step, i) in points" :key="step.id" data-aos="zoom-in"
                            :data-aos-delay="(i * 150)" data-aos-duration="800">
                            <div class="process-card" @click="handleCardClick(step)">
                                <div class="step-number">
                                    <div class="step-icon">
                                        <i class="fas fa-play"></i>
                                    </div>
                                    <span class="step-text">{{ i + 1 }} STEP</span>
                                </div>
                                <h4 class="step-title">{{ step.title }}</h4>
                                <p class="step-description">{{ step.description }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- About Us Section -->
        <div class="about-section content-section" data-aos="fade-up" data-aos-duration="1000">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-lg-3" data-aos="fade-right" data-aos-delay="100">
                        <div class="experience-circle">
                            <div class="circle-content">
                                <!-- <i class="fa fa-8x" :class="currentPoint.icon"></i> -->
                                <span v-html="currentPoint.icon" class="fa-8x"></span>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-lg-5" data-aos="fade-up" data-aos-delay="200">
                        <div class="about-content">
                            <h2 class="about-title">{{ currentPoint.title }}</h2>
                            <p class="about-description"
                                v-html="currentPoint.full_description ?? currentPoint.description" />
                            <ul class="features-list">
                                <li v-for="item in currentPoint.features" :key="item">
                                    <i class="fas fa-check-circle text-success"></i>
                                    {{ item }}
                                </li>
                            </ul>
                            <Link class="btn-about" :href="route('about')">About Us More</Link>
                        </div>
                    </div>

                    <div class="col-12 col-lg-4" data-aos="fade-left" data-aos-delay="300">
                        <div class="about-image" v-smooth-resize>
                            <div v-for="(img, index) in points" :key="index" class="fade-image"
                                :class="{ active: img.id === currentPoint.id }"
                                :style="{ backgroundImage: `url(${img.image})` }"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>

<script setup>
import { ref, onMounted, watch } from 'vue'
import { Swiper, SwiperSlide } from 'swiper/vue'
import { Navigation, Pagination } from 'swiper/modules'
import { gsap } from 'gsap'
import 'swiper/css'
import { computed } from 'vue'
import vSmoothResize from '@/Services/smooth-resize'
import { Link, usePage } from '@inertiajs/inertia-vue3';

const modules = [Navigation, Pagination]
const page = usePage();
const settings = page.props.value.dashboard_data.whyChooseUs;
const points = computed(() => {
    return settings.reasons.map((item, index) => {
        return ({
            id: `why-choose-us-point-${index}`,
            title: item.title,
            description: item.description,
            icon: item.icon,
            image: assetUrl(item.image),
            features: item.extra_points,
        })
    })
});


const currentPoint = ref(points.value[0]);
const currentCircleImage = computed(() => currentPoint.value.image);

// animation function
const animateAboutContent = () => {
    gsap.fromTo(
        ".about-title",
        { y: 30, opacity: 0 },
        { y: 0, opacity: 1, duration: 0.6, ease: "power2.out" }
    );

    gsap.fromTo(
        ".about-description",
        { y: 20, opacity: 0 },
        { y: 0, opacity: 1, duration: 0.6, delay: 0.2, ease: "power2.out" }
    );

    gsap.fromTo(
        ".features-list li",
        { x: -20, opacity: 0 },
        { x: 0, opacity: 1, duration: 0.5, stagger: 0.1, delay: 0.3, ease: "power2.out" }
    );

    // gsap.fromTo(
    //     ".about-image img",
    //     { scale: 0.9, opacity: 0 },
    //     { scale: 1, opacity: 1, duration: 0.8, delay: 0.4, ease: "back.out(1.7)" }
    // );

    gsap.fromTo(
        ".experience-circle",
        { rotation: -90, scale: 0.5, opacity: 0 },
        { rotation: 0, scale: 1, opacity: 1, duration: 0.8, ease: "back.out(1.5)" }
    );
};

// re-trigger animation every time currentPoint changes
watch(currentPoint, () => {
    animateAboutContent();
}, { deep: true, immediate: true });

const handleCardClick = (step) => {
    currentPoint.value = step;
}

onMounted(() => {

})


</script>

<style lang="scss" scoped>
// Color variables
$primary-color: #153f83;
$secondary-color: #D4AF37;
$text-dark: #2c3e50;
$text-light: #6c757d;
$card-bg: #f8f9fa;
$white: #ffffff;

// Fonts
.digital-solutions {
    font-family: 'Poppins', sans-serif;

    .work-process-section {
        // padding: 80px 0;
        background: $white;

        .section-subtitle {
            font-size: 14px;
            font-weight: 600;
            color: $primary-color;
            letter-spacing: 2px;
            text-transform: uppercase;
            position: relative;
            display: inline-block;

            &::before,
            &::after {
                content: '';
                position: absolute;
                top: 50%;
                width: 40px;
                height: 2px;
                background: $primary-color;
                transform: translateY(-50%);
            }

            &::before {
                left: -60px;
            }

            &::after {
                right: -60px;
            }
        }

        .section-title {
            font-family: 'Playfair Display', serif;
            font-size: 2.5rem;
            font-weight: 700;
            color: $text-dark;
            margin-top: 1rem;
            margin-bottom: 3rem;
        }
    }

    .process-card {
        background: $card-bg;
        padding: 2rem 1.5rem;
        border-radius: 15px;
        height: 100%;
        transition: all 0.3s ease;
        cursor: pointer;
        border: 2px solid transparent;

        &:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            border-color: $primary-color;
        }

        .step-number {
            display: flex;
            align-items: center;
            margin-bottom: 1.5rem;

            .step-icon {
                width: 40px;
                height: 40px;
                background: $primary-color;
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                margin-right: 15px;

                i {
                    color: $white;
                    font-size: 14px;
                }
            }

            .step-text {
                font-size: 14px;
                font-weight: 600;
                color: $primary-color;
                letter-spacing: 1px;
            }
        }

        .step-title {
            font-size: 1.25rem;
            font-weight: 600;
            color: $text-dark;
            margin-bottom: 1rem;
        }

        .step-description {
            font-size: 14px;
            color: $text-light;
            line-height: 1.6;
            margin: 0;

            display: -webkit-box;
            -webkit-line-clamp: 2; // show only 2 lines
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis; // adds "..." at the end
        }

    }

    .about-section {
        background: $white;

        .experience-circle {
            position: relative;
            width: 300px;
            height: 300px;
            margin: 0 auto;

            .circle-content {
                width: 100%;
                height: 100%;
                background: $primary-color;
                border-radius: 50%;
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                color: $white;
                position: relative;

                .years {
                    font-family: 'Playfair Display', serif;
                    font-size: 4rem;
                    font-weight: 700;
                    line-height: 1;
                }

                .years-text {
                    font-size: 1.5rem;
                    font-weight: 400;
                    margin-top: -10px;
                }

                .experience-text {
                    font-size: 14px;
                    font-weight: 600;
                    letter-spacing: 3px;
                    margin-top: 10px;
                }
            }
        }

        .about-content {
            .section-label {
                font-size: 14px;
                font-weight: 600;
                color: $primary-color;
                letter-spacing: 2px;
                text-transform: uppercase;
                position: relative;
                display: inline-block;
                margin-bottom: 1rem;

                &::before {
                    content: '';
                    position: absolute;
                    left: -60px;
                    top: 50%;
                    width: 40px;
                    height: 2px;
                    background: $primary-color;
                    transform: translateY(-50%);
                }
            }

            .about-title {
                font-family: 'Playfair Display', serif;
                font-size: 2.5rem;
                font-weight: 700;
                color: $text-dark;
                margin-bottom: 1.5rem;
            }

            .about-description {
                font-size: 16px;
                color: $text-light;
                line-height: 1.7;
                margin-bottom: 2rem;

                .highlight {
                    color: $primary-color;
                    font-weight: 600;
                }
            }

            .features-list {
                list-style: none;
                padding: 0;
                margin-bottom: 2rem;

                li {
                    display: flex;
                    align-items: center;
                    // margin-bottom: 1rem;
                    font-size: 16px;
                    color: $text-dark;

                    i {
                        color: $secondary-color;
                        margin-right: 15px;
                        font-size: 18px;
                    }
                }
            }

            .btn-about {
                background: linear-gradient(90deg, $primary-color 0%, lighten($primary-color, 10%));
                color: $white;
                border: none;
                padding: 15px 30px;
                // border-radius: 8px;
                font-weight: 600;
                font-size: 16px;
                transition: all 0.3s ease;
                text-decoration: none;

                &:hover {
                    background: darken($primary-color, 10%);
                    transform: translateY(-2px);
                }
            }
        }

        .about-image {
            position: relative;
            height: 300px;
            width: 100%;
            border-radius: 20px;
            overflow: hidden;
            will-change: transform;
            /* smoother FLIP */
            transform-origin: top left;

            .fade-image {
                position: absolute;
                inset: 0;
                background-size: cover;
                background-position: center;
                opacity: 0;
                transition: opacity 0.8s ease-in-out;
                z-index: 0;
            }

            .fade-image.active {
                opacity: 1;
                z-index: 1;
            }

            @media screen and (max-width :575px) {
                margin-top: 1rem;
            }
        }
    }

    // Swiper customization
    .process-swiper {
        padding: 20px 0;

        .swiper-slide {
            height: auto;
        }
    }

    // Mobile responsiveness
    @media (max-width: 768px) {
        .section-title {
            font-size: 2rem !important;
        }

        .about-title {
            font-size: 2rem !important;
        }

        .experience-circle {
            width: 250px !important;
            height: 250px !important;

            .years {
                font-size: 3rem !important;
            }
        }

        .section-label {

            &::before,
            &::after {
                display: none;
            }
        }

        .about-content .section-label::before {
            display: none;
        }
    }
}
</style>
