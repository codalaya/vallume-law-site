<template>
    <section class="about-section content-section container-fluid">
        <div class="row g-0">
            <!-- Left Side - Gradient Background with Stats -->
            <div class="col-lg-5 position-relative" data-aos="fade-right" data-aos-duration="1200">
                <div class="px-md-5 py-md-4 h-100 w-100">
                    <!-- Background Pattern -->
                    <div class="gradient-section" data-aos="fade-in" data-aos-delay="200"></div>
                    <div class="pattern-left" data-aos="fade-in" data-aos-delay="400"></div>

                    <div class="content-wrapper text-white text-center w-100 px-1">
                        <!-- Professional Image -->
                        <div class="about-image-container mt-lg-5 mt-1 mt-md-3 mt-sm-2 w-100" data-aos="zoom-in"
                            data-aos-delay="600">
                            <div class="image-wrapper">
                                <img src="/images/ai-lawyer.jpg" alt="Professional Lawyer" class="professional-image" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Side - Content -->
            <div class="col-lg-7 content d-flex align-items-center mt-5 mt-md-0" data-aos="fade-left"
                data-aos-duration="1200">
                <div class="content-wrapper w-100 px-md-5 pt-md-5">
                    <!-- Section Header -->
                    <div class="section-header mb-4">
                        <p class="section-subtitle poppins text-secondary" data-aos="fade-up" data-aos-delay="200">
                            {{  settings.subtitle }}
                        </p>
                        <h2 class="section-title playfair" data-aos="fade-up" data-aos-delay="400" v-html="settings.title">

                        </h2>
                        <p class="section-description poppins text-muted" data-aos="fade-up" data-aos-delay="600" v-html="settings.description">

                        </p>
                    </div>

                    <!-- Services Grid -->
                    <div class="services-grid mb-4 mt-5">
                        <div class="row g-4">
                            <div class="col-md-6" data-aos="zoom-in" data-aos-delay="200">
                                <div class="service-item">
                                    <div class="service-icon">
                                        <i class="fas fa-balance-scale"></i>
                                    </div>
                                    <div class="service-content">
                                        <h5 class="service-title poppins">{{ settings.list_1_title }}</h5>
                                        <p class="service-description poppins" v-html="settings.list_1_description">
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6" data-aos="zoom-in" data-aos-delay="400">
                                <div class="service-item">
                                    <div class="service-icon">
                                        <i class="fas fa-handshake"></i>
                                    </div>
                                    <div class="service-content">
                                        <h5 class="service-title poppins">{{ settings.list_2_title }}</h5>
                                        <p class="service-description poppins" v-html="settings.list_2_description">

                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6" data-aos="zoom-in" data-aos-delay="600">
                                <div class="service-item">
                                    <div class="service-icon">
                                        <i class="fas fa-shield-alt"></i>
                                    </div>
                                    <div class="service-content">
                                        <h5 class="service-title poppins">{{ settings.list_3_title }}</h5>
                                        <p class="service-description poppins" v-html="settings.list_3_description">

                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6" data-aos="zoom-in" data-aos-delay="800">
                                <div class="service-item">
                                    <div class="service-icon">
                                        <i class="fas fa-file-contract"></i>
                                    </div>
                                    <div class="service-content">
                                        <h5 class="service-title poppins">{{ settings.list_4_title }}</h5>
                                        <p class="service-description poppins" v-html="settings.list_4_description">

                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- CTA Button -->
                    <div class="cta-section mt-5" data-aos="fade-up" data-aos-delay="1000">
                        <button class="btn-custom poppins">
                            Contact Us
                            <i class="fas fa-arrow-right ms-2"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

</template>

<script setup>
import { usePage } from '@inertiajs/inertia-vue3';
import { ref, onMounted, nextTick } from 'vue'
const page = usePage();
const settings = page.props.value.dashboard_data.serviceDetailsSection || {};
const animatedPercentage = ref(0)

onMounted(async () => {
    await nextTick()
})
</script>

<style lang="scss" scoped>
// Color variables
$primary-color: #153f83;
$secondary-color: #D4AF37;
$gradient-start: #00d4ff;
$gradient-end: #5937a7;
$text-dark: #2d3748;
$text-muted: #718096;

.about-section {
    position: relative;
    overflow: hidden;
}

// Left Gradient Section
.gradient-section {
    background: linear-gradient(135deg, $primary-color 0%, lighten($primary-color, 40%) 100%);
    position: absolute;
    border-top-left-radius: 5rem;
    border-bottom-right-radius: 5rem;
    width: 100%;
    height: 300px;
    top: 0;
    left: 0;
}

// Background Patterns
.pattern-left {
    position: absolute;
    z-index: -1;
    left: 0;
    top: 50%;
    border-radius: 5rem;
    transform: translateY(-50%);
    width: 100%;
    height: 100%;
    background: url('/images/dot.svg') no-repeat center center/cover;
}

.pattern-right {
    position: absolute;
    right: 0;
    top: 20%;
    width: 150px;
    height: 100%;
    background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" ><defs><pattern id="dots" width="30" height="30" patternUnits="userSpaceOnUse"><circle cx="15" cy="15" r="2" fill="#D4AF37"/></pattern></defs><rect width="100%" height="100%" fill="url(%23dots)"/></svg>') repeat;
}


.content-wrapper {
    z-index: 2;
    position: relative;
}

.about-image-container {
    .image-wrapper {
        position: relative;
        width: 100%;
        // height: 100%;
        margin: 0 0 0 auto;

        .professional-image {
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            display: block;
            margin-left: auto;
            object-fit: cover;
            border-radius: 20px;
            // position: absolute;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
            transition: transform 0.3s ease;
            max-height: 600px;

            &:hover {
                transform: scale(1.05);
            }
        }

        // .image-overlay {
        //     position: absolute;
        //     top: 0;
        //     left: 0;
        //     right: 0;
        //     bottom: 0;
        //     background: linear-gradient(45deg, rgba($primary-color, 0.2) 0%, rgba($secondary-color, 0.2) 100%);
        //     border-radius: 20px;
        //     pointer-events: none;
        //     &:hover {
        //         transform: scale(1.05);
        //     }
        // }
    }
}

// Right Content Section
.content {
    background: #ffffff;
    // min-height: 100vh;

    .section-header {
        .section-subtitle {
            color: $primary-color;
            font-size: 0.9rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 0.5rem;
        }

        .section-title {
            font-size: 2.5rem;
            font-weight: 700;
            color: $text-dark;
            line-height: 1.2;
            margin-bottom: 1.5rem;
        }

        .section-description {
            font-size: 1.1rem;
            line-height: 1.7;
            color: $text-muted;
        }
    }

    .services-grid {

        .service-item {
            display: flex;
            align-items: flex-start;
            // padding: 1.5rem;
            border-radius: 15px;
            transition: all 0.3s ease;
            height: 100%;

            &:hover {
                // transform: translateY(-5px);
                // box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);

                .service-icon {
                    background: linear-gradient(135deg, $primary-color 0%, lighten($primary-color, 30%) 100%);
                    color: white;
                    transform: scale(1.1);
                }
            }

            .service-icon {
                width: 50px;
                height: 50px;
                background: linear-gradient(135deg, rgba($primary-color, 0.1) 0%, rgba($secondary-color, 0.1) 100%);
                border-radius: 12px;
                display: flex;
                align-items: center;
                justify-content: center;
                margin-right: 1rem;
                transition: all 0.3s ease;
                color: $primary-color;
                flex-shrink: 0;

                i {
                    font-size: 1.3rem;
                }
            }

            .service-content {
                .service-title {
                    font-size: 1.1rem;
                    font-weight: 600;
                    color: $text-dark;
                    margin-bottom: 0.5rem;
                }

                .service-description {
                    font-size: 0.9rem;
                    color: $text-muted;
                    line-height: 1.5;
                    margin-bottom: 0;
                }
            }
        }
    }

    .cta-section {
        .btn-custom {
            background: linear-gradient(135deg, $primary-color 0%, lighten($primary-color, 10%) 100%);
            color: white;
            border: none;
            padding: 1rem 2.5rem;
            font-size: 1rem;
            font-weight: 600;
            // border-radius: 50px;
            transition: all 0.3s ease;
            box-shadow: 0 8px 25px rgba($primary-color, 0.3);

            &:hover {
                transform: translateY(-2px);
                box-shadow: 0 12px 35px rgba($primary-color, 0.4);
            }

            &:active {
                transform: translateY(0);
            }
        }
    }
}

// Font classes
.playfair {
    font-family: 'Playfair Display', serif;
}

.poppins {
    font-family: 'Poppins', sans-serif;
}

// Responsive Design
@media (max-width: 992px) {
    .gradient-section {
        min-height: auto;
        padding: 4rem 0;
    }

    .stat-container .stat-number {
        font-size: 4rem;
    }

    .about-image-container .image-wrapper .professional-image {
        height: 300px;
    }

    .content {
        min-height: auto;

        .section-header .section-title {
            font-size: 2rem;
        }
    }
}

@media (max-width: 768px) {
    .gradient-section .stat-container .stat-number {
        font-size: 3.5rem;
    }

    .content {
        .section-header .section-title {
            font-size: 1.8rem;
        }

        .services-grid .service-item {
            padding: 1.2rem;
        }
    }
}

@media (max-width: 576px) {
    .gradient-section {
        padding: 1rem 0;
        border-top-left-radius: 50px;
        border-bottom-right-radius: 50px;
    }

    .stat-container .stat-number {
        font-size: 3rem;
    }

    .about-image-container .image-wrapper .professional-image {
        height: 360px;
    }

    .content .section-header .section-title {
        font-size: 1.6rem;
    }
}
</style>
