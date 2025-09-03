<script setup>
import { ref } from 'vue';
import { Link, usePage } from '@inertiajs/inertia-vue3';
import { computed } from 'vue';
const page = usePage();
const settings = page.props.value.dashboard_data.careerWithUsSection;
const assetUrl = window.assetUrl;

const benefits = computed(() => [
    {
        id: 1,
        icon: settings.feature_1_icon,
        title: settings.feature_1_title,
        description: settings.feature_1_description,
    },
    {
        id: 2,
        icon: settings.feature_2_icon,
        title: settings.feature_2_title,
        description: settings.feature_2_description,
    },
    {
        id: 3,
        icon: settings.feature_3_icon,
        title: settings.feature_3_title,
        description: settings.feature_3_description,
    },
    {
        id: 4,
        icon: settings.feature_4_icon,
        title: settings.feature_4_title,
        description: settings.feature_4_description,
    }
]);



const stats = computed(() => [
    {
        id: 1,
        number: settings.stat_1_number,
        label: settings.stat_1_description,
    },
    {
        id: 2,
        number: settings.stat_2_number,
        label: settings.stat_2_description,
    },
    {
        id: 3,
        number: settings.stat_3_number,
        label: settings.stat_3_description,
    },
    {
        id: 4,
        number: settings.stat_4_number,
        label: settings.stat_4_description,
    }
]);

const applyNow = () => {
    console.log('Apply now clicked');
    // Navigate to application form logic
};

const learnMore = () => {
    console.log('Learn more clicked');
    // Show more information logic
};


const careerDescription = computed(() => settings.body);
</script>
<template>
    <section class="career-section" data-aos="fade-up" data-aos-duration="1000">
        <div class="container-fluid content-section">
            <div class="row g-4">
                <!-- Left Content -->
                <div class="col-lg-4 position-relative header-content" data-aos="fade-right" data-aos-delay="100">
                    <img src="/images/line2.png" alt="" class="decoration-image" />
                    <div class="section-header">
                        <div class="section-subtitle">Join Our Team</div>
                        <h1 class="section-title">{{ settings.title  }}</h1>
                        <div v-html="careerDescription" class="section-description"></div>
                    </div>
                </div>

                <!-- Middle Perks Content -->
                <div class="col-lg-4 position-relative perks-content" data-aos="fade-up" data-aos-delay="200">
                    <img src="/images/dot.png" alt="" class="decoration-image" />
                    <div class="content-card">
                        <div class="benefits-list row g-2">
                            <div class="benefit-item" v-for="benefit in benefits" :key="benefit.id" data-aos="fade-up"
                                data-aos-delay="300">
                                <div class="benefit-icon">
                                    <span v-html="benefit.icon" class=""></span>
                                </div>
                                <div class="benefit-content">
                                    <h5>{{ benefit.title }}</h5>
                                    <p>{{ benefit.description }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Stats Content -->
                <div class="col-lg-4" data-aos="zoom-in" data-aos-delay="300" data-aos-duration="1200">
                    <div class="stats-card">
                        <img v-if="settings.media_type == 'image'" :src="assetUrl(settings.media_file)" alt="Team meeting" class="professional-image" />
                        <video
                            v-else-if="settings.media_type == 'video'"
                            :src="assetUrl(settings.media_file)"
                            class="professional-image"
                            autoplay
                            muted
                            loop
                            playsinline
                            :controls="false"
                            preload="auto"
                        ></video>

                        <img src="/images/line.png" class="decoration-image" />

                        <div class="stats-grid mt-3">
                            <div class="stat-item" v-for="stat in stats" :key="stat.id" data-aos="fade-up"
                                data-aos-delay="400">
                                <span class="stat-number">{{ stat.number }}</span>
                                <div class="stat-label">{{ stat.label }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Practice Areas / Apply Section -->
            <div class="practice-areas" data-aos="fade-up" data-aos-delay="500" data-aos-duration="1000">
                <div class="apply-section">
                    <h4>Ready to Join Our Team?</h4>
                    <p>
                        We're always looking for talented legal professionals who share our
                        vision for the future of law.
                    </p>

                    <div class="btn-group-custom">
                        <button class="btn btn-primary-custom" @click="applyNow" data-aos="zoom-in"
                            data-aos-delay="600">
                            Apply Now
                        </button>
                        <button class="btn btn-outline-custom" @click="learnMore" data-aos="zoom-in"
                            data-aos-delay="700">
                            Learn More
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

</template>
<style lang="scss" scoped>
// =======================
// Variables
// =======================
$primary-blue: #153f83;
$secondary-blue: #3b82f6;
$accent-blue: #60a5fa;
$light-blue: #dbeafe;
$text-dark: #1f2937;
$text-gray: #6b7280;
$background-light: #f8fafc;
$white: #ffffff;
$gold-accent: #f59e0b;


.career-section {
    background: linear-gradient(135deg, $background-light 0%, $white 50%, $light-blue 100%);
    // padding: 40px 0;
    position: relative;
    overflow: hidden;

    &::before {
        content: '';
        position: absolute;
        inset: 0;
        background-image:
            radial-gradient(circle at 20% 20%, rgba($primary-blue, 0.05) 0%, transparent 50%),
            radial-gradient(circle at 80% 80%, rgba($accent-blue, 0.08) 0%, transparent 50%);
        pointer-events: none;
    }


}

.header-content {
    text-align: start;


    & .decoration-image {
        position: absolute;
        bottom: 0;
        left: 1rem;
        opacity: 0.2;
        width: 100%;
        height: auto;
        object-fit: contain;
        // transform: rotate(90deg);
        z-index: 0;
    }

    & .section-header {
        position: relative;
        z-index: 3;
    }
}

.section-image {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    z-index: 1;
}

.section-subtitle {
    color: var(--secondary-blue);
    font-weight: 600;
    font-size: 1rem;
    text-transform: uppercase;
    letter-spacing: 1px;
    margin-bottom: 1rem;
}

.section-title {
    font-family: 'Playfair Display', serif;
    font-size: 3rem;
    font-weight: 700;
    color: var(--primary-color);
    margin-bottom: 1.5rem;
    line-height: 1.2;
}

.section-description {
    font-size: 1.2rem;
    color: var(--text-gray);
    max-width: 600px;
    margin: 0 auto;
    line-height: 1.7;
}

.content-card,
.stats-card {
    // background: $white;
    // padding: 40px;
    // box-shadow: 0 20px 60px rgba($primary-blue, 0.08);
    // border: 1px solid rgba($primary-blue, 0.08);
    border-radius: 24px;
    position: relative;
    z-index: 2;
    height: 100%;
}

.perks-content {
    & .benefits-list {
        position: relative;
        z-index: 1;
    }

    & .decoration-image {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        z-index: 0;
        border-radius: 1.25rem;

    }
}

.stats-card {

    & .professional-image {
        width: 100%;
        height: 300px;
        object-fit: cover;
        border-radius: 1.25rem;
        margin-bottom: 1rem;
        box-shadow: 0 15px 40px rgba($primary-blue, 0.1);
        z-index: 1;
        position: relative;
    }

    & .decoration-image {
        position: absolute;
        top: 0;
        left: -1rem;
        z-index: 0;
        border-radius: 1.25rem;
        height: 300px;

    }

}

.content-title {
    font-family: 'Playfair Display', serif;
    font-size: 2.2rem;
    color: $primary-blue;
    margin-bottom: 1.5rem;
    font-weight: 600;
}

.content-text {
    font-size: 1.1rem;
    color: $text-gray;
    margin-bottom: 2.5rem;
    line-height: 1.7;
}

.benefit-item {
    display: flex;
    align-items: flex-start;
    // margin-bottom: 2rem;
    padding: 20px;
    // background: $white;
    border-radius: 16px;
    // border-left: 4px solid $accent-blue;
    transition: all 0.3s ease;
    position: relative;
    z-index: 2;

    &:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 30px rgba($primary-blue, 0.1);
        background: $white;
    }

    .benefit-icon {
        width: 50px;
        height: 50px;
        background: linear-gradient(135deg, $primary-blue 0%, $secondary-blue 100%);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 1.5rem;
        flex-shrink: 0;
        box-shadow: 0 8px 20px rgba($primary-blue, 0.2);
        color: white;

        i {
            color: $white;
            font-size: 1.3rem;
        }
    }

    .benefit-content {
        h5 {
            font-weight: 600;
            color: $text-dark;
            margin-bottom: 0.5rem;
            font-size: 1.1rem;
        }

        p {
            color: $text-gray;
            margin: 0;
            line-height: 1.6;
        }
    }
}

.cta-button {
    background: linear-gradient(135deg, $primary-blue 0%, $secondary-blue 100%);
    color: $white;
    font-weight: 600;
    padding: 16px 32px;
    border: none;
    border-radius: 12px;
    font-size: 1.1rem;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 10px;
    transition: all 0.3s ease;
    box-shadow: 0 8px 25px rgba($primary-blue, 0.3);

    &:hover {
        transform: translateY(-2px);
        box-shadow: 0 12px 35px rgba($primary-blue, 0.4);
        color: $white;
    }
}

.stats-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 1rem;
    margin-bottom: 1rem;

    .stat-item {
        text-align: center;
        background: $white;
        // border: 1px solid rgba($primary-blue, 0.08);
        border-radius: 10px;
        position: relative;
        z-index: 2;
        padding: 1rem;
        text-align: start;


        .stat-number {
            font-family: 'Playfair Display', serif;
            font-size: 3rem;
            font-weight: 700;
            color: $primary-blue;
            margin-bottom: 0.5rem;
            display: block;
        }

        .stat-label {
            color: black;
            font-weight: 500;
            font-size: 0.95rem;
            white-space: nowrap;
            text-overflow: ellipsis;
        }
    }
}

.apply-section {
    // background: $light-blue;
    padding: 2rem;
    border-radius: 20px;
    text-align: center;

    h4 {
        color: $primary-blue;
        font-weight: 600;
        margin-bottom: 1rem;
        font-size: 1.4rem;
    }

    p {
        color: $text-gray;
        margin-bottom: 1.5rem;
        line-height: 1.6;
    }

    .btn-group-custom {
        display: flex;
        gap: 1rem;
        justify-content: center;
        flex-wrap: wrap;

        .btn-primary-custom {
            background: $primary-blue;
            border: none;
            color: $white;
            font-weight: 600;
            padding: 12px 28px;
            // border-radius: 10px;
            transition: all 0.3s ease;

            &:hover {
                background: $secondary-blue;
                transform: translateY(-2px);
            }
        }

        .btn-outline-custom {
            border: 1px solid $primary-blue;
            color: $primary-blue;
            background: transparent;
            font-weight: 600;
            padding: 10px 26px;
            // border-radius: 10px;
            transition: all 0.3s ease;

            &:hover {
                background: $primary-blue;
                color: $white;
                transform: translateY(-2px);
            }
        }
    }
}

.practice-areas {
    // background: $white;
    // border-radius: 1.5rem;
    // padding: 50px;
    margin-top: 1rem;
    // box-shadow: 0 20px 60px rgba($primary-blue, 0.08);
    // border: 1px solid rgba($primary-blue, 0.08);

    .areas-title {
        text-align: center;
        font-family: 'Playfair Display', serif;
        font-size: 2rem;
        color: $primary-blue;
        margin-bottom: 2rem;
        font-weight: 600;
    }

    .areas-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 1rem;

        .area-tag {
            background: $background-light;
            color: $text-dark;
            padding: 14px 20px;
            border-radius: 12px;
            text-align: center;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            border: 2px solid transparent;

            &:hover {
                background: $primary-blue;
                color: $white;
                transform: translateY(-2px);
                box-shadow: 0 8px 20px rgba($primary-blue, 0.2);
            }
        }
    }
}

.image-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 1.5rem;
    margin-bottom: 2rem;

    img {
        height: 200px;
    }
}

@media (max-width: 768px) {
    .career-section {
        .section-header {

            .section-title {
                font-size: 2.2rem;
            }
        }
    }

    .content-card,
    .stats-card,
    .practice-areas {
        // padding: 30px;
    }

    .stats-grid {
        grid-template-columns: repeat(2, 1fr);
        gap: 1rem;
    }

    .btn-group-custom {
        flex-direction: column;
        align-items: center;

        .btn {
            width: 200px;
        }
    }

    .areas-grid {
        grid-template-columns: 1fr;
    }

    .image-grid {
        grid-template-columns: 1fr;
    }
}
</style>
