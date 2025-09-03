<script setup>
import { ref, onMounted, reactive } from 'vue'
import { usePage, Link } from "@inertiajs/inertia-vue3";

const page = usePage();
const settings = page.props.value.dashboard_data.aboutUsSection;


const metrics = ref([
    {
        value: 85,
        suffix: '%',
        label: 'Time Saved',
        description: 'In legal documentation',
        icon: 'fas fa-clock',
        featured: true
    },
    {
        value: 12500,
        suffix: '+',
        label: 'Clients Helped',
        description: 'Legal queries resolved',
        icon: 'fas fa-users'
    },
    {
        value: 97.2,
        suffix: '%',
        label: 'Accuracy Rate',
        description: 'Legal advice precision',
        icon: 'fas fa-bullseye',
        featured: true
    },
    {
        value: 4.8,
        suffix: '/5',
        label: 'Client Rating',
        description: 'Average satisfaction',
        icon: 'fas fa-star'
    },
    {
        value: 24,
        suffix: '/7',
        label: 'Availability',
        description: 'Round-the-clock support',
        icon: 'fas fa-shield-alt'
    },
    {
        value: 68,
        suffix: '%',
        label: 'Cost Reduction',
        description: 'In legal consulting fees',
        icon: 'fas fa-chart-line'
    }
])



onMounted(() => {
})


</script>

<template>

        <div class="metrics-container" data-aos="fade-up">
  <div class="metrics-grid">
    <div
      v-for="(metric, index) in settings.highlight_points"
      :key="index"
      class="metric-card"
      :class="{ 'featured': metric.is_featured }"
      :data-aos="'zoom-in'"
      :data-aos-delay="index * 150"
    >
      <div class="metric-icon">
        <span v-html="metric.icon"></span>
      </div>
      <div class="metric-content">
        <div class="metric-number" ref="metricNumbers">{{ metric.number }}</div>
        <div class="metric-label">{{ metric.title }}</div>
        <div class="metric-description">{{ metric.short_description }}</div>
      </div>
    </div>
  </div>

  <div class="metrics-footer mt-4" data-aos="fade-up" data-aos-delay="600">
    <p class="footer-text">
      <i class="fas fa-chart-line me-2"></i>
      Based on our current estimates in our internal evaluation
    </p>
  </div>
</div>


</template>


<style lang="scss" scoped>
// Variables
$primary-color: #153f83;
$secondary-color: #D4AF37;
$light-bg: #f8f9fa;
$white: #ffffff;
$gray-light: #e9ecef;
$gray-medium: #6c757d;
$shadow-light: rgba(21, 63, 131, 0.08);
$shadow-medium: rgba(21, 63, 131, 0.15);

.metrics-container {
    // padding: 2rem;
    // background: $white;
    border-radius: 12px;
    // box-shadow: 0 8px 32px $shadow-light;
    position: relative;
    overflow: hidden;

    // &::before {
    //     content: '';
    //     position: absolute;
    //     top: 0;
    //     left: 0;
    //     right: 0;
    //     height: 4px;
    //     background: linear-gradient(90deg, $primary-color 0%, $secondary-color 100%);
    // }
}

.metrics-header {
    text-align: center;

    .metrics-title {
        font-family: 'Playfair Display', serif;
        font-size: 2.5rem;
        font-weight: 400;
        color: $primary-color;
        margin-bottom: 0.5rem;
        position: relative;

        &::after {
            content: '';
            position: absolute;
            bottom: -8px;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 2px;
            background: $secondary-color;
        }
    }

    .metrics-subtitle {
        font-family: 'Poppins', sans-serif;
        color: $gray-medium;
        font-size: 1.1rem;
        margin-top: 1rem;
    }
}

.metrics-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 1.5rem;
    margin-top: 2rem;
}

.metric-card {
    background: $light-bg;
    border-radius: 10px;
    padding: 1.5rem;
    text-align: center;
    transition: all 0.3s ease;
    border: 2px solid transparent;
    position: relative;

    &:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 40px $shadow-medium;
        border-color: rgba($secondary-color, 0.2);
    }

    &.featured {
        background: $light-bg;
        border-color: rgba($secondary-color, 0.3);


        .metric-number {
            background: linear-gradient(135deg, $primary-color 0%, $secondary-color 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        &::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 0;
            height: 0;
            border-style: solid;
            border-width: 0 20px 20px 0;
            border-color: transparent $secondary-color transparent transparent;
        }
    }
}

.metric-icon {
    margin-bottom: 1rem;

    i {
        font-size: 1.5rem;
        color: $primary-color;
        opacity: 0.8;
    }
}

.metric-content {
    .metric-number {
        font-family: 'Poppins', sans-serif;
        font-size: 2rem;
        font-weight: 700;
        color: $primary-color;
        line-height: 1;
        margin-bottom: 0.5rem;
    }

    .metric-label {
        font-family: 'Poppins', sans-serif;
        font-size: 1.2rem;
        font-weight: 600;
        color: $primary-color;
        margin-bottom: 0.25rem;
    }

    .metric-description {
        font-family: 'Poppins', sans-serif;
        font-size: 0.9rem;
        color: $gray-medium;
        font-weight: 400;
    }
}

.metrics-footer {
    text-align: center;
    padding-top: 1.5rem;
    border-top: 1px solid $gray-light;
    max-width: 40%;
    margin-left: auto;

    .footer-text {
        font-family: 'Poppins', sans-serif;
        color: $gray-medium;
        font-size: 0.9rem;
        margin: 0;

        i {
            color: $secondary-color;
        }
    }
}

// Responsive design
@media (max-width: 768px) {
    .metrics-container {
        padding: 1.5rem;
    }

    .metrics-title {
        font-size: 2rem !important;
    }

    .metrics-grid {
        grid-template-columns: 1fr;
        gap: 1rem;
    }

    .metric-card {
        padding: 1.25rem;
    }

    .metric-number {
        font-size: 2.5rem !important;
    }
}

@media (max-width: 576px) {
    .metrics-container {
        padding: 1rem;
    }

    .metrics-title {
        font-size: 1.75rem !important;
    }

    .metric-number {
        font-size: 2rem !important;
    }
}
</style>
