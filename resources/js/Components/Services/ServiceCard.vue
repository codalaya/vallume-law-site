<template>
    <div :class="{ 'col-md-4': add_col, 'col-md-12': !add_col }">
        <div class="service-card mb-4">
            <div class="card-image-container position-relative overflow-hidden">
                <img v-if="service.image" class="card-image" :src="service.image" alt="Service Image" />
                <div class="image-overlay"></div>
                <div class="card-action position-absolute">
                    <Link :href="route('services.detail', { slug: service.slug })" class="btn btn-book-appointment">
                    {{ getPageContent('general_book_btn_1_text') ?? __("book appointment") }}
                    </Link>
                </div>
            </div>

            <div class="card-content">
                <div class="card-header-section">
                    <h5 class="service-title">
                        <Link class="title-link" :href="route('services.detail', { slug: service.slug })">
                        {{ service.name }}
                        </Link>
                    </h5>

                    <!-- <div class="service-badges">
                        <span v-if="service.lawyer_id" class="service-badge lawyer-badge">
                            Legal Professional
                        </span>
                        <span v-else-if="service.law_firm_id" class="service-badge firm-badge">
                            Law Firm
                        </span>
                        <span v-else class="service-badge admin-badge">
                            Legal Services
                        </span>
                    </div> -->
                </div>

                <div class="service-description" v-html="service.description"></div>

                <div class="card-footer-section">
                    <Link :href="route('services.detail', { slug: service.slug })" class="view-details-link">
                    View Details
                    <i class="fas fa-arrow-right ms-1"></i>
                    </Link>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { defineComponent } from "vue";
import { Link } from "@inertiajs/inertia-vue3";

export default defineComponent({
    components: {
        Link,
    },
    props: {
        service: {},
        add_col: {
            default: true,
        },
    },
    created() {
    },
    data() {
        return {};
    },
    methods: {},
});
</script>

<style lang="scss" scoped>
// Color Variables
$primary-color: #153f83;
$secondary-color: #D4AF37;
$text-dark: #2c3e50;
$text-muted: #6c757d;
$white: #ffffff;
$light-gray: #f8f9fa;
$border-color: #e9ecef;

// Typography
.service-card {
    background: $white;
    border: 1px solid $border-color;
    transition: all 0.3s ease;
    position: relative;
    height: 100%;

    &:hover {
        transform: translateY(-2px);
        border-bottom: 2px solid $primary-color;

        .card-image {
            transform: scale(1.05);
        }

        .image-overlay {
            opacity: 0.7;
        }

        .card-action {
            opacity: 1;
            transform: translateY(0);
        }
    }
}

.card-image-container {
    height: 280px;
    position: relative;

    .card-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.4s ease;
    }

    .image-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(135deg,
                rgba($primary-color, 0.8) 0%,
                rgba($secondary-color, 0.6) 100%);
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .card-action {
        bottom: 20px;
        right: 20px;
        opacity: 0;
        transform: translateY(20px);
        transition: all 0.3s ease;
        z-index: 10;
    }
}

.btn-book-appointment {
    background: $secondary-color;
    color: $white;
    border: none;
    padding: 12px 24px;
    font-family: 'Poppins', sans-serif;
    font-weight: 600;
    font-size: 14px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    transition: all 0.3s ease;

    &:hover {
        background: darken($secondary-color, 10%);
        color: $white;
        transform: translateY(-1px);
    }
}

.card-content {
    padding: 24px;
}

.card-header-section {
    // border-bottom: 1px solid $border-color;
    // padding-bottom: 16px;
    margin-bottom: 16px;
}

.service-title {
    font-family: 'Playfair Display', serif;
    font-weight: 400;
    font-size: 22px;
    color: $text-dark;
    margin: 0 0 12px 0;
    line-height: 1.3;

    .title-link {
        color: $text-dark;
        text-decoration: none;
        transition: color 0.3s ease;

        &:hover {
            color: $primary-color;
        }
    }
}

.service-badges {
    display: flex;
    gap: 8px;
    flex-wrap: wrap;
}

.service-badge {
    font-family: 'Poppins', sans-serif;
    font-size: 11px;
    font-weight: 600;
    padding: 6px 12px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    border: 1px solid;

    &.lawyer-badge {
        color: $primary-color;
        background: rgba($primary-color, 0.1);
        border-color: rgba($primary-color, 0.3);
    }

    &.firm-badge {
        color: $secondary-color;
        background: rgba($secondary-color, 0.1);
        border-color: rgba($secondary-color, 0.3);
    }

    &.admin-badge {
        color: $text-muted;
        background: rgba($text-muted, 0.1);
        border-color: rgba($text-muted, 0.3);
    }
}

.service-description {
    font-family: 'Poppins', sans-serif;
    font-size: 14px;
    line-height: 1.6;
    color: $text-muted;
    margin-bottom: 20px;

    // Limit to 3 lines
    display: -webkit-box;
    -webkit-line-clamp: 1;
    -webkit-box-orient: vertical;
    overflow: hidden;
    text-overflow: ellipsis;
}

.card-footer-section {
    // padding-top: 16px;
    // border-top: 1px solid $border-color;
}

.view-details-link {
    font-family: 'Poppins', sans-serif;
    font-size: 13px;
    font-weight: 600;
    color: $primary-color;
    text-decoration: none;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    transition: all 0.3s ease;

    &:hover {
        color: darken($primary-color, 15%);

        i {
            transform: translateX(3px);
        }
    }

    i {
        font-size: 12px;
        transition: transform 0.3s ease;
    }
}

// Responsive adjustments
@media (max-width: 768px) {
    .card-image-container {
        height: 220px;
    }

    .service-title {
        font-size: 20px;
    }

    .card-content {
        padding: 20px;
    }
}

@media (max-width: 576px) {
    .card-image-container {
        height: 200px;
    }

    .btn-book-appointment {
        padding: 10px 20px;
        font-size: 13px;
    }

    .service-title {
        font-size: 18px;
    }
}
</style>
