<script setup>
const clientStats = [
    { icon: 'fas fa-university', title: 'Fortune 500 Companies', count: '150+', desc: 'Global corporations trust our compliance solutions' },
    { icon: 'fas fa-graduation-cap', title: 'Law Schools', count: '75+', desc: 'Educational institutions use our curriculum' },
    { icon: 'fas fa-gavel', title: 'Law Firms', count: '300+', desc: 'Legal practices leverage our expertise' },
    { icon: 'fas fa-landmark', title: 'Government Agencies', count: '25+', desc: 'Public sector compliance partnerships' }
];

const awards = [
    { icon: 'fas fa-trophy', title: 'Legal Tech Innovation Award', subtitle: '2024 Global Legal Awards' },
    { icon: 'fas fa-medal', title: 'Best Education Provider', subtitle: 'Asia Legal Excellence 2023' },
    { icon: 'fas fa-star', title: 'Client Satisfaction', subtitle: '98% Rating (2024)' },
    { icon: 'fas fa-certificate', title: 'ISO 27001 Certified', subtitle: 'Information Security' }
];
</script>
<template>
    <section class="py-5 bg-white">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-5">
                    <h2 class="playfair text-primary-custom">Our Distinguished Clientele</h2>
                    <p class="text-muted poppins">Trusted by leading organizations across industries and jurisdictions
                    </p>
                </div>
            </div>

            <div class="row g-4 mb-5">
                <div v-for="(item, index) in clientStats" :key="index" class="col-lg-3 col-md-6">
                    <div class="card border-0 shadow-sm h-100 text-center card-hover">
                        <div class="card-body p-4">
                            <div class="bg-primary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3"
                                style="width: 70px; height: 70px;">
                                <i :class="item.icon + ' text-primary-custom'" style="font-size: 1.8rem;"></i>
                            </div>
                            <h3 class="playfair text-secondary-custom mb-2">{{ item.count }}</h3>
                            <h6 class="mb-2 poppins text-primary-custom">{{ item.title }}</h6>
                            <p class="text-muted small mb-0 poppins">{{ item.desc }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card border-0 shadow-sm gradient-bg">
                        <div class="card-body p-5 text-center text-white">
                            <h3 class="mb-4 playfair">Industry Recognition & Achievements</h3>
                            <div class="row">
                                <div v-for="(award, index) in awards" :key="index" class="col-md-3">
                                    <div class="mb-3">
                                        <i :class="award.icon + ' text-secondary-custom'"
                                            style="font-size: 2.5rem;"></i>
                                    </div>
                                    <h5 class="poppins text-secondary-custom">{{ award.title }}</h5>
                                    <p class="small opacity-90">{{ award.subtitle }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</template>
