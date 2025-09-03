<template>
  <section class="career-section">
    <div class="container">
      <div class="row">
        <!-- Header Section -->
        <div class="col-12 text-center mb-5">
          <h2 class="career-title">Career with Us</h2>
          <p class="career-subtitle">Join our distinguished legal team and build a rewarding career in law</p>
        </div>
      </div>

      <div class="row align-items-center">
        <!-- Left Content -->
        <div class="col-lg-6 mb-4 mb-lg-0">
          <div class="career-content">
            <h3 class="content-title">Shape Your Legal Future</h3>
            <p class="content-description">
              At our firm, we believe in nurturing exceptional legal talent. We offer a collaborative environment
              where ambitious lawyers can grow, learn, and make a meaningful impact on our clients' lives.
            </p>

            <div class="benefits-list">
              <div class="benefit-item" v-for="benefit in benefits" :key="benefit.id">
                <div class="benefit-icon">
                  <i :class="benefit.icon"></i>
                </div>
                <div class="benefit-content">
                  <h5>{{ benefit.title }}</h5>
                  <p>{{ benefit.description }}</p>
                </div>
              </div>
            </div>

            <button class="btn career-btn" @click="viewOpenings">
              View Open Positions
              <i class="fas fa-arrow-right ms-2"></i>
            </button>
          </div>
        </div>

        <!-- Right Content - Statistics & CTA -->
        <div class="col-lg-6">
          <div class="career-stats-card">
            <div class="stats-grid">
              <div class="stat-item" v-for="stat in stats" :key="stat.id">
                <div class="stat-number">{{ stat.number }}</div>
                <div class="stat-label">{{ stat.label }}</div>
              </div>
            </div>

            <div class="cta-section">
              <h4>Ready to Join Us?</h4>
              <p>Send us your resume and cover letter. We're always looking for talented legal professionals.</p>

              <div class="cta-buttons">
                <button class="btn btn-primary me-3" @click="applyNow">
                  Apply Now
                </button>
                <button class="btn btn-outline-primary" @click="learnMore">
                  Learn More
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Bottom Section - Practice Areas -->
      <div class="row mt-5">
        <div class="col-12">
          <div class="practice-areas">
            <h4 class="areas-title">We're Hiring Across Multiple Practice Areas</h4>
            <div class="areas-tags">
              <span
                class="area-tag"
                v-for="area in practiceAreas"
                :key="area"
                @click="filterByArea(area)"
              >
                {{ area }}
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
import { ref } from 'vue'

export default {
  name: 'CareerSection',
  setup() {
    const benefits = ref([
      {
        id: 1,
        icon: 'fas fa-graduation-cap',
        title: 'Continuous Learning',
        description: 'Access to legal training programs and professional development opportunities.'
      },
      {
        id: 2,
        icon: 'fas fa-users',
        title: 'Collaborative Culture',
        description: 'Work alongside experienced attorneys in a supportive team environment.'
      },
      {
        id: 3,
        icon: 'fas fa-balance-scale',
        title: 'Work-Life Balance',
        description: 'Flexible schedules and comprehensive benefits for your well-being.'
      }
    ])

    const stats = ref([
      {
        id: 1,
        number: '25+',
        label: 'Years of Excellence'
      },
      {
        id: 2,
        number: '50+',
        label: 'Legal Professionals'
      },
      {
        id: 3,
        number: '95%',
        label: 'Employee Retention'
      },
      {
        id: 4,
        number: '1000+',
        label: 'Successful Cases'
      }
    ])

    const practiceAreas = ref([
      'Corporate Law',
      'Litigation',
      'Real Estate',
      'Family Law',
      'Criminal Defense',
      'Immigration',
      'Intellectual Property',
      'Employment Law'
    ])

    const viewOpenings = () => {
      // Navigate to careers page or show job listings
      console.log('View open positions')
    }

    const applyNow = () => {
      // Navigate to application form
      console.log('Apply now clicked')
    }

    const learnMore = () => {
      // Show more information about working at the firm
      console.log('Learn more clicked')
    }

    const filterByArea = (area) => {
      // Filter job openings by practice area
      console.log('Filter by area:', area)
    }

    return {
      benefits,
      stats,
      practiceAreas,
      viewOpenings,
      applyNow,
      learnMore,
      filterByArea
    }
  }
}
</script>

<style lang="scss" scoped>
// Variables
$primary-color: #153f83;
$secondary-color: #D4AF37;

.career-section {
  background: linear-gradient(135deg, darken($primary-color, 15%) 0%, $primary-color 50%, darken($primary-color, 10%) 100%);
  padding: 80px 0;
  position: relative;
  overflow: hidden;

  &::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background:
      radial-gradient(circle at 20% 80%, rgba($secondary-color, 0.1) 0%, transparent 50%),
      radial-gradient(circle at 80% 20%, rgba($secondary-color, 0.08) 0%, transparent 50%),
      linear-gradient(135deg, rgba($primary-color, 0.9) 0%, rgba(darken($primary-color, 20%), 0.95) 100%);
    z-index: 1;
  }

  .container {
    position: relative;
    z-index: 2;
  }
}

// Typography
.career-title {
  font-family: 'Playfair Display', serif;
  font-size: 2.5rem;
  font-weight: 400;
  color: $secondary-color;
  margin-bottom: 1rem;
  text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.5);

  @media (max-width: 768px) {
    font-size: 2rem;
  }
}

.career-subtitle {
  font-family: 'Poppins', sans-serif;
  font-size: 1.2rem;
  color: rgba(white, 0.9);
  max-width: 600px;
  margin: 0 auto;
}

.content-title {
  font-family: 'Playfair Display', serif;
  font-size: 2rem;
  color: $secondary-color;
  margin-bottom: 1.5rem;
}

.content-description {
  font-family: 'Poppins', sans-serif;
  font-size: 1.1rem;
  color: rgba(white, 0.85);
  line-height: 1.6;
  margin-bottom: 2rem;
}

// Benefits Section
.benefits-list {
  margin-bottom: 2.5rem;
}

.benefit-item {
  display: flex;
  align-items: flex-start;
  margin-bottom: 1.5rem;
  padding: 1.5rem;
  background: rgba(white, 0.08);
  border-radius: 15px;
  backdrop-filter: blur(15px);
  border: 1px solid rgba($secondary-color, 0.2);
  transition: all 0.3s ease;

  &:hover {
    transform: translateY(-3px);
    background: rgba(white, 0.12);
    border-color: rgba($secondary-color, 0.4);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.3);
  }
}

.benefit-icon {
  width: 50px;
  height: 50px;
  background: linear-gradient(135deg, $secondary-color 0%, lighten($secondary-color, 10%) 100%);
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  margin-right: 1rem;
  flex-shrink: 0;
  box-shadow: 0 4px 15px rgba($secondary-color, 0.3);

  i {
    color: $primary-color;
    font-size: 1.2rem;
    font-weight: 600;
  }
}

.benefit-content {
  h5 {
    font-family: 'Poppins', sans-serif;
    font-weight: 600;
    color: $secondary-color;
    margin-bottom: 0.5rem;
    font-size: 1.1rem;
  }

  p {
    font-family: 'Poppins', sans-serif;
    color: rgba(white, 0.8);
    margin: 0;
    font-size: 0.95rem;
    line-height: 1.5;
  }
}

// Career Button
.career-btn {
  background: linear-gradient(135deg, $secondary-color 0%, lighten($secondary-color, 10%) 100%);
  color: $primary-color;
  font-family: 'Poppins', sans-serif;
  font-weight: 700;
  padding: 14px 35px;
  border: none;
  border-radius: 50px;
  font-size: 1rem;
  text-transform: uppercase;
  letter-spacing: 0.8px;
  transition: all 0.3s ease;
  box-shadow: 0 6px 20px rgba($secondary-color, 0.4);
  position: relative;
  overflow: hidden;

  &::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(white, 0.3), transparent);
    transition: left 0.5s;
  }

  &:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 25px rgba($secondary-color, 0.5);
    color: $primary-color;

    &::before {
      left: 100%;
    }
  }
}

// Stats Card
.career-stats-card {
  background: rgba(white, 0.05);
  backdrop-filter: blur(20px);
  border-radius: 25px;
  padding: 3rem;
  box-shadow:
    0 8px 32px rgba(0, 0, 0, 0.3),
    inset 0 1px 0 rgba(white, 0.1);
  border: 1px solid rgba($secondary-color, 0.15);
  position: relative;

  &::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(135deg, rgba($secondary-color, 0.05) 0%, transparent 50%);
    border-radius: 25px;
    pointer-events: none;
  }
}

.stats-grid {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: 1.5rem;
  margin-bottom: 2.5rem;
  position: relative;
  z-index: 1;
}

.stat-item {
  text-align: center;
  padding: 1.5rem;
  background: rgba(white, 0.05);
  border-radius: 20px;
  transition: all 0.3s ease;
  border: 1px solid rgba($secondary-color, 0.1);

  &:hover {
    transform: scale(1.05);
    background: rgba(white, 0.08);
    border-color: rgba($secondary-color, 0.3);
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.2);
  }
}

.stat-number {
  font-family: 'Playfair Display', serif;
  font-size: 2.2rem;
  font-weight: 700;
  color: $secondary-color;
  margin-bottom: 0.5rem;
  text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
}

.stat-label {
  font-family: 'Poppins', sans-serif;
  color: rgba(white, 0.8);
  font-size: 0.9rem;
  font-weight: 500;
}

// CTA Section
.cta-section {
  text-align: center;
  position: relative;
  z-index: 1;

  h4 {
    font-family: 'Playfair Display', serif;
    color: $secondary-color;
    font-size: 1.5rem;
    margin-bottom: 1rem;
  }

  p {
    font-family: 'Poppins', sans-serif;
    color: rgba(white, 0.8);
    margin-bottom: 1.5rem;
    line-height: 1.5;
  }
}

.cta-buttons {
  display: flex;
  justify-content: center;
  gap: 1rem;
  flex-wrap: wrap;

  .btn-primary {
    background: linear-gradient(135deg, $secondary-color 0%, lighten($secondary-color, 10%) 100%);
    border: none;
    color: $primary-color;
    font-family: 'Poppins', sans-serif;
    font-weight: 700;
    padding: 12px 28px;
    border-radius: 30px;
    box-shadow: 0 4px 15px rgba($secondary-color, 0.4);
    transition: all 0.3s ease;

    &:hover {
      transform: translateY(-2px);
      box-shadow: 0 6px 20px rgba($secondary-color, 0.5);
      color: $primary-color;
    }
  }

  .btn-outline-primary {
    border: 2px solid $secondary-color;
    color: $secondary-color;
    font-family: 'Poppins', sans-serif;
    font-weight: 600;
    padding: 10px 26px;
    border-radius: 30px;
    background: transparent;
    transition: all 0.3s ease;

    &:hover {
      background: $secondary-color;
      border-color: $secondary-color;
      color: $primary-color;
      transform: translateY(-2px);
      box-shadow: 0 4px 15px rgba($secondary-color, 0.3);
    }
  }
}

// Practice Areas
.practice-areas {
  text-align: center;
  padding: 2rem 0;
}

.areas-title {
  font-family: 'Playfair Display', serif;
  color: $secondary-color;
  font-size: 1.5rem;
  margin-bottom: 1.5rem;
}

.areas-tags {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  gap: 0.75rem;
}

.area-tag {
  display: inline-block;
  background: rgba(white, 0.08);
  color: rgba(white, 0.9);
  padding: 10px 22px;
  border-radius: 30px;
  font-family: 'Poppins', sans-serif;
  font-size: 0.9rem;
  font-weight: 500;
  cursor: pointer;
  transition: all 0.3s ease;
  border: 1px solid rgba($secondary-color, 0.2);
  backdrop-filter: blur(10px);

  &:hover {
    background: linear-gradient(135deg, $secondary-color 0%, lighten($secondary-color, 10%) 100%);
    color: $primary-color;
    transform: translateY(-2px);
    box-shadow: 0 4px 15px rgba($secondary-color, 0.3);
    border-color: $secondary-color;
  }
}

// Responsive Design
@media (max-width: 768px) {
  .career-section {
    padding: 60px 0;
  }

  .stats-grid {
    grid-template-columns: 1fr;
    gap: 1rem;
  }

  .cta-buttons {
    flex-direction: column;
    align-items: center;

    .btn {
      width: 200px;
    }
  }

  .benefit-item {
    flex-direction: column;
    text-align: center;

    .benefit-icon {
      margin: 0 auto 1rem auto;
    }
  }

  .content-title {
    font-size: 1.5rem;
  }

  .areas-tags {
    gap: 0.5rem;
  }

  .area-tag {
    font-size: 0.8rem;
    padding: 6px 15px;
  }
}
</style>
