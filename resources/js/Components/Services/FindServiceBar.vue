<template>
    <div class="service-search-component">
        <!-- Home version (as shown in your image) -->
        <div v-if="home">
            <div class="">
                <div class="col-md-4">
                    <select v-model="form.type" class="form-select border-0 py-3" aria-label="Select Distance">
                        <option value="" selected>{{ __("select") }} {{ __("type") }}</option>
                        <option value="audio">{{ __("audio") }}</option>
                        <option value="video">{{ __("video") }}</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <input v-model="form.search" type="text" class="form-control border-0 py-3" id="findPosdcastHome"
                        :placeholder="__('search')" />
                </div>
                <div class="col-md-4">
                    <div class="d-flex">
                        <select class="form-select border-0 py-3" aria-label="Select Distance">
                            <option value="" selected>{{ __("select") }} {{ __("tag") }}</option>
                            <option v-for="tag in tags" :key="tag.id" :value="tag.slug">
                                {{ tag.name }}
                            </option>
                        </select>

                        <button :href="route('services.listing')" @click="submit" class="btn btn-primary ms-3"
                            type="submit">
                            <i class="bi bi-search"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Full page version -->
        <div v-else class="section pt-4 pb-5">
            <div class="">
                <div class="pt-2">
                    <div class="col-12">
                        <h2>{{ __("find") }} {{ __n("service") }}</h2>
                    </div>
                    <div class="col-12">
                        <div class="flex-column">
                            <div class="col-md-4 w-100 mb-4 field-group">
                                <select v-model="form.service_category" class="form-select" aria-label="Select Tag">
                                    <option value="" selected>
                                        {{ __("select") }} {{ __('service') }} {{ __('category') }}
                                    </option>
                                    <option v-for="service_category in service_categories" :key="service_category.id"
                                        :value="service_category.slug">
                                        {{ service_category.name }}
                                    </option>
                                </select>
                            </div>
                            <div class="col-md-4 w-100 mb-4 field-group">
                                <input type="text" v-model="form.search" class="form-control" id="findPosdcastListing2"
                                    :placeholder="__('search')" />
                            </div>
                            <div class="col-md-4 w-100 mb-4 field-group">
                                <select v-model="form.tag" class="form-select" aria-label="Select Tag">
                                    <option value="" selected>{{ __("select") }} {{ __("tag") }}</option>
                                    <option v-for="tag in tags" :key="tag.id" :value="tag.slug">
                                        {{ tag.name }}
                                    </option>
                                </select>
                            </div>

                            <div class="d-grid">
                                <button :href="route('services.listing')" @click="submit" class="btn btn-primary"
                                    :disabled="isLoading" type="submit">
                                    <span v-if="isLoading" class="spinner-loader"></span>
                                    {{ __("search") }}
                                </button>
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
import ValidationErrors from "@/Components/ValidationErrors.vue";
import SpinnerLoader from "@/Components/Shared/SpinnerLoader.vue";
import { Link } from "@inertiajs/inertia-vue3";
import axios from "axios";
import { router } from "@inertiajs/inertia-vue3";
export default defineComponent({
    components: {
        ValidationErrors,
        SpinnerLoader,
        Link,
    },
    props: {
        is_redirect: {
            type: Boolean,
            default: true,
        },
        home: {
            type: Boolean,
            default: false,
        },
    },
    created() {
        this.getTags();
        this.getServiceCategories();
        this.$emit("getServices", this.form);
    },
    data() {
        return {
            form: {
                service_category: route().params.service_category ?? "",
                search: route().params.search ?? "",
                tag: route().params.tag ?? "",
                type: route().params.type ?? "",
            },
            isLoading: false,
            tags: [],
            service_categories: [],
        };
    },

    methods: {
        getTags() {
            axios.get(this.route("getApiTags")).then((res) => {
                this.tags = res.data.data;
            });
        },
        getServiceCategories() {
            axios.get(this.route("getApiServiceCategories")).then((res) => {
                this.service_categories = res.data.data;
            });
        },
        submit() {
            this.isLoading = true;
            const fetchDataPromise = new Promise((resolve, reject) => {
                setTimeout(() => {
                    this.$inertia.replace(this.route("services.listing"), {
                        data: this.form,
                        replace: true,
                        preserveScroll: true,
                    });
                    this.$emit("getServices", this.form);
                    resolve();
                }, 1000);
            });
            fetchDataPromise
                .then((data) => { })
                .catch((error) => { })
                .finally(() => {
                    this.isLoading = false;
                });
        },
    },
});
</script>


<style lang="scss" scoped>
// Color Variables
$primary-color: #153f83;
$secondary-color: #D4AF37;
$white: #ffffff;
$text-dark: #2d3748;
$text-muted: #718096;
$border-light: #e2e8f0;
$border-focus: rgba(21, 63, 131, 0.25);

// Minimal Professional Form Field Styling
.service-search-component {
    font-family: 'Poppins', sans-serif;

    // Enhanced form fields only
    .form-select,
    .form-control {
        border: 1px solid #dee2e6;
        border-radius: 0px;
        box-shadow: none;
        outline: none;
        padding: 12px 16px;
        font-size: 15px;
        font-weight: 400;
        color: $text-dark;
        background-color: $white;
        transition: all 0.2s ease;
        font-family: 'Poppins', sans-serif;

        &:focus {
            border-color: $primary-color;
            //   box-shadow: 0 0 0 3px $border-focus;
            box-shadow: none;
            outline: none;
            background-color: #fafbfc;
        }

        &:hover:not(:focus) {
            border-color: #adb5bd;
        }

        &::placeholder {
            color: $text-muted;
            font-weight: 400;
        }
    }

    // Custom select arrow
    .form-select {
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='%23495057' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M2 5l6 6 6-6'/%3e%3c/svg%3e");
        background-repeat: no-repeat;
        background-position: right 12px center;
        background-size: 16px 12px;
        padding-right: 40px;

        &:focus {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='%23153f83' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M2 5l6 6 6-6'/%3e%3c/svg%3e");
        }
    }

    // Enhanced button styling
    .btn-primary {
        background-color: $primary-color;
        border-color: $primary-color;
        border-radius: 6px;
        padding: 12px 24px;
        font-weight: 500;
        font-family: 'Poppins', sans-serif;
        transition: all 0.2s ease;

        &:hover {
            background-color: darken($primary-color, 8%);
            border-color: darken($primary-color, 8%);
            transform: translateY(-1px);
        }

        &:active {
            transform: translateY(0);
        }

        &:focus {
            box-shadow: 0 0 0 3px rgba($primary-color, 0.25);
        }

        &:disabled {
            background-color: #6c757d;
            border-color: #6c757d;
            transform: none;
            opacity: 0.65;
        }
    }

    // Title styling (only for full page version)
    h2 {
        font-family: 'Playfair Display', serif;
        font-weight: 600;
        color: $primary-color;
        margin-bottom: 1.5rem;
    }

    // Minimal spacing adjustments
    .field-group {
        margin-bottom: 1rem;
    }

    // Spinner for loading state
    .spinner-loader {
        display: inline-block;
        width: 1rem;
        height: 1rem;
        border: 2px solid rgba(255, 255, 255, 0.3);
        border-top: 2px solid $white;
        border-radius: 50%;
        animation: spin 1s linear infinite;
        margin-right: 0.5rem;
    }

    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }

    // Mobile responsive adjustments
    @media (max-width: 768px) {

        .form-select,
        .form-control {
            padding: 10px 14px;
            font-size: 14px;
            border-radius: 0 !important;
        }

        .btn-primary {
            padding: 10px 20px;
        }
    }
}
</style>
