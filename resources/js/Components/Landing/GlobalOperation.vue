<script setup>
import { usePage } from '@inertiajs/inertia-vue3';
import { ref } from 'vue';
const assetUrl = window.assetUrl;
const page = usePage();
const settings = page.props.value.dashboard_data.globalOperationsSection || {};

</script>

<template>
    <section class="py-5 bg-white">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-5" data-aos="fade-up">
                    <h2 class="display-5 playfair text-primary-custom">{{ settings.title }}</h2>
                    <p class="lead text-muted poppins" v-html="settings.description"></p>
                </div>
            </div>

            <div class="row g-5">
                <div v-for="(operation, index) in settings.operation_countries" :key="index" class="col-lg-6">
                    <div class="card border-0 shadow-lg h-100 card-hover" data-aos="fade-up"
                        :data-aos-delay="index * 200">
                        <img :src="assetUrl(operation.office_image)" :alt="operation.title" class="card-img-top office-img">
                        <div class="card-body p-5">
                            <div class="text-center mb-4">
                                <div class="bg-warning bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3"
                                    style="width: 80px; height: 80px;">
                                    <div class="text-secondary-custom"
                                        style="font-size: 2rem;">
                                        <img :src="assetUrl(operation.flag)" class="h-100 w-100"></img>
                                    </div>
                                </div>
                                <h4 class="playfair text-primary-custom">{{ operation.office_title }}</h4>
                            </div>
                            <div class="poppins">
                                <div class="mb-4">
                                    <h6 class="text-primary-custom mb-2">
                                        <i class="fas fa-map-marker-alt me-2"></i>Locations
                                    </h6>
                                    <p class="text-muted">
                                        <strong>HQ:</strong> {{ operation.hq_locations }}<br>
                                        <strong>Offices:</strong> {{ operation.offices_locations }}
                                    </p>
                                </div>
                                <h6 class="mb-3 text-primary-custom">
                                    <i class="fas fa-cogs me-2"></i>Services
                                </h6>
                                <ul class="text-muted">
                                    <li v-for="service in operation.services" :key="service" class="mb-1">{{ service
                                        }}</li>
                                </ul>
                                <div class="mt-4 p-3 bg-light rounded text-center">
                                    <span class="text-secondary-custom me-2"
                                        style="font-size: 1.5rem;" v-html="operation.highlight_button_icon">
                                    </span>
                                    <strong class="text-primary-custom">{{ operation.highlight_button_text }}</strong>
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
.card-hover {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.card-hover:hover {
    transform: translateY(-10px);
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
}

.office-img {
    width: 100%;
    height: 250px;
    object-fit: cover;
}
</style>
