<template>
  <section class="why-choose-us py-5">
    <div class="container">
      <!-- Section Heading -->
      <div class="text-center mb-5">
        <h2 class="section-title">
          Why Choose <span class="highlight">Vallume</span>?
        </h2>
        <p class="section-subtitle">
          Your trusted partner in paralegal support & upcoming
          <span class="gpt">ExampleGPT</span>
        </p>
      </div>

      <!-- Chess Board Grid -->
      <div class="chess-grid">
        <div
          v-for="(point, index) in points"
          :key="index"
          class="row chess-row g-0 mb-4"
          :class="{ 'reverse-order': index % 2 === 1 }"
        >
          <!-- Text Block -->
          <div class="col-md-6">
            <div class="text-block h-100 d-flex align-items-center">
              <div class="content p-5">
                <div class="icon-wrapper mb-3">
                  <i :class="point.icon"></i>
                </div>
                <h3 class="block-title mb-3">{{ point.title }}</h3>
                <p class="block-desc mb-0">{{ point.desc }}</p>
              </div>
            </div>
          </div>

          <!-- Image Block -->
          <div class="col-md-6">
            <div class="image-block h-100">
              <div class="image-wrapper">
                <img :src="point.image" :alt="point.title" class="img-fluid" />
                <div class="image-overlay"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script setup>
const points = [
  {
    title: "Tailored Legal Solutions",
    desc: "We understand that every law firm is different. That's why we offer customized paralegal support, providing the flexibility to scale up or down based on your specific legal practice needs.",
    icon: "fas fa-balance-scale",
    image: "https://images.unsplash.com/photo-1589829545856-d10d557cf95f?auto=format&fit=crop&w=800&q=80"
  },
  {
    title: "Cost-Efficient Support",
    desc: "Cut overhead without compromising quality. Our services bring you professional-grade legal support at a fraction of the cost of in-house staff, maximizing your firm's profitability.",
    icon: "fas fa-coins",
    image: "https://images.unsplash.com/photo-1554224155-6726b3ff858f?auto=format&fit=crop&w=800&q=80"
  },
  {
    title: "Seamless Integration",
    desc: "Think of us as an extension of your legal team. Whether you need ongoing support or help with a specific case, Example's paralegals integrate smoothly with your existing workflow.",
    icon: "fas fa-handshake",
    image: "https://images.unsplash.com/photo-1521791136064-7986c2920216?auto=format&fit=crop&w=800&q=80"
  },
  {
    title: "Expert Legal Knowledge",
    desc: "Our team consists of experienced paralegals with deep knowledge across various legal domains, ensuring accurate and reliable support for your practice.",
    icon: "fas fa-graduation-cap",
    image: "https://images.unsplash.com/photo-1521791136064-7986c2920216?auto=format&fit=crop&w=800&q=80"
  }
];
</script>

<style lang="scss" scoped>
$primary-color: #153f83;
$secondary-color: #d4af37;
$font-primary: 'Playfair Display', serif;
$font-secondary: 'Poppins', sans-serif;

.why-choose-us {
  background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);

  .section-title {
    font-family: $font-primary;
    font-weight: 700;
    font-size: 2.8rem;
    color: $primary-color;
    margin-bottom: 1rem;

    .highlight {
      color: $secondary-color;
    }

    @media (max-width: 768px) {
      font-size: 2.2rem;
    }
  }

  .section-subtitle {
    font-family: $font-secondary;
    font-size: 1.2rem;
    color: #6c757d;
    max-width: 600px;
    margin: 0 auto;

    .gpt {
      font-weight: 600;
      color: $secondary-color;
    }
  }

  .chess-grid {
    max-width: 1200px;
    margin: 0 auto;
  }

  .chess-row {
    // box-shadow: 0 8px 30px rgba(0, 0, 0, 0.1);
    border-radius: 0;
    overflow: hidden;
    transition: all 0.4s ease;

    &:hover {
    //   transform: translateY(-5px);
    //   box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
    }

    &.reverse-order {
      @media (min-width: 768px) {
        flex-direction: row-reverse;
      }
    }

    @media (max-width: 767px) {
      margin-bottom: 2rem !important;
    }
  }

  .text-block {
    // background: #ffffff;
    position: relative;
    min-height: 350px;

    .content {
      width: 100%;
    }

    .icon-wrapper {
      width: 60px;
      height: 60px;
      background: linear-gradient(135deg, $secondary-color, darken($secondary-color, 15%));
      border-radius: 2px;
      display: flex;
      align-items: center;
      justify-content: center;
      transition: transform 0.3s ease;

      i {
        font-size: 1.5rem;
        color: #ffffff;
      }
    }

    .block-title {
      font-family: $font-primary;
      font-size: 1.8rem;
      font-weight: 600;
      color: $primary-color;
      line-height: 1.3;

      @media (max-width: 768px) {
        font-size: 1.5rem;
      }
    }

    .block-desc {
      font-family: $font-secondary;
      font-size: 1rem;
      color: #555;
      line-height: 1.7;
    }

    &:hover .icon-wrapper {
    //   transform: scale(1.1) rotate(5deg);

    }

    @media (max-width: 767px) {
      min-height: auto;

      .content {
        padding: 2rem !important;
      }
    }
  }

  .image-block {
    position: relative;
    min-height: 350px;

    .image-wrapper {
      position: relative;
      width: 100%;
      height: 100%;
      overflow: hidden;

      img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.6s ease;
      }

      .image-overlay {
        position: absolute;
        inset: 0;
        background: linear-gradient(
          135deg,
          rgba(21, 63, 131, 0.3) 0%,
          rgba(212, 175, 55, 0.2) 100%
        );
        transition: opacity 0.4s ease;
      }
    }

    &:hover {
      .image-wrapper img {
        transform: scale(1.05);
      }

      .image-overlay {
        opacity: 0.7;
      }
    }

    @media (max-width: 767px) {
      min-height: 250px;
      order: -1;
    }
  }

  // Responsive adjustments
  @media (max-width: 767px) {
    .chess-row {
      .col-md-6 {
        flex: 0 0 100%;
        max-width: 100%;
      }
    }
  }
}
</style>
