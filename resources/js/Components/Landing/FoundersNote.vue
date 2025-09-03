<script setup>
const values = [
    { icon: 'fas fa-shield-alt', title: 'Integrity', desc: 'Unwavering ethical standards' },
    { icon: 'fas fa-lightbulb', title: 'Innovation', desc: 'Pioneering legal technology' },
    { icon: 'fas fa-globe', title: 'Global Reach', desc: 'International perspective' },
    { icon: 'fas fa-heart', title: 'Client-Centric', desc: 'Your success is our priority' }
];

</script>

<template>
    <section class="py-5" style="background-color: #f8f9fa;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4 text-center mb-4 mb-lg-0">
                    <div class="position-relative">
                        <div class="bg-white rounded-circle d-inline-flex align-items-center justify-content-center shadow"
                            style="width: 200px; height: 200px;">
                            <i class="fas fa-user-tie text-primary-custom" style="font-size: 4rem;"></i>
                        </div>
                        <div class="position-absolute bottom-0 end-0 bg-secondary-custom rounded-circle d-flex align-items-center justify-content-center"
                            style="width: 60px; height: 60px;">
                            <i class="fas fa-quote-left text-white" style="font-size: 1.5rem;"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="ps-lg-4">
                        <h2 class="mb-4 playfair text-primary-custom">Founder's Message</h2>
                        <blockquote class="blockquote poppins">
                            <p class="lead text-muted mb-4">
                                "In an era where legal practice is rapidly evolving, our mission extends beyond
                                traditional
                                boundaries. We are not just educators or consultants; we are innovators committed to
                                transforming how legal services are delivered and accessed globally."
                            </p>
                            <p class="text-muted mb-4">
                                "Our upcoming AI platform represents the convergence of decades of legal expertise with
                                cutting-edge technology, designed to democratize access to quality legal guidance while
                                maintaining the human touch that defines exceptional legal service."
                            </p>
                        </blockquote>
                        <div class="border-start border-5 ps-4"
                            style="border-color: var(--secondary-color) !important;">
                            <h5 class="mb-2 playfair text-primary-custom">Our Core Values</h5>
                            <div class="row poppins">
                                <div v-for="(value, index) in values" :key="index" class="col-md-6">
                                    <p class="text-muted mb-2">
                                        <i :class="value.icon + ' me-2 text-secondary-custom'"></i>
                                        <strong>{{ value.title }}</strong> - {{ value.desc }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</template>
