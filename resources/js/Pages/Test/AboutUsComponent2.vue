<script setup>
</script>
<template>
    <!-- About Us Section (Overlapping) -->
        <div class="container mb-5">
            <section class="about-section" data-aos="fade-up" data-aos-duration="800" data-aos-delay="300">
                <div class="">
                    <div class="row g-0">
                        <div class="col-md-6 col-12">
                            <div class="about-image" data-aos="fade-right" data-aos-delay="400">
                                <img src="https://images.pexels.com/photos/5668772/pexels-photo-5668772.jpeg?auto=compress&cs=tinysrgb&w=800&h=600&dpr=2"
                                    alt="About Vellume Law Firm" class="img-fluid about-us-image" />
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="about-content" data-aos="fade-left" data-aos-delay="500">
                                <div class="section-header">
                                    <h2 class="section-title">About Vellume</h2>
                                    <div class="section-divider"></div>
                                </div>
                                <p class="about-text">
                                    Far far away, behind the word mountains, far from the countries Vokalia and
                                    Consonantia,
                                    there live the blind texts. Separated they live in Bookmarksgrove right at the coast
                                    of the
                                    Semantics, a large language ocean. A small river named Duden flows.
                                </p>
                                <div class="founder-signature">
                                    <h3 class="founder-name">Paul Smith</h3>
                                    <p class="founder-title">CEO & Founder of Vellume</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
</template>
<style lang="scss" scoped>

// About Us Section
.about-section {
    position: relative;
    background: white;
    // margin-top: -50px;
    z-index: 10;
    box-shadow: 0 -10px 30px rgba(0, 0, 0, 0.1);

    @media (max-width: 992px) {
        // margin-top: -180px;
    }

    @media (max-width: 768px) {
        // margin-top: -150px;
        border-radius: 15px 15px 0 0;
    }

    @media (max-width: 576px) {
        // margin-top: -120px;
        border-radius: 10px 10px 0 0;
    }
}

.about-image {
    position: relative;
    height: 100%;

    img {
        transition: transform 0.3s ease;
        object-fit: cover;
        height: 100%;

        &::hover {
            transform: scale(1.1);
            scale: 1.1;
        }
    }

    @media (max-width: 768px) {
        display: none;
    }
}

.about-content {
    padding: 3rem;
    border-radius: 0;

    @media (max-width: 992px) {
        padding: 1rem;
    }

    @media (max-width: 768px) {
        text-align: center;
    }
}



.section-header {
    margin-bottom: 2rem;
}

.section-title {
    font-family: 'Playfair Display', serif;
    font-size: 2.5rem;
    font-weight: 700;
    color: var(--primary-color);
    margin-bottom: 1rem;
    line-height: 1.2;

    @media (max-width: 768px) {
        font-size: 2rem;
    }

    @media (max-width: 576px) {
        font-size: 1.8rem;
    }
}

.section-divider {
    width: 60px;
    height: 3px;
    background: var(--accent-color);
    margin-bottom: 1.5rem;

    @media (max-width: 768px) {
        margin: 0 auto 1.5rem;
    }
}

.about-text {
    font-size: 1.1rem;
    line-height: 1.8;
    color: var(--text-gray);
    margin-bottom: 2.5rem;
    font-weight: 400;

    @media (max-width: 768px) {
        font-size: 1rem;
        margin-bottom: 2rem;
    }
}

.founder-signature {
    .founder-name {
        font-family: 'Playfair Display', serif;
        font-size: 2rem;
        color: var(--primary-color);
        margin-bottom: 0.5rem;
        font-weight: 600;
        font-style: italic;

        @media (max-width: 768px) {
            font-size: 1.8rem;
        }
    }

    .founder-title {
        color: var(--text-gray);
        font-size: 0.95rem;
        font-weight: 500;
        text-transform: uppercase;
        letter-spacing: 1px;
        margin: 0;

        @media (max-width: 768px) {
            font-size: 0.9rem;
        }
    }
}

</style>
