<template>
    <div :class="{ 'col-md-12': add_col, 'col-md-6': !add_col, 'list-view': add_col, 'grid-view': !add_col }"
        class="legal-services-card">
        <div class="card mb-3">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="service-image-container">
                            <img v-if="service.image" class="service-image" :src="service.image" :alt="service.name" />
                            <img v-else class="default-avatar" src="@/images/account/default_avatar_men.png"
                                :alt="service.name" />
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="service-content">
                            <div>
                                <h5 class="service-title">
                                    <a :href="route('services.detail', { slug: service.slug })">
                                        {{ service.name }}
                                    </a>
                                </h5>
                                <p class="service-description" v-html="service.description"></p>
                            </div>

                            <div class="rating-action-section">
                                <div class="rating-container">
                                    <div class="d-flex align-items-center">
                                        <star-rating :rating="service.rating" :star-size="18" :read-only="true"
                                            :increment="0.01" :show-rating="false">
                                        </star-rating>
                                        <span class="rating-text ms-2">
                                            ({{ service.rating }}/5)
                                        </span>
                                    </div>
                                </div>

                                <a :href="route('services.detail', { slug: service.slug })" class="view-details-btn">
                                {{ __("view details") }}
                                </a>
                            </div>
                        </div>
                    </div>
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
    created() { },
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
$white: #ffffff;
$light-bg: #f8fafc;
$text-dark: #2d3748;
$text-muted: #718096;
$border-light: #e2e8f0;
$shadow-sm: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);
$shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
$shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);

// Legal Services Card Styling
.legal-services-card {
    .card {
        background: $white;
        border: 1px solid $border-light;
        border-bottom: 0px;
        border-radius: 0;
        box-shadow: $shadow-sm;
        transition: all 0.3s ease;
        overflow: hidden;
        position: relative;

        &::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, $primary-color 0%, $secondary-color 100%);
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        &:hover {
            box-shadow: $shadow-lg;
            border-color: rgba($secondary-color, 0.15);
            cursor: pointer;

            &::after {
                opacity: 1;
            }

            .view-details-btn {
                background: $secondary-color;
                color: $white;
            }
        }

        .card-body {
            padding: 1.75rem;
            // border-bottom: 2px solid $border-light !important;
            position: relative;

            .row {
                align-items: flex-start;
            }
        }
    }

    // Service Image Styling
    .service-image-container {
        position: relative;
        overflow: hidden;
        border-radius: 0;
        background: $light-bg;
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 150px;
        border: 1px solid $border-light;

        .service-image {
            transition: none;
            border-radius: 0;
            object-fit: cover;
            width: 100%;
            height: 150px;
        }

        .default-avatar {
            width: 80px;
            height: 80px;
            opacity: 0.6;
        }
    }

    // Service Content
    .service-content {
        display: flex;
        flex-direction: column;
        height: 100%;
        justify-content: space-between;
        min-height: 160px;
    }

    // Service Title
    .service-title {
        font-family: 'Playfair Display', serif;
        font-size: 1.3rem;
        font-weight: 600;
        margin-bottom: 0.875rem;
        line-height: 1.2;
        color: $text-dark;

        a {
            color: $text-dark;
            text-decoration: none;
            transition: color 0.2s ease;

            &:hover {
                color: $primary-color;
            }
        }
    }

    // Service Description
    .service-description {
        font-family: 'Poppins', sans-serif;
        font-size: 0.95rem;
        color: $text-muted;
        line-height: 1.6;
        margin: 0.875rem 0 1.5rem 0;

        // Line clamp for consistent height
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    // Rating and Action Section
    .rating-action-section {
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 1rem;
        margin-top: auto;
    }

    // Rating Container
    .rating-container {
        display: flex;
        align-items: center;
        gap: 0.5rem;

        .star-rating {
            display: flex;
            align-items: center;
        }

        .rating-text {
            font-family: 'Poppins', sans-serif;
            font-size: 0.875rem;
            color: $text-muted;
            font-weight: 500;
            white-space: nowrap;
        }
    }

    // View Details Button
    .view-details-btn {
        background: $primary-color;
        // border: 1px solid $primary-color;
        border-radius: 0;
        padding: 0.75rem 1.5rem;
        font-family: 'Poppins', sans-serif;
        font-weight: 600;
        font-size: 0.875rem;
        color: $white;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        transition: all 0.3s ease;
        box-shadow: none;
        white-space: nowrap;
        text-transform: uppercase;
        letter-spacing: 0.025em;

        &:hover {
            color: $white;
            text-decoration: none;
            background: $secondary-color;
            border-color: $secondary-color;
        }

        &:focus {
            box-shadow: 0 0 0 2px rgba($secondary-color, 0.25);
            outline: none;
        }
    }

    // Responsive Design
    @media (max-width: 768px) {
        .card .card-body {
            padding: 1.5rem;

            .row {
                flex-direction: column;
                text-align: center;
            }
        }

        .service-image-container {
            margin-bottom: 1rem;
            align-self: center;
            max-width: 200px;
        }

        .service-content {
            min-height: auto;
        }

        .rating-action-section {
            flex-direction: column;
            align-items: center;
            gap: 0.75rem;
        }

        .view-details-btn {
            padding: 0.75rem 1.5rem;
        }
    }

    @media (max-width: 576px) {
        .card .card-body {
            padding: 1.25rem;
        }

        .service-title {
            font-size: 1.125rem;
        }

        .service-description {
            font-size: 0.9rem;
        }
    }

    // Grid view adjustments
    &.grid-view {
        .card .card-body .row {
            flex-direction: column;
            text-align: center;
        }

        .service-image-container {
            margin-bottom: 1.5rem;
            align-self: center;
            max-width: 150px;
        }

        .rating-action-section {
            flex-direction: column;
            align-items: center;
            gap: 1rem;
        }
    }

    // List view specific
    &.list-view {
        .service-content {
            padding-left: 1rem;
        }

        @media (max-width: 768px) {
            .service-content {
                padding-left: 0;
            }
        }
    }
}
</style>
