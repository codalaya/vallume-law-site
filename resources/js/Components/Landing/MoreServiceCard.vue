
<template>
    <div>
        <div class="more-items-card" :class="{ 'active': isHovered }" @mouseenter="isHovered = true"
            @mouseleave="isHovered = false">

            <!-- Animated Plus Icon -->
            <div class="more-icon-wrapper">
                <div class="more-icon">
                    <div class="plus-horizontal"></div>
                    <div class="plus-vertical"></div>
                </div>
            </div>

            <!-- Content -->
            <h4 class="more-title">More Services</h4>
            <p class="more-description">Explore our additional legal services and specialized practice areas.</p>

            <!-- Animated Arrow -->
            <div class="arrow-container">
                <span class="arrow-text">VIEW ALL</span>
                <div class="arrow-icon">
                    <span class="arrow-line"></span>
                    <span class="arrow-head"></span>
                </div>
            </div>

            <!-- Floating Dots Animation -->
            <div class="floating-dots">
                <span class="dot dot-1"></span>
                <span class="dot dot-2"></span>
                <span class="dot dot-3"></span>
            </div>
        </div>

    </div>
</template>

<script setup>
import { ref } from 'vue';
const isHovered = ref(false);
</script>

<style lang="scss" scoped>
// Variables
$primary-color: #153f83;
$secondary-color: #D4AF37;
$text-muted: #6c757d;

.more-items-card {
    background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
    padding: 40px 30px;
    border-radius: 12px;
    text-align: center;
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    height: 100%;
    box-shadow: 0 2px 20px rgba(0, 0, 0, 0.08);
    cursor: pointer;
    border: 2px dashed rgba($secondary-color, 0.3);
    position: relative;
    overflow: hidden;

    @media (max-width: 768px) {
        padding: 30px 20px;
    }

    @media (max-width: 576px) {
        padding: 25px 15px;
    }

    &::before {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: radial-gradient(circle, rgba($secondary-color, 0.1) 0%, transparent 70%);
        transform: scale(0);
        transition: transform 0.6s ease;
        z-index: 1;
    }

    &:hover,
    &.active {
        // transform: translateY(-8px) scale(1.02);
        box-shadow: 0 15px 50px rgba($primary-color, 0.2);
        border-color: $secondary-color;
        background: linear-gradient(135deg, #ffffff 0%, rgba($secondary-color, 0.05) 100%);

        &::before {
            transform: scale(1);
        }

        .more-icon {
            transform: rotate(180deg) scale(1.1);
            background: $secondary-color;

            .plus-horizontal,
            .plus-vertical {
                background: white;
            }
        }

        .arrow-icon {
            transform: translateX(10px);
        }

        .floating-dots .dot {
            animation-play-state: running;
        }
    }
}

.more-icon-wrapper {
    margin-bottom: 25px;
    position: relative;
    z-index: 2;
}

.more-icon {
    width: 80px;
    height: 80px;
    border-radius: 50%;
    background: rgba($secondary-color, 0.1);
    display: inline-flex;
    align-items: center;
    justify-content: center;
    position: relative;
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);

    @media (max-width: 576px) {
        width: 70px;
        height: 70px;
    }

    .plus-horizontal,
    .plus-vertical {
        position: absolute;
        background: $secondary-color;
        transition: all 0.3s ease;
    }

    .plus-horizontal {
        width: 24px;
        height: 3px;
    }

    .plus-vertical {
        width: 3px;
        height: 24px;
    }
}

.more-title {
    color: $primary-color;
    font-family: 'Playfair Display', serif;
    font-size: 1.4rem;
    font-weight: 500;
    margin-bottom: 15px;
    line-height: 1.3;
    position: relative;
    z-index: 2;
    transition: color 0.3s ease;

    @media (max-width: 576px) {
        font-size: 1.2rem;
    }
}

.more-description {
    color: $text-muted;
    font-size: 14px;
    line-height: 1.6;
    margin-bottom: 25px;
    position: relative;
    z-index: 2;

    @media (max-width: 576px) {
        font-size: 13px;
    }
}

.arrow-container {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    position: relative;
    z-index: 2;
}

.arrow-text {
    color: $secondary-color;
    font-size: 12px;
    font-weight: 600;
    letter-spacing: 1px;
    transition: color 0.3s ease;
}

.arrow-icon {
    position: relative;
    transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}

.arrow-line {
    display: block;
    width: 20px;
    height: 2px;
    background: $secondary-color;
    transition: background 0.3s ease;
}

.arrow-head {
    position: absolute;
    right: -1px;
    top: 50%;
    transform: translateY(-50%) rotate(45deg);
    width: 6px;
    height: 6px;
    border-right: 2px solid $secondary-color;
    border-top: 2px solid $secondary-color;
    transition: border-color 0.3s ease;
}

.floating-dots {
    position: absolute;
    top: 20px;
    right: 20px;
    z-index: 2;

    .dot {
        display: inline-block;
        width: 4px;
        height: 4px;
        border-radius: 50%;
        background: rgba($secondary-color, 0.4);
        margin: 0 2px;
        animation: float 2s ease-in-out infinite;
        animation-play-state: paused;

        &.dot-1 {
            animation-delay: 0s;
        }

        &.dot-2 {
            animation-delay: 0.3s;
        }

        &.dot-3 {
            animation-delay: 0.6s;
        }
    }
}

@keyframes float {

    0%,
    100% {
        transform: translateY(0px);
        opacity: 0.4;
    }

    50% {
        transform: translateY(-8px);
        opacity: 1;
    }
}
</style>
