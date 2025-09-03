<template>
    <app-layout>
        <div class="services-landing">
            <!-- Hero Section -->
            <section class="hero-section py-5">
                <div class="container">
                    <div class="row justify-content-center text-center">
                        <div class="col-lg-8">
                            <h1 class="hero-title mb-4">Comprehensive Legal Solutions</h1>
                            <p class="hero-subtitle mb-5">
                                Professional legal services tailored to meet your business and personal needs.
                                Explore our range of specialized services designed to provide you with expert guidance
                                and support.
                            </p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Services Grid -->
            <section class="services-section py-5">
                <div class="container">
                    <div class="row g-4">
                        <div v-for="service in services" :key="service.id" class="col-lg-4 col-md-6">
                            <div class="service-card h-100" @click="navigateToService(service.route)" role="button"
                                tabindex="0" @keydown.enter="navigateToService(service.route)"
                                @keydown.space.prevent="navigateToService(service.route)">
                                <div class="card-body p-4">
                                    <div class="service-icon mb-3">
                                        <i :class="service.icon"></i>
                                    </div>
                                    <h3 class="service-title mb-3">{{ service.title }}</h3>
                                    <p class="service-description">{{ service.description }}</p>
                                    <div class="service-arrow">
                                        <i class="fas fa-arrow-right"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Call to Action -->
            <section class="cta-section py-5">
                <div class="container">
                    <div class="row justify-content-center text-center">
                        <div class="col-lg-8">
                            <h2 class="cta-title mb-4">Ready to Get Started?</h2>
                            <p class="cta-description mb-4">
                                Contact our expert legal team today to discuss how we can assist you with your specific
                                needs.
                            </p>
                            <button class="btn btn-primary btn-lg px-5">
                                Get Consultation
                            </button>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </app-layout>

</template>
<script setup>
import { ref } from 'vue'
import { Inertia } from '@inertiajs/inertia'
import AppLayout from "@/Layouts/AppLayout.vue";

const services = ref([
    {
        id: 1,
        title: 'Legal Advisory',
        description: 'Expert legal consultation and strategic advice for businesses and individuals. Get professional guidance on complex legal matters.',
        icon: 'fas fa-balance-scale',
        route: '/services/legal-advisory'
    },
    {
        id: 2,
        title: 'Contract Management',
        description: 'Comprehensive contract drafting, review, and management services to protect your interests and ensure compliance.',
        icon: 'fas fa-file-contract',
        route: '/services/contract-management'
    },
    {
        id: 3,
        title: 'Paralegal Services (India + US)',
        description: 'Professional paralegal support across Indian and US jurisdictions, providing research, documentation, and case assistance.',
        icon: 'fas fa-globe-americas',
        route: '/services/paralegal-services'
    },
    {
        id: 4,
        title: 'Strategic Legal Rehab',
        description: 'Specialized legal rehabilitation services to help resolve complex legal situations and restore business operations.',
        icon: 'fas fa-medical-kit',
        route: '/services/strategic-legal-rehab'
    },
    {
        id: 5,
        title: 'Automation Solutions',
        description: 'Cutting-edge legal technology solutions to streamline processes, improve efficiency, and reduce operational costs.',
        icon: 'fas fa-cogs',
        route: '/services/automation-solutions'
    },
    {
        id: 6,
        title: 'Legal Courses',
        description: 'Professional development courses and training programs to enhance legal knowledge and skills for practitioners.',
        icon: 'fas fa-graduation-cap',
        route: '/services/legal-courses'
    },
    {
        id: 7,
        title: 'Digital Documentation Store',
        description: 'Secure digital repository for legal documents with easy access, organization, and management capabilities.',
        icon: 'fas fa-cloud-upload-alt',
        route: '/services/digital-documentation-store'
    }
])

const navigateToService = (route) => {
    // Using Inertia.js navigation
    Inertia.visit(route)
}
</script>

<style lang="scss" scoped>
// Color Variables
$primary-color: #153f83;
$secondary-color: #D4AF37;
$light-bg: #fafafa;
$white: #ffffff;
$text-dark: #333333;
$text-muted: #6c757d;

// Font Variables
$font-heading: 'Playfair Display', serif;
$font-body: 'Poppins', sans-serif;

.services-landing {
    background-color: $light-bg;
    min-height: 100vh;
    font-family: $font-body;
}

// Hero Section
.hero-section {
    background: linear-gradient(135deg, $primary-color 0%, lighten($primary-color, 10%) 100%);
    color: $white;

    .hero-title {
        font-family: $font-heading;
        font-size: 3.5rem;
        font-weight: 400;
        margin-bottom: 1.5rem;

        @media (max-width: 768px) {
            font-size: 2.5rem;
        }
    }

    .hero-subtitle {
        font-size: 1.2rem;
        line-height: 1.6;
        opacity: 0.9;
        font-weight: 300;
    }
}

// Services Section
.services-section {
    .service-card {
        background: $white;
        border: none;
        border-radius: 12px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        transition: all 0.3s ease;
        cursor: pointer;
        position: relative;
        overflow: hidden;

        &::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, $primary-color, $secondary-color);
            transform: scaleX(0);
            transition: transform 0.3s ease;
        }

        &:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 40px rgba(0, 0, 0, 0.15);

            &::before {
                transform: scaleX(1);
            }

            .service-icon i {
                color: $secondary-color;
                transform: scale(1.1);
            }

            .service-arrow {
                transform: translateX(10px);
                opacity: 1;
            }
        }

        &:focus {
            outline: 2px solid $primary-color;
            outline-offset: 2px;
        }

        .card-body {
            text-align: center;
            position: relative;
            padding: 2rem 1.5rem;
        }
    }

    .service-icon {
        margin-bottom: 1.5rem;

        i {
            font-size: 3rem;
            color: $primary-color;
            transition: all 0.3s ease;
        }
    }

    .service-title {
        font-family: $font-heading;
        font-size: 1.5rem;
        color: $text-dark;
        margin-bottom: 1rem;
        font-weight: 400;
    }

    .service-description {
        color: $text-muted;
        line-height: 1.6;
        font-size: 0.95rem;
        margin-bottom: 0;
    }

    .service-arrow {
        position: absolute;
        bottom: 1rem;
        right: 1.5rem;
        opacity: 0;
        transition: all 0.3s ease;

        i {
            color: $primary-color;
            font-size: 1.2rem;
        }
    }
}

// CTA Section
.cta-section {
    background: linear-gradient(135deg, $secondary-color 0%, darken($secondary-color, 10%) 100%);
    color: $white;

    .cta-title {
        font-family: $font-heading;
        font-size: 2.5rem;
        font-weight: 400;

        @media (max-width: 768px) {
            font-size: 2rem;
        }
    }

    .cta-description {
        font-size: 1.1rem;
        opacity: 0.9;
        line-height: 1.6;
    }

    .btn-primary {
        background-color: $primary-color;
        border-color: $primary-color;
        font-weight: 500;
        letter-spacing: 0.5px;
        padding: 12px 40px;
        border-radius: 50px;
        transition: all 0.3s ease;

        &:hover {
            background-color: darken($primary-color, 10%);
            border-color: darken($primary-color, 10%);
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
        }
    }
}

// Responsive Design
@media (max-width: 768px) {
    .services-section {
        .service-card {
            .card-body {
                padding: 1.5rem 1rem;
            }
        }

        .service-icon i {
            font-size: 2.5rem;
        }

        .service-title {
            font-size: 1.3rem;
        }
    }
}

// Accessibility improvements
@media (prefers-reduced-motion: reduce) {

    .service-card,
    .service-icon i,
    .service-arrow,
    .btn-primary {
        transition: none;
    }

    .service-card:hover {
        transform: none;
    }
}
</style>
