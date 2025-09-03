<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import SecondaryHero from "@/Components/Landing/SecondaryHero.vue";
import Testimonials from "../Components/Landing/Testimonials.vue";
import TechnologyInnovation from '@/Components/Landing/TechnologyInnovation.vue'
import QuickStats from '@/Components/Landing/QuickStats.vue';
import FreeConsultancy from '@/Components/Landing/FreeConsultancy.vue';
import AiLaunch from '@/Components/Landing/GptLaunchComponent2.vue';
import PartnerInSuccess from "@/Components/Landing/PartnerInSuccess.vue";
</script>
<template>
    <app-layout>
        <SecondaryHero :title="'Testimonials'" :subtitle="'A look into the feedbacks of our clients'"></SecondaryHero>
        <Testimonials></Testimonials>
        <AiLaunch />
        <!-- <TechnologyInnovation  /> -->
        <QuickStats />
        <PartnerInSuccess />
    </app-layout>
</template>
<style lang="scss" scoped>
:root {
    --primary-color: #153f83;
    --secondary-color: #D4AF37;
}

.playfair {
    font-family: 'Playfair Display', serif !important;
}

.poppins {
    font-family: 'Poppins', sans-serif !important;
}
</style>
