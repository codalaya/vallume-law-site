<template>
    <section class="companyai-launch">
        <div class="container-fluid px-0">
            <div class="row g-0 min-vh-100">
                <!-- Left Content -->
                <div class="col-lg-6 content-side">
                    <div class="content-wrapper p-5">
                        <div class="launch-badge mb-4">
                            <span class="badge-icon">🚀</span>
                            <span class="badge-text">Coming Very Soon</span>
                        </div>

                        <h1 class="main-title mb-4">
                            Meet <span class="highlight">CompanyAI</span>
                            <br>
                            Your Intelligent Legal Assistant
                        </h1>

                        <p class="description mb-4">
                            Experience the future of legal consultation with our revolutionary AI chatbot.
                            Get instant, intelligent responses to your legal queries, just like ChatGPT but
                            specialized for law services. CompanyAI is designed to understand complex legal
                            matters and provide accurate, helpful guidance 24/7.
                        </p>

                        <div class="features-list mb-5">
                            <div class="feature-item">
                                <div class="feature-icon">⚡</div>
                                <div class="feature-text">Instant Legal Insights</div>
                            </div>
                            <div class="feature-item">
                                <div class="feature-icon">🧠</div>
                                <div class="feature-text">AI-Powered Intelligence</div>
                            </div>
                            <div class="feature-item">
                                <div class="feature-icon">🔒</div>
                                <div class="feature-text">Secure & Confidential</div>
                            </div>
                        </div>

                        <div class="cta-section">
                            <p class="cta-text">Be among the first to experience the future of legal AI</p>
                            <button class="register-btn" @click="handleRegister">
                                <span class="btn-text">Register for Early Access</span>
                                <span class="btn-arrow">→</span>
                            </button>
                            <p class="launch-info">
                                <span class="pulse-dot"></span>
                                Launching in the next few weeks
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Right Visual Side -->
                <div class="col-lg-6 visual-side">
                    <div class="visual-wrapper">
                        <div class="ai-image-container">
                            <img src="https://images.unsplash.com/photo-1677442136019-21780ecad995?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80"
                                alt="AI Technology" class="ai-image">
                            <div class="floating-elements">
                                <div class="floating-card card-1">
                                    <div class="card-icon">⚖️</div>
                                    <div class="card-text">Legal Analysis</div>
                                </div>
                                <div class="floating-card card-2">
                                    <div class="card-icon">💬</div>
                                    <div class="card-text">Smart Chat</div>
                                </div>
                                <div class="floating-card card-3">
                                    <div class="card-icon">📊</div>
                                    <div class="card-text">Case Insights</div>
                                </div>
                            </div>
                        </div>
                        <div class="gradient-overlay"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Background Effects -->
        <div class="background-effects">
            <div class="gradient-orb orb-1"></div>
            <div class="gradient-orb orb-2"></div>
            <div class="grid-pattern"></div>
        </div>
    </section>
</template>

<script>
export default {
    name: 'CompanyAILaunch',
    methods: {
        handleRegister() {
            // Handle registration logic here
            console.log('Registration clicked');
            // You can emit an event or call an API
            this.$emit('register-clicked');
        }
    }
}
</script>

<style lang="scss" scoped>
// Color Variables
$primary-color: #153f83;
$secondary-color: #D4AF37;
$dark-bg: #0a1628;
$text-light: #e2e8f0;
$text-muted: #94a3b8;
$white: #ffffff;
$gradient-start: rgba(21, 63, 131, 0.2);
$gradient-end: rgba(212, 175, 55, 0.1);

.companyai-launch {
    position: relative;
    overflow: hidden;
    background: linear-gradient(135deg, $dark-bg 0%, darken($primary-color, 15%) 50%, $dark-bg 100%);
    font-family: 'Poppins', sans-serif;
    color: $text-light;
}

.content-side {
    background: rgba(10, 22, 40, 0.95);
    backdrop-filter: blur(10px);
    position: relative;
    z-index: 2;
    border-right: 1px solid rgba($secondary-color, 0.1);
}

.content-wrapper {
    max-width: 600px;
    margin: 0 auto;
    animation: slideInLeft 1s ease-out;
}

.launch-badge {
    display: inline-flex;
    align-items: center;
    background: linear-gradient(135deg, $primary-color, darken($primary-color, 10%));
    color: white;
    padding: 8px 20px;
    border-radius: 50px;
    font-size: 0.9rem;
    font-weight: 500;
    box-shadow: 0 4px 15px rgba($primary-color, 0.3);
    animation: pulse 2s infinite;

    .badge-icon {
        margin-right: 8px;
        font-size: 1.1rem;
        animation: bounce 2s infinite;
    }
}

.main-title {
    font-family: 'Playfair Display', serif;
    font-size: 3.5rem;
    font-weight: 700;
    color: $text-light;
    line-height: 1.2;

    .highlight {
        background: linear-gradient(135deg, $secondary-color, lighten($secondary-color, 15%));
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        position: relative;

        &::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 100%;
            height: 3px;
            background: linear-gradient(90deg, $secondary-color, lighten($secondary-color, 20%));
            border-radius: 2px;
            animation: expandWidth 1.5s ease-out 0.5s both;
            box-shadow: 0 0 10px rgba($secondary-color, 0.5);
        }
    }

    @media (max-width: 768px) {
        font-size: 2.5rem;
    }
}

.description {
    font-size: 1.1rem;
    color: $text-muted;
    line-height: 1.7;
    font-weight: 400;
}

.features-list {
    display: flex;
    flex-direction: column;
    gap: 15px;
}

.feature-item {
    display: flex;
    align-items: center;
    padding: 15px 20px;
    background: rgba(21, 63, 131, 0.1);
    border-radius: 5px;
    border: 1px solid rgba($secondary-color, 0.2);
    transition: all 0.3s ease;
    animation: slideInUp 0.8s ease-out;
    backdrop-filter: blur(5px);

    &:nth-child(2) {
        animation-delay: 0.2s;
    }

    &:nth-child(3) {
        animation-delay: 0.4s;
    }

    &:hover {
        transform: translateX(10px);
        box-shadow: 0 8px 25px rgba($secondary-color, 0.2);
        border-color: $secondary-color;
        background: rgba(21, 63, 131, 0.2);
    }

    .feature-icon {
        font-size: 1.5rem;
        margin-right: 15px;
        width: 40px;
        text-align: center;
        filter: drop-shadow(0 0 5px rgba($secondary-color, 0.3));
    }

    .feature-text {
        font-weight: 500;
        color: $text-light;
    }
}

.cta-section {
    text-align: center;

    .cta-text {
        font-size: 1rem;
        color: $text-muted;
        margin-bottom: 25px;
    }
}

.register-btn {
    background: linear-gradient(135deg, $secondary-color, darken($secondary-color, 10%));
    color: $dark-bg;
    border: none;
    padding: 18px 40px;
    font-size: 1.1rem;
    font-weight: 600;
    border-radius: 50px;
    display: inline-flex;
    align-items: center;
    gap: 10px;
    transition: all 0.3s ease;
    box-shadow: 0 8px 30px rgba($secondary-color, 0.4);
    position: relative;
    overflow: hidden;

    &::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
        transition: left 0.5s;
    }

    &:hover {
        transform: translateY(-3px);
        box-shadow: 0 15px 40px rgba($secondary-color, 0.5);

        &::before {
            left: 100%;
        }

        .btn-arrow {
            transform: translateX(5px);
        }
    }

    .btn-arrow {
        transition: transform 0.3s ease;
        font-size: 1.2rem;
    }
}

.launch-info {
    margin-top: 20px;
    font-size: 0.9rem;
    color: $text-muted;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;

    .pulse-dot {
        width: 8px;
        height: 8px;
        background: $secondary-color;
        border-radius: 50%;
        animation: pulse 1.5s infinite;
        box-shadow: 0 0 10px rgba($secondary-color, 0.5);
    }
}

.visual-side {
    position: relative;
    min-height: 100vh;
}

.visual-wrapper {
    position: relative;
    width: 100%;
    height: 100%;
    overflow: hidden;
}

.ai-image-container {
    position: relative;
    width: 100%;
    height: 100%;

    .ai-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        animation: zoomIn 1.2s ease-out;
        position: relative;
        z-index: 10;
    }
}

.floating-elements {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    pointer-events: none;
}

.floating-card {
    position: absolute;
    background: rgba(10, 22, 40, 0.9);
    backdrop-filter: blur(15px);
    padding: 15px 20px;
    border-radius: 15px;
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
    border: 1px solid rgba($secondary-color, 0.3);
    display: flex;
    align-items: center;
    gap: 10px;
    animation: float 3s ease-in-out infinite;
    z-index: 20;

    &.card-1 {
        top: 20%;
        right: 10%;
        animation-delay: 0s;
    }

    &.card-2 {
        top: 50%;
        right: 5%;
        animation-delay: 1s;
    }

    &.card-3 {
        bottom: 25%;
        right: 15%;
        animation-delay: 2s;
    }

    .card-icon {
        font-size: 1.5rem;
        filter: drop-shadow(0 0 5px rgba($secondary-color, 0.3));
    }

    .card-text {
        font-weight: 600;
        color: $text-light;
        font-size: 0.9rem;
    }
}

.gradient-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(135deg,
            rgba($dark-bg, 0.7) 0%,
            rgba($primary-color, 0.4) 50%,
            rgba($dark-bg, 0.8) 100%);
    pointer-events: none;
}

.background-effects {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    pointer-events: none;
    z-index: 1;
}

.gradient-orb {
    position: absolute;
    border-radius: 50%;
    filter: blur(60px);
    opacity: 0.4;
    animation: float 6s ease-in-out infinite;

    &.orb-1 {
        width: 300px;
        height: 300px;
        background: radial-gradient(circle, rgba($secondary-color, 0.4), transparent);
        top: -10%;
        left: -10%;
        animation-delay: 0s;
    }

    &.orb-2 {
        width: 250px;
        height: 250px;
        background: radial-gradient(circle, rgba($primary-color, 0.3), transparent);
        bottom: -10%;
        right: -10%;
        animation-delay: 3s;
    }
}

.grid-pattern {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-image:
        linear-gradient(rgba($secondary-color, 0.1) 1px, transparent 1px),
        linear-gradient(90deg, rgba($secondary-color, 0.1) 1px, transparent 1px);
    background-size: 50px 50px;
    // animation: moveGrid 20s linear infinite;
}

// Animations
@keyframes slideInLeft {
    from {
        opacity: 0;
        transform: translateX(-50px);
    }

    to {
        opacity: 1;
        transform: translateX(0);
    }
}

@keyframes slideInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }

    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes expandWidth {
    from {
        width: 0;
    }

    to {
        width: 100%;
    }
}

@keyframes pulse {

    0%,
    100% {
        opacity: 1;
        transform: scale(1);
    }

    50% {
        opacity: 0.8;
        transform: scale(1.05);
    }
}

@keyframes bounce {

    0%,
    20%,
    50%,
    80%,
    100% {
        transform: translateY(0);
    }

    40% {
        transform: translateY(-5px);
    }

    60% {
        transform: translateY(-3px);
    }
}

@keyframes float {

    0%,
    100% {
        transform: translateY(0);
    }

    50% {
        transform: translateY(-10px);
    }
}

@keyframes zoomIn {
    from {
        transform: scale(1.1);
    }

    to {
        transform: scale(1);
    }
}

@keyframes moveGrid {
    0% {
        transform: translate(0, 0);
    }

    100% {
        transform: translate(50px, 50px);
    }
}

// Responsive Design
@media (max-width: 991px) {
    .companyai-launch .row {
        flex-direction: column-reverse;
    }

    .visual-side {
        min-height: 50vh;
    }

    .floating-card {
        display: none;
    }
}

@media (max-width: 768px) {
    .content-wrapper {
        padding: 2rem !important;
    }

    .features-list {
        .feature-item {
            padding: 12px 15px;

            .feature-icon {
                font-size: 1.2rem;
                width: 30px;
                margin-right: 10px;
            }

            .feature-text {
                font-size: 0.9rem;
            }
        }
    }

    .register-btn {
        padding: 15px 30px;
        font-size: 1rem;
    }
}
</style>
