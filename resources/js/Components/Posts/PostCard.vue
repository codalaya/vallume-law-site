<template>
  <div :class="{ 'col-md-4': add_col, 'col-md-6': !add_col }">
    <div class="post-card">
      <div class="card-image-container position-relative overflow-hidden">
        <img
          v-if="post.image"
          class="card-image"
          :src="post.image"
          alt="Post Image"
        />
        <img
          v-else
          class="card-image"
          src="@/images/common/image.png"
          alt="Default Image"
        />

      </div>

      <div class="card-content">
        <div class="card-header-section">
          <h5 class="post-title">
            <Link class="title-link" :href="route('blogs.detail', { slug: post.slug })">
              {{ post.name }}
            </Link>
          </h5>

         <!-- <div class="post-badges">
            <span v-if="post.lawyer_id" class="post-badge lawyer-badge">
              Lawyer
            </span>
            <span v-else-if="post.law_firm_id" class="post-badge firm-badge">
              Law Firm
            </span>
            <span v-else class="post-badge admin-badge">
              Admin
            </span>
          </div> -->
        </div>

        <div class="post-description" v-html="post.description"></div>

        <div class="card-footer-section">
          <Link :href="route('blogs.detail', { slug: post.slug })" class="read-more-link">
            Read Full Post
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
    background_color: {},
    add_col: {
      default: true,
    },
    post: {},
  },
  created() {},
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
.post-card {
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

.btn-read-more {
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
  margin-bottom: 16px;
}

.post-title {
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

.post-badges {
  display: flex;
  gap: 8px;
  flex-wrap: wrap;
  margin-bottom: 12px;
}

.post-badge {
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

.post-description {
  font-family: 'Poppins', sans-serif;
  font-size: 14px;
  line-height: 1.6;
  color: $text-muted;
  margin-bottom: 20px;

  // Limit to 3 lines
  display: -webkit-box;
  -webkit-line-clamp: 3;
  -webkit-box-orient: vertical;
  overflow: hidden;
  text-overflow: ellipsis;
}

.card-footer-section {
  // padding-top: 16px;
  // border-top: 1px solid $border-color;
}

.read-more-link {
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

  .post-title {
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

  .btn-read-more {
    padding: 10px 20px;
    font-size: 13px;
  }

  .post-title {
    font-size: 18px;
  }
}
</style>
