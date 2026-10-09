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
        <h2 class="text-4xl pt-5 font-bold font-inte">ABOUT ME</h2>
        <div class="flex flex-col md:flex-row items-center justify-center gap-8 max-w-6xl w-full">
          <div class="shrink-0">
            <img :src="'images/photo.jpeg'" alt="" class="w-60 h-80 rounded-lg">
          </div>
          <div class="space-y-2 text-gray-400">
            <p class="text-xl text-justify font-inter">I'm an Information Technology fresh graduate with a focus on fullstack and backend development.</p>
            <p class="text-xl text-justify font-inter">While I am just starting my professional career in the industry, I have gained a deep understanding of modern web development workflows through independent research, internship, and the completion of academic projects. I am experienced in designing application architectures using <b>Laravel</b>, managing <b>MySQL</b> databases, and integrating interactive user interfaces built with <b>Vue.js</b></p>
            <p class="text-xl text-justify font-inter">As a fresh graduate, I am highly motivated to learn, adaptable to industry standard workflows, and ready to make a meaningful contribution to a development team.</p>
          </div>
        </div>
        <h2 class="text-4xl font-bold font-inter">TECH STACK</h2>
        <div class="w-full max-w-6xl mx-auto text-center">
          <div class="inline-flex p-1 space-x-1 bg-gray-700 rounded-full mb-6">
            <button
              v-for="cat in categories"
              :key="cat"
              @click="selectCategory(cat)"
              class="px-4 py-2 rounded-full font-semibold font-inter transition-all duration-200"
              :class="activeCategory === cat ? 'bg-blue-600 text-white shadow' : 'bg-transparent text-gray-400 hover:text-white'"
            >
              {{ cat }}
            </button>
          </div>
          <div class="relative flex items-center justify-center gap-4">
            <button
              v-if="filteredStacks.length > 3"
              @click="prev"
              class="bg-gray-800/80 hover:bg-blue-600 text-white w-10 h-10 rounded-full shadow-lg transition duration-200 flex items-center justify-center shrink-0 cursor-pointer"
            >
              &#10094;
            </button>
            <div class="flex flex-wrap justify-center gap-6 w-full px-1">
              <div
                v-for="stack in visibleStacks"
                :key="stack.name"
                class="w-full sm:w-[calc(50%-12px)] lg:w-[calc(33.333%-16px)] bg-blue-700 rounded-lg shadow-md p-4 hover:shadow-xl transition duration-300"
              >
                <div class="flex flex-col items-center">
                  <img :src="stack.logo" alt="logo" class="w-16 h-16 object-contain">
                  <h3 class="text-xl font-bold font-inter text-white">{{ stack.name }}</h3>
                  <p class="text-lg text-white font-inter text-center">{{ stack.description }}</p>
                </div>
              </div>
            </div>
            <button
              v-if="filteredStacks.length > 3"
              @click="next"
              class="bg-gray-800/80 hover:bg-blue-600 text-white w-10 h-10 rounded-full shadow-lg transition duration-200 flex items-center justify-center shrink-0 cursor-pointer"
            >
              &#10095;
            </button>
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
  import { computed, ref } from "vue";
  import AppLayout from '../Layouts/AppLayout.vue';

  const activeCategory = ref("Programming Languages");
  const categories = ref(["Programming Languages", "Frameworks", "Tools"]);
  const currentIndex = ref(0);

  const techStacks = ref([
    {
      name: "CSS",
      description: "Web styling",
      logo: "/images/css3.svg",
      category: "Programming Languages",
    },
    {
      name: "HTML",
      description: "Web structure",
      logo: "/images/html5.svg",
      category: "Programming Languages",
    },
    {
      name: "Java",
      description: "OOP apps",
      logo: "/images/java.svg",
      category: "Programming Languages",
    },
    {
      name: "Java Script",
      description: "Interactive web",
      logo: "/images/javascript.svg",
      category: "Programming Languages",
    },
    {
      name: "PHP",
      description: "Server web",
      logo: "/images/php.svg",
      category: "Programming Languages",
    },
    {
      name: "Python",
      description: "AI Data",
      logo: "/images/python.svg",
      category: "Programming Languages",
    },
    {
      name: "MySQL",
      description: "Relational DB",
      logo: "/images/mysql.svg",
      category: "Programming Languages",
    },
    {
      name: "Code Igniter",
      description: "PHP backend framework",
      logo: "/images/codeigniter.svg",
      category: "Frameworks",
    },
    {
      name: "Laravel",
      description: "PHP backend framework",
      logo: "/images/laravel.png",
      category: "Frameworks",
    },
    {
      name: "Vue.js",
      description: "Frontend UI",
      logo: "/images/vue.png",
      category: "Frameworks",
    },
    {
      name: "Azure Data Studio",
      description: "DB editor",
      logo: "/images/azure.svg",
      category: "Tools",
    },
    {
      name: "Git",
      description: "Version control",
      logo: "/images/git.svg",
      category: "Tools",
    },
    {
      name: "Visual Studio Code",
      description: "Code editor",
      logo: "/images/vscode.svg",
      category: "Tools",
    },
  ]);
  
  const filteredStacks = computed(() => techStacks.value.filter(stack => stack.category === activeCategory.value));
  const visibleStacks = computed(() => {
    const total = filteredStacks.value.length;
    if (total <= 3) return filteredStacks.value;

    const result = [];
    for (let i = 0; i < 3; i++) {
      const index = (currentIndex.value + i) % total;
      result.push(filteredStacks.value[index]);
    }
    return result;
  });

  const next = () => {
    currentIndex.value = (currentIndex.value + 1) % filteredStacks.value.length;
  };

  const prev = () => {
    currentIndex.value = (currentIndex.value - 1 + filteredStacks.value.length) %filteredStacks.value.length;
  };

  const selectCategory = (cat) => {
    activeCategory.value = cat;
    currentIndex.value = 0;
  };
</script>