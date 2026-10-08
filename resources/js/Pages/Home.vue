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
        <h2 class="text-4xl pb-5 font-bold font-inte">ABOUT ME</h2>
        <div class="flex flex-col md:flex-row items-center justify-center gap-8 max-w-6xl w-full">
          <div class="shrink-0">
            <img :src="'images/photo.jpeg'" alt="" class="w-60 h-80">
          </div>
          <div class="space-y-2 text-gray-400">
            <p class="text-xl text-justify font-inter">I'm an Information Technology fresh graduate with a focus on fullstack and backend development.</p>
            <p class="text-xl text-justify font-inter">While I am just starting my professional career in the industry, I have gained a deep understanding of modern web development workflows through independent research, internship, and the completion of academic projects. I am experienced in designing application architectures using <b>Laravel</b>, managing <b>MySQL</b> databases, and integrating interactive user interfaces built with <b>Vue.js</b></p>
            <p class="text-xl text-justify font-inter">As a recent graduate, I am highly motivated to learn, adaptable to industry standard workflows, and ready to make a meaningful contribution to a development team.</p>
          </div>
        </div>
        <h2 class="text-4xl pt-5 pb-5 font-bold font-inte">TECH STACK</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 max-w-6xl w-full px-6">
          <div
            v-for="stack in techStacks"
            :key="stack.name"
            class="bg-blue-700 rounded-lg shadow-md p-6 hover:shadow-xl transition"
          >
            <div class="flex flex-col items-center space-y-3">
              <img :src="stack.logo" alt="logo" class="w-16 h-16 object-octain">
              <h3 class="text-xl font-bold font-inter text-white">{{ stack.name }}</h3>
              <p class="text-lg text-white text-center">{{ stack.description }}</p>
            </div>
          </div>
        </div>
      </section>
  
      <section class="bg-slate-950 h-screen flex flex-col items-center justify-center space-y-2" id="projects">
        <h2 class="text-4xl font-bold font-inter">PROJECTS</h2>
        <ul class="text-4xl font-bold font-jakarta">
          <li>Portofolio Laravel + Vue 3</li>
          <li>Penelitian CNN cowhide classification</li>
        </ul>
      </section>
  
      <section class="bg-black h-screen flex flex-col items-center justify-center space-y-2" id="contact">
        <h2 class="text-4xl font-bold font-inter">CONTACT</h2>
        <p class="text-4xl font-bold font-jakaarta">Email:hafidz</p>
      </section>
    </section>
  </AppLayout>
</template>

<script setup>
  import { ref } from "vue";
  import AppLayout from '../Layouts/AppLayout.vue';

  const techStacks = ref([
    {
      name: "Laravel",
      description: "Backend framework with PHP-based",
      logo: "/images/laravel.png",
    },
    {
      name: "Vue.js",
      description: "Frontend framework progressive",
      logo: "/images/vue.png",
    },
    {
      name: "MySQL",
      description: "Relational database management system",
      logo: "/images/mysql.png",
    },
  ])
</script>