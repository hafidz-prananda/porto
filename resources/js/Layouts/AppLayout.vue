<template>
  <div class="relative min-h-screen bg-black text-white overflow-hidden">
    <!-- Navbar Kamu -->
    <nav class="fixed top-0 left-0 w-full bg-black/80 backdrop-blur-xs text-white flex items-center justify-between p-4 z-50">
      <a href="#home" class="flex items-center gap-3 group pl-2">
        <img :src="'/images/logo.jpg'" alt="Hafidz Prananda" class="w-10 h-10 rounded-full object-cover border-2 border-transparent group-hover:border-blue-700 trasition duratiion-300">
      </a>

      <div class="flex items-center gap-4">
        <a class="relative text-xl font-bold font-inter after:block after:h-[2px] after:bg-blue-700 after:scale-x-0 hover:after:scale-x-100 after:transition after:duration-300 after:origin-left" href="#about">
          ABOUT
        </a>
        <a class="relative text-xl font-bold font-inter after:block after:h-[2px] after:bg-blue-700 after:scale-x-0 hover:after:scale-x-100 after:transition after:duration-300 after:origin-left" href="#projects">
          PROJECTS
        </a>
        <a class="relative text-xl font-bold font-inter after:block after:h-[2px] after:bg-blue-700 after:scale-x-0 hover:after:scale-x-100 after:transition after:duration-300 after:origin-left pr-4" href="#contact">
          CONTACT
        </a>
      </div>
    </nav>

    <!-- Area Utama Portofolio (Scroll Snap & Scrollbar Bawaan Disembunyikan) -->
    <main 
      ref="scrollContainer" 
      @scroll="updateScroll"
      class="h-screen w-full overflow-y-scroll snap-y snap-mandatory scroll-smooth no-scrollbar"
    >
      <slot />
    </main>

    <!-- Indikator Scrollbar Kustom (Di Atas Navbar, Mentok Layar Atas-Bawah, Tanpa Tombol Panah) -->
    <div class="fixed top-0 right-0 h-screen w-1 bg-black z-[9999] pointer-events-none">
      <div 
        class="w-full bg-blue-700 transition-transform duration-75 ease-out"
        :style="{ 
          height: thumbHeightPx + 'px', 
          transform: `translate3d(0, ${thumbTopPx}px, 0)` 
        }"
      ></div>
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted, onUnmounted } from 'vue';

const scrollContainer = ref(null);
const thumbHeightPx = ref(0);
const thumbTopPx = ref(0);

const updateScroll = () => {
  if (!scrollContainer.value) return;
  
  const { scrollTop, scrollHeight, clientHeight } = scrollContainer.value;
  const totalScrollable = scrollHeight - clientHeight;
  
  const calculatedHeight = (clientHeight / scrollHeight) * clientHeight;
  // Hitung tinggi indikator scrollbar secara proporsional dengan tinggi layar
  thumbHeightPx.value = Math.max(calculatedHeight, 70);

  if (totalScrollable > 0) {
    const progress = scrollTop / totalScrollable;
    const maxTop = clientHeight - thumbHeightPx.value;
    thumbTopPx.value = scrollTop === 0 ? 0 : progress * maxTop;
  } else {
    thumbTopPx.value = 0;
  }
};

onMounted(() => {
  updateScroll();
  window.addEventListener('resize', updateScroll);
});

onUnmounted(() => {
  window.removeEventListener('resize', updateScroll);
});
</script>