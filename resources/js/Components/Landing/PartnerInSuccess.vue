<template>
    <section class="partner-success">
        <div class="container-fluid content-section">

            <div class="text-content mb-3" data-aos="fade-up" data-aos-duration="1000">
                <h2 class="section-title" v-html="settings.title"> </h2>
                <p class="lead-text" data-aos="fade-up" data-aos-delay="200" v-html="settings.description">

                </p>
                <Link :href="route('services.listing')" class="btn cta-button mt-3" data-aos="zoom-in" data-aos-delay="400">
                    Book Free Consultancy <i class="fa fa-arrow-right"></i>
                </Link>
                <!-- <button class="btn cta-button secondary mt-3 ms-2">Contact Us</button> -->
            </div>

            <div class="row g-5 mt-3">
                <!-- Image Side -->
                <div class="col-lg-6" data-aos="fade-right" data-aos-duration="1200">
                    <div class="image-wrapper shadow-lg rounded-4 overflow-hidden position-relative w-100 h-100">
                        <video v-if="settings.media_type == 'video'" :src="assetUrl(settings.media_file)" autoplay muted
                            loop playsinline :controls="false" preload="auto" class="img-fluid h-100 position-absolute">
                        </video>
                        <img v-else-if="settings.media_type == 'image'" :src="assetUrl(settings.media_file)"
                            alt="Partnership" class="img-fluid h-100 position-absolute" />
                        <div class="overlay"></div>
                        <div class="text-overlay" data-aos="zoom-in" data-aos-delay="200">
                            <i class="fas fa-handshake"></i>
                        </div>
                    </div>
                </div>

                <!-- Text Side -->
                <div class="col-lg-6" data-aos="fade-left" data-aos-duration="1200">
                    <ContactUsForm />
                </div>
            </div>

        </div>
    </section>

</template>

<script setup>
import ContactUsForm from "@/Components/Landing/ContactUsForm.vue";
// No script logic required – static section
import { usePage, Link } from "@inertiajs/inertia-vue3";
const page = usePage();
const settings = page.props.value.dashboard_data.contactWithUsSection;
const assetUrl = window.assetUrl;
</script>

<style lang="scss" scoped>
$primary-color: #153f83;
$secondary-color: #d4af37;
$font-primary: 'Playfair Display', serif;
$font-secondary: 'Poppins', sans-serif;

.partner-success {
    background: #fff;
    margin-block: 3rem;

    .text-content {
        text-align: center;
    }

    .section-title {
        font-family: $font-primary;
        font-weight: 700;
        font-size: 3rem;
        color: $primary-color;
        margin-bottom: 1rem;

        .highlight {
            color: $secondary-color;
        }
    }

    .lead-text {
        font-family: $font-secondary;
        font-size: 1.05rem;
        line-height: 1.7;
        color: #444;
        margin-inline: auto;
        max-width: 800px;

        .brand {
            font-weight: 600;
            color: $primary-color;
        }
    }

    .cta-button {
        background: $primary-color;
        border: none;
        color: white;
        // border-radius: 50px;
        padding: 0.65rem 1.5rem;
        font-family: $font-secondary;
        font-weight: 500;
        transition: all 0.3s ease;

        &:hover {
            background: $secondary-color;
            color: #fff;
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.15);
        }

        &.secondary {
            background: transparent;
            color: $primary-color;
            border: 2px solid $primary-color;

            &:hover {
                background: $primary-color;
                color: #fff;
                box-shadow: 0 6px 16px rgba(0, 0, 0, 0.1);
            }
        }

        & i {
            display: inline-block;
            margin-left: 6px;
            animation: eagerArrow 2.5s infinite;
        }

    }

    .image-wrapper {
        position: relative;

        img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(180deg,
                    rgba(21, 63, 131, 0.5),
                    rgba(0, 0, 0, 0.4));
            opacity: 0.4;
        }

        .text-overlay {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: $secondary-color;
            border-radius: 50%;
            width: 80px;
            height: 80px;
            display: flex;
            align-items: center;
            justify-content: center;

            i {
                font-size: 2rem;
                color: #fff;
            }
        }
    }
}
</style>
