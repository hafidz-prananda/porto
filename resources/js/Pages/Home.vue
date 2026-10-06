<template>
  <AppLayout>
    <section class="bg-black text-white">
      <section class="h-screen flex flex-col items-center justify-center space-y-2" id="home">
        <h1 class="text-4xl font-bold font-inter">Halo, saya Hafidz</h1>
        <h1 class="text-4xl font-bold font-jakarta">Web Developer</h1>
      </section>
  
      <section class="h-screen flex flex-col items-center justify-center space-y-2" id="about">
        <h2 class="text-4xl font-bold font-inter">Tentang Saya</h2>
        <p class="text-4xl font-bold font-jakarta">Saya fokus pada Laravel backend dan MySQL untuk database.</p>
      </section>
  
      <section class="h-screen flex flex-col items-center justify-center space-y-2" id="projects">
        <h2 class="text-4xl font-bold font-inter">Projects</h2>
        <ul class="text-4xl font-bold font-jakarta">
          <li>Portofolio Laravel + Vue 3</li>
          <li>Penelitian CNN cowhide classification</li>
        </ul>
      </section>
  
      <section class="h-screen flex flex-col items-center justify-center space-y-2" id="contact">
        <h2 class="text-4xl font-bold font-inter">Kontak</h2>
        <p class="text-4xl font-bold font-jakaarta">Email:hafidz</p>
      </section>
    </section>
  </AppLayout>
</template>

<script setup>
import AppLayout from '../Layouts/AppLayout.vue';
</script>