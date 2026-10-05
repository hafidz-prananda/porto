<script setup>
import AppLayout from '../Layouts/AppLayout.vue'
import { ref } from 'vue'

const pesan = ref("Vue sudah aktif!")
const klik = () => {
  pesan.value = "Tombol berhasil diklik 🚀"
}
</script>

<template>
  <AppLayout>
    <div>
      <h2>Halo dari Vue 🎉</h2>
      <p>{{ pesan }}</p>
      <button @click="klik">Klik Saya</button>
    </div>
  </AppLayout>
</template>