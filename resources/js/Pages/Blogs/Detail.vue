<template>
    <app-layout title="blogs">
        <template #default>
            <div class="section py-5">
                <div class="blog-article container py-5">
                    <!-- Title -->
                    <h1 class="article-title text-center mb-4 mx-auto ">{{ post.name }}</h1>

                    <!-- Meta Info (optional, can bind dynamically) -->
                    <div class="article-meta text-center mb-4">
                        <span class="author">By {{ post.author || 'Admin' }}</span>
                        <span class="mx-2">|</span>
                        <span class="date">{{ post.date || 'August 8, 2025' }}</span>
                    </div>

                    <div class="feature-share d-flex align-items-center justify-content-center gap-3 py-2 px-3 my-3">
                        <!-- Feature Badge -->
                        <span v-if="post.featured" class="feature-badge px-3 py-1 rounded-pill">
                            🌟 Featured Article
                        </span>

                        <!-- Share Button -->
                        <button class="share-btn d-flex align-items-center gap-2" @click="sharePost" title="Share">
                            <i class="bi bi-share-fill"></i>
                        </button>
                    </div>


                    <!-- Featured Image -->
                    <div class="article-image text-center mb-5">
                        <img v-if="post.image" :src="post.image" alt="image" class="img-fluid rounded-1 shadow-sm" />
                        <img v-else src="@/images/common/image.png" alt="image" class="img-fluid rounded shadow-sm" />
                    </div>

                    <!-- Article Content -->
                    <div class="article-content">
                        <div v-html="post.description"></div>
                    </div>
                </div>
            </div>

            <div class="related-blogs container my-5">
                <h2 class="section-title text-center mb-4">Related Blogs</h2>
                <div class="row g-4">
                    <div v-for="(blog, index) in blogs" :key="index" class="col-12 col-md-6 col-lg-4">
                        <div class="card blog-card h-100 shadow-sm">
                            <img :src="blog.image || defaultImage" class="card-img-top" :alt="blog.title" />
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">{{ blog.title }}</h5>
                                <p class="card-text text-muted">
                                    {{ truncateText(blog.description, 100) }}
                                </p>
                                <a :href="blog.link" class="btn btn-read mt-auto align-self-start">
                                    Read More →
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </template>
    </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout.vue";
import Navbar from "@/Layouts/AppIncludes/Navbar.vue";
import PageHeader from "@/Components/PageHeader.vue";
import Breadcrums from "../../Components/Shared/Breadcrums.vue";

export default {
    components: {
        AppLayout,
        Navbar,
        PageHeader,
        Breadcrums
    },
    props: {
        post: Object,
    },
    data() {
        return {

            breadcrums: [
                {
                    id: 1,
                    name: this.__('home'),
                    link: '/'
                },
                {
                    id: 2,
                    name: this.__('blog'),
                    link: ''
                }
            ],
            blogs: [
                {
                    title: "Understanding Corporate Law Basics",
                    description:
                        "A quick guide to understanding the fundamentals of corporate law and its applications.",
                    image: "https://placehold.co/600x400",
                    link: "#",
                },
                {
                    title: "Intellectual Property Rights Explained",
                    description:
                        "Protecting your creations is vital. Here’s an overview of IPR and how it works in practice.",
                    image: "https://placehold.co/600x400",
                    link: "#",
                },
                {
                    title: "How to Draft a Solid Contract",
                    description:
                        "Contracts form the backbone of business transactions. Learn the essential elements of a good contract.",
                    image: "https://placehold.co/600x400",
                    link: "#",
                }
            ],
            defaultImage: "/images/common/image.png"
        }
    },
    methods: {
        truncateText(text, length) {
            if (!text) return "";
            return text.length > length ? text.slice(0, length) + "..." : text;
        },
        sharePost() {
            const url = window.location.href;
            if (navigator.share) {
                navigator.share({
                    title: this.post.title,
                    text: "Check out this article from our blog.",
                    url: url
                }).catch(err => console.log("Share cancelled", err));
            } else {
                navigator.clipboard.writeText(url);
                alert("Link copied to clipboard!");
            }
        }
    }
}
</script>


<style lang="scss">
$primary-color: #153f83;
$secondary-color: #D4AF37;

.blog-article {
    font-family: 'Poppins', sans-serif;
    color: #333;
    line-height: 1.7;

    .article-title {
        font-weight: 700;
        font-size: 2.5rem;
        color: $primary-color;
        position: relative;
        padding-bottom: 0.4rem;
        font-family: 'Playfair Display', serif;

        &::after {
            content: '';
            display: block;
            width: 80px;
            height: 3px;
            background-color: $secondary-color;
            margin: 0.6rem auto 0;
            border-radius: 2px;
        }
    }

    .article-meta {
        font-size: 0.95rem;
        color: #666;

        .author {
            color: $primary-color;
            font-weight: 500;
        }

        .date {
            color: #888;
        }
    }

    .article-image {
        img {
            max-width: 850px;
            width: 100%;
            height: auto;
            object-fit: cover;
        }
    }

    .article-content {
        max-width: 800px;
        margin: auto;
        font-size: 1.05rem;

        p {
            margin-bottom: 1.4rem;
        }

        h2,
        h3,
        h4 {
            color: $primary-color;
            margin-top: 2rem;
            margin-bottom: 1rem;
        }

        a {
            color: $secondary-color;
            text-decoration: underline;

            &:hover {
                color: darken($secondary-color, 10%);
            }
        }

        blockquote {
            border-left: 4px solid $secondary-color;
            padding-left: 1rem;
            font-style: italic;
            background-color: rgba($secondary-color, 0.05);
        }
    }
}

.related-blogs {
    .section-title {
        font-weight: 700;
        font-size: 1.8rem;
        color: $primary-color;
        position: relative;
        padding-bottom: 0.4rem;

        &::after {
            content: "";
            display: block;
            width: 60px;
            height: 3px;
            background-color: $secondary-color;
            margin: 0.5rem auto 0;
            border-radius: 2px;
        }
    }

    .blog-card {
        border: none;
        transition: transform 0.2s ease, box-shadow 0.2s ease;

        &:hover {
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
        }

        .card-title {
            font-weight: 600;
            color: $primary-color;
        }

        .btn-read {
            background-color: $secondary-color;
            color: #fff;
            font-weight: 500;
            padding: 0.4rem 1rem;
            border-radius: 0.3rem;
            text-decoration: none;

            &:hover {
                background-color: darken($secondary-color, 8%);
                color: #fff;
            }
        }
    }
}


.feature-badge {
  background: linear-gradient(135deg, #153f83, #0d2b5e);
  color: #fff;
  font-weight: 600;
  font-size: 0.85rem;
  letter-spacing: 0.5px;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.08);
}

.share-btn {
  background: $secondary-color;
  color: #fff;
  border: none;
  padding: 6px 12px;
  border-radius: 50%;
  font-size: 0.85rem;
  font-weight: 500;
  transition: all 0.2s ease;

  &:hover {
    background: #b6912e;
    color: #fff;
  }

  i {
    font-size: 1rem;
  }
}

</style>
