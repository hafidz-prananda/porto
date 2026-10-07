<template>
  <AppLayout>
    <section class="text-white">
      <section class="h-screen bg-slate-950 flex flex-col items-center justify-center space-y-4" id="home">
        <h1 class="text-3xl font-inter">Full Stack Developer</h1>
        <h1 class="text-6xl font-bold font-inter">HAFIDZ KALYANA NUR PRANANDA</h1>
        <a href="#about">
          <button class="px-4 bg-blue-700 hover:bg-blue-800 p-2 rounded-full text-3xl font-bold font-inter">MORE ABOUT ME</button>
        </a>
      </section>
  
      <section class="bg-black h-screen flex flex-col items-center justify-center space-y-2" id="about">
        <h2 class="text-4xl font-bold font-inter">Tentang Saya</h2>
        <p class="text-4xl font-bold font-jakarta">Saya fokus pada Laravel backend dan MySQL untuk database.</p>
      </section>
  
      <section class="bg-slate-950 h-screen flex flex-col items-center justify-center space-y-2" id="projects">
        <h2 class="text-4xl font-bold font-inter">Projects</h2>
        <ul class="text-4xl font-bold font-jakarta">
          <li>Portofolio Laravel + Vue 3</li>
          <li>Penelitian CNN cowhide classification</li>
        </ul>
      </section>
  
      <section class="bg-black h-screen flex flex-col items-center justify-center space-y-2" id="contact">
        <h2 class="text-4xl font-bold font-inter">Kontak</h2>
        <p class="text-4xl font-bold font-jakaarta">Email:hafidz</p>
      </section>
    </section>
  </AppLayout>
</template>

<script setup>
import AppLayout from '../Layouts/AppLayout.vue';
</script>