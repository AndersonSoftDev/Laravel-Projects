<template>
  <router-view />
</template>

<script setup>
// Main App component - routing is handled by vue-router
</script>

<style>
@import url('https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&family=Sora:wght@500;600;700;800&display=swap');

/* CSS Variables */
:root {
  --sidebar-width: 15.75rem;
  --nav-header-height: 4.9rem;
  --font-ui: "Manrope", sans-serif;
  --font-display: "Sora", sans-serif;
  --primary-rgb: 23, 63, 122;
  --primary: #173F7A;
  --primary-strong: #0F2E59;
  --primary-soft: rgba(var(--primary-rgb), 0.12);
  --secondary-rgb: 44, 155, 212;
  --secondary: #2C9BD4;
  --secondary-soft: rgba(var(--secondary-rgb), 0.12);
  --highlight-rgb: 63, 127, 162;
  --highlight: #3F7FA2;
  --highlight-strong: #1B5C90;
  --highlight-soft: rgba(var(--highlight-rgb), 0.14);
  --bg-main: #F4F8FC;
  --bg-alt: #E8F0F8;
  --surface: rgba(255, 255, 255, 0.92);
  --surface-strong: rgba(255, 255, 255, 0.98);
  --text-main: #20354F;
  --text-muted: #5E6673;
  --border-soft: rgba(var(--primary-rgb), 0.12);
  --success-rgb: 27, 92, 144;
  --success: #1B5C90;
  --success-soft: rgba(var(--success-rgb), 0.14);
  --warning-rgb: 63, 127, 162;
  --warning: #3F7FA2;
  --warning-soft: rgba(var(--warning-rgb), 0.14);
  --error-rgb: 198, 98, 85;
  --error: #C66255;
  --error-soft: rgba(var(--error-rgb), 0.14);
  --info-rgb: 44, 155, 212;
  --info: #2C9BD4;
  --info-soft: rgba(var(--info-rgb), 0.14);
  --accent: var(--secondary);
  --accent-strong: var(--primary);
  --accent-soft: var(--secondary-soft);
  --sidebar-bg: linear-gradient(180deg, #FFFFFF 0%, #EEF4FB 100%);
  --sidebar-border: rgba(var(--primary-rgb), 0.1);
  --shadow-soft: 0 20px 40px rgba(23, 63, 122, 0.1);
}

* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body {
  font-family: var(--font-ui);
  background:
    radial-gradient(circle at top left, rgba(var(--highlight-rgb), 0.2), transparent 22%),
    radial-gradient(circle at top right, rgba(var(--primary-rgb), 0.1), transparent 24%),
    linear-gradient(180deg, var(--bg-main) 0%, var(--bg-alt) 100%);
  color: var(--text-main);
  min-height: 100vh;
}

h1, h2, h3, h4, h5, h6 {
  font-family: var(--font-display);
}

#app {
  min-height: 100vh;
}

/* Global scrollbar styling */
::-webkit-scrollbar {
  width: 6px;
  height: 6px;
}

::-webkit-scrollbar-track {
  background: rgba(var(--primary-rgb), 0.05);
}

::-webkit-scrollbar-thumb {
  background: rgba(var(--primary-rgb), 0.2);
  border-radius: 3px;
}

::-webkit-scrollbar-thumb:hover {
  background: rgba(var(--primary-rgb), 0.3);
}

/* Utility Classes */
.text-primary { color: var(--primary) !important; }
.text-success { color: var(--success) !important; }
.text-danger { color: var(--error) !important; }
.text-white { color: #fff !important; }
.text-center { text-align: center !important; }

.bg-white { background-color: #fff !important; }

.d-none { display: none !important; }
.d-flex { display: flex !important; }
.d-block { display: block !important; }

.align-items-center { align-items: center !important; }
.justify-content-between { justify-content: space-between !important; }
.justify-content-center { justify-content: center !important; }

.mb-3 { margin-bottom: 1rem !important; }
.mb-4 { margin-bottom: 1.5rem !important; }
.mt-4 { margin-top: 1rem !important; }
.mt-5 { margin-top: 2rem !important; }

/* Router View Transitions */
.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.3s ease;
}

.fade-enter-from,
.fade-leave-to {
  opacity: 0;
}
</style>