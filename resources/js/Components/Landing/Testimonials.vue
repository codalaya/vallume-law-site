<template>
    <section class="testimonials-section">
        <div class="bg-overlay"></div>

        <div class="container">
            <!-- Header -->
            <div class="section-header" data-aos="fade-up">
                <div class="section-subtitle">
                    <span class="line"></span>
                    TESTIMONIAL
                    <span class="line"></span>
                </div>
                <h2 class="section-title">{{  settings.title }}</h2>
            </div>

            <!-- Testimonials Swiper -->
            <div class="testimonials-container" data-aos="fade-up" data-aos-delay="200">
                <div class="swiper testimonials-swiper" ref="swiperRef">
                    <div class="swiper-wrapper">
                        <div v-for="(testimonial, index) in testimonials" :key="index" class="swiper-slide">
                            <div class="testimonial-card">
                                <!-- Desktop Layout -->
                                <div class="desktop-layout">
                                    <div class="left-section">
                                        <div class="quote-container">
                                            <div class="quote-circle">
                                                <svg version="1.1" id="Capa_1" class="quote-mark"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 32 32"
                                                    xml:space="preserve">
                                                    <g>
                                                        <g id="right_x5F_quote">
                                                            <g>
                                                                <path class="path1"
                                                                    d="M0,4v12h8c0,4.41-3.586,8-8,8v4c6.617,0,12-5.383,12-12V4H0z" />
                                                                <path class="path2"
                                                                    d="M20,4v12h8c0,4.41-3.586,8-8,8v4c6.617,0,12-5.383,12-12V4H20z" />
                                                            </g>
                                                        </g>
                                                    </g>
                                                </svg>
                                                <div class="client-avatar">
                                                    <img v-if="testimonial.image" :src="testimonial.image"
                                                        :alt="testimonial.name"
                                                        @error="handleImageError($event, testimonial)">
                                                    <div v-else class="default-avatar">
                                                        {{ getInitials(testimonial.name) }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="right-section">
                                        <div class="stars-rating">
                                            <i v-for="star in testimonial.rating" :key="star" class="fas fa-star"></i>
                                        </div>

                                        <div class="testimonial-text" v-html="testimonial.text">

                                        </div>

                                        <div class="client-info">
                                            <h5>{{ testimonial.name }}</h5>
                                            <p>{{ testimonial.position }}</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Mobile Layout -->
                                <div class="mobile-layout">
                                    <div class="quote-container-mobile">
                                        <div class="quote-circle-mobile">
                                            <div class="quote-mark-mobile">
                                                <svg height="100%" width="100%" version="1.1" id="Capa_1"
                                                    class="quote-mark" xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 32 32"
                                                    xml:space="preserve">
                                                    <g>
                                                        <g id="right_x5F_quote">
                                                            <g>
                                                                <path class="path1"
                                                                    d="M0,4v12h8c0,4.41-3.586,8-8,8v4c6.617,0,12-5.383,12-12V4H0z" />
                                                                <path class="path2"
                                                                    d="M20,4v12h8c0,4.41-3.586,8-8,8v4c6.617,0,12-5.383,12-12V4H20z" />
                                                            </g>
                                                        </g>
                                                    </g>
                                                </svg>
                                            </div>
                                            <div class="client-avatar-mobile">
                                                <img v-if="testimonial.image" :src="testimonial.image"
                                                    :alt="testimonial.name"
                                                    @error="handleImageError($event, testimonial)">
                                                <div v-else class="default-avatar-mobile">
                                                    {{ getInitials(testimonial.name) }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="stars-rating-mobile">
                                        <i v-for="star in testimonial.rating" :key="star" class="fas fa-star"></i>
                                    </div>

                                    <div class="testimonial-text-mobile">
                                        {{ testimonial.text }}
                                    </div>

                                    <div class="client-info-mobile">
                                        <h5>{{ testimonial.name }}</h5>
                                        <p>{{ testimonial.position }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Navigation Arrows -->
                <div class="swiper-navigation">
                    <div class="swiper-button-prev" ref="prevBtn">
                        <i class="fas fa-chevron-left"></i>
                    </div>
                    <div class="swiper-button-next" ref="nextBtn">
                        <i class="fas fa-chevron-right"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script setup>
import { ref, onMounted, onUnmounted, computed, toRaw } from 'vue'
import { Swiper } from 'swiper'
import { Pagination, Navigation } from 'swiper/modules'
import 'swiper/css'
import 'swiper/css/pagination'
import 'swiper/css/navigation'
import { usePage, Link } from '@inertiajs/inertia-vue3'

const page = usePage();
const settings = page.props.value.dashboard_data.testimonialsSection;
const swiperRef = ref(null)
const prevBtn = ref(null)
const nextBtn = ref(null)
const pagination = ref(null)
let swiper = null;


// const testimonials = ref([
//     {
//         name: "John Smith",
//         position: "FAMILY LAWYER",
//         text: "Law is a system of rules and guidelines established by a society or governing authority to regulate behavior, maintain order, and provide justice. It sets standards of conduct that individuals and organizations consequences for non-compliance.",
//         rating: 5,
//         image: "https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-4.0.3&auto=format&fit=crop&w=687&q=80"
//     },

// ])

const testimonials = computed(() => {
    return page.props.value.globalPageData.testimonials?.map((testimonial) => {
        return {
            name: testimonial.name,
            position: testimonial.position,
            text: testimonial.description,
            image: testimonial.image,
            video_path: testimonial.video_path,
        }
    });
})

const getInitials = (name) => {
    if (!name) return 'U'
    return name.split(' ')
        .map(word => word.charAt(0))
        .join('')
        .toUpperCase()
        .substring(0, 2)
}

const handleImageError = (event, testimonial) => {
    event.target.style.display = 'none'
    testimonial.image = ''
}

onMounted(() => {

    // Initialize Swiper
    if (swiperRef.value) {
        swiper = new Swiper(swiperRef.value, {
            modules: [Pagination, Navigation],
            slidesPerView: 1,
            spaceBetween: 0,
            loop: true,
            autoplay: {
                delay: 6000,
                disableOnInteraction: false,
            },
            pagination: {
                el: pagination.value,
                clickable: true,
                bulletClass: 'custom-bullet',
                bulletActiveClass: 'custom-bullet-active',
            },
            navigation: {
                nextEl: nextBtn.value,
                prevEl: prevBtn.value,
            },
        })
    }
})

onUnmounted(() => {
    if (swiper) {
        swiper.destroy(true, true)
    }
})
</script>

<style lang="scss" scoped>
$primary-color: #153f83;
$secondary-color: #D4AF37;
$light-bg: #f8f9fa;
$text-gray: #999999;
$text-dark: #333333;



.testimonials-section {

    padding: 120px 0;
    position: relative;
    z-index: 0;

    .bg-overlay {
        background: url('/images/testimonials-background.jpg') no-repeat center center/cover;
        position: absolute;
        inset: 0;
        z-index: 1;
        opacity: 5%;
    }

    .quote-mark {
        & .path1 {
            fill: lighten($color: $primary-color, $amount: 50%);
        }

        & .path2 {
            fill: lighten($color: $secondary-color, $amount: 20%);
        }
    }

    .container {

        z-index: 2;
        position: relative;
    }

    .section-header {
        text-align: center;
        margin-bottom: 80px;

        .section-subtitle {
            color: $secondary-color;
            font-family: 'Poppins', sans-serif;
            font-size: 14px;
            font-weight: 400;
            letter-spacing: 2px;
            text-transform: uppercase;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 20px;

            .line {
                width: 40px;
                height: 1px;
                background: $secondary-color;
            }
        }

        .section-title {
            font-family: 'Playfair Display', serif;
            font-size: 48px;
            font-weight: 400;
            color: $primary-color;
            margin: 0;
            line-height: 1.2;
        }
    }

    .testimonials-container {
        position: relative;
        // max-width: 900px;
        margin: 0 auto;
    }

    .testimonial-card {
        padding:  0 0 40px0;

        .mobile-layout {
            display: none;
        }

        .desktop-layout {
            display: flex;
            align-items: flex-start;
            gap: 60px;

            .left-section {
                flex-shrink: 0;

                .quote-container {
                    position: relative;

                    .quote-circle {
                        width: 200px;
                        height: 200px;
                        border: 1px solid lighten($color: $secondary-color, $amount: 10%);
                        border-radius: 50%;
                        position: relative;

                        .quote-mark {
                            font-family: 'Playfair Display', serif;
                            font-size: 80px;
                            color: $secondary-color;
                            position: absolute;
                            top: 50%;
                            left: 50%;
                            transform: translate(-50%, -50%);
                            font-weight: 400;
                            height: 50%;
                            width: 50%;
                        }

                        .client-avatar {
                            position: absolute;
                            top: 50%;
                            right: 0;
                            width: 80px;
                            height: 80px;
                            transform: translate(50%, -50%);

                            img {
                                width: 100%;
                                height: 100%;
                                border-radius: 50%;
                                object-fit: cover;
                                box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
                            }

                            .default-avatar {
                                width: 100%;
                                height: 100%;
                                border-radius: 50%;
                                background: linear-gradient(135deg, $primary-color, $secondary-color);
                                display: flex;
                                align-items: center;
                                justify-content: center;
                                color: white;
                                font-size: 24px;
                                font-weight: 600;
                                font-family: 'Poppins', sans-serif;
                                border: 4px solid #ffffff;
                                box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
                            }
                        }
                    }
                }
            }

            .right-section {
                flex: 1;
                padding-top: 20px;

                .stars-rating {
                    margin-bottom: 25px;

                    .fas.fa-star {
                        color: $secondary-color;
                        font-size: 18px;
                        margin-right: 3px;
                    }
                }

                .testimonial-text {
                    font-family: 'Poppins', sans-serif;
                    font-size: 1.5rem;
                    line-height: 1.8;
                    color: $text-gray;
                    font-style: italic;
                    margin-bottom: 40px;
                }

                .client-info {
                    h5 {
                        font-family: 'Playfair Display', serif;
                        font-size: 2rem;
                        font-weight: 400;
                        color: $primary-color;
                        margin: 0 0 8px 0;
                    }

                    p {
                        font-family: 'Poppins', sans-serif;
                        font-size: 1.25rem;
                        font-weight: 400;
                        color: $secondary-color;
                        margin: 0;
                        letter-spacing: 1px;
                        text-transform: uppercase;
                    }
                }
            }
        }
    }

    .swiper-navigation {
        position: absolute;
        right: 0;
        // top: -100px;
        display: flex;
        gap: 0;
        z-index: 10;

        .swiper-button-prev,
        .swiper-button-next {
            position: static;
            width: 50px;
            height: 50px;
            margin: 0;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;

            &::after {
                display: none;
            }

            i {
                font-size: 16px;
            }
        }

        .swiper-button-prev {
            background: $primary-color;

            i {
                color: white;
            }

            &:hover {
                background: darken($primary-color, 10%);
            }
        }

        .swiper-button-next {
            background: $secondary-color;

            i {
                color: white;
            }

            &:hover {
                background: darken($secondary-color, 10%);
            }
        }
    }

    .swiper-pagination {
        position: static;
        margin-top: 50px;
        text-align: center;

        :deep(.custom-bullet) {
            width: 12px;
            height: 12px;
            background: #d0d0d0;
            border-radius: 50%;
            display: inline-block;
            margin: 0 6px;
            cursor: pointer;
            transition: all 0.3s ease;
            opacity: 1;
        }

        :deep(.custom-bullet-active) {
            background: $secondary-color;
            transform: scale(1.2);
        }
    }
}

// Mobile Design
@media (max-width: 768px) {
    .testimonials-section {
        padding: 80px 0;

        .container {
            padding: 0 20px;
        }

        .section-header {
            margin-bottom: 60px;

            .section-subtitle {
                font-size: 12px;
                gap: 15px;

                .line {
                    width: 25px;
                }
            }

            .section-title {
                font-size: 32px;
            }
        }

        .testimonial-card {
            .desktop-layout {
                display: none;
            }

            .mobile-layout {
                display: block;
                text-align: center;

                .quote-container-mobile {
                    margin-bottom: 30px;

                    .quote-circle-mobile {
                        width: 200px;
                        height: 200px;
                        border: 1px solid lighten($color: $secondary-color, $amount: 10%);
                        border-radius: 50%;
                        position: relative;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        margin: 0 auto;

                        .quote-mark-mobile {
                            font-family: 'Playfair Display', serif;
                            font-size: 50px;
                            color: $secondary-color;
                            position: absolute;
                            top: 50%;
                            left: 50%;
                            transform: translate(-50%, -60%);
                            font-weight: 400;
                        }

                        .client-avatar-mobile {
                            position: absolute;
                            top: 50%;
                            right: 0;
                            width: 80px;
                            height: 80px;
                            transform: translate(50%, -50%);

                            img {
                                width: 100%;
                                height: 100%;
                                border-radius: 50%;
                                object-fit: cover;
                                box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
                            }

                            .default-avatar-mobile {
                                width: 100%;
                                height: 100%;
                                border-radius: 50%;
                                background: linear-gradient(135deg, $primary-color, $secondary-color);
                                display: flex;
                                align-items: center;
                                justify-content: center;
                                color: white;
                                font-size: 16px;
                                font-weight: 600;
                                font-family: 'Poppins', sans-serif;
                                border: 3px solid #ffffff;
                                box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
                            }
                        }
                    }
                }

                .stars-rating-mobile {
                    margin-bottom: 20px;

                    .fas.fa-star {
                        color: $secondary-color;
                        font-size: 16px;
                        margin-right: 2px;
                    }
                }

                .testimonial-text-mobile {
                    font-family: 'Poppins', sans-serif;
                    font-size: 14px;
                    line-height: 1.7;
                    color: $text-gray;
                    font-style: italic;
                    margin-bottom: 30px;
                    padding: 0 10px;
                }

                .client-info-mobile {
                    h5 {
                        font-family: 'Playfair Display', serif;
                        font-size: 20px;
                        font-weight: 400;
                        color: $primary-color;
                        margin: 0 0 5px 0;
                    }

                    p {
                        font-family: 'Poppins', sans-serif;
                        font-size: 12px;
                        font-weight: 400;
                        color: $secondary-color;
                        margin: 0;
                        letter-spacing: 1px;
                        text-transform: uppercase;
                    }
                }
            }
        }

        .swiper-navigation {
            display: none;
        }

        .swiper-pagination {
            margin-top: 40px;

            :deep(.custom-bullet) {
                width: 10px;
                height: 10px;
                margin: 0 4px;
            }
        }
    }
}

// Remove default Swiper styles
:deep(.swiper-button-next),
:deep(.swiper-button-prev) {
    display: none;
}

:deep(.swiper-pagination) {
    position: static !important;
}
</style>
