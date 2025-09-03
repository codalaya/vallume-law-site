<template>
  <div class="image-fader">
    <div
      v-for="(img, index) in images"
      :key="index"
      class="fade-image"
      :class="{ active: index === currentIndex }"
      :style="{ backgroundImage: `url(${img})` }"
    ></div>
  </div>

  <button @click="nextImage">Next</button>
</template>

<script setup>
import { ref } from "vue";

const images =   ref( [
    "/images/about-bg.png",
    "/images/aboutbg2.jpg",
    "/images/aboutbg3.jpg",
    "/images/aibg4.png",

]);

const currentIndex = ref(0);

function nextImage() {
  currentIndex.value = (currentIndex.value + 1) % images.value.length;
}
</script>

<style scoped>
.image-fader {
  position: relative;
  width: 600px;
  height: 400px;
  overflow: hidden;
}

.fade-image {
  position: absolute;
  inset: 0;
  background-size: cover;
  background-position: center;
  opacity: 0;
  transition: opacity 0.8s ease-in-out;
  z-index: 0;
}

.fade-image.active {
  opacity: 1;
  z-index: 1;
}
</style>
