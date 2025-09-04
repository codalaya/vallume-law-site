<template>
    <div class="content-section">
        <div class="services-section" ref="sectionRef" data-aos="fade-up" data-aos-duration="1000">
            <div class="container">
                <!-- Header -->
                <div class="text-center mb-5" data-aos="fade-up" data-aos-delay="100">
                    <p class="subtitle">{{ settings.subtitle }}</p>
                    <h2 class="main-title">{{ settings.title }}</h2>
                    <p class="description">
                        {{ settings.description }}
                    </p>
                </div>

                <!-- Services Grid -->
                <div class="row g-4">
                    <div v-for="(service, index) in services" :key="service.id" class="col-lg-4 col-md-6 col-12"
                        :data-aos="'zoom-in'" :data-aos-delay="(index * 100)" data-aos-duration="800">
                        <a :href="service.link" class="service-item" :class="{ 'active': hoveredCard === service.id }"
                            @mouseenter="hoveredCard = service.id" @mouseleave="hoveredCard = null">
                            <div class="service-icon-wrapper">
                                <div class="service-icon" :style="{ backgroundColor: getIconColor(service.id) }"
                                    v-html="service.icon">
                                </div>
                            </div>
                            <h4 class="service-name">{{ service.title }}</h4>
                            <p class="service-desc">{{ service.description }}</p>
                        </a>
                    </div>

                    <MoreServicesCard class="col-lg-4 col-md-6 col-12" data-aos="zoom-in" data-aos-delay="400" />
                </div>
            </div>
        </div>
    </div>

</template>

<script setup>
import { onMounted, ref } from 'vue';
import { gsap } from "gsap";
import MoreServicesCard from './MoreServiceCard.vue'
import { Link, usePage } from '@inertiajs/inertia-vue3';
import { computed } from 'vue';

const sectionRef = ref(null);

onMounted(() => {
    gsap.to({ angle: 0 }, {
        angle: 360,
        duration: 10,
        ease: "none",
        repeat: -1,
        onUpdate: function () {
            if (sectionRef.value) {
                sectionRef.value.style.background = `linear-gradient(${this.targets()[0].angle}deg, #fff6e5 0%, #ffd280 100%)`;
            }
        }
    });
});

const page = usePage();
const settings = page.props.value.dashboard_data.serviceSection;
// Original services data from your code
const services = computed(() => {
    return settings.services.map((item, index) => ({ id: index + 1, title: item.title, description: item.description, icon: item.icon, link: item.link }));
});

const hoveredCard = ref(null)

// Function to get icon background colors similar to the image
const getIconColor = (id) => {
    const colors = {
        1: '#E8F5E8', // Light green
        2: '#FFF4E6', // Light orange
        3: '#E8F8F5', // Light mint
        4: '#FFF0E6', // Light peach
        5: '#E8F8FF', // Light blue
        6: '#F0E8FF'  // Light purple
    }
    return colors[id] || '#f8f9fa'
}
</script>

<style lang="scss" scoped>
// Variables
$primary-color: #153f83;
$secondary-color: #D4AF37;
$text-muted: #6c757d;
$text-body: #333;

.services-section {
    padding: 80px 0;
    font-family: 'Poppins', sans-serif;
    border-radius: 20px;
    transition: background 0.2s linear; // small smoothing
}

@media (max-width: 768px) {
    .services-section {
        padding: 60px 0;
    }
}

.subtitle {
    color: $text-muted;
    font-size: 14px;
    font-weight: 500;
    letter-spacing: 2px;
    margin-bottom: 15px;
    text-transform: uppercase;
}

.main-title {
    color: $primary-color;
    font-family: 'Playfair Display', serif;
    font-size: 2.8rem;
    font-weight: 400;
    margin-bottom: 25px;
    line-height: 1.2;

    @media (max-width: 768px) {
        font-size: 2.2rem;
    }

    @media (max-width: 576px) {
        font-size: 1.8rem;
    }
}

.description {
    color: $text-muted;
    font-size: 16px;
    line-height: 1.6;
    margin-bottom: 0;
    max-width :800px;
    margin-inline: auto;

    @media (max-width: 576px) {
        font-size: 15px;
    }
}

.service-item {
    background: white;
    padding: 40px 30px;
    display: block;
    border-radius: 12px;
    text-align: center;
    transition: all 0.3s ease;
    text-decoration: none;
    height: 100%;
    box-shadow: 0 2px 20px rgba(0, 0, 0, 0.08);
    cursor: pointer;
    color: black;
    // border: 2px solid transparent;

    @media (max-width: 768px) {
        padding: 30px 20px;
    }

    @media (max-width: 576px) {
        padding: 25px 15px;
    }

    &:hover,
    &.active {
        // transform: translateY(-5px);
        box-shadow: 0 10px 40px rgba($primary-color, 0.15);
        background-color: $secondary-color;

    }
}

.service-icon-wrapper {
    margin-bottom: 25px;
}

.service-icon {
    width: 80px;
    height: 80px;
    border-radius: 50%;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    font-size: 2rem;
    transition: all 0.3s ease;
    color: $secondary-color;

    @media (max-width: 576px) {
        width: 70px;
        height: 70px;
        font-size: 1.8rem;
    }
}

.service-name {
    // color: $primary-color;
    font-family: 'Playfair Display', serif;
    font-size: 1.75rem;
    font-weight: 500;
    margin-bottom: 15px;
    line-height: 1.3;

    @media (max-width: 576px) {
        font-size: 1.2rem;
    }
}

.service-desc {
    color: black;
    font-size: 1rem;
    line-height: 1.6;
    margin-bottom: 0;

    @media (max-width: 576px) {
        font-size: 13px;
    }
}
</style>
