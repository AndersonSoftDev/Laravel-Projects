<template>
  <div id="main-wrapper">
    <!-- Preloader -->
    <div id="preloader" v-show="loading">
      <div class="sk-three-bounce">
        <div class="sk-child sk-bounce1"></div>
        <div class="sk-child sk-bounce2"></div>
        <div class="sk-child sk-bounce3"></div>
      </div>
    </div>

    <!-- Sidebar Component -->
    <Sidebar />

    <!-- Header Component -->
    <Header />

    <!-- Main Content Area -->
    <router-view />
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import Sidebar from './Sidebar.vue'
import Header from './Header.vue'

const loading = ref(true)

onMounted(() => {
  // Simulate preloader
  setTimeout(() => {
    loading.value = false
  }, 500)
})
</script>

<style scoped>
#main-wrapper {
  min-height: 100vh;
  position: relative;
}

/* Preloader */
#preloader {
  position: fixed;
  width: 100%;
  height: 100%;
  top: 0;
  left: 0;
  z-index: 9999;
  background: var(--bg-main);
  display: flex;
  align-items: center;
  justify-content: center;
}

.sk-three-bounce {
  display: flex;
  gap: 0.5rem;
}

.sk-child {
  width: 12px;
  height: 12px;
  border-radius: 50%;
  background: var(--primary);
  animation: sk-bouncedelay 1.4s infinite ease-in-out both;
}

.sk-bounce1 {
  animation-delay: -0.32s;
}

.sk-bounce2 {
  animation-delay: -0.16s;
}

@keyframes sk-bouncedelay {
  0%, 80%, 100% {
    transform: scale(0);
  }
  40% {
    transform: scale(1);
  }
}

/* Menu Toggle State */
.menu-toggle :deep(.deznav) {
  width: 5rem;
}

.menu-toggle :deep(.content-body),
.menu-toggle :deep(.header) {
  margin-left: 5rem;
}

.menu-toggle :deep(.nav-header) {
  width: 5rem;
}

.menu-toggle :deep(.brand-logo-full) {
  display: none;
}

.menu-toggle :deep(.brand-logo-mark) {
  display: block;
}

.menu-toggle :deep(.nav-copy),
.menu-toggle :deep(.sidebar-intro),
.menu-toggle :deep(.nav-section-label) {
  display: none;
}
</style>