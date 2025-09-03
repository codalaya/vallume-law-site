<template>
  <div class="circle-wrapper d-flex align-items-center justify-content-center">
    <div class="circle">
      <!-- Middle Icon -->
      <div class="circle-center d-flex align-items-center justify-content-center">
        <i class="bi bi-droplet"></i>
      </div>
      <!-- Rotating Text -->
      <div class="circle-text">
        <span v-for="n in 8" :key="n">* Contact Us </span>
      </div>
    </div>
  </div>
</template>


<script setup>
import { onMounted } from "vue";

onMounted(() => {
  // Rotation animation
  const circle = document.querySelector(".circle-text");
  if (circle) {
    circle.animate(
      [{ transform: "rotate(0deg)" }, { transform: "rotate(360deg)" }],
      {
        duration: 8000,
        iterations: Infinity,
        easing: "linear",
      }
    );
  }
});
</script>

<style lang="scss" scoped>
$primary-color: #153f83;
$secondary-color: #d4af37;

.circle-wrapper {
  position: relative;
  width: 200px;
  height: 200px;

  .circle {
    position: relative;
    width: 100%;
    height: 100%;
    border-radius: 50%;
    background: linear-gradient(135deg, $primary-color, $secondary-color);
    display: flex;
    align-items: center;
    justify-content: center;

    .circle-center {
      position: absolute;
      width: 90px;
      height: 90px;
      border-radius: 50%;
      background: #fff;
      z-index: 2;
      font-size: 2rem;
      color: $primary-color;
    }

    .circle-text {
      position: absolute;
      width: 100%;
      height: 100%;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      font-family: "Poppins", sans-serif;
      font-size: 14px;
      color: #fff;
      text-transform: uppercase;

      span {
        position: absolute;
        transform-origin: 0 100px;
      }

      @for $i from 1 through 8 {
        span:nth-child(#{$i}) {
          transform: rotate(#{($i - 1) * 45}deg) translateY(-85px);
        }
      }
    }
  }
}

</style>
