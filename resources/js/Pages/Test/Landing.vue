<template>
    <app-layout>
        <hero-component></hero-component>
        <AboutUsComponent />
        <Services />
        <WhyChooseUs />
        <!-- <AiLaunch /> -->
        <GptLaunchComponent2 />
        <!-- <FreeConsultancy /> -->
        <Testimonials />
        <CareerWithUs2 />
        <PartnerInSuccess />
        <BlogSection />
    </app-layout>
</template>
<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import HeroComponent from './HeroComponent.vue';
import WhyChooseUs from "@/Components/Landing/WhyChooseUs2.vue";
import PartnerInSuccess from '@/Components/Landing/PartnerInSuccess.vue';
import GptLaunchComponent2 from '@/Components/Landing/GptLaunchComponent2.vue';
import AboutUsComponent from './AboutUsComponent.vue'
import Services from '@/Components/Landing/Services.vue';
import Testimonials from '@/Components/Landing/Testimonials.vue'
import CareerWithUs2 from '@/Components/Landing/CareerWithUs2.vue'
import BlogSection from '@/Components/Landing/BlogSection.vue'
</script>
