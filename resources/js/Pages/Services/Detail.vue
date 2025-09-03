<template>
    <app-layout title="Quick by Services">
        <section class="quickbyservices">
            <div class="py-5" style="background-color: #fef3db;">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="d-flex align-items-center flex-column">
                                <div class="avatar overflow-hidden rounded-1 bg-light">
                                    <img v-if='service.image' style="width: 100%;" :src="service.image"
                                        alt="ServiceImage">
                                    <img v-else style="width: 100%;" src="@/images/common/avatar.png" alt="Avatar">

                                </div>

                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="d-flex align-items-start justify-content-center flex-column px-4">
                                <h3 style="font-size: 30px;">{{ service.name }}</h3>
                                <p v-html="service.description">
                                </p>

                                <!-- <div class="d-flex rounded-4 w-100 p-1 mb-4 justify-content-between align-items-center"
                                    style="background-color: #fee8ba;">
                                    <span class="px-2">Legal Consultation Fees {{ getDisplayAmount(service.price) }}</span>
                                </div> -->


                                <div class="d-flex w-100 justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <span class="me-2 d-flex">
                                            <span class="overflow-hidden d-flex border border-light rounded-circle"
                                                style="height: 40px; width: 40px; margin-right: -30px;"><img
                                                    src="@/images/lock.png" alt="Image"></span>
                                            <span class="overflow-hidden d-flex border border-light rounded-circle"
                                                style="height: 40px; width: 40px;"><img src="@/images/lock.png"
                                                    alt="Image"></span>
                                        </span>
                                        <span>{{ service.booked_services_count }} people consulted</span>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-center mb-2">
                                        <star-rating :rating="service.rating" :star-size="18" :read-only="true"
                                            :increment="0.01" :show-rating="false"></star-rating>
                                        <span class="text-dark small mt-1 ps-1">
                                            ({{ service.rating }}/5)</span>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-end w-100 mt-auto">
                                    <Link :href="route('book_service_display', { service: service.slug })"
                                        class="btn btn-primary fw-bold px-4 mt-4">Free Consultancy</Link>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- <div class="py-5" v-if="service.lawyer">
                <div class="container">
                    <div class="row">
                        <div class="col-md-7">
                            <h2>{{ service.lawyer.name }}</h2>
                            <p v-html="service.lawyer.description"></p>
                        </div>
                        <div class="col-md-5 text-end">
                            <img v-if="service.lawyer.image" :src="service.lawyer.image" class="rounded-4" alt="Image">
                            <img v-else src="@/images/sale-services.png" class="rounded-4"/>
                        </div>
                    </div>
                </div>
            </div> -->

            <!-- full description -->
            <div class="py-5">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8">
                            <div v-html="service.full_description"></div>
                        </div>
                        <div class="col-md-4 text-start position-relative">
                            <div class="action-btns">
                                <button class="btn btn-secondary me-2 w-100 btn-lg"
                                    @click="openBookingModal('Contact Us')">Contact
                                    Us</button>

                                <button class="btn btn-primary w-100 mt-3 btn-lg"
                                    @click="openBookingModal('Book a Demo')" v-if="service.id == 7">Book a Demo</button>

                                <button class="btn btn-primary w-100 mt-3 btn-lg"
                                    @click="openBookingModal('Talk to our experts')" v-else-if="service.id == 19">Talk
                                    to Our Experts</button>

                                <button class="btn btn-primary w-100 mt-3 btn-lg"
                                    @click="openBookingModal('Quick legal consultancy.')" v-else>Quick Legal
                                    Consultancy</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="py-5" v-if="service.faqs.length > 0"
                style="background-image: url('@/images/queries-bg.png'); background-color: black;">
                <div class="container">
                    <div class="row">
                        <div class="col-12 mb-5">
                            <h4 class="text-white text-center">Related this services</h4>
                            <h2 class="text-white text-center">Answer Questions</h2>
                        </div>
                        <div class="col-md-12">
                            <div class="accordion" id="accordionFlushExample">
                                <div class="accordion-item mb-3" v-for="faq in service.faqs" :key="faq.id">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button shadow-none collapsed" type="button"
                                            data-bs-toggle="collapse" :data-bs-target="'#flush-collapse-' + faq.id"
                                            aria-expanded="false" :aria-controls="'flush-collapse-' + faq.id">
                                            <div
                                                class="d-flex w-100 flex-column flex-lg-row align-items-lg-center justify-content-between px-3">
                                                <div class="d-flex align-items-center">
                                                    <i class="bi bi-question-octagon me-3 fs-3"></i>
                                                    <span>{{ faq.question }}</span>
                                                </div>

                                            </div>
                                        </button>
                                    </h2>
                                    <div :id="'flush-collapse-' + faq.id" class="accordion-collapse collapse"
                                        data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">
                                            <div class="px-3 text-black">{{ faq.answer }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="py-5" v-if="service.reviews.length > 0">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <Carousel :settings="settings" :breakpoints="breakpoints">
                                <Slide v-for="review in service.reviews" :key="review.id">
                                    <div class="row align-items-center">
                                        <div class="col-lg-6">
                                            <h4 class="text-start">About our services</h4>
                                            <h2 class="text-start">Customer Says</h2>

                                            <i class="my-4 text-start d-block">{{ review.comment }}</i>

                                            <h4 class="mb-0 text-start fw-bold">{{ review.customer.name }}</h4>
                                            <p class="text-start">Category Name</p>
                                        </div>
                                        <div class="col-lg-6">
                                            <img style="width: 100%;" :src="review.customer.image" alt="Image">
                                        </div>
                                    </div>
                                </Slide>
                            </Carousel>
                        </div>
                    </div>

                </div>
            </div>

            <div class="py-5" v-if="related_services.length > 0">
                <div class="container">
                    <div class="row">
                        <div class="col-12 mb-5">
                            <h4 class="text-center">You can check similar services</h4>
                            <h2 class="text-center">Check out other {{ service_category.name ?? "" }}</h2>
                        </div>

                        <div class="col-md-4 h-100" v-for="related_service in related_services"
                            :key="related_service.id">
                            <div class="card rounded-sm h-100">
                                <div class="card-body">
                                    <div class="avatar mb-3 rounded-sm overflow-hidden">
                                        <img v-if="related_service.image"
                                            style="width: 100%; max-height: 300px; object-fit: cover;"
                                            :src="related_service.image" alt="Image">
                                        <img v-else style="width: 100%;" src="@/images/property-s.png" alt="Image">
                                    </div>
                                    <div class="d-flex flex-column">
                                        <h5 style="font-size: 18px;">{{ related_service.name }}</h5>
                                        <p class="d-flex align-items-center justify-content-between mb-0">
                                            <span v-html="related_service.description" class="related-services"></span>
                                            <Link :href="route('services.detail', { 'slug': related_service.slug })">
                                            <img style="width: 25px;" src="@/images/arrow.png" alt="Image">
                                            </Link>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <contact-us-modal :show="showContactUsModal" :metadata="{ id: service.id, reason: this.reason, }"
            @close="showContactUsModal = false" id="service-details-contact-us"></contact-us-modal>

    </app-layout>
</template>

<script>
import { defineComponent, ref } from "vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import Navbar from "@/Layouts/AppIncludes/Navbar.vue";
import PageHeader from "@/Components/PageHeader.vue";
import ContactUsModal from '@/Components/Shared/ContactUsFormModal.vue';
import Breadcrums from "@/Components/Shared/Breadcrums.vue";
import { Carousel, Navigation, Pagination, Slide } from "vue3-carousel";
import { Link } from "@inertiajs/inertia-vue3";
import { useStickOnScroll } from "@/Composables/useStickOnScroll";

export default defineComponent({
    components: {
        AppLayout,
        Navbar,
        PageHeader,
        Breadcrums,
        Carousel,
        Navigation,
        Pagination,
        Slide,
        Link, ContactUsModal,
    },
    props: ["service", "related_services", "service_category"],
    created() { },
    data() {
        return {
            faqs: [],
            // carousel settings
            settings: {
                itemsToShow: 1,
                snapAlign: "start",
            },
            // breakpoints are mobile first
            // any settings not specified will fallback to the carousel settings
            breakpoints: {
                // 700px and up
                700: {
                    itemsToShow: 1,
                    snapAlign: "start",
                },
                // 1024 and up
                1024: {
                    itemsToShow: 1,
                    snapAlign: "start",
                },
            },
            posts: {},
            breadcrums: [
                {
                    id: 1,
                    name: this.__('home'),
                    link: "/",
                },
                {
                    id: 2,
                    name: this.__('service'),
                    link: "",
                },
            ],
            showContactUsModal: false,
            showBookDemo: false,
            showTalkToExpertModal: false,
            showQuickLegalConsult: false,
            reason: '',

        };
    },
    setup() {
        const stickyButtons = ref(null);

        useStickOnScroll(stickyButtons, {
            bottom: '2rem',
            right: '2rem',
        });
    },
    methods: {
        openBookingModal(reason) {
            this.reason = reason;
            this.showContactUsModal = true;
        }
    }
});
</script>


<style lang="scss" scoped>
.related-services {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
    text-overflow: ellipsis;
}

.action-btns {
    position: sticky;
    top: 150px;
}
</style>
