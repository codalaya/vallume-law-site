<script setup>
import { ref } from 'vue';

const coreValues = [
    { icon: 'fas fa-shield-alt', title: 'Integrity', desc: 'Unwavering ethical standards' },
    { icon: 'fas fa-lightbulb', title: 'Innovation', desc: 'Pioneering legal technology' },
    { icon: 'fas fa-globe', title: 'Global Reach', desc: 'International perspective' },
    { icon: 'fas fa-heart', title: 'Client-Centric', desc: 'Your success is our priority' }
];

const founderData = ref({
    image: "https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80",
    title: "Message from Our Founder",
    quote1: "In an era where legal practice is rapidly evolving, our mission extends beyond traditional boundaries. We are not just educators or consultants; we are innovators committed to transforming how legal services are delivered and accessed globally.",
    quote2: "Our upcoming AI platform represents the convergence of decades of legal expertise with cutting-edge technology, designed to democratize access to quality legal guidance while maintaining the human touch that defines exceptional legal service."
});
</script>

<template>
    <section class="parallax-bg py-5"
        style="background-image: url('https://images.unsplash.com/photo-1505664194779-8beaceb93744?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80');">
        <div class="overlay py-5">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-5 text-center mb-4 mb-lg-0" data-aos="fade-right">
                        <div class="position-relative">
                            <img :src="founderData.image"
                                alt="Founder" class="img-fluid rounded-circle shadow-lg"
                                style="width: 250px; height: 250px; object-fit: cover; border: 6px solid var(--secondary-color);">
                            <div class="position-absolute bottom-0 end-0 bg-secondary-custom rounded-circle d-flex align-items-center justify-content-center pulse"
                                style="width: 70px; height: 70px;">
                                <i class="fas fa-quote-left text-white" style="font-size: 1.5rem;"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7" data-aos="fade-left">
                        <div class="ps-lg-4">
                            <h2 class="mb-4 playfair text-white" style="font-size: 2.5rem;">{{ founderData.title }}</h2>
                            <blockquote class="blockquote poppins">
                                <p class="lead text-white opacity-90 mb-4"
                                    style="font-size: 1.1rem; line-height: 1.8;">
                                    "{{ founderData.quote1 }}"
                                </p>
                                <p class="text-white opacity-80 mb-4">
                                    "{{ founderData.quote2 }}"
                                </p>
                            </blockquote>
                            <div class="row mt-5">
                                <div v-for="(value, index) in coreValues" :key="index" class="col-md-6 mb-3">
                                    <div class="d-flex align-items-center">
                                        <div class="bg-secondary-custom rounded-circle p-2 me-3">
                                            <i :class="value.icon + ' text-white'"></i>
                                        </div>
                                        <div>
                                            <h6 class="text-white mb-1 poppins">{{ value.title }}</h6>
                                            <small class="text-white opacity-75">{{ value.desc }}</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<style lang="scss" scoped>
.parallax-bg {
    background-attachment: fixed;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
}

.overlay {
    background: rgba(21, 63, 131, 0.85);
}

.pulse {
    animation: pulse 2s infinite;
}

@keyframes pulse {
    0% {
        box-shadow: 0 0 0 0 rgba(212, 175, 55, 0.7);
    }
    70% {
        box-shadow: 0 0 0 15px rgba(212, 175, 55, 0);
    }
    100% {
        box-shadow: 0 0 0 0 rgba(212, 175, 55, 0);
    }
}
</style>
