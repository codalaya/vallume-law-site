<template>
    <section class="blog-section py-5">
        <div class="container">
            <!-- Section Header -->
            <div class="row justify-content-center mb-5" data-aos="fade-up">
                <div class="col-lg-8 text-center">
                    <span class="badge bg-primary-light text-primary mb-3">Latest Updates</span>
                    <h2 class="section-title mb-3">Legal Insights & News</h2>
                    <p class="section-subtitle text-muted">
                        Stay informed with our latest articles on legal developments, case studies, and expert analysis
                    </p>
                </div>
            </div>

            <!-- Blog Cards Swiper -->
            <div class="blog-swiper-container" data-aos="fade-up" data-aos-delay="100">
                <div class="swiper blogSwiper" ref="blogSwiper">
                    <div class="swiper-wrapper">
                        <div v-for="(blog, index) in blogs" :key="index" class="swiper-slide">
                            <div class="blog-card h-100">
                                <!-- Image -->
                                <div class="blog-image-wrapper">
                                    <img :src="blog.image" :alt="blog.title" class="blog-image" />
                                    <div class="blog-overlay">
                                        <span class="blog-category">{{ blog.category }}</span>
                                    </div>
                                </div>
                                <!-- Content -->
                                <div class="blog-content">
                                    <div class="blog-meta mb-3">
                                        <span class="blog-author">
                                            <i class="fas fa-user-circle me-1"></i>
                                            {{ blog.author }}
                                        </span>
                                        <span class="blog-date">
                                            <i class="fas fa-calendar-alt me-1"></i>
                                            {{ blog.date }}
                                        </span>
                                    </div>
                                    <h4 class="blog-title">{{ blog.title }}</h4>
                                    <p class="blog-excerpt">{{ blog.excerpt }}</p>
                                    <a href="#" class="read-more-link">
                                        Read More <i class="fas fa-arrow-right ms-1"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-button-prev" ref="prevBtn">
                        <i class="fas fa-chevron-left"></i>
                    </div>
                    <div class="swiper-button-next" ref="nextBtn">
                        <i class="fas fa-chevron-right"></i>
                    </div>

                    <!-- Pagination -->
                    <div class="swiper-pagination"></div>
                </div>
            </div>


            <!-- View All Button -->
            <div class="row" data-aos="fade-up" data-aos-delay="200">
                <div class="col-12 text-center">
                    <a href="#" class="btn btn-outline-primary btn-lg px-4">
                        View All Articles
                        <i class="fas fa-external-link-alt ms-2"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>
</template>

<script setup>
import { onMounted, ref } from 'vue'
import Swiper from "swiper";
import "swiper/css";
import "swiper/css/navigation";
import "swiper/css/pagination";


const blogs = ref([
    {
        id: 1,
        title: 'Corporate Law Updates: New Regulations for 2025',
        excerpt: 'Understanding the latest changes in corporate governance and compliance requirements that affect modern businesses.',
        author: 'Sarah Johnson',
        date: 'Jan 21, 2025',
        category: 'Corporate Law',
        image: 'https://images.unsplash.com/photo-1589829545856-d10d557cf95f?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80'
    },
    {
        id: 2,
        title: 'Intellectual Property Protection Strategies',
        excerpt: 'Essential steps for protecting your intellectual property rights in the digital age and preventing infringement.',
        author: 'Michael Chen',
        date: 'Jan 18, 2025',
        category: 'IP Law',
        image: 'https://images.unsplash.com/photo-1560472355-536de3962603?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80'
    },
    {
        id: 3,
        title: 'Employment Law: Remote Work Compliance',
        excerpt: 'Navigating the legal landscape of remote work policies, employee rights, and workplace regulations.',
        author: 'Emily Rodriguez',
        date: 'Jan 15, 2025',
        category: 'Employment Law',
        image: 'https://images.unsplash.com/photo-1556761175-b413da4baf72?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80'
    },
    {
        id: 4,
        title: 'Contract Law: Best Practices for Digital Agreements',
        excerpt: 'Key considerations for drafting enforceable digital contracts and electronic signature validity.',
        author: 'David Thompson',
        date: 'Jan 12, 2025',
        category: 'Contract Law',
        image: 'https://images.unsplash.com/photo-1450101499163-c8848c66ca85?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80'
    },
    {
        id: 5,
        title: 'Data Privacy Laws: GDPR and Beyond',
        excerpt: 'Comprehensive guide to data protection regulations and compliance strategies for international businesses.',
        author: 'Lisa Wang',
        date: 'Jan 09, 2025',
        category: 'Privacy Law',
        image: 'https://images.unsplash.com/photo-1563013544-824ae1b704d3?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80'
    },
    {
        id: 6,
        title: 'Data Privacy Laws: GDPR and Beyond',
        excerpt: 'Comprehensive guide to data protection regulations and compliance strategies for international businesses.',
        author: 'Lisa Wang',
        date: 'Jan 09, 2025',
        category: 'Privacy Law',
        image: 'https://images.unsplash.com/photo-1563013544-824ae1b704d3?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80'
    }
])
const blogSwiper = ref(null);
const prevBtn = ref(null); const nextBtn = ref(null);

onMounted(() => {

    new Swiper(blogSwiper.value, {
        slidesPerView: 1,
        spaceBetween: 24,
        slidesPerGroup: 1,
        loop: true,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        navigation: {
            nextEl: nextBtn.value,
            prevEl: prevBtn.value,
        },
        breakpoints: {
            768: {
                slidesPerView: 3,
                slidesPerGroup: 3,
            },
        },
    });
})


</script>

<style lang="scss" scoped>
// Variables
$primary-color: #1a365d;
$primary-light: #e3f2fd;
$secondary-color: #2c5aa0;
$accent-color: #f59e0b;
$text-dark: #2d3748;
$text-muted: #718096;
$border-light: #e2e8f0;
$shadow-light: rgba(0, 0, 0, 0.08);
$shadow-medium: rgba(0, 0, 0, 0.12);
$gradient-overlay: linear-gradient(135deg, rgba(26, 54, 93, 0.9), rgba(44, 90, 160, 0.8));

.blog-section {
    background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
    position: relative;
    overflow: hidden;

    &::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23e2e8f0' fill-opacity='0.3'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        opacity: 0.5;
        z-index: 0;
    }

    .container {
        position: relative;
        z-index: 1;
    }
}

.section-title {
    font-size: 2.5rem;
    font-weight: 700;
    color: $primary-color;
    position: relative;

    @media (max-width: 768px) {
        font-size: 2rem;
    }
}

.section-subtitle {
    font-size: 1.125rem;
    line-height: 1.7;
    max-width: 600px;
    margin: 0 auto;
}

.badge {
    font-size: 0.875rem;
    font-weight: 600;
    padding: 0.5rem 1rem;
    border-radius: 50px;
    letter-spacing: 0.5px;
    text-transform: uppercase;
}

.bg-primary-light {
    background-color: $primary-light !important;
}

.text-primary {
    color: $primary-color !important;
}

.blog-swiper-container {
    position: relative;
    padding: 2rem 0;

    .swiper {
        padding-bottom: 3rem;
    }

    .swiper-slide {
        height: auto; // fix card stretch
    }

    .blog-card {
        background: #fff;
        border-radius: 1rem;
        overflow: hidden;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        transition: transform 0.3s ease;

        &:hover {
            transform: translateY(-6px);
        }

        .blog-image-wrapper {
            position: relative;
            overflow: hidden;

            .blog-image {
                width: 100%;
                height: 220px;
                object-fit: cover;
            }

            .blog-overlay {
                position: absolute;
                top: 1rem;
                left: 1rem;
                background: rgba(0, 0, 0, 0.6);
                color: #fff;
                padding: 0.25rem 0.75rem;
                border-radius: 20px;
                font-size: 0.75rem;
                text-transform: uppercase;
            }
        }

        .blog-content {
            padding: 1.5rem;

            .blog-meta {
                font-size: 0.875rem;
                color: #6c757d;

                span {
                    margin-right: 1rem;
                }
            }

            .blog-title {
                font-size: 1.25rem;
                font-weight: 600;
                margin-bottom: 0.75rem;
            }

            .blog-excerpt {
                font-size: 0.95rem;
                color: #555;
            }

            .read-more-link {
                font-weight: 600;
                color: var(--bs-primary);
                text-decoration: none;

                i {
                    transition: transform 0.2s ease;
                }

                &:hover i {
                    transform: translateX(4px);
                }
            }
        }
    }

    // Swiper navigation styling
    .swiper-button-prev,
    .swiper-button-next {
        color: var(--bs-primary);
        width: 40px;
        height: 40px;

        border-radius: 50%;
        background: #fff;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);

        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;

        &:hover {
            background: var(--bs-primary);
            color: #fff;
        }

        &:after {
            font-size: 1rem;
        }
    }

    .swiper-pagination {
        bottom: 0 !important;
    }
}


// Swiper Pagination
:deep(.swiper-pagination) {
    bottom: 20px !important;

    .swiper-pagination-bullet {
        width: 12px;
        height: 12px;
        background: $border-light;
        opacity: 1;
        transition: all 0.3s ease;

        &.swiper-pagination-bullet-active {
            background: $primary-color;
            transform: scale(1.2);
        }
    }
}

// Button Styles
.btn-outline-primary {
    border: 2px solid $primary-color;
    color: $primary-color;
    font-weight: 600;
    padding: 0.875rem 2rem;
    border-radius: 50px;
    transition: all 0.3s ease;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    font-size: 0.875rem;

    &:hover {
        background: $primary-color;
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba($primary-color, 0.3);
    }

    @media (max-width: 768px) {
        padding: 0.75rem 1.5rem;
        font-size: 0.8rem;
    }
}

// Responsive adjustments
@media (max-width: 992px) {
    .section-title {
        font-size: 2.25rem;
    }
}

@media (max-width: 768px) {
    .blog-section {
        padding: 3rem 0;
    }

    .section-title {
        font-size: 1.875rem;
    }

    .section-subtitle {
        font-size: 1rem;
    }

    .blog-swiper-container .swiper {
        padding-bottom: 50px;
    }
}

@media (max-width: 576px) {
    .blog-content {
        padding: 1rem;
    }

    .blog-title {
        font-size: 1rem;
    }

    .blog-excerpt {
        font-size: 0.875rem;
    }
}
</style>
