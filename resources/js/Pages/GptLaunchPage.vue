<template>
    <app-layout>
        <div class="gpt-landing">
            <div class="bg-overlay"></div>
            <GPTLaunchComponent />

            <!-- details Section -->
            <section class="details-section" data-aos="fade-up">
                <div class="bg-overlay"></div>
                <div class="container-fluid content-section content">
                    <div class="row align-items-center">
                        <div class="col-lg-12">
                            <div class="details-content" data-aos="fade-up" data-aos-delay="100">
                                <h1 class="display-5 fw-bold text-primary mb-4 text-center head-title"
                                    data-aos="fade-up" data-aos-delay="200" v-html="aboutUsSettings.title">
                                </h1>
                                <p class="lead text-muted mb-4 head-description" data-aos="fade-up" data-aos-delay="300"
                                    v-html="aboutUsSettings.description">

                                </p>
                            </div>
                        </div>

                        <div class="col-lg-12" data-aos="zoom-in" data-aos-delay="400">
                            <GptMetrices />
                        </div>
                    </div>

                    <!-- Features Preview Section -->
                    <section id="features" class="features-section" data-aos="fade-up">
                        <div class="bg-overlay" ref="featuresOverlay"></div>
                        <div class="content-section">
                            <div class="text-center mb-5" data-aos="fade-up">
                                <h2 class="display-5 fw-bold text-secondary head-title mb-4" data-aos="fade-up"
                                    data-aos-delay="100">
                                    {{ featureSettings.title }}
                                </h2>
                                <p class="lead text-muted head-description" data-aos="fade-up" data-aos-delay="200">
                                    {{ featureSettings.description }}
                                </p>
                            </div>

                            <div class="row g-4">
                                <div class="col-lg-4 col-md-6" v-for="(feature, index) in featureSettings.list"
                                    :key="index" :data-aos="'fade-up'" :data-aos-delay="index * 150">
                                    <div class="feature-card text-center h-100">
                                        <div class="feature-icon mb-3">
                                            <span class="text-secondary" v-html="feature.icon"></span>
                                        </div>
                                        <h5 class="fw-bold text-primary mb-3">{{ feature.title }}</h5>
                                        <p class="text-muted">{{ feature.description }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </section>

            <GptUseCase />

            <!-- About Section -->
            <!-- <section id="about" class="about-section py-5 bg-light">
                <div class="container-fluid content-section">
                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="service-card h-100">
                                <div class="card-icon mb-3">
                                    <img src="https://images.unsplash.com/photo-1451187580459-43490279c0fa?w=80&h=80&fit=crop&crop=center"
                                        alt="Tech Support" class="service-icon">
                                </div>
                                <h4 class="fw-bold text-primary mb-3">Tech-Oriented Solutions</h4>
                                <p class="text-muted">
                                    Leveraging cutting-edge AI and machine learning to streamline legal processes,
                                    document analysis, and case management for enhanced efficiency.
                                </p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="service-card h-100">
                                <div class="card-icon mb-3">
                                    <img src="https://images.unsplash.com/photo-1589829545856-d10d557cf95f?w=80&h=80&fit=crop&crop=center"
                                        alt="Court Support" class="service-icon">
                                </div>
                                <h4 class="fw-bold text-primary mb-3">Personal Court Support</h4>
                                <p class="text-muted">
                                    Experienced legal professionals providing personalized representation and
                                    guidance through complex court proceedings with dedicated support.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </section> -->


            <!-- Pre-registration Section -->
            <section id="pre-registration-form" class="registration-section" data-aos="fade-up">
                <div class="container-fluid content-section">
                    <div class="row g-5 justify-content-center">
                        <!-- Left Image (if you enable it later) -->
                        <!--
                        <div class="col-12 col-lg-6 d-none d-md-block img-container" data-aos="fade-right">
                            <img src="/images/gpt-preorder.jpg" alt="" class="position-absolute inset-0 robot-img">
                        </div>
                        -->

                        <div class="col-12 col-md-8" data-aos="fade-left">
                            <div class="registration-card" data-aos="zoom-in" data-aos-delay="200">
                                <div class="text-center mb-4" data-aos="fade-down">
                                    <h2 class="display-6 fw-bold text-primary mb-3">{{ registrationFormSettings.title }}
                                    </h2>
                                    <p class="lead text-muted">
                                        {{ registrationFormSettings.description }}
                                    </p>
                                </div>

                                <form @submit.prevent="handleSubmit" class="registration-form">
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <label for="firstName" class="form-label text-primary fw-medium">First
                                                Name</label>
                                            <input type="text" class="form-control form-control-lg" id="firstName"
                                                v-model="formData.first_name" required>
                                        </div>

                                        <div class="col-md-6">
                                            <label for="lastName" class="form-label text-primary fw-medium">Last
                                                Name</label>
                                            <input type="text" class="form-control form-control-lg" id="lastName"
                                                v-model="formData.last_name" required>
                                        </div>

                                        <div class="col-12">
                                            <label for="email" class="form-label text-primary fw-medium">Email
                                                Address</label>
                                            <input type="email" class="form-control form-control-lg" id="email"
                                                v-model="formData.email" required>
                                        </div>

                                        <div class="col-12">
                                            <label for="phone" class="form-label text-primary fw-medium">Phone
                                                Number</label>
                                            <!-- <input type="tel" class="form-control form-control-lg" id="phone"
                                                v-model="formData.phone"> -->
                                            <vue-tel-input v-model="formData.phone" required @on-input="onPhoneInput"
                                                class="form-control form-control-lg"
                                                :preferred-countries="['us', 'in', 'gb']"
                                                placeholder="Enter your phone number"></vue-tel-input>
                                        </div>



                                        <div class="col-12" :style="{ 'zIndex': 1 }">
                                            <label for="organization"
                                                class="form-label text-primary fw-medium">Organization/Law Firm</label>
                                            <input type="text" class="form-control form-control-lg" id="organization"
                                                v-model="formData.organization">
                                        </div>

                                        <div class="col-12">
                                            <label for="role" class="form-label text-primary fw-medium">Professional
                                                Role</label>
                                            <select class="form-select form-select-lg" id="role" v-model="formData.role"
                                                required>
                                                <option value="">Select your role</option>
                                                <option v-for="(item, index) in registrationFormSettings.roles"
                                                    :key="`preregrole${index}`" :value="item">
                                                    {{ item }}
                                                </option>
                                            </select>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="newsletter"
                                                    v-model="formData.newsletter">
                                                <label class="form-check-label text-muted" for="newsletter">
                                                    I'd like to receive updates about VallumeGPT and Vallume's services
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col-12 mt-4">
                                            <button type="submit" class="btn btn-primary btn-lg w-100 py-3"
                                                :disabled="isSubmitting">
                                                {{ isSubmitting ? 'Registering...' : 'Secure My Early Access' }}
                                            </button>
                                        </div>
                                    </div>
                                </form>

                                <div v-if="submitted" class="alert alert-success mt-4 text-center" data-aos="fade-in"
                                    data-aos-delay="800">
                                    <h5 class="fw-bold mb-2">Registration Successful! 🎉</h5>
                                    <p class="mb-0">Thank you for your interest. We'll notify you as soon as VallumeGPT
                                        launches.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div>

        <PartnerInSuccess />
    </app-layout>
</template>

<script setup>
import { ref, reactive, onMounted } from 'vue';
import AppLayout from "@/Layouts/AppLayout.vue";
import GptUseCase from '@/Components/Landing/GptUseCase.vue';
import GPTLaunchComponent from '@/Components/Landing/GptLaunchComponent2.vue'
import GptMetrices from '@/Components/Landing/GptMetrices.vue';
import { gsap } from "gsap";
import PartnerInSuccess from '@/Components/Landing/PartnerInSuccess.vue';
import { usePage, Link, useForm } from '@inertiajs/inertia-vue3';
import { createToaster } from "@meforma/vue-toaster";

const submitted = ref(false)
const isSubmitting = ref(false)
const page = usePage();
const formData = useForm({
    first_name: '',
    last_name: '',
    email: '',
    phone: '',
    countrycode: '',
    organization: '',
    role: '',
    newsletter: false
});
const aboutUsSettings = page.props.value.dashboard_data.aboutUsSection;
const registrationFormSettings = page.props.value.dashboard_data.registrationFormSection;
const featureSettings = page.props.value.dashboard_data.featuresSection;
const featuresOverlay = ref(null);
const toaster = createToaster({});

onMounted(() => {
    gsap.to({ angle: 0 }, {
        angle: 360,
        duration: 10,
        ease: "none",
        repeat: -1,
        onUpdate: function () {
            if (featuresOverlay.value) {
                featuresOverlay.value.style.background = `linear-gradient(${this.targets()[0].angle}deg, #fff6e5 0%, #ffd280 100%)`;
            }
        }
    });
});

function onPhoneInput(value, obj) {
    formData.countrycode = obj.countryCallingCode ?? ''
    formData.phone = obj?.nationalNumber || value
}


const handleSubmit = async () => {
    isSubmitting.value = true

    // Simulate API call
    formData.post(route('pre-register-gpt'), {
        onSuccess: (response) => {
            toaster.success('Registration successful!')
            submitted.value = true
            isSubmitting.value = false
        }
    })
}

const scrollToRegister = () => {
    document.getElementById('register').scrollIntoView({
        behavior: 'smooth'
    })
}


</script>

<style lang="scss" scoped>
// Variables
$primary-color: #153f83;
$secondary-color: #D4AF37;
$light-bg: #f8f9fa;
$text-muted: #6c757d;

// Global styles
.gpt-landing {
    font-family: 'Poppins', sans-serif;
    position: relative;


    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
        font-family: 'Playfair Display', serif;
    }


    & .bg-overlay {
        background: url('/images/bg5.svg') repeat top left;
        background-size: auto;
        position: absolute;
        inset: 0;
        opacity: 0.05;
        z-index: -1;
    }
}

// Custom Bootstrap overrides
.text-primary {
    color: $primary-color !important;
}

.text-secondary {
    color: $secondary-color !important;
}

.btn-primary {
    background-color: $primary-color;
    border-color: $primary-color;
    font-weight: 500;

    &:hover,
    &:focus {
        background-color: darken($primary-color, 10%);
        border-color: darken($primary-color, 10%);
    }
}

.bg-primary {
    background-color: $primary-color !important;
}

.bg-secondary {
    background-color: $secondary-color !important;
}



// details Section
.details-section {
    background:
        linear-gradient(135deg, rgba(21, 63, 131, 0.01) 0%, rgba(212, 175, 55, 0.01) 100%),
        // url('/images/aib3.jpg') no-repeat center center
    ;
    background-size: cover;
    position: relative;
    z-index: 0;


    & .bg-overlay {
        position: absolute;
        z-index: 1;
        inset: 0;
        opacity: 0.1;
        background: url('/images/gpt-bg.png') no-repeat center center/cover;
        // filter: blur(0.3rem);
    }

    & .content {
        position: relative;
        z-index: 3;
    }


    .details-content {


        & .head-title {
            margin-inline: auto;
            max-width: 800px;
        }

        & .head-description {
            margin-inline: auto;
            max-width: 800px;
        }
    }

    .coming-soon-badge {
        .badge {
            border-radius: 4px;
            font-weight: 500;
        }
    }

    .tech-image {
        border-radius: 8px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        max-height: 400px;
        object-fit: cover;
    }
}

// About Section
.about-section {
    .service-card {
        background: white;
        padding: 2rem;
        border-radius: 8px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);

        .service-icon {
            width: 80px;
            height: 80px;
            border-radius: 8px;
            object-fit: cover;
        }
    }
}

// Features Section
.features-section {
    position: relative;
    margin-top: 3rem;
    z-index: 1;

    & .head-description {
        max-width: 800px;
        margin-inline: auto;
    }


    & .bg-overlay {
        opacity: 0.4;
        border-radius: 3rem;
        z-index: 2;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        position: absolute;
        // filter:blur(1rem);
        background: linear-gradient(135deg,
                $secondary-color 0%,
                lighten($secondary-color, 40%) 50%,
                $secondary-color 100%);
    }

    & .content-section {
        position: relative;
        z-index: 3;


        & .feature-card {
            padding: 2rem 1rem;
            border: 1px dashed rgba($secondary-color, 1);
            border-radius: 1rem;

            .feature-icon {
                font-size: 3rem;
                margin-bottom: 1rem;
            }
        }

    }

}

// Registration Section
.registration-section {
    .registration-card {
        // border-top-right-radius: 3rem;
        // border-bottom-right-radius: 3rem;
        // background: white;
        border: 1px dashed $primary-color;
        border-radius: 3rem;
        padding: 3rem;
        z-index: 3;
        // box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    }

    .form-control,
    .form-select {
        border-radius: 0px;
        border: 2px solid #e9ecef;
        z-index: 4;
        position: relative;

        &:focus {
            border-color: $primary-color;
            box-shadow: 0 0 0 0.2rem rgba(21, 63, 131, 0.25);
        }
    }

    .form-label {
        margin-bottom: 0.5rem;
    }

    .img-container {
        position: relative;
        border-top-left-radius: 3rem;
        border-bottom-left-radius: 3rem;

        .robot-img {
            border-top-left-radius: 3rem;
            border-bottom-left-radius: 3rem;
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            width: 100%;
            object-fit: cover;
        }
    }
}



// Responsive Design
@media (max-width: 768px) {
    .details-section {
        .display-3 {
            font-size: 2.5rem;
        }

        .details-content {
            text-align: center;
            margin-bottom: 2rem;
        }
    }

    .registration-card {
        // padding: 2rem 1.5rem !important;
        border-radius: 1rem !important;
    }

    .service-card {
        margin-bottom: 1rem;
    }
}

@media (max-width: 576px) {
    .details-section {
        .display-3 {
            font-size: 2rem;
        }

        .btn-lg {
            width: 100%;
        }
    }

    .registration-card {
        padding: 1.5rem 1rem !important;
    }
}

// Font Awesome Icons (if not included globally)
.fas {
    font-family: "Font Awesome 5 Free";
    font-weight: 900;
}

.fa-brain::before {
    content: "🧠";
}

.fa-search::before {
    content: "🔍";
}

.fa-file-contract::before {
    content: "📄";
}
</style>
