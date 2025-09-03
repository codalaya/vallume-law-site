<template>
  <div class="landing-page">
    <div class="container">
      <div class="row min-vh-100">
        <!-- Left Section - Free Consultation Form -->
        <div class="col-lg-6 consultation-section d-flex align-items-center justify-content-center">
          <div class="consultation-card p-5">
            <h2 class="consultation-title text-white mb-4">Free Consultation</h2>

            <form @submit.prevent="submitForm" class="consultation-form">
              <div class="mb-3">
                <input
                  type="text"
                  v-model="form.name"
                  class="form-control custom-input"
                  placeholder="NAME*"
                  required
                >
              </div>

              <div class="mb-3">
                <input
                  type="email"
                  v-model="form.email"
                  class="form-control custom-input"
                  placeholder="EMAIL*"
                  required
                >
              </div>

              <div class="mb-3">
                <select
                  v-model="form.service"
                  class="form-control custom-input"
                  required
                >
                  <option value="">CHOOSE SERVICE*</option>
                  <option value="criminal">Criminal Law</option>
                  <option value="civil">Civil Law</option>
                  <option value="family">Family Law</option>
                  <option value="corporate">Corporate Law</option>
                  <option value="property">Property Law</option>
                </select>
              </div>

              <div class="mb-4">
                <textarea
                  v-model="form.message"
                  class="form-control custom-input"
                  rows="4"
                  placeholder="MESSAGE*"
                  required
                ></textarea>
              </div>

              <button type="submit" class="btn btn-send w-100">
                Send Message
              </button>
            </form>
          </div>
        </div>

        <!-- Right Section - Our History -->
        <div class="col-lg-6 history-section d-flex align-items-center">
          <div class="history-content p-5">
            <div class="history-header mb-4">
              <p class="history-subtitle mb-2">Our History</p>
              <h1 class="history-title">Compromise is The Best And Cheapest Lawyer</h1>
            </div>

            <div class="row">
              <div class="col-md-6 mb-4">
                <p class="history-text">
                  Form wherein beast so multiply were is created air man crept lesser also with
                  a great season fishe blessed also likeness it ours. Let thing abound dainti
                  creature made she ad is fourth.
                </p>
              </div>
              <div class="col-md-6 mb-4">
                <p class="history-text">
                  Form wherein beast so multiply were is created air man crept lesser also with
                  a great season fishe blessed also likeness it ours. Let thing abound dainti
                  creature made she ad is fourth.
                </p>
              </div>
            </div>

            <!-- Video Section -->
            <div class="video-section mt-4">
              <div class="video-container position-relative">
                <img
                  src="https://images.unsplash.com/photo-1589829545856-d10d557cf95f?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                  alt="Legal consultation"
                  class="img-fluid rounded"
                >
                <div class="play-button position-absolute top-50 start-50 translate-middle">
                  <button class="btn btn-play rounded-circle" @click="playVideo">
                    <i class="fas fa-play"></i>
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Scroll to top button -->
    <button
      class="scroll-top-btn position-fixed"
      @click="scrollToTop"
      v-show="showScrollButton"
    >
      <i class="fas fa-arrow-up"></i>
    </button>
  </div>
</template>

<script>
import { ref, onMounted, onUnmounted } from 'vue'

export default {
  name: 'LegalLandingPage',
  setup() {
    const form = ref({
      name: '',
      email: '',
      service: '',
      message: ''
    })

    const showScrollButton = ref(false)

    const submitForm = () => {
      // Handle form submission
      console.log('Form submitted:', form.value)
      alert('Thank you for your inquiry! We will contact you soon.')

      // Reset form
      form.value = {
        name: '',
        email: '',
        service: '',
        message: ''
      }
    }

    const playVideo = () => {
      // Handle video play
      alert('Video would play here')
    }

    const scrollToTop = () => {
      window.scrollTo({
        top: 0,
        behavior: 'smooth'
      })
    }

    const handleScroll = () => {
      showScrollButton.value = window.scrollY > 300
    }

    onMounted(() => {
      window.addEventListener('scroll', handleScroll)
    })

    onUnmounted(() => {
      window.removeEventListener('scroll', handleScroll)
    })

    return {
      form,
      showScrollButton,
      submitForm,
      playVideo,
      scrollToTop
    }
  }
}
</script>

<style lang="scss" scoped>
// Variables
$primary-color: #153f83;
$secondary-color: #D4AF37;
$light-bg: #f8f9fa;
$text-dark: #333;
$text-muted: #666;

// Import Google Fonts
@import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=Poppins:wght@300;400;500;600&display=swap');

.landing-page {
  font-family: 'Poppins', sans-serif;

  .consultation-section {
      padding: 2rem;

      .consultation-card {
        background: linear-gradient(135deg, rgba($secondary-color, 0.9) 0%, rgba($secondary-color, 0.8) 100%);
      max-width: 400px;
      width: 100%;

      .consultation-title {
        font-family: 'Playfair Display', serif;
        font-size: 2rem;
        font-weight: 600;
        text-align: center;
        margin-bottom: 2rem;
      }

      .custom-input {
        background: rgba(255, 255, 255, 0.2);
        border: 1px solid rgba(255, 255, 255, 0.3);
        color: white;
        font-size: 0.9rem;
        padding: 0.8rem 1rem;
        border-radius: 0;

        &::placeholder {
          color: rgba(255, 255, 255, 0.8);
          font-weight: 300;
          letter-spacing: 0.5px;
        }

        &:focus {
          background: rgba(255, 255, 255, 0.3);
          border-color: white;
          box-shadow: none;
          color: white;
        }

        option {
          color: $text-dark;
          background: white;
        }
      }

      .btn-send {
        background: white;
        color: $secondary-color;
        border: none;
        padding: 0.8rem 2rem;
        font-weight: 500;
        font-size: 0.95rem;
        border-radius: 0;
        transition: all 0.3s ease;

        &:hover {
          background: $light-bg;
          transform: translateY(-2px);
          box-shadow: 0 4px 15px rgba(0,0,0,0.2);
        }
      }
    }
  }

  .history-section {
    background: white;
    padding: 2rem;

    .history-content {
      max-width: 600px;

      .history-subtitle {
        color: $secondary-color;
        font-size: 0.9rem;
        font-weight: 500;
        letter-spacing: 1px;
        text-transform: uppercase;
        margin-bottom: 0.5rem;
      }

      .history-title {
        font-family: 'Playfair Display', serif;
        font-size: 2.5rem;
        font-weight: 700;
        color: $text-dark;
        line-height: 1.2;
        margin-bottom: 2rem;
      }

      .history-text {
        color: $text-muted;
        line-height: 1.6;
        font-size: 0.95rem;
      }

      .video-container {
        max-width: 500px;

        img {
          width: 100%;
          height: 280px;
          object-fit: cover;
          border-radius: 8px;
        }

        .play-button {
          .btn-play {
            width: 60px;
            height: 60px;
            background: rgba($secondary-color, 0.9);
            border: 3px solid white;
            color: white;
            font-size: 1.2rem;
            transition: all 0.3s ease;

            &:hover {
              background: $secondary-color;
              transform: scale(1.1);
            }
          }
        }
      }
    }
  }

  .scroll-top-btn {
    bottom: 30px;
    right: 30px;
    width: 50px;
    height: 50px;
    background: $secondary-color;
    border: none;
    border-radius: 50%;
    color: white;
    font-size: 1.1rem;
    transition: all 0.3s ease;
    z-index: 1000;

    &:hover {
      background: darken($secondary-color, 10%);
      transform: translateY(-3px);
    }
  }
}

// Responsive Design
@media (max-width: 991px) {
  .landing-page {
    .consultation-section {
      min-height: auto;
      padding: 3rem 1rem;
    }

    .history-section {
      padding: 3rem 1rem;

      .history-content {
        .history-title {
          font-size: 2rem;
        }
      }
    }
  }
}

@media (max-width: 768px) {
  .landing-page {
    .history-content {
      .history-title {
        font-size: 1.8rem;
      }

      .video-container img {
        height: 200px;
      }
    }
  }
}
</style>
