<script setup>
import { usePage } from '@inertiajs/inertia-vue3';
import { ref } from 'vue';

const page= usePage();
const settings = page.props.value.dashboard_data.teamMembersSection || {};
const assetUrl = window.assetUrl;
const team = [
    {
        name: 'Dr. Sharon Carter',
        position: 'Founder & CEO',
        bio: 'Former Supreme Court advocate with 20+ years of experience in corporate law and legal education.',
        image: 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-4.0.3&auto=format&fit=crop&w=300&q=80',
        skills: ['Corporate Law', 'Legal Education', 'Strategic Planning']
    },
    {
        name: 'Sarah Johnson',
        position: 'Chief Technology Officer',
        bio: 'AI specialist with expertise in legal technology and machine learning applications.',
        image: 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-4.0.3&auto=format&fit=crop&w=300&q=80',
        skills: ['AI Development', 'Legal Tech', 'Innovation']
    },
    {
        name: 'Sarah Johnson',
        position: 'Chief Technology Officer',
        bio: 'AI specialist with expertise in legal technology and machine learning applications.',
        image: 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-4.0.3&auto=format&fit=crop&w=300&q=80',
        skills: ['AI Development', 'Legal Tech', 'Innovation']
    },
    {
        name: 'Sarah Johnson',
        position: 'Chief Technology Officer',
        bio: 'AI specialist with expertise in legal technology and machine learning applications.',
        image: 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-4.0.3&auto=format&fit=crop&w=300&q=80',
        skills: ['AI Development', 'Legal Tech', 'Innovation']
    },
    {
        name: 'Prof. Meera Sharma',
        position: 'Head of Education',
        bio: 'Former law school dean with extensive experience in curriculum development and legal pedagogy.',
        image: 'https://images.unsplash.com/photo-1580489944761-15a19d654956?ixlib=rb-4.0.3&auto=format&fit=crop&w=300&q=80',
        skills: ['Legal Education', 'Curriculum Design', 'Academic Leadership']
    }
];
</script>

<template>
    <section class="py-5" style="background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-5" data-aos="fade-up" data-aos-duration="1000">
                    <h2 class="display-5 playfair text-primary-custom">{{ settings.title }}</h2>
                    <p class="lead text-muted font-subheader" data-aos="fade-up" data-aos-delay="200" v-html="settings.description">
                    </p>
                </div>
            </div>
            <div class="row g-4">
                <div v-for="(member, index) in settings.members" :key="`members-${index}`" class="col-lg-3 col-md-4" :data-aos="'zoom-in'"
                    :data-aos-delay="(index + 1) * 150" data-aos-duration="800">
                    <div class="card border-0 shadow-sm text-center h-100 card-hover">
                        <div class="card-body p-4">
                            <img :src="assetUrl(member.media_file)" :alt="member.name" class="rounded-circle mx-auto mb-3 team-img"
                                data-aos="fade-up" :data-aos-delay="(index + 1) * 200">
                            <h5 class="playfair text-primary-custom font-header mb-1" data-aos="fade-up"
                                :data-aos-delay="(index + 1) * 250">
                                {{ member.title }}
                            </h5>
                            <p class="text-secondary font-subheader mb-2" data-aos="fade-up"
                                :data-aos-delay="(index + 1) * 300">
                                {{ member.job_title }}
                            </p>
                            <!--
                        <p class="text-muted small font-subheader">{{ member.bio }}</p>
                        <div class="mt-3">
                            <span
                                v-for="skill in member.skills"
                                :key="skill"
                                class="badge bg-light text-primary-custom me-1 mb-1"
                                data-aos="fade-up"
                                :data-aos-delay="(index + 1) * 350"
                            >
                                {{ skill }}
                            </span>
                        </div>
                        -->
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

.team-img {
    width: 150px;
    height: 150px;
    object-fit: cover;
    border: 4px solid var(--secondary-color);
}

.text-primary-custom {
    color: var(--primary-color) !important;
}
</style>
