<script setup>
import { ref } from 'vue';
import GlobalOperations from './GlobalOperation.vue';
import { usePage } from '@inertiajs/inertia-vue3';

const assetUrl = window.assetUrl;
const page= usePage();
const timeline = [
    {
        year: '2015',
        title: 'Foundation',
        desc: 'Started with a vision to transform legal education in India',
        icon: 'fas fa-seedling',
        image: 'https://images.pexels.com/photos/546812/pexels-photo-546812.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260'
    },
    {
        year: '2018',
        title: 'US Expansion',
        desc: 'Opened our first office in New York, bringing international perspective',
        icon: 'fas fa-plane',
        image: 'https://images.pexels.com/photos/271816/pexels-photo-271816.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260'
    },
    {
        year: '2020',
        title: 'Digital Transformation',
        desc: 'Launched online learning platforms during the pandemic',
        icon: 'fas fa-laptop',
        image: 'https://images.pexels.com/photos/546819/pexels-photo-546819.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260'
    },
    {
        year: '2022',
        title: 'AI Innovation',
        desc: 'Began development of our revolutionary legal AI platform',
        icon: 'fas fa-brain',
        image: 'https://images.pexels.com/photos/546817/pexels-photo-546817.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260'
    },
    {
        year: '2024',
        title: 'Global Recognition',
        desc: 'Received multiple awards for legal innovation and education excellence',
        icon: 'fas fa-trophy',
        image: 'https://images.pexels.com/photos/546815/pexels-photo-546815.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260'
    }
];
const currentMilestone = ref(timeline[0]);
const setCurrent = (milestone) => {
    currentMilestone.value = milestone;
}

const settings = page.props.value.dashboard_data.journeySection ?? {};

</script>

<template>
    <section class="timeline-section py-5" aria-labelledby="timeline-heading">
        <div class="bg-overlay"></div>
        <div class="container-fluid content-section content">
            <div class="col-12 mb-5 text-center">
                <h2 id="timeline-heading" class="display-6 playfair title">{{ settings.title }}</h2>
                <p class="lead poppins subtitle" v-html="settings.description"></p>
            </div>
            <div class="row">
                <div class="col-12 col-lg-6">
                    <div class="timeline">
                        <div v-for="(milestone, index) in settings.milestones" :key="index" class="timeline-item"
                            data-aos="fade-up" @click="setCurrent(milestone)" :data-aos-delay="index * 80">
                            <div class="timeline-icon">
                                <span v-html="milestone.icon"></span>
                            </div>
                            <div class="timeline-content">
                                <h5 class="year">{{ milestone.year }}</h5>
                                <h6 class="title-text">{{ milestone.title }}</h6>
                                <p class="desc" v-html="milestone.short_description"></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6 align-items-center">
                    <div class="news-card" :data-aos="`fade-up`" :data-aos-delay="index * 200">
                        <div class="card-content">

                            <!-- Year -->
                            <transition name="fade" mode="out-in">
                                <div class="date-badge" :key="currentMilestone.year">
                                    <span class="date-day playfair">{{ currentMilestone.year }}</span>
                                </div>
                            </transition>

                            <!-- Title -->
                            <transition name="fade" mode="out-in">
                                <h3 class="card-title playfair" :key="currentMilestone.title">
                                    {{ currentMilestone.title }}
                                </h3>
                            </transition>

                            <!-- Image -->
                            <transition name="fade" mode="out-in">
                                <div class="card-image-wrapper" v-if="currentMilestone.image"
                                    :key="currentMilestone.image">
                                    <img :src="assetUrl(currentMilestone.image)" :alt="currentMilestone.title" class="card-image"
                                        @error="$event.target.src = '/images/no-img.png'" />
                                </div>
                            </transition>

                            <!-- Description -->
                            <transition name="fade" mode="out-in">
                                <p class="card-description poppins mt-3 mb-0" :key="currentMilestone.long_description" v-html="currentMilestone.long_description">
                                </p>
                            </transition>

                        </div>
                    </div>

                </div>
            </div>
        </div>

        <GlobalOperations />
    </section>
</template>

<style lang="scss" scoped>
$primary-color: #153f83;
$secondary-color: #D4AF37;
$muted-color: #6c757d;
$text-dark: #2d3748;
$text-muted: #718096;
$light-bg: #f8f9fa;
$border-color: #e2e8f0;

.timeline-section {
    position: relative;

    & .bg-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: url('/images/bg4.jpg') no-repeat center center/cover, linear-gradient(135deg,
                $light-bg 0%,
                lighten($primary-color, 60%) 100%);
        opacity: 0.05;
    }

    & .content {
        position: relative;
        z-index: 2;
    }
}

.title {
    color: $primary-color;
    font-family: 'Playfair Display', serif;
    font-weight: 600;
}

.subtitle {
    color: $muted-color;
    font-family: 'Poppins', sans-serif;
}

.timeline {
    position: relative;
    margin-left: 2rem;

    &::before {
        content: '';
        position: absolute;
        left: 20px;
        top: 0;
        width: 3px;
        height: 100%;
        background-color: $secondary-color;
    }
}

.timeline-item {
    position: relative;
    display: flex;
    align-items: flex-start;
    margin-bottom: 2.5rem;
    cursor: pointer;

    &:hover {
        .timeline-icon {
            background-color: $primary-color;
        }
    }
}

.timeline-icon {
    position: relative;
    z-index: 2;
    width: 40px;
    height: 40px;
    min-width: 40px;
    background-color: $secondary-color;
    color: #fff;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.15);
    font-size: 1rem;
    margin-right: 1rem;
}

.timeline-content {
    background-color: transparent;
    padding-bottom: 0.5rem;
}

.year {
    font-family: 'Playfair Display', serif;
    font-weight: 700;
    color: $primary-color;
    margin-bottom: 0.25rem;
}

.title-text {
    font-family: 'Poppins', sans-serif;
    font-weight: 600;
    color: $primary-color;
    margin-bottom: 0.25rem;
}

.desc {
    font-family: 'Poppins', sans-serif;
    color: $muted-color;
    margin: 0;

    display: -webkit-box;
    -webkit-line-clamp: 2; // limit to 2 lines
    -webkit-box-orient: vertical;
    overflow: hidden;
    text-overflow: ellipsis;
}


.news-card {
    background: white;
    border-radius: 20px;
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
    overflow: hidden;
    transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    // border: 1px solid rgba(0, 0, 0, 0.05);
    position: relative;



    .card-image-wrapper {
        position: relative;
        height: auto;
        overflow: hidden;

        .card-image {
            width: 100%;
            height: auto;
            object-fit: contain;
            transition: transform 0.6s ease;
        }

        .date-badge {
            position: absolute;
            top: 20px;
            left: 20px;
            background: linear-gradient(135deg, $primary-color 0%, $secondary-color 100%);
            color: white;
            padding: 0.8rem;
            border-radius: 12px;
            text-align: center;
            min-width: 60px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease;

            .date-day {
                display: block;
                font-size: 1.4rem;
                font-weight: 700;
                line-height: 1;
                margin-bottom: 2px;
            }

            .date-month {
                display: block;
                font-size: 0.7rem;
                font-weight: 600;
                letter-spacing: 1px;
                opacity: 0.9;
            }
        }
    }

    .card-content {
        padding: 2rem;

        .card-title {
            font-size: 1.4rem;
            font-weight: 700;
            color: $text-dark;
            line-height: 1.3;
            margin-bottom: 1rem;
            transition: color 0.3s ease;
        }

        .card-description {
            // font-size: 0.95rem;
            line-height: 1.6;
            // color: $text-muted;
            margin-bottom: 0;
            display: -webkit-box;
            // -webkit-line-clamp: 3;
            // -webkit-box-orient: vertical;
            overflow: hidden;
        }
    }
}

// Responsive Design
@media (max-width: 991px) {
    .news-card {
        margin-bottom: 2rem;

        .card-image-wrapper {
            height: 220px;
        }

        .card-content {
            padding: 1.5rem;

            .card-title {
                font-size: 1.3rem;
            }


        }
    }
}

@media (max-width: 767px) {
    .news-card {
        .card-image-wrapper {
            height: 200px;

            .date-badge {
                top: 15px;
                left: 15px;
                padding: 0.6rem;
                min-width: 50px;

                .date-day {
                    font-size: 1.2rem;
                }

                .date-month {
                    font-size: 0.65rem;
                }
            }
        }

        .card-content {
            padding: 1.2rem;

            .card-title {
                font-size: 1.2rem;
                margin-bottom: 0.8rem;
            }

            .card-description {
                font-size: 0.9rem;
                margin-bottom: 1.2rem;
                //   -webkit-line-clamp: 2;
            }

        }
    }
}

@media (max-width: 575px) {
    .news-card {
        .card-image-wrapper {
            height: 180px;
        }

        .card-content {
            padding: 1rem;

            .card-title {
                font-size: 1.1rem;
            }

            .card-description {
                font-size: 0.85rem;
            }
        }
    }
}

.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.5s ease;
}
.fade-enter-from,
.fade-leave-to {
  opacity: 0;
}
</style>
