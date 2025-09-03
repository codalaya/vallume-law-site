<script setup>
import { ref } from 'vue';

const activeTab = ref('mission');

const tabs = [
    { id: 'mission', label: 'Mission', icon: 'fas fa-compass' },
    { id: 'vision', label: 'Vision', icon: 'fas fa-eye' },
    { id: 'commitment', label: 'Commitment', icon: 'fas fa-handshake' }
];

const tabContent = {
    mission: {
        title: 'Our Mission',
        icon: 'fas fa-compass',
        content: `To democratize legal expertise by providing world-class education, strategic consultancy,
                                and cutting-edge AI solutions that empower legal professionals and organizations to
                                navigate complex regulatory landscapes with confidence and precision.`,
        image: 'https://images.unsplash.com/photo-1551434678-e076c223a692?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80',
        points: [
            'Accessible legal education for all',
            'Strategic business consultation',
            'AI-powered legal solutions',
            'Global regulatory compliance'
        ]
    },
    vision: {
        title: 'Our Vision',
        icon: 'fas fa-eye',
        content: `To be the global leader in legal technology and education, bridging traditional legal
                                practice with innovative AI solutions, while maintaining the highest standards of
                                ethics, accuracy, and accessibility across international markets.`,
        image: 'https://images.unsplash.com/photo-1560472355-536de3962603?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80',
        points: [
            'Global legal technology leadership',
            'Ethical AI implementation',
            'Cross-border legal expertise',
            'Future-ready solutions'
        ]
    },
    commitment: {
        title: 'Our Commitment',
        icon: 'fas fa-handshake',
        content: `To uphold the highest standards of professional integrity, client confidentiality, and
                                legal excellence while fostering innovation and continuous improvement in everything
                                we do. We are committed to building lasting relationships based on trust and results.`,
        image: 'https://images.unsplash.com/photo-1521791136064-7986c2920216?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80',
        points: [
            'Unwavering ethical standards',
            'Client-first approach',
            'Continuous innovation',
            'Long-term partnerships'
        ]
    }
};
</script>

<template>
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-5" data-aos="fade-up">
                    <h2 class="display-5 playfair text-primary-custom mb-3">Our Foundation</h2>
                    <p class="lead text-muted poppins">Built on principles that drive legal innovation</p>
                </div>
            </div>

            <ul class="nav nav-pills justify-content-center mb-5" role="tablist" data-aos="fade-up"
                data-aos-delay="200">
                <li v-for="tab in tabs" :key="tab.id" class="nav-item me-3">
                    <button @click="activeTab = tab.id"
                        class="nav-link px-5 py-3 tab-btn poppins fw-medium rounded-pill"
                        :class="{ 'active': activeTab === tab.id }" :style="{
                            backgroundColor: activeTab === tab.id ? 'var(--primary-color)' : 'transparent',
                            borderColor: 'var(--primary-color)',
                            color: activeTab === tab.id ? 'white' : 'var(--primary-color)',
                            border: '2px solid var(--primary-color)',
                            fontSize: '1.1rem'
                        }">
                        <i :class="tab.icon + ' me-2'"></i>
                        {{ tab.label }}
                    </button>
                </li>
            </ul>

            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="card border-0 shadow-lg" style="border-radius: 20px;">
                        <div class="card-body p-5">
                            <transition name="fade" mode="out-in">
                                <div :key="activeTab" class="row align-items-center">
                                    <div class="col-lg-6 text-center mb-4 mb-lg-0">
                                        <div class="mb-4">
                                            <div class="bg-warning bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center floating"
                                                style="width: 120px; height: 120px;">
                                                <i :class="tabContent[activeTab].icon + ' text-secondary-custom'"
                                                    style="font-size: 3rem;"></i>
                                            </div>
                                        </div>
                                        <img :src="tabContent[activeTab].image" alt="Foundation"
                                            class="img-fluid rounded shadow-sm" style="max-width: 300px;">
                                    </div>
                                    <div class="col-lg-6">
                                        <h3 class="mb-4 playfair text-primary-custom font-header" style="font-size: 2.5rem;">
                                            {{ tabContent[activeTab].title }}
                                        </h3>
                                        <p class="lead text-muted poppins"
                                            style="font-size: 1.1rem; line-height: 1.8;">
                                            {{ tabContent[activeTab].content }}
                                        </p>
                                        <div class="mt-4">
                                            <div v-for="point in tabContent[activeTab].points" :key="point"
                                                class="d-flex align-items-center mb-2">
                                                <i class="fas fa-check-circle text-success me-3"></i>
                                                <span class="poppins">{{ point }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </transition>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<style lang="scss" scoped>
.tab-btn {
    transition: all 0.3s ease;
}

.text-primary-custom {
    color: var(--primary-color) !important;
}

.tab-btn:not(.active):hover {
    background-color: rgba(21, 63, 131, 0.1);
    color: var(--primary-color);
}

.fade-enter-active,
.fade-leave-active {
    transition: opacity 0.5s ease;
}

.fade-enter-from,
.fade-leave-to {
    opacity: 0;
}

.floating {
    animation: float 6s ease-in-out infinite;
}

@keyframes float {
    0%, 100% {
        transform: translateY(0px);
    }
    50% {
        transform: translateY(-20px);
    }
}

</style>
