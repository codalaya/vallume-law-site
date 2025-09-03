<script setup>
import AppLayout from '../Layouts/AppLayout.vue';
import SecondaryHero from '../Components/Landing/SecondaryHero.vue';
import AboutUsDescription from '../Components/Landing/AboutUsDescription.vue';
import QuickStats from '../Components/Landing/QuickStats.vue';
import CompanyTimeline from '../Components/Landing/CompanyTimeline.vue';
import TeamSection from '../Components/Landing/TeamSection.vue';
import GptLaunchComponent from '@/Components/Landing/GptLaunchComponent2.vue'
import Testimonials from '../Components/Landing/Testimonials.vue';
import PartnerInSuccess from '../Components/Landing/PartnerInSuccess.vue';
import GlobalOperations from '../Components/Landing/GlobalOperation.vue';

const subtitle = "Transforming legal education, consultation, and technology across India and the United States. Where tradition meets innovation in the pursuit of justice.";
</script>

<template>
    <app-layout title="About Us" :showLoader="showLoader">
        <secondary-hero title="About Us" :subtitle="subtitle" />
        <AboutUsDescription />
        <!-- <mission-vision-expertise /> -->
        <!-- <founders-note2 /> -->
        <quick-stats />
        <company-timeline />
        <!-- <global-operations /> -->
        <team-section />
        <testimonials />
        <!-- <technology-innovation /> -->
        <gpt-launch-component />
        <PartnerInSuccess />
    </app-layout>

</template>
