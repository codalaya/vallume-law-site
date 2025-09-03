<script setup>
import { ref } from 'vue';

const activeTab = ref('mission');

const tabs = [
    { id: 'mission', label: 'Mission', icon: 'fas fa-compass' },
    { id: 'vision', label: 'Vision', icon: 'fas fa-eye' },
    { id: 'expertise', label: 'Expertise', icon: 'fas fa-star' }
];

const tabContent = {
    mission: {
        title: 'Our Mission',
        icon: 'fas fa-compass',
        content: `To democratize legal expertise by providing world-class education, strategic consultancy,
                                and cutting-edge AI solutions that empower legal professionals and organizations to
                                navigate complex regulatory landscapes with confidence and precision.`
    },
    vision: {
        title: 'Our Vision',
        icon: 'fas fa-eye',
        content: `To be the global leader in legal technology and education, bridging traditional legal
                                practice with innovative AI solutions, while maintaining the highest standards of
                                ethics, accuracy, and accessibility across international markets.`
    },
    expertise: {
        title: 'Our Commitment',
        icon: 'fas fa-star',
        isExpertise: true
    }
};
</script>
<template>
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="text-center mb-5 playfair text-primary-custom">
                        Our Foundation
                    </h2>

                    <!-- Tab Navigation -->
                    <ul class="nav nav-pills justify-content-center mb-4" role="tablist">
                        <li v-for="tab in tabs" :key="tab.id" class="nav-item me-2">
                            <button @click="activeTab = tab.id" class="nav-link px-4 py-3 tab-btn poppins fw-medium"
                                :class="{ 'active': activeTab === tab.id }" :style="{
                                    backgroundColor: activeTab === tab.id ? 'var(--primary-color)' : 'transparent',
                                    borderColor: 'var(--primary-color)',
                                    color: activeTab === tab.id ? 'white' : 'var(--primary-color)',
                                    border: '2px solid var(--primary-color)'
                                }">
                                <i :class="tab.icon + ' me-2'"></i>
                                {{ tab.label }}
                            </button>
                        </li>
                    </ul>

                    <!-- Tab Content -->
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="card border-0 shadow-sm">
                                <div class="card-body p-5">
                                    <transition name="fade" mode="out-in">
                                        <div v-if="activeTab !== 'expertise'" :key="activeTab" class="text-center">
                                            <div class="mb-4">
                                                <div class="bg-warning bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center"
                                                    style="width: 80px; height: 80px;">
                                                    <i :class="tabContent[activeTab].icon + ' text-secondary-custom'"
                                                        style="font-size: 2rem;"></i>
                                                </div>
                                            </div>
                                            <h3 class="mb-4 playfair text-primary-custom">
                                                {{ tabContent[activeTab].title }}
                                            </h3>
                                            <p class="lead text-muted poppins">
                                                {{ tabContent[activeTab].content }}
                                            </p>
                                        </div>

                                        <div v-else key="expertise" class="text-center">
                                            <div class="mb-4">
                                                <div class="bg-warning bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center"
                                                    style="width: 80px; height: 80px;">
                                                    <i class="fas fa-star text-secondary-custom"
                                                        style="font-size: 2rem;"></i>
                                                </div>
                                            </div>
                                            <h3 class="mb-4 playfair text-primary-custom">Our Expertise</h3>
                                            <div class="row text-start">
                                                <div class="col-md-6">
                                                    <ul class="list-unstyled poppins">
                                                        <li class="mb-2"><i
                                                                class="fas fa-check text-success me-2"></i>Corporate Law
                                                            & Compliance</li>
                                                        <li class="mb-2"><i
                                                                class="fas fa-check text-success me-2"></i>International
                                                            Trade Law</li>
                                                        <li class="mb-2"><i
                                                                class="fas fa-check text-success me-2"></i>Intellectual
                                                            Property Rights</li>
                                                    </ul>
                                                </div>
                                                <div class="col-md-6">
                                                    <ul class="list-unstyled poppins">
                                                        <li class="mb-2"><i
                                                                class="fas fa-check text-success me-2"></i>Legal
                                                            Technology & AI</li>
                                                        <li class="mb-2"><i
                                                                class="fas fa-check text-success me-2"></i>Regulatory
                                                            Affairs</li>
                                                        <li class="mb-2"><i
                                                                class="fas fa-check text-success me-2"></i>Legal
                                                            Education & Training</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </transition>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</template>
