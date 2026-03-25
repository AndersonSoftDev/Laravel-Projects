<template>
    <div class="nav-header">
        <a href="/" class="brand-logo">
            <img class="brand-logo-full" :src="logoFull" alt="Parking-son">
        </a>

        <!-- Hamburger: clicking it flips isCollapsed true/false -->
        <div class="nav-control" @click="isCollapsed = !isCollapsed">
            <div class="hamburger">
                <span class="line"></span>
                <span class="line"></span>
                <span class="line"></span>
            </div>
        </div>
    </div>

    <!-- :class binds CSS classes to data -->
    <div class="deznav" :class="{ 'is-collapsed': isCollapsed }">
        <div class="deznav-scroll">

            <div class="sidebar-intro">
                <div class="sidebar-intro-top">
                    <span class="sidebar-intro-icon"><i class="fa fa-th-large"></i></span>
                    <div class="sidebar-intro-copy">
                        <span class="sidebar-eyebrow">Navegação</span>
                        <h5>Menu principal</h5>
                        <p class="sidebar-intro-text">Secções organizadas para expansão do sistema.</p>
                    </div>
                </div>
            </div>

            <ul class="metismenu">
                <!-- Loop over each section -->
                <template v-for="section in navSections" :key="section.id">

                    <!-- Section header -->
                    <li class="nav-label nav-section-label">
                        <button class="nav-section-toggle" type="button" @click="toggleSection(section.id)"
                            :aria-expanded="openSections.includes(section.id)">
                            <span>{{ section.label }}</span>
                            <i class="fa fa-angle-down nav-section-chevron"></i>
                        </button>
                    </li>

                    <!-- Section items — v-show hides them when section is collapsed -->
                    <li v-for="item in section.items" :key="item.route" v-show="openSections.includes(section.id)"
                        class="nav-section-item" :class="{ 'mm-active': currentRoute === item.route }">
                        <RouterLink class="ai-icon" :to="item.route">
                            <i :class="'fa ' + item.icon"></i>
                            <span class="nav-copy">
                                <span class="nav-text">{{ item.label }}</span>
                                <small class="nav-subtext">{{ item.subtext }}</small>
                            </span>
                            <span class="nav-indicator"></span>
                        </RouterLink>
                    </li>

                </template>
            </ul>

        </div>
    </div>
</template>

<script setup>
import { ref, computed } from 'vue'
import { useRoute } from 'vue-router'

import logoFull from '@/assets/images/parking-son-logo.svg'  // ← add this
import logoMark from '@/assets/images/parking-son-mark.svg'

// --- Reactive state ---
const isCollapsed = ref(false)
const openSections = ref(['painel', 'operacoes', 'gestao', 'relatorios'])

// useRoute() gives us the current URL — Vue updates it automatically
const route = useRoute()
const currentRoute = computed(() => route.path)

// --- Nav data (replaces your repeated <li> HTML) ---
const navSections = [
    {
        id: 'painel',
        label: 'Painel',
        items: [
            { route: '/', icon: 'fa-th-large', label: 'Dashboard', subtext: 'Visão geral' }
        ]
    },
    {
        id: 'operacoes',
        label: 'Operações',
        items: [
            { route: '/entradas', icon: 'fa-sign-in', label: 'Entradas', subtext: 'Registo e triagem' },
            { route: '/saidas', icon: 'fa-sign-out', label: 'Saídas', subtext: 'Fecho e cobrança' },
            { route: '/vagas', icon: 'fa-car', label: 'Vagas', subtext: 'Mapa e zonas' }
        ]
    },
    {
        id: 'gestao',
        label: 'Gestão',
        items: [
            { route: '/clientes', icon: 'fa-users', label: 'Clientes', subtext: 'Planos e contas' },
            { route: null, icon: 'fa-user-o', label: 'Utilizadores', subtext: 'Perfis e equipas' }
        ]
    },
    {
        id: 'relatorios',
        label: 'Relatórios',
        items: [
            { route: null, icon: 'fa-bar-chart', label: 'Relatórios', subtext: 'Receita e tendência' }
        ]
    }
]

// --- Toggle a section open/closed ---
function toggleSection(sectionId) {
    if (openSections.value.includes(sectionId)) {
        openSections.value = openSections.value.filter(id => id !== sectionId)
    } else {
        openSections.value.push(sectionId)
    }
}
</script>


<style scoped>
/* Nav Header */
.nav-header {
  position: fixed;
  top: 0;
  left: 0;
  height: var(--nav-header-height);
  width: var(--sidebar-width);
  background: var(--sidebar-bg);
  border-right: 1px solid var(--sidebar-border);
  border-top-right-radius: 28px;
  z-index: 6;
}

.brand-logo {
  display: flex;
  align-items: center;
  gap: 0.75rem;
  height: 100%;
  padding: 0 3.75rem 0 0.95rem;
  text-decoration: none;
}

.brand-logo-full {
  display: block;
  width: auto;
  max-width: min(100%, 9.15rem);
  max-height: 3.2rem;
}

.brand-logo-mark {
  display: none;
  width: 2.55rem;
  flex-shrink: 0;
}

.nav-control {
  position: absolute;
  top: 50%;
  right: 0.85rem;
  transform: translateY(-50%);
  display: inline-flex;
  align-items: center;
  justify-content: center;
  width: 2.2rem;
  height: 2.2rem;
  border-radius: 14px;
  background: rgba(255, 255, 255, 0.75);
  border: 1px solid rgba(var(--primary-rgb), 0.08);
  cursor: pointer;
}

.hamburger {
  display: flex;
  flex-direction: column;
  gap: 4px;
  padding: 0.5rem;
}

.hamburger .line {
  width: 16px;
  height: 2px;
  background: var(--accent);
  border-radius: 2px;
  transition: all 0.3s ease;
}

.hamburger.is-active .line:nth-child(1) {
  transform: rotate(45deg) translate(4px, 4px);
}

.hamburger.is-active .line:nth-child(2) {
  opacity: 0;
}

.hamburger.is-active .line:nth-child(3) {
  transform: rotate(-45deg) translate(4px, -4px);
}

/* Deznav */
.deznav {
  position: fixed;
  top: var(--nav-header-height);
  left: 0;
  width: var(--sidebar-width);
  height: calc(100vh - var(--nav-header-height));
  background: var(--sidebar-bg);
  border-right: 1px solid var(--sidebar-border);
  z-index: 5;
  overflow-y: auto;
  transition: width 0.3s ease;
}

.deznav.is-collapsed {
  width: 5rem;
}

.deznav.is-collapsed .sidebar-intro,
.deznav.is-collapsed .nav-section-label,
.deznav.is-collapsed .nav-copy {
  display: none;
}

.deznav.is-collapsed .brand-logo-full {
  display: none;
}

.deznav.is-collapsed .brand-logo-mark {
  display: block;
}

.deznav-scroll {
  padding: 1.25rem 0.75rem;
}

.sidebar-intro {
  margin-bottom: 1rem;
}

.sidebar-intro-top {
  display: flex;
  align-items: flex-start;
  gap: 0.75rem;
  padding: 0.5rem;
}

.sidebar-intro-icon {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  width: 2.2rem;
  height: 2.2rem;
  border-radius: 12px;
  background: linear-gradient(135deg, var(--primary) 0%, #1B5C90 100%);
  color: #fff;
}

.sidebar-eyebrow {
  font-size: 0.62rem;
  font-weight: 700;
  letter-spacing: 0.12em;
  text-transform: uppercase;
  color: var(--text-muted);
}

.sidebar-intro h5 {
  margin: 0.1rem 0;
  font-size: 0.98rem;
  font-weight: 700;
  color: var(--text-main);
}

.sidebar-intro-text {
  font-size: 0.75rem;
  color: var(--text-muted);
  margin: 0;
}

/* Metismenu */
.metismenu {
  list-style: none;
  padding: 0;
  margin: 0;
}

.nav-section-label {
  margin: 0.75rem 0 0.25rem;
}

.nav-section-toggle {
  display: flex;
  align-items: center;
  justify-content: space-between;
  width: 100%;
  padding: 0.5rem 0.75rem;
  background: transparent;
  border: none;
  font-size: 0.7rem;
  font-weight: 700;
  letter-spacing: 0.06em;
  text-transform: uppercase;
  color: var(--text-muted);
  cursor: pointer;
}

.nav-section-chevron {
  transition: transform 0.2s ease;
}

.nav-section-toggle[aria-expanded="false"] .nav-section-chevron {
  transform: rotate(-90deg);
}

.nav-section-item {
  margin: 0.15rem 0;
}

.nav-section-item a {
  display: flex;
  align-items: center;
  gap: 0.75rem;
  padding: 0.75rem;
  border-radius: 14px;
  text-decoration: none;
  color: var(--text-main);
  transition: all 0.2s ease;
}

.nav-section-item a:hover,
.nav-section-item.mm-active a {
  background: rgba(var(--primary-rgb), 0.08);
  color: var(--primary);
}

.nav-section-item i {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  width: 1.75rem;
  height: 1.75rem;
  font-size: 0.85rem;
  color: var(--accent);
}

.nav-copy {
  display: flex;
  flex-direction: column;
  min-width: 0;
}

.nav-text {
  font-size: 0.88rem;
  font-weight: 600;
}

.nav-subtext {
  font-size: 0.68rem;
  color: var(--text-muted);
}

/* Responsive */
@media (max-width: 991px) {
  .deznav {
    transform: translateX(-100%);
    transition: transform 0.3s ease;
  }

  .deznav.active {
    transform: translateX(0);
  }
}

@media (max-width: 991px) {
  .nav-header {
    width: 100%;
    position: relative;
  }
}
</style>