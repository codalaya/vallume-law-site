<template>
    <section class="use-cases-section">

        <div class="container-fluid content-section">
            <!-- Section Header -->
            <div class="text-center mb-5" data-aos="fade-up" data-aos-delay="400">
                <h2 class="display-4 fw-bold text-primary mb-4 rainbow-text" v-html="settings.title"></h2>
                <p class="lead text-muted col-lg-8 mx-auto" v-html="settings.description">
                </p>
            </div>

            <!-- Use Cases Grid -->
            <div class="use-cases-grid">
                <div v-for="(useCase, index) in useCases" :key="index" class="row use-case-row mb-5"
                    :class="{ 'flex-lg-row-reverse': index % 2 === 1 && !isMobile }">
                    <!-- Content -->
                    <div class="col-lg-6 use-case-content" data-aos="fade-right">
                        <div class="content-block">
                            <div class="use-case-number">{{ String(index + 1).padStart(2, '0') }}</div>
                            <h3 class="fw-bold text-primary mb-3">{{ useCase.title }}</h3>
                            <p class="text-muted mb-4">{{ useCase.body }}</p>
                            <ul class="feature-list" v-if="useCase.points">
                                <li v-for="(feature, i) in (useCase.points ?? [])" :key="`point-${index}-${i}`">{{
                                    feature }}</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Image -->
                    <div class="col-lg-6 use-case-media" data-aos="fade-left">
                        <div class="media-block">
                            <img :src="assetUrl(useCase.media_file)" :alt="useCase.title"
                                class="img-fluid use-case-image" v-if="useCase.media_type == 'image'">
                            <video v-if="useCase.media_type == 'video'" :src="assetUrl(useCase.media_file)" autoplay
                                muted loop playsinline :controls="false" preload="auto"
                                class="img-fluid use-case-image">
                            </video>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Call to Action -->
        <!-- <div class="text-center pt-4">
            <div class="cta-block">
                <h3 class="fw-bold text-secondary mb-3">Ready to Transform Your Legal Practice?</h3>
                <p class="text-white mb-4">
                    Join the future of legal technology with Vallume GPT's comprehensive AI solutions
                </p>
                <button class="btn btn-secondary btn-lg px-5 py-3 me-3 mb-2">
                    Request Demo
                </button>
                <button class="btn btn-outline-primary btn-lg px-5 py-3 mb-2">
                    Learn More
                </button>
            </div>
        </div> -->
    </section>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import { useMediaQuery } from '@vueuse/core'
import { usePage, Link } from '@inertiajs/inertia-vue3';
import { gsap } from "gsap";
import { computed } from 'vue';

const page = usePage();
const settings = page.props.value.dashboard_data.useCaseSection;
const assetUrl = window.assetUrl;
onMounted(() => {
    // gsap.to(".rainbow-text", {
    //     backgroundPosition: "100% 0%",
    //     duration: 8,
    //     ease: "linear",
    //     repeat: -1
    // });
})

// returns a reactive boolean
const isMobile = useMediaQuery('(max-width: 767px)')

const useCases = computed(() => {
    if (!settings.uses) return [];
    return settings.uses;
});


</script>

<style lang="scss" scoped>
// Variables
$primary-color: #153f83;
$secondary-color: #D4AF37;
$light-bg: #f8f9fa;
$text-muted: #6c757d;

.rainbow-text {
    font-size: 3rem;
    font-weight: bold;
    background: linear-gradient(90deg,
            orange,
            gold,
            yellow, gold,
            orange,
        );
    background-size: 400% 100%;
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;

}

js Copy Edit // Global styles

.use-cases-section {
    font-family: 'Poppins', sans-serif;

    h2,
    h3 {
        font-family: 'Playfair Display', serif;
    }
}

// Custom Bootstrap overrides
.text-primary {
    color: $primary-color !important;
}

// Use Cases Grid
.use-cases-grid {
    margin-top: 3rem;
}

.use-case-row {
    min-height: 400px;
    margin-bottom: 5rem;

    & .use-case-content {
        border-radius: 2rem;

    }

    &:nth-child(even) {
        .use-case-content {
            background: linear-gradient(90deg, rgba(21, 63, 131, 0.02) 10%, transparent 100%);
        }
    }

    &:nth-child(odd) {
        .use-case-content {
            background: linear-gradient(90deg, rgba(212, 175, 55, 0.02) 50%, transparent 100%);
        }
    }

    &.flex-lg-row-reverse {
        &:nth-child(even) {
            .use-case-content {
                background: linear-gradient(-90deg, rgba(21, 63, 131, 0.02) 0%, transparent 100%);
            }
        }

        &:nth-child(odd) {
            .use-case-content {
                background: linear-gradient(-90deg, rgba(212, 175, 55, 0.02) 0%, transparent 100%);
            }
        }
    }
}

// Content Blocks
.content-block {
    padding: 3rem 2rem;
    position: relative;
    height: 100%;
}

.use-case-number {
    position: absolute;
    top: 0;
    right: 2rem;
    background: $secondary-color;
    color: white;
    width: 60px;
    height: 30px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: bold;
    font-size: 0.9rem;
    letter-spacing: 1px;
}

// Media Blocks
.media-block {
    height: 100%;
    overflow: hidden;
    position: relative;
    border-radius: 1.5rem;
}

.use-case-image {
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
    object-fit: cover;
    display: block;
    position: absolute;
}

// Feature Lists
.feature-list {
    list-style: none;
    padding: 0;
    margin: 0;

    li {
        position: relative;
        padding-left: 2rem;
        margin-bottom: 1rem;
        color: $text-muted;
        font-weight: 400;
        line-height: 1.5;

        &::before {
            content: '→';
            position: absolute;
            left: 0;
            top: 0;
            color: $secondary-color;
            font-weight: bold;
            font-size: 1.1rem;
        }
    }
}

// Call to Action
.cta-block {
    background: linear-gradient(180deg, rgba(21, 63, 131) 0%, rgba(21, 63, 131) 90%);
    padding: 4rem 2rem;
    border-top: 1px solid rgba(21, 63, 131, 0.1);
    //   border-bottom: 1px solid rgba(21, 63, 131, 0.1);
}

// Responsive Design
@media (max-width: 991px) {
    .use-case-row {
        min-height: auto;
        margin-bottom: 4rem;

        .use-case-content {
            margin-bottom: 2rem;
            background: none !important;
        }

        &.flex-lg-row-reverse {
            flex-direction: column !important;

            .use-case-content {
                order: 2;
                background: none !important;
            }

            .use-case-media {
                order: 1;
                margin-bottom: 2rem;
            }
        }
    }

    .content-block {
        padding: 2rem 1rem;
    }

    .media-block {
        height: 300px;
    }

    .use-case-number {
        right: 1rem;
    }
}

@media (max-width: 768px) {
    .use-case-row {
        margin-bottom: 3rem;
    }

    .content-block {
        padding: 2rem 0;
    }

    .use-case-number {
        width: 50px;
        height: 25px;
        font-size: 0.8rem;
        right: 0;
    }

    .media-block {
        height: 250px;
    }

    .feature-list li {
        font-size: 0.9rem;
        margin-bottom: 0.75rem;
    }

    .cta-block {
        padding: 3rem 1rem;

        .btn {
            width: 100%;
            margin-bottom: 1rem;

            &:last-child {
                margin-bottom: 0;
            }
        }
    }
}

@media (max-width: 576px) {
    .display-4 {
        font-size: 2rem;
    }

    .content-block {
        padding: 1.5rem 0;
    }

    .use-case-number {
        width: 45px;
        height: 22px;
        font-size: 0.75rem;
    }

    .feature-list {
        li {
            padding-left: 1.5rem;
            font-size: 0.85rem;
            margin-bottom: 0.5rem;
        }
    }

    .media-block {
        height: 200px;
    }
}

// Clean, minimal tech styling
h3 {
    font-weight: 700;
    line-height: 1.2;
}

p {
    line-height: 1.6;
    font-weight: 300;
}

.lead {
    font-weight: 300;
    line-height: 1.5;
}
</style>
