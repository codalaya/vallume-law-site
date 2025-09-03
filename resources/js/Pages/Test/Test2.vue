<template>
    <div class="min-h-screen bg-gray-900 text-white overflow-hidden">
        <!-- Scroll Indicator -->
        <div class="scroll-indicator" :style="{ width: `${scrollProgress}%` }" />

        <!-- Navigation -->
        <nav class="navbar-glass fixed-top navbar navbar-expand-lg py-3">
            <div class="container">
                <a class="navbar-brand fw-bold" href="#" @click="scrollToSection('home')">
                    LegalAI Pro
                </a>
                <button class="navbar-toggler border-0" type="button" @click="isMenuOpen = !isMenuOpen">
                    <i :class="isMenuOpen ? 'fas fa-times' : 'fas fa-bars'"></i>
                </button>
                <div class="collapse navbar-collapse" :class="{ show: isMenuOpen }">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item" v-for="item in navItems" :key="item">
                            <a class="nav-link px-3 text-white hover-gold transition-colors"
                                :href="`#${item.toLowerCase()}`" @click="scrollToSection(item.toLowerCase())">
                                {{ item }}
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <HeroComponent />

        <!-- Hero Section -->
        <section id="home" class="hero-section min-vh-100 d-flex align-items-center position-relative">
            <div class="floating-shape" v-for="n in 3" :key="n" :class="`shape-${n}`"></div>

            <div class="container position-relative hero-content">
                <div class="row align-items-center">
                    <div class="col-lg-6" :class="{ 'animate-on-scroll': true, 'in-view': isVisible.hero }">
                        <h1 class="display-2 fw-bold mb-4 playfair"
                            :style="{ transform: `translateY(${scrollY * 0.1}px)` }">
                            The Future of <span class="text-gradient">Legal Tech</span> is Here
                        </h1>
                        <p class="lead mb-4 poppins hero-subtitle">
                            Revolutionizing legal services with cutting-edge AI technology. Streamline your practice,
                            enhance accuracy, and deliver exceptional results to your clients.
                        </p>
                        <div class="d-flex gap-3 flex-wrap">
                            <button
                                class="btn btn-lg px-4 py-3 rounded-pill d-flex align-items-center gap-2 pulse-ring btn-primary-custom">
                                Get Started
                                <i class="fas fa-chevron-right"></i>
                            </button>
                            <button class="btn btn-outline-light btn-lg px-4 py-3 rounded-pill poppins">
                                Watch Demo
                            </button>
                        </div>
                    </div>
                    <div class="col-lg-6 mt-5 mt-lg-0">
                        <div class="video-container position-relative"
                            :style="{ transform: `translateY(${scrollY * -0.05}px)` }">
                            <video ref="heroVideo" class="w-100 h-auto hero-video" autoplay muted loop playsinline>
                                <source
                                    src="https://player.vimeo.com/external/371433846.sd.mp4?s=236da2f3c0fd273d2c6d9a064f3ae35579b2bbdf&profile_id=139"
                                    type="video/mp4">
                            </video>
                            <button @click="toggleVideo"
                                class="btn btn-outline-light rounded-circle position-absolute top-50 start-50 translate-middle video-control">
                                <i :class="isVideoPlaying ? 'fas fa-pause' : 'fas fa-play'"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tech-grid position-absolute w-100 h-100"></div>
        </section>

        <!-- About Section -->
        <section id="about" class="py-5 position-relative about-section">
            <div class="container py-5">
                <div class="row align-items-center">
                    <div class="col-lg-6" :class="{ 'animate-on-scroll': true, 'in-view': isVisible.about }">
                        <div class="hexagon mx-auto mb-4"></div>
                        <img src="https://images.unsplash.com/photo-1560472354-b33ff0c44a43?w=600&h=400&fit=crop"
                            alt="AI Technology" class="img-fluid rounded-4 shadow-lg about-image"
                            :style="{ transform: `translateX(${scrollY * 0.02}px)` }" />
                    </div>
                    <div class="col-lg-6 mt-5 mt-lg-0"
                        :class="{ 'animate-on-scroll': true, 'in-view': isVisible.about }">
                        <h2 class="display-4 fw-bold mb-4 playfair">
                            About <span class="text-gradient">LegalAI Pro</span>
                        </h2>
                        <p class="lead mb-4 poppins about-description">
                            We're pioneering the intersection of artificial intelligence and legal expertise. Our team
                            combines decades of legal experience with cutting-edge technology to deliver unprecedented
                            solutions.
                        </p>
                        <div class="glass-morphism p-4 rounded-4 mb-4">
                            <div class="row text-center">
                                <div class="col-4">
                                    <h3 class="text-gradient fw-bold">500+</h3>
                                    <p class="mb-0 poppins stat-label">Clients Served</p>
                                </div>
                                <div class="col-4">
                                    <h3 class="text-gradient fw-bold">99.8%</h3>
                                    <p class="mb-0 poppins stat-label">Accuracy Rate</p>
                                </div>
                                <div class="col-4">
                                    <h3 class="text-gradient fw-bold">24/7</h3>
                                    <p class="mb-0 poppins stat-label">Support</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Services Section -->
        <section id="services" class="py-5 services-section">
            <div class="container py-5">
                <div class="text-center mb-5" :class="{ 'animate-on-scroll': true, 'in-view': isVisible.services }">
                    <h2 class="display-4 fw-bold mb-4 playfair">
                        Our <span class="text-gradient">Services</span>
                    </h2>
                    <p class="lead poppins services-subtitle">
                        Comprehensive AI-powered legal solutions designed to transform your practice and enhance client
                        outcomes.
                    </p>
                </div>

                <div class="row g-4">
                    <div v-for="(service, index) in services" :key="index" class="col-lg-6"
                        :class="{ 'animate-on-scroll': true, 'in-view': isVisible.services }"
                        :style="{ animationDelay: `${index * 0.1}s` }">
                        <div class="service-card glass-morphism p-4 rounded-4 h-100">
                            <div class="text-gradient mb-3 service-icon">
                                <i :class="service.icon"></i>
                            </div>
                            <h4 class="fw-bold mb-3 poppins service-title">
                                {{ service.title }}
                            </h4>
                            <p class="poppins service-description">
                                {{ service.description }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Features Section -->
        <section id="features" class="py-5 features-section">
            <div class="container py-5">
                <div class="row align-items-center">
                    <div class="col-lg-6" :class="{ 'animate-on-scroll': true, 'in-view': isVisible.features }">
                        <h2 class="display-4 fw-bold mb-4 playfair">
                            Why Choose <span class="text-gradient">LegalAI Pro</span>?
                        </h2>
                        <p class="lead mb-4 poppins features-description">
                            Experience the perfect blend of artificial intelligence and legal expertise with our
                            comprehensive feature set.
                        </p>
                        <div class="row g-3">
                            <div v-for="(feature, index) in features" :key="index" class="col-12">
                                <div class="d-flex align-items-center gap-3 feature-item">
                                    <i class="fas fa-check-circle text-success flex-shrink-0"></i>
                                    <span class="poppins">{{ feature }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 mt-5 mt-lg-0"
                        :class="{ 'animate-on-scroll': true, 'in-view': isVisible.features }">
                        <div class="glass-morphism p-4 rounded-4">
                            <img src="https://images.unsplash.com/photo-1551434678-e076c223a692?w=600&h=400&fit=crop"
                                alt="Legal Technology Dashboard" class="img-fluid rounded-3 features-image"
                                :style="{ transform: `translateY(${scrollY * -0.03}px)` }" />
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Testimonials Section -->
        <section id="testimonials" class="py-5 testimonials-section">
            <div class="container py-5">
                <div class="text-center mb-5" :class="{ 'animate-on-scroll': true, 'in-view': isVisible.testimonials }">
                    <h2 class="display-4 fw-bold mb-4 playfair">
                        Client <span class="text-gradient">Testimonials</span>
                    </h2>
                    <p class="lead poppins testimonials-subtitle">
                        Hear from legal professionals who've transformed their practice with our AI solutions.
                    </p>
                </div>

                <div class="row g-4">
                    <div v-for="(testimonial, index) in testimonials" :key="index" class="col-lg-4"
                        :class="{ 'animate-on-scroll': true, 'in-view': isVisible.testimonials }"
                        :style="{ animationDelay: `${index * 0.1}s` }">
                        <div class="glass-morphism p-4 rounded-4 h-100 testimonial-card">
                            <div class="d-flex mb-3">
                                <i v-for="n in testimonial.rating" :key="n" class="fas fa-star text-warning"></i>
                            </div>
                            <p class="mb-4 poppins testimonial-content">
                                "{{ testimonial.content }}"
                            </p>
                            <div class="d-flex align-items-center gap-3">
                                <div class="testimonial-avatar">
                                    {{ testimonial.name.charAt(0) }}
                                </div>
                                <div>
                                    <h6 class="mb-0 fw-bold poppins testimonial-name">
                                        {{ testimonial.name }}
                                    </h6>
                                    <small class="testimonial-role">{{ testimonial.role }}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Contact Section -->
        <section id="contact" class="py-5 contact-section">
            <div class="container py-5">
                <div class="text-center mb-5" :class="{ 'animate-on-scroll': true, 'in-view': isVisible.contact }">
                    <h2 class="display-4 fw-bold mb-4 playfair">
                        Get <span class="text-gradient">Started</span> Today
                    </h2>
                    <p class="lead mb-4 poppins contact-description">
                        Ready to revolutionize your legal practice? Contact us for a personalized demo and consultation.
                    </p>
                    <div class="d-flex justify-content-center gap-3 flex-wrap">
                        <button class="btn btn-lg px-5 py-3 rounded-pill btn-primary-custom poppins">
                            Schedule Demo
                        </button>
                        <button class="btn btn-outline-light btn-lg px-5 py-3 rounded-pill poppins">
                            Contact Sales
                        </button>
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="py-4 text-center footer-section">
            <div class="container">
                <p class="mb-0 poppins footer-text">
                    © 2025 LegalAI Pro. All rights reserved. Powered by cutting-edge AI technology.
                </p>
            </div>
        </footer>

        <!-- Scroll to Top Button -->
        <Transition name="fade">
            <button v-if="showScrollTop" @click="scrollToTop"
                class="btn rounded-circle position-fixed scroll-to-top pulse-ring">
                <i class="fas fa-arrow-up"></i>
            </button>
        </Transition>
    </div>
</template>

<script setup>
import { ref, reactive, onMounted, onUnmounted, computed } from 'vue'
import HeroComponent from './HeroComponent.vue'

const isMenuOpen = ref(false)
const scrollY = ref(0)
const heroVideo = ref(null)
const isVideoPlaying = ref(true)

const navItems = ['Home', 'About', 'Services', 'Features', 'Testimonials', 'Contact']

const services = [
    {
        icon: 'fas fa-brain',
        title: 'AI Legal Research',
        description: 'Automated case law analysis and legal precedent discovery powered by advanced machine learning algorithms.'
    },
    {
        icon: 'fas fa-shield-alt',
        title: 'Contract Intelligence',
        description: 'Smart contract review and risk assessment using natural language processing and AI-driven insights.'
    },
    {
        icon: 'fas fa-bolt',
        title: 'Compliance Automation',
        description: 'Streamlined regulatory compliance monitoring and reporting through intelligent automation systems.'
    },
    {
        icon: 'fas fa-users',
        title: 'Legal Tech Consulting',
        description: 'Strategic technology implementation guidance for law firms and legal departments.'
    }
]

const testimonials = [
    {
        name: 'Sarah Chen',
        role: 'Senior Partner, Chen & Associates',
        content: 'LegalAI Pro transformed our research process. What used to take hours now takes minutes with incredible accuracy.',
        rating: 5
    },
    {
        name: 'Michael Rodriguez',
        role: 'General Counsel, TechCorp',
        content: 'The contract intelligence feature caught critical issues we might have missed. It\'s like having a senior attorney reviewing every document.',
        rating: 5
    },
    {
        name: 'Emily Watson',
        role: 'Managing Director, LawTech Solutions',
        content: 'Outstanding service and cutting-edge technology. The team\'s expertise in both law and AI is unmatched.',
        rating: 5
    }
]

const features = [
    'Advanced AI-powered legal research',
    'Real-time compliance monitoring',
    'Automated document analysis',
    '24/7 technical support',
    'Enterprise-grade security',
    'Seamless integration capabilities'
]

const isVisible = reactive({
    hero: true,
    about: false,
    services: false,
    features: false,
    testimonials: false,
    contact: false
})

const scrollProgress = computed(() => {
    const docHeight = document.documentElement.scrollHeight - window.innerHeight
    return docHeight > 0 ? (scrollY.value / docHeight) * 100 : 0
})

const showScrollTop = computed(() => scrollY.value > 300)

const handleScroll = () => {
    scrollY.value = window.scrollY

    // Check visibility of sections
    const sections = ['hero', 'about', 'services', 'features', 'testimonials', 'contact']
    sections.forEach(section => {
        const element = document.getElementById(section === 'hero' ? 'home' : section)
        if (element) {
            const rect = element.getBoundingClientRect()
            isVisible[section] = rect.top < window.innerHeight && rect.bottom > 0
        }
    })
}

const toggleVideo = () => {
    if (heroVideo.value) {
        if (isVideoPlaying.value) {
            heroVideo.value.pause()
        } else {
            heroVideo.value.play()
        }
        isVideoPlaying.value = !isVideoPlaying.value
    }
}

const scrollToTop = () => {
    window.scrollTo({ top: 0, behavior: 'smooth' })
}

const scrollToSection = (sectionId) => {
    const element = document.getElementById(sectionId)
    if (element) {
        element.scrollIntoView({ behavior: 'smooth' })
    }
    isMenuOpen.value = false
}

onMounted(() => {
    window.addEventListener('scroll', handleScroll)
    handleScroll() // Initial check
})

onUnmounted(() => {
    window.removeEventListener('scroll', handleScroll)
})


</script>

<style lang="scss" scoped>
@import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=Poppins:wght@300;400;500;600;700&display=swap');
@import url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css');

:root {
    --primary-color: #153f83;
    --secondary-color: #D4AF37;
}

// Typography
.playfair {
    font-family: 'Playfair Display', serif;
}

.poppins {
    font-family: 'Poppins', sans-serif;
}

// Hero Section
.hero-section {
    background: linear-gradient(135deg, var(--primary-color) 0%, #1a1a2e 100%);
    position: relative;
    overflow: hidden;

    &::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000"><defs><radialGradient id="g"><stop offset="0%" stop-color="rgba(212,175,55,0.3)"/><stop offset="100%" stop-color="transparent"/></radialGradient></defs><circle cx="200" cy="200" r="100" fill="url(%23g)"><animate attributeName="cx" values="200;800;200" dur="20s" repeatCount="indefinite"/></circle><circle cx="800" cy="600" r="150" fill="url(%23g)"><animate attributeName="cy" values="600;200;600" dur="25s" repeatCount="indefinite"/></circle></svg>') no-repeat center;
        background-size: cover;
        opacity: 0.6;
    }
}

.hero-content {
    z-index: 2;
}

.hero-subtitle {
    font-size: 1.2rem;
    opacity: 0.9;
}

// Floating Shapes
.floating-shape {
    position: absolute;
    background: rgba(212, 175, 55, 0.1);
    border-radius: 50%;
    animation: float 6s ease-in-out infinite;

    &.shape-1 {
        top: 20%;
        left: 10%;
        width: 80px;
        height: 80px;
        animation-delay: 0s;
    }

    &.shape-2 {
        top: 60%;
        right: 10%;
        width: 120px;
        height: 120px;
        animation-delay: 2s;
    }

    &.shape-3 {
        bottom: 20%;
        left: 20%;
        width: 60px;
        height: 60px;
        animation-delay: 4s;
    }
}

@keyframes float {

    0%,
    100% {
        transform: translateY(0px) rotate(0deg);
    }

    50% {
        transform: translateY(-20px) rotate(180deg);
    }
}

// Glass Morphism
.glass-morphism {
    background: rgba(255, 255, 255, 0.05);
    backdrop-filter: blur(20px);
    border: 1px solid rgba(255, 255, 255, 0.1);
}

// Video Container
.video-container {
    position: relative;
    overflow: hidden;
    border-radius: 20px;
    box-shadow: 0 25px 50px rgba(0, 0, 0, 0.3);
}

.hero-video {
    max-height: 500px;
    object-fit: cover;
}

.video-control {
    width: 60px;
    height: 60px;
}

// Tech Grid
.tech-grid {
    background: linear-gradient(45deg, transparent 30%, rgba(212, 175, 55, 0.1) 50%, transparent 70%);
    background-size: 20px 20px;
    animation: tech-move 20s linear infinite;
    z-index: 1;
    opacity: 0.1;
}

@keyframes tech-move {
    0% {
        background-position: 0 0;
    }

    100% {
        background-position: 20px 20px;
    }
}

// Navigation
.navbar-glass {
    background: rgba(21, 63, 131, 0.9);
    backdrop-filter: blur(20px);
    transition: all 0.3s ease;
    z-index: 1030;

    .navbar-brand {
        font-family: 'Playfair Display', serif;
        font-size: 1.8rem;
        color: var(--secondary-color);
    }

    .nav-link {
        font-family: 'Poppins', sans-serif;
        transition: color 0.3s ease;

        &:hover {
            color: var(--secondary-color) !important;
        }
    }
}

// Scroll Indicator
.scroll-indicator {
    position: fixed;
    top: 0;
    left: 0;
    height: 4px;
    background: linear-gradient(90deg, var(--primary-color), var(--secondary-color));
    z-index: 1000;
    transition: width 0.3s ease;
}

// Sections
.about-section {
    background: linear-gradient(135deg, #1a1a2e 0%, var(--primary-color) 100%);
}

.services-section {
    background: linear-gradient(180deg, var(--primary-color), #1a1a2e);
}

.features-section {
    background: linear-gradient(135deg, #1a1a2e, var(--primary-color));
}

.testimonials-section {
    background: linear-gradient(180deg, var(--primary-color), #1a1a2e);
}

.contact-section {
    background: linear-gradient(135deg, #1a1a2e, var(--primary-color));
}

.footer-section {
    background: var(--primary-color);
}

// Service Cards
.service-card {
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    transform-style: preserve-3d;

    &:hover {
        transform: translateY(-10px) rotateX(5deg);
        box-shadow: 0 20px 40px rgba(212, 175, 55, 0.3);
    }
}

.service-icon {
    font-size: 2rem;
}

.service-title {
    color: var(--secondary-color);
}

.service-description {
    opacity: 0.8;
}

// Animations
.animate-on-scroll {
    opacity: 0;
    transform: translateY(30px);
    transition: all 0.8s cubic-bezier(0.4, 0, 0.2, 1);

    &.in-view {
        opacity: 1;
        transform: translateY(0);
    }
}

// Text Gradient
.text-gradient {
    background: linear-gradient(135deg, var(--secondary-color), #ffd700);
    background-clip: text;
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}

// Pulse Animation
.pulse-ring {
    animation: pulse-ring 2s infinite;
}

@keyframes pulse-ring {
    0% {
        transform: scale(0.8);
        opacity: 1;
    }

    50% {
        transform: scale(1.2);
        opacity: 0.7;
    }

    100% {
        transform: scale(0.8);
        opacity: 1;
    }
}

// Buttons
.btn-primary-custom {
    background: var(--secondary-color);
    color: black;
    font-family: 'Poppins', sans-serif;
    font-weight: 600;
    border: none;

    &:hover {
        background: #b8941f;
        color: black;
    }
}

// Hexagon
.hexagon {
    width: 100px;
    height: 86.6px;
    background: var(--secondary-color);
    position: relative;
    margin: 43.3px 0;
    border-radius: 10px;
    opacity: 0.3;

    &:before,
    &:after {
        content: "";
        position: absolute;
        width: 0;
        border-left: 50px solid transparent;
        border-right: 50px solid transparent;
    }

    &:before {
        bottom: 100%;
        border-bottom: 28.87px solid var(--secondary-color);
    }

    &:after {
        top: 100%;
        border-top: 28.87px solid var(--secondary-color);
    }
}

// Statistics
.stat-label {
    font-size: 0.9rem;
}

// About Section
.about-description {
    opacity: 0.9;
}

// Services Section
.services-subtitle {
    max-width: 600px;
    margin: 0 auto;
}

// Features Section
.features-description {
    opacity: 0.9;
}

.feature-item {
    font-size: 1rem;
}

// Testimonials
.testimonial-card {
    height: 100%;
}

.testimonial-content {
    font-style: italic;
    opacity: 0.9;
}

.testimonial-avatar {
    background: var(--secondary-color);
    color: black;
    border-radius: 50%;
    width: 50px;
    height: 50px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.2rem;
    font-weight: bold;
}

.testimonial-name {
    color: var(--secondary-color);
}

.testimonial-role {
    opacity: 0.8;
}

// Contact Section
.contact-description {
    font-family: 'Poppins', sans-serif;
}

// Footer
.footer-text {
    opacity: 0.8;
}

// Scroll to Top
.scroll-to-top {
    background: var(--secondary-color);
    color: black;
    width: 60px;
    height: 60px;
    bottom: 1.5rem;
    right: 1.5rem;
    z-index: 1000;
    border: none;
}

// Transitions
.fade-enter-active,
.fade-leave-active {
    transition: opacity 0.3s;
}

.fade-enter-from,
.fade-leave-to {
    opacity: 0;
}

// Responsive Design
@media (max-width: 768px) {
    .hero-section {
        .display-2 {
            font-size: 2.5rem;
        }
    }

    .floating-shape {
        display: none;
    }

    .service-card {
        margin-bottom: 1rem;
    }
}

// Hover Effects
.hover-gold:hover {
    color: var(--secondary-color) !important;
}

.transition-colors {
    transition: color 0.3s ease;
}
</style>
