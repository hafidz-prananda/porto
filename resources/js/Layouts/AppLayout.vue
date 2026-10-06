<template>
  <div class="bg-gray-500">
    <nav class="fixed top-0 right-0 text-white space-x-4 pt-4">
      <a class="text-xl font-bold font-inter" href="#home">Home</a>
      <a class="text-xl font-bold font-inter" href="#about">About</a>
      <a class="text-xl font-bold font-inter" href="#projects">Projects</a>
      <a class="text-xl font-bold font-inter pr-4" href="#contact">Contact</a>
    </nav>

    <main>
      <slot />
    </main>
  </div>
</template>
