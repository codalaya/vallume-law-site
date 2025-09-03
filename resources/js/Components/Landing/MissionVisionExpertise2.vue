<template>
    <section class="mission-vision-section">
        <div class="container-fluid content-section">
            <div class="row g-0">
                <!-- Dynamic Cards -->
                <div v-for="(card, index) in cards" :key="index" class="col-lg-6 col-md-12" :data-aos="'fade-up'"
                    :data-aos-delay="(index + 1) * 200" data-aos-duration="1000">
                    <div class="content-card h-100" :class="card.class">
                        <img src="/images/dot.png" class="decoration-image" data-aos="zoom-in"
                            :data-aos-delay="(index + 1) * 250" />
                        <div class="card-content">
                            <h2 class="card-title playfair" data-aos="fade-up" :data-aos-delay="(index + 1) * 300">
                                {{ card.title }}
                            </h2>

                            <!-- Normal text cards -->
                            <template v-if="!card.isFounder">
                                <p class="card-description poppins" data-aos="fade-up"
                                    :data-aos-delay="(index + 1) * 350" v-html="card.description">
                                </p>
                                <ul class="feature-list poppins">
                                    <li v-for="(feature, fIndex) in card.features" :key="fIndex" data-aos="fade-left"
                                        :data-aos-delay="(index + 1) * 400 + (fIndex * 100)">
                                        <i class="fas fa-check-circle text-success me-3"></i> {{ feature }}
                                    </li>
                                </ul>
                            </template>

                            <!-- Founder card -->
                            <template v-else>
                                <div class="founders-message">
                                    <div class="quote-icon" data-aos="zoom-in" :data-aos-delay="(index + 1) * 300">
                                        <i class="fas fa-quote-left"></i>
                                    </div>
                                    <blockquote class="founders-quote poppins" data-aos="fade-up"
                                        :data-aos-delay="(index + 1) * 350" v-html="card.quote">
                                    </blockquote>
                                    <div class="founder-signature" data-aos="fade-up"
                                        :data-aos-delay="(index + 1) * 400">
                                        <div class="founder-info">
                                            <h4 class="founder-name playfair">{{ card.founder.name }}</h4>
                                            <p class="founder-title poppins">{{ card.founder.title }}</p>
                                        </div>
                                        <div class="founder-avatar" data-aos="zoom-in"
                                            :data-aos-delay="(index + 1) * 450">
                                            <img :src="card.founder.image" :alt="card.founder.name"
                                                class="founder-image" />
                                        </div>
                                    </div>
                                </div>
                            </template>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script setup>
import { usePage } from '@inertiajs/inertia-vue3';
import { ref } from 'vue'

const page = usePage();
const settings = page.props.value.dashboard_data.foundersNoteSection || {};
const cards = ref([
    {
        title: 'Our Mission',
        class: 'mission-card',
        delay: 100,
        description: settings.our_mission_body,
        features: settings.mission_features,
    },
    {
        title: 'Our Vision',
        class: 'vision-card',
        delay: 200,
        description: settings.our_vision_body,
        features: settings.vision_features,
    },
    {
        title: 'Our Commitment',
        class: 'commitment-card',
        delay: 300,
        description: settings.our_commitment_body,
        features: settings.commitment_features,
    },
    {
        title: "Founder's Note",
        class: 'founders-card',
        delay: 400,
        isFounder: true,
        quote: settings.founders_note,
        founder: {
            name: settings.founders_name,
            title: settings.founders_job_title,
            image: assetUrl(settings.founders_image)
        },
    },
])
</script>


<style lang="scss" scoped>
// Color variables
$primary-color: #153f83;
$secondary-color: #D4AF37;
$text-dark: #2d3748;
$text-muted: #718096;
$light-bg: #f8f9fa;
$border-color: #e2e8f0;

.mission-vision-section {
    background: #ffffff;
    position: relative;

    .content-card {
        padding: 2.5rem 2rem;
        background: transparent;
        border-radius: 0;
        position: relative;
        transition: all 0.3s ease;
        min-height: 400px;
        display: flex;
        align-items: center;

        & .decoration-image {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 0;
        }

        &:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);

            .card-content {
                .card-title {
                    color: $primary-color;
                }
            }
        }

        .card-content {
            width: 100%;
            position: relative;
            z-index: 2;

            .card-title {
                font-size: 2rem;
                font-weight: 700;
                color: $text-dark;
                margin-bottom: 1.5rem;
                line-height: 1.2;
                transition: color 0.3s ease;
                position: relative;

                &::after {
                    content: '';
                    position: absolute;
                    bottom: -8px;
                    left: 0;
                    width: 50px;
                    height: 3px;
                    background: linear-gradient(90deg, $primary-color 0%, $secondary-color 100%);
                    border-radius: 2px;
                    transition: width 0.3s ease;
                }
            }

            .card-description {
                font-size: 1rem;
                line-height: 1.7;
                // color: $text-muted;
                margin-bottom: 1.5rem;
                text-align: justify;
            }

            .feature-list {
                list-style: none;
                padding: 0;
                margin: 0;

                li {
                    position: relative;
                    padding-left: 1.5rem;
                    margin-bottom: 0.8rem;
                    font-size: 0.95rem;
                    color: $text-muted;
                    line-height: 1.5;

                    // &::before {
                    //     content: '';
                    //     position: absolute;
                    //     left: 1.32rem;
                    //     top: 0.65rem;
                    //     width: 20px;
                    //     height: 20px;
                    //     border: 2px solid $secondary-color; // outline
                    //     border-radius: 50%; // makes it a circle
                    //     background: transparent; // hollow inside
                    //     transform: translateY(-50%);
                    // }


                    &:last-child {
                        margin-bottom: 0;
                    }
                }
            }
        }

        &:hover .card-content .card-title::after {
            width: 80px;
        }
    }

    // Founders Card Specific Styling
    .founders-card {
        background: linear-gradient(135deg, rgba($primary-color, 0.02) 0%, rgba($secondary-color, 0.02) 100%);
        border: 1px solid rgba($primary-color, 0.1);

        .founders-message {
            .quote-icon {
                margin-bottom: 1rem;

                i {
                    font-size: 2rem;
                    color: $secondary-color;
                    opacity: 0.7;
                }
            }

            .founders-quote {
                font-size: 1.1rem;
                line-height: 1.7;
                color: $text-dark;
                font-style: italic;
                margin-bottom: 2rem;
                border: none;
                padding: 0;
                text-align: justify;
            }

            .founder-signature {
                display: flex;
                align-items: center;
                justify-content: space-between;
                gap: 1rem;

                .founder-info {
                    flex: 1;

                    .founder-name {
                        font-size: 1.2rem;
                        font-weight: 600;
                        color: $primary-color;
                        margin-bottom: 0.3rem;
                    }

                    .founder-title {
                        font-size: 0.9rem;
                        color: $text-muted;
                        margin-bottom: 0;
                    }
                }

                .founder-avatar {
                    .founder-image {
                        width: 90px;
                        height: 90px;
                        border-radius: 50%;
                        object-fit: cover;
                        border: 3px solid $secondary-color;
                        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
                    }
                }
            }
        }
    }
}

// Font classes
.playfair {
    font-family: 'Playfair Display', serif;
}

.poppins {
    font-family: 'Poppins', sans-serif;
}

// Responsive Design
@media (max-width: 991px) {
    .mission-vision-section {
        padding: 3rem 0;

        .content-card {
            padding: 2rem 1.5rem;
            margin-bottom: 2rem;
            min-height: auto;
            text-align: left;
            border: 1px solid $border-color;

            &:last-child {
                margin-bottom: 0;
            }

            .card-content {
                .card-title {
                    font-size: 1.75rem;
                    text-align: left;

                    &::after {
                        left: 0;
                        transform: none;
                    }
                }

                .card-description {
                    text-align: left;
                }
            }
        }

        .founders-card .founders-message .founder-signature {
            flex-direction: column;
            text-align: center;

            .founder-info {
                text-align: center;
                margin-bottom: 1rem;
            }
        }
    }
}

@media (max-width: 767px) {
    .mission-vision-section {
        padding: 2.5rem 0;

        .content-card {
            padding: 1.5rem 1rem;

            .card-content {
                .card-title {
                    font-size: 1.6rem;
                    margin-bottom: 1rem;
                }

                .card-description {
                    font-size: 0.95rem;
                    line-height: 1.6;
                }

                .feature-list li {
                    font-size: 0.9rem;
                    margin-bottom: 0.6rem;
                }
            }
        }

        .founders-card .founders-message {
            .founders-quote {
                font-size: 1rem;
                text-align: left;
            }

            .founder-signature .founder-avatar .founder-image {
                width: 50px;
                height: 50px;
            }
        }
    }
}

@media (max-width: 575px) {
    .mission-vision-section {
        padding: 2rem 0;

        .content-card {
            padding: 1.25rem 0.75rem;

            .card-content {
                .card-title {
                    font-size: 1.5rem;
                }

                .card-description {
                    font-size: 0.9rem;
                }

                .feature-list li {
                    font-size: 0.85rem;
                    padding-left: 1.2rem;
                }
            }
        }

        .founders-card .founders-message {
            .quote-icon i {
                font-size: 1.5rem;
            }

            .founders-quote {
                font-size: 0.95rem;
                margin-bottom: 1.5rem;
            }
        }
    }
}

// Animation classes for manual implementation if AOS is not available
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }

    to {
        opacity: 1;
        transform: translateY(0);
    }
}

// Fallback animation
.content-card {
    opacity: 0;
    animation: fadeInUp 0.8s ease-out forwards;

    &.mission-card {
        animation-delay: 0.1s;
    }

    &.vision-card {
        animation-delay: 0.2s;
    }

    &.commitment-card {
        animation-delay: 0.3s;
    }

    &.founders-card {
        animation-delay: 0.4s;
    }
}
</style>
