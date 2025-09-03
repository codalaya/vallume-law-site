<template>

    <div class="stats-container">
        <!-- Quick stats Section -->
        <section class="stats-section-dark">
            <div class="container-fluid content-section">
                <Marquee :pauseOnHover="true" :speed="50">
                    <template v-for="(stat, index) in quickStatsSettings.stats" :key="index">
                        <div class="stat-item" :style="{ animationDelay: `${index * 200}ms` }" :data-aos="'fade-up'"
                            :data-aos-delay="(index + 1) * 150" data-aos-duration="800">
                            <div class="stat-number" data-aos="zoom-in" :data-aos-delay="(index + 1) * 200">
                                {{ stat.number }}
                            </div>
                            <h5 class="stat-title poppins mb-0 ms-2" data-aos="fade-left"
                                :data-aos-delay="(index + 1) * 250">
                                {{ stat.description }}
                            </h5>
                        </div>
                    </template>
                </Marquee>
            </div>
        </section>

        <mission-vision-expertise />

        <!-- Bottom Blue Section -->
        <section class="stats-section-blue">
            <div class="container-fluid content-section">
                <div class="row justify-content-center">
                    <div v-for="(stat, index) in highlightsSettings.highlights" :key="index" class="col-lg-4 col-md-6 mb-4 text-center"
                        :data-aos="'zoom-in'" :data-aos-delay="(index + 1) * 200" data-aos-duration="800">
                        <div class="feature-item poppins">
                            <div class="icon-wrapper" data-aos="fade-up" :data-aos-delay="(index + 1) * 250">
                                <span v-html="stat.icon"></span>
                            </div>
                            <h5 class="feature-title mb-0" data-aos="fade-up" :data-aos-delay="(index + 1) * 300">
                                {{ stat.title }}
                            </h5>
                            <p class="feature-description mb-0" data-aos="fade-up" :data-aos-delay="(index + 1) * 350" v-html="stat.description">

                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>


    </div>


</template>

<script setup>
import { ref, onMounted, nextTick } from 'vue';
import { Vue3Marquee as Marquee } from 'vue3-marquee'
import MissionVisionExpertise from '@/Components/Landing/MissionVisionExpertise2.vue';
import { usePage } from '@inertiajs/inertia-vue3';

const page = usePage();
const highlightsSettings =  page.props.value.dashboard_data.highlightsSection || {};
const quickStatsSettings = page.props.value.dashboard_data.quickStatsSection || {};

const topStats = ref([
    {
        value: 6.7,
        suffix: 'M',
        title: 'Active User',
        description: 'Lorem ipsum dolor sit amet consectetur. Sagittis et'
    },
    {
        value: 12,
        suffix: '+',
        title: 'Years Experience',
        description: 'Lorem ipsum dolor sit amet consectetur. Sagittis et'
    },
    {
        value: 260,
        suffix: 'K',
        title: 'Projects Delivered',
        description: 'Lorem ipsum dolor sit amet consectetur. Sagittis et'
    },
    {
        value: 380,
        suffix: 'K',
        title: 'Worldwide Access',
        description: 'Lorem ipsum dolor sit amet consectetur. Sagittis et'
    }
])

const bottomStats = ref([
    {
        icon: 'fas fa-glasses',
        title: 'Certified & Cutting-Edge',
        description: 'Lorem ipsum dolor sit amet consectetur. Quis consequat tincidunt ullamcorper.'
    },
    {
        icon: 'fas fa-shield',
        title: '24/7 Technical Support',
        description: 'Lorem ipsum dolor sit amet consectetur. Quis consequat tincidunt ullamcorper.'
    },
    {
        icon: 'fas fa-clipboard-check',
        title: '30-Day Free Trial',
        description: 'Lorem ipsum dolor sit amet consectetur. Quis consequat tincidunt ullamcorper.'
    }
])

const quickStats = ref([
    { id: 1, icon: 'fas fa-users', number: '10K+', value: 10000, title: 'Students Trained' },
    { id: 2, icon: 'fas fa-building', number: '500+', value: 500, title: 'Corporate Clients' },
    { id: 3, icon: 'fas fa-globe', number: '2', value: 2, title: 'Countries' },
    { id: 4, icon: 'fas fa-award', number: '15+', value: 15, title: 'Awards Won' },
    { id: 5, icon: 'fas fa-award', number: '150+', value: 150, title: 'Courses Launched' },
])

const animatedTopValues = ref(['0', '0', '0', '0'])
const animatedQuickValues = ref(['0', '0', '0', '0', '0'])

const animateCounter = (targetValue, suffix, index, isTop = true, duration = 2000) => {
    const startTime = Date.now()
    const startValue = 0
    const endValue = typeof targetValue === 'number' ? targetValue : parseFloat(targetValue)

    const animate = () => {
        const currentTime = Date.now()
        const elapsed = currentTime - startTime
        const progress = Math.min(elapsed / duration, 1)

        // Easing function for smooth animation
        const easeOutCubic = 1 - Math.pow(1 - progress, 3)
        const currentValue = startValue + (endValue - startValue) * easeOutCubic

        let displayValue
        if (endValue >= 1000) {
            displayValue = Math.floor(currentValue).toLocaleString()
        } else if (endValue < 10 && endValue > 1) {
            displayValue = currentValue.toFixed(1)
        } else {
            displayValue = Math.floor(currentValue)
        }

        if (isTop) {
            animatedTopValues.value[index] = displayValue + suffix
        } else {
            if (suffix === 'K+' || suffix === '+') {
                animatedQuickValues.value[index] = Math.floor(currentValue) + suffix
            } else {
                animatedQuickValues.value[index] = Math.floor(currentValue) + suffix
            }
        }

        if (progress < 1) {
            requestAnimationFrame(animate)
        }
    }

    requestAnimationFrame(animate)
}

const formatQuickStatValue = (stat) => {
    if (stat.number.includes('K')) {
        return { value: parseInt(stat.number), suffix: 'K+' }
    } else if (stat.number.includes('+')) {
        return { value: parseInt(stat.number), suffix: '+' }
    } else {
        return { value: parseInt(stat.number), suffix: '' }
    }
}

onMounted(async () => {
    await nextTick()

    // Animate top stats
    topStats.value.forEach((stat, index) => {
        setTimeout(() => {
            animateCounter(stat.value, stat.suffix, index, true, 2500)
        }, index * 300)
    })

    // Animate quick stats
    quickStats.value.forEach((stat, index) => {
        const { value, suffix } = formatQuickStatValue(stat)
        setTimeout(() => {
            animateCounter(value, suffix, index, false, 2000)
        }, (index + 4) * 300)
    })
})
</script>

<style lang="scss" scoped>
// Color variables
$primary-color: #153f83;
$secondary-color: #D4AF37;
$dark-bg: #1a1a2e;
$blue-bg: #4361ee;
$light-bg: #f8f9fa;

.stats-container {
    overflow: hidden;
}

// Top Dark Section
.stats-section-dark {
    background: linear-gradient(135deg, $dark-bg 0%, #16213e 100%);
    color: white;

    .stat-item {
        opacity: 0;
        transform: translateY(30px);
        animation: fadeInUp 0.8s ease-out forwards;
        display: flex;
        justify-content: center;
        align-items: center;
        position: relative;
        margin-right: 3rem;


        .stat-number {
            font-size: 3.5rem;
            font-weight: 700;
            color: $blue-bg;
            // margin-bottom: 1rem;
            line-height: 1;
        }

        .stat-title {
            font-size: 3.5rem;
            font-weight: 600;
            color: white;
            // margin-bottom: 0.75rem;
        }

        .stat-description {
            font-size: 0.9rem;
            color: rgba(255, 255, 255, 0.7);
            line-height: 1.5;
            margin-bottom: 0;
        }

        // &::after {
        //     content: "";
        //     position: absolute;
        //     inset: 0;
        //     background-image: url("/images/balance.png");
        //     background-repeat: no-repeat;
        //     opacity: 0.15;
        //     z-index: -1;
        // }

    }
}

// Bottom Blue Section
.stats-section-blue {
    background: linear-gradient(135deg, $primary-color 0%, darken($primary-color, 10%) 100%);
    color: white;

    .feature-item {
        opacity: 0;
        transform: translateY(30px);
        animation: fadeInUp 0.8s ease-out forwards;


        .icon-wrapper {
            width: 80px;
            height: 80px;
            background: rgba(255, 255, 255, 0.15);
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            transition: all 0.3s ease;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);

            i {
                font-size: 2rem;
                color: white;
            }

            &:hover {
                transform: translateY(-5px);
                background: rgba(255, 255, 255, 0.25);
                box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
            }
        }

        .feature-title {
            font-size: 1.25rem;
            font-weight: 600;
            color: white;
            margin-bottom: 0.75rem;
        }

        .feature-description {
            font-size: 0.9rem;
            color: rgba(255, 255, 255, 0.8);
            line-height: 1.5;
            margin-bottom: 0;
        }
    }
}

// Quick Stats Section
.quick-stats-section {
    background: linear-gradient(135deg, $light-bg 0%, #ffffff 100%);

    .quick-stat-item {
        opacity: 0;
        transform: translateY(30px);
        animation: fadeInUp 0.8s ease-out forwards;
        padding: 2rem 1rem;
        border-radius: 15px;
        background: white;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        transition: all 0.3s ease;
        border: 1px solid rgba(0, 0, 0, 0.05);

        &:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);

            .quick-stat-icon {
                transform: scale(1.1);
                background: linear-gradient(135deg, $primary-color 0%, $secondary-color 100%);
                color: white;
            }
        }

        .quick-stat-icon {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, rgba($primary-color, 0.1) 0%, rgba($secondary-color, 0.1) 100%);
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1rem;
            transition: all 0.3s ease;
            color: $primary-color;

            i {
                font-size: 1.5rem;
            }
        }

        .quick-stat-number {
            font-size: 2.5rem;
            font-weight: 700;
            color: $primary-color;
            margin-bottom: 0.5rem;
            line-height: 1;
        }

        .quick-stat-label {
            font-size: 0.95rem;
            font-weight: 500;
            color: #6c757d;
            margin-bottom: 0;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
    }
}

// Animations
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

// Font classes
.playfair {
    font-family: 'Playfair Display', serif;
}

.poppins {
    font-family: 'Poppins', sans-serif;
}

// Responsive Design
@media (max-width: 768px) {

    .stats-section-dark .stat-item .stat-number,
    .quick-stats-section .quick-stat-item .quick-stat-number {
        font-size: 2.5rem;
    }

    .stats-section-blue .feature-item .icon-wrapper {
        width: 70px;
        height: 70px;

        i {
            font-size: 1.5rem;
        }
    }

    .quick-stats-section .quick-stat-item {
        padding: 1.5rem 1rem;
        margin-bottom: 1rem;
    }
}

@media (max-width: 576px) {

    .stats-section-dark .stat-item .stat-number,
    .quick-stats-section .quick-stat-item .quick-stat-number {
        font-size: 2rem;
    }
}
</style>
