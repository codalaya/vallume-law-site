<script setup>
import { ref } from 'vue';

const technologies = [
    {
        title: 'AI Legal Research',
        desc: 'Advanced case analysis',
        icon: 'fas fa-search'
    },
    {
        title: 'Smart Contracts',
        desc: 'Automated legal agreements',
        icon: 'fas fa-file-contract'
    },
    {
        title: 'Document Analysis',
        desc: 'Intelligent document review',
        icon: 'fas fa-file-alt'
    },
    {
        title: 'Compliance Monitoring',
        desc: 'Real-time regulatory tracking',
        icon: 'fas fa-chart-line'
    }
];

const sectionData = ref({
    title: "Future of Legal Tech",
    subtitle: "Our upcoming AI platform combines artificial intelligence with decades of legal expertise to provide unprecedented access to legal guidance and document analysis.",
    image: "https://images.unsplash.com/photo-1451187580459-43490279c0fa?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
});
</script>

<template>
    <section class="py-5" style="background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-5 mb-lg-0" data-aos="fade-right">
                    <h2 class="display-5 playfair text-primary-custom mb-4">{{ sectionData.title }}</h2>
                    <p class="lead text-muted poppins mb-4">
                        {{ sectionData.subtitle }}
                    </p>
                    <div class="row g-3">
                        <div v-for="(tech, index) in technologies" :key="index" class="col-md-6">
                            <div class="d-flex align-items-center p-3 bg-white rounded shadow-sm">
                                <div class="bg-secondary-custom rounded-circle p-2 me-3">
                                    <i :class="tech.icon + ' text-white'"></i>
                                </div>
                                <div>
                                    <h6 class="mb-1 poppins text-primary-custom">{{ tech.title }}</h6>
                                    <small class="text-muted">{{ tech.desc }}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-left">
                    <div class="position-relative">
                        <img :src="sectionData.image"
                            alt="AI Technology" class="img-fluid rounded shadow-lg">
                        <div
                            class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center">
                            <button class="btn bg-secondary-custom btn-lg rounded-circle pulse"
                                style="width: 80px; height: 80px;">
                                <i class="fas fa-play text-white" style="font-size: 1.5rem;"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<style lang="scss" scoped>
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
