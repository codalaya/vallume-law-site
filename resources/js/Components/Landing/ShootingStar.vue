<template>
  <div class="shooting-stars">
    <canvas ref="gridCanvas"></canvas>
  </div>
</template>

<script setup>
import { onMounted, onBeforeUnmount, ref } from "vue";

const gridCanvas = ref(null);

onMounted(() => {
  const canvas = gridCanvas.value;
  const ctx = canvas.getContext("2d");

  const resize = () => {
    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;
  };
  resize();
  window.addEventListener("resize", resize);

  const gridSize = 10;
  const particles = [];

  class Particle {
    constructor(x, y, direction) {
      this.x = x;
      this.y = y;
      this.direction = direction; // 'h' or 'v'
      this.speed = 4;
      this.length = 100; // tail length
      this.life = 0;
    }

    update() {
      if (this.direction === "h") {
        this.x += this.speed;
      } else {
        this.y += this.speed;
      }
      this.life++;
    }

    draw() {
      ctx.beginPath();
      const grad = ctx.createLinearGradient(
        this.x,
        this.y,
        this.direction === "h" ? this.x - this.length : this.x,
        this.direction === "v" ? this.y - this.length : this.y
      );
      grad.addColorStop(0, "rgba(0,150,255,0.9)"); // bright tip
      grad.addColorStop(1, "rgba(0,150,255,0)"); // fading tail
      ctx.strokeStyle = grad;
      ctx.lineWidth = 3;
      ctx.moveTo(this.x, this.y);
      if (this.direction === "h") {
        ctx.lineTo(this.x - this.length, this.y);
      } else {
        ctx.lineTo(this.x, this.y - this.length);
      }
      ctx.stroke();
    }

    isDead() {
      return this.x > (canvas.width + 100) || this.y > (canvas.height + 100);
    }
  }

  function animate() {
    ctx.clearRect(0, 0, canvas.width, canvas.height);
    ctx.fillStyle = "transparent";
    ctx.fillRect(0, 0, canvas.width, canvas.height);

    // add new particles randomly
    if (Math.random() < 0.15) {
      const direction = Math.random() > 0.5 ? "h" : "v";
      if (direction === "h") {
        particles.push(
          new Particle(
            0,
            Math.floor(Math.random() * (canvas.height / gridSize)) * gridSize,
            "h"
          )
        );
      } else {
        particles.push(
          new Particle(
            Math.floor(Math.random() * (canvas.width / gridSize)) * gridSize,
            0,
            "v"
          )
        );
      }
    }

    // update + draw
    for (let i = particles.length - 1; i >= 0; i--) {
      const p = particles[i];
      p.update();
      p.draw();
      if (p.isDead()) {
        particles.splice(i, 1);
      }
    }

    requestAnimationFrame(animate);
  }

  animate();

  onBeforeUnmount(() => {
    window.removeEventListener("resize", resize);
  });
});
</script>

<style scoped>
.shooting-stars {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  overflow: hidden;
  background: #f9f9f9; /* light background */
}
canvas {
  display: block;
  width: 100%;
  height: 100%;
}
</style>
