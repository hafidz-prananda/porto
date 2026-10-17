<template>
  <AppLayout>
    <section class="h-screen bg-slate-950 flex flex-col items-center justify-center space-y-4" id="home">
      <h1 class="text-3xl font-inter">Full Stack Developer</h1>
      <h1 class="text-6xl font-bold font-inter">HAFIDZ KALYANA NUR PRANANDA</h1>
      <a href="#about">
        <button class="px-4 bg-blue-700 hover:bg-blue-800 p-2 rounded-full text-3xl font-bold font-inter">MORE ABOUT ME</button>
      </a>
    </section>
  
    <section class="bg-black h-screen flex flex-col items-center justify-center pt-20 pb-6 px-4 space-y-4" id="about">
      <!-- CONTAINER ABOUT ME -->
      <div class="max-w-6xl w-full text-center">
        <h2 class="text-3xl md:text-4xl font-bold font-inter text-white mb-6">ABOUT ME</h2>
        <!-- PROFILE PHOTO -->
        <div class="flex flex-col md:flex-row items-center justify-center gap-8">
          <div class="shrink-0">
            <img :src="'images/photo.jpeg'" alt="Profile Photo" class="w-52 h-68 md:h-56 md:h-72 object-cover rounded-lg shadow-lg">
          </div>

          <div class="space-y-3 text-gray-300 text-left">
            <p class="text-base md:text-xl text-justify font-inter leading-relaxed">I'm an Information Technology fresh graduate with a focus on fullstack and backend development.</p>
            <p class="text-base md:text-xl text-justify font-inter leading-relaxed">While I am just starting my professional career in the industry, I have gained a deep understanding of modern web development workflows through independent research, internship, and the completion of academic projects. I am experienced in designing application architectures using <b>Laravel</b>, managing <b>MySQL</b> databases, and integrating interactive user interfaces built with <b>Vue.js</b></p>
            <p class="text-base md:text-xl text-justify font-inter leading-relaxed">As a fresh graduate, I am highly motivated to learn, adaptable to industry standard workflows, and ready to make a meaningful contribution to a development team.</p>
          </div>
        </div>
      </div>
      <!-- CONTAINER TECH STACK -->
      <div class="w-full max-w-6xl mx-auto text-center mt-6">
        <h2 class="text-3xl md:text-4xl font-bold font-inter text-white mb-4">TECH STACK</h2>
        <!-- CATEGORY BUTTON -->
        <div class="inline-flex p-1 space-x-1 bg-gray-800 border border-gray-700 rounded-full mb-6">
          <button
            v-for="cat in categories"
            :key="cat"
            @click="selectCategory(cat)"
            class="px-4 py-1.5 rounded-full font-semibold text-base font-inter transition-all duration-300 cursor-pointer"
            :class="activeCategory === cat ? 'bg-blue-600 text-white shadow' : 'bg-transparent text-gray-400 hover:text-white'"
          >
            {{ cat }}
          </button>
        </div>
        <!-- CAROUSEL TECH STACK -->
        <div class="relative flex items-center justify-center gap-4">
          <!-- PREV BUTTON -->
          <button
            v-if="filteredStacks.length > 3"
            @click="prev"
            class="bg-gray-800/80 hover:bg-blue-600 text-white w-10 h-10 rounded-full shadow-lg transition duration-200 flex items-center justify-center shrink-0 cursor-pointer z-10"
          >
            &#10094;
          </button>
          <!-- TRANSITION GROUP CARD -->
          <transition-group
            :name="animationType === 'slide' ? 'carousel-' + direction : 'carousel'"
            tag="div"
            class="flex flex-wrap justify-center gap-4 w-full px-1 min-h-[150px] overflow-hidden"
          >
            <div
              v-for="stack in visibleStacks"
              :key="stack.name + '-' + activeCategory"
              class="w-full sm:w-[calc(50%-8px)] lg:w-[calc(33.333%-11px)] bg-blue-700 border border-blue-600 rounded-lg shadow-md p-4 hover:shadow-xl transition-all duration-300 flex flex-col items-center justify-center"
            >
              <img :src="stack.logo" alt="logo" class="w-12 h-12 object-contain mb-2">
              <h3 class="text-xl font-bold font-inter text-white">{{ stack.name }}</h3>
              <p class="text-base text-blue-100 font-inter text-center line-clamp-2">{{ stack.description }}</p>
            </div>
          </transition-group>
          <!-- NEXT BUTTON -->
          <button
            v-if="filteredStacks.length > 3"
            @click="next"
            class="bg-gray-800/80 hover:bg-blue-600 text-white w-10 h-10 rounded-full shadow-lg transition duration-200 flex items-center justify-center shrink-0 cursor-pointer z-10"
          >
            &#10095;
          </button>
        </div>
      </div>
    </section>
  
    <section class="bg-slate-950 h-screen flex flex-col items-center justify-center space-y-2" id="projects">
      <h2 class="text-3xl md:text-4xl font-bold font-inter mb-6">PROJECTS</h2>
      <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-6xl w-full px-6">
        <div class="bg-gray-800 rounded-lg shadow-md flex flex-col border-2 border-transparent hover:border-blue-600 transition">
          <img :src="'/images/Homepage_EXCIS.jpg'" alt="Portfolio Project" class="w-full h-80 rounded-t-md"/>
          <div class="p-4 space-y-3">
            <h3 class="text-xl font-bold text-white text-inter">Internship Full Stack EXCIS UMY</h3>
            <div class="flex flex-wrap gap-2">
              <span class="bg-black border border-blue-600 text-white px-3 py-1 rounded-lg text-sm font-semibold text-inter">Internship</span>
            </div>
            <p class="text-gray-300 text-base font-inter text-justify leading-relaxed">
              Internship to develop the Extracurricular Credit System (EXCIS) website at the Directorate of Digital Information (DDI) at UMY.
              The focus was specifically on developing the system for administrators at the Directorate of Student Affairs and Careers (DKK).
            </p>
            <div class="flex flex-wrap gap-2 pt-2">
              <span class="bg-blue-600 text-white px-3 py-1 rounded-lg text-sm font-semibold">Azure Data Studio</span>
              <span class="bg-blue-600 text-white px-3 py-1 rounded-lg text-sm font-semibold">CodeIgniter</span>
              <span class="bg-blue-600 text-white px-3 py-1 rounded-lg text-sm font-semibold">Git</span>
              <span class="bg-blue-600 text-white px-3 py-1 rounded-lg text-sm font-semibold">MySQL</span>
            </div>
          </div>
        </div>
        <div class="bg-gray-800 rounded-lg shadow-md flex flex-col border-2 border-transparent hover:border-blue-600 transition">
          <img :src="'/images/Homepage_CNN.png'" alt="Portfolio Project" class="w-full h-80 rounded-t-md"/>
          <div class="p-4 space-y-3">
            <h3 class="text-xl font-bold text-white text-inter">CNN Cowhide Classification Research</h3>
            <div class="flex flex-wrap gap-2">
              <span class="bg-black border border-blue-600 text-white px-3 py-1 rounded-lg text-sm font-semibold text-inter">Final Year Project</span>
            </div>
            <p class="text-gray-300 text-base font-inter text-justify leading-relaxed">
              An academic research study used a Convolutional Neural Network (CNN) to classify the quality of cowhide.
              The EfficientNetB2 model achieved 94.7% accuracy using Grad-CAM visualizations to increase the transparency of classification results.
            </p>
            <div class="flex flex-wrap gap-2 pt-2">
              <span class="bg-blue-600 text-white px-3 py-1 rounded-lg text-sm font-semibold">Python</span>
              <span class="bg-blue-600 text-white px-3 py-1 rounded-lg text-sm font-semibold">TensorFlow</span>
              <span class="bg-blue-600 text-white px-3 py-1 rounded-lg text-sm font-semibold">Laravel</span>
            </div>
          </div>
        </div>
      </div>
    </section>
  
    <section class="bg-black min-h-screen flex flex-col items-center justify-center py-16 px-6" id="contact">
      <h2 class="text-4xl font-bold text-white font-inter mb-8">Get In Touch</h2>
      <div class="bg-gray-800 rounded-xl shadow-lg p-8 w-full max-w-2xl space-y-6">
        <p class="text-gray-300 text-lg text-center leading-relaxed">
          I’m open to discussions, collaborations, and job opportunities. Please feel free to contact me via email or LinkedIn.
        </p>

        <div class="flex flex-col md:flex-row md:justify-center md:space-x-8 space-y-4 md:space-y-0 text-center">
          <a href="mailto:hafidzprananda456@gmail.com" class="flex items-center justify-center gap-2 bg-blue-600 hover:bg-blue-700 text-white px-5 py-3 rounded-lg font-semibold transition">
            <img :src="'/images/gmail.svg'" alt="Gmail Icon" class="w-5 h-5"/>
            Email
          </a>
          <a href="https://linkedin.com/in/hafidzprananda" target="_blank" class="flex items-center justify-center gap-2 bg-blue-600 hover:bg-blue-700 text-white px-5 py-3 rounded-lg font-semibold transition">
            <img :src="'/images/linkedin.svg'" alt="LinkedIn Icon" class="w-5 h-5"/>
            Linkedin
          </a>
          <a href="https://github.com/hafidz-prananda" target="_blank" class="flex items-center justify-center gap-2 bg-blue-600 hover:bg-blue-700 text-white px-5 py-3 rounded-lg font-semibold transition">
            <img :src="'/images/github.svg'" alt="Github Icon" class="w-5 h-5"/>
            Github
          </a>
        </div>
      </div>
    </section>
  </AppLayout>
</template>

<script setup>
  import { computed, ref } from "vue";
  import AppLayout from '../Layouts/AppLayout.vue';

  const activeCategory = ref("Programming Languages");
  const categories = ref(["Programming Languages", "Databases", "Frameworks", "Tools"]);
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
      name: "JavaScript",
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
      category: "Databases",
    },
    {
      name: "CodeIgniter",
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
      name: "TensorFlow",
      description: "Deep learning framework",
      logo: "/images/tensorflow.svg",
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
      description: "SQL editor",
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
      name: "Tailwind CSS",
      description: "Utility CSS",
      logo: "/images/tailwindcss.svg",
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

  const direction = ref('next');
  const animationType = ref('slide');

  const next = () => {
    direction.value = 'next';
    animationType.value = 'slide';
    currentIndex.value = (currentIndex.value + 1) % filteredStacks.value.length;
  };

  const prev = () => {
    direction.value = 'prev';
    animationType.value = 'slide';
    currentIndex.value = (currentIndex.value - 1 + filteredStacks.value.length) %filteredStacks.value.length;
  };

  const selectCategory = (cat) => {
    activeCategory.value = cat;
    animationType.value = 'fade';
    currentIndex.value = 0;
  };
</script>