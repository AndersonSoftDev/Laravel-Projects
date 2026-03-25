<template>
  <div class="header">
    <div class="header-content">
      <nav class="navbar navbar-expand">
        <div class="collapse navbar-collapse justify-content-between header-navbar-shell">
          <div class="header-left">
            <div class="header-shell">
              <div class="header-overview">
                <div class="header-overview-badge">
                  <i class="fa fa-search"></i>
                </div>
                <div class="header-overview-text">
                  <h4 id="header-view-label">{{ currentViewLabel }}</h4>
                </div>
              </div>
              <div class="header-search-wrap">
                <label class="header-search" for="dashboard-search">
                  <i class="fa fa-search"></i>
                  <input id="dashboard-search" type="text" :placeholder="searchPlaceholder" v-model="searchQuery">
                  <button type="button" @click="handleSearch">Buscar</button>
                </label>
              </div>
            </div>
          </div>
          <ul class="navbar-nav header-right header-user-menu">
            <li class="nav-item header-profile">
              <button class="nav-link header-profile-summary" type="button" @click="toggleUserMenu" aria-label="Área do utilizador">
                <span class="header-profile-copy">
                  <strong>{{ userName }}</strong>
                  <small>Online</small>
                </span>
                <span class="header-profile-avatar" aria-hidden="true">{{ userInitial }}</span>
              </button>
              <div class="header-profile-panel" v-show="userMenuOpen">
                <div class="header-profile-label">
                  <strong>{{ userName }}</strong>
                  <span>Online</span>
                </div>
                <div class="header-profile-actions">
                  <a href="#" class="header-profile-action">
                    <i class="fa fa-user-o text-primary"></i>
                    <span>Meu perfil</span>
                  </a>
                  <a href="#" class="header-profile-action">
                    <i class="fa fa-cog text-success"></i>
                    <span>Configuração</span>
                  </a>
                  <a href="#" class="header-profile-action" @click.prevent="logout">
                    <i class="fa fa-sign-out text-danger"></i>
                    <span>Sair</span>
                  </a>
                </div>
              </div>
            </li>
          </ul>
        </div>
      </nav>
    </div>
  </div>
</template>

<script setup>
import { ref, computed, watch } from 'vue'
import { useRoute } from 'vue-router'

const route = useRoute()
const searchQuery = ref('')
const userMenuOpen = ref(false)

const userName = 'John Doe'
const userInitial = computed(() => userName.charAt(0))

const viewMeta = {
  '/': { label: 'Pesquisa', placeholder: 'Pesquisar' },
  '/entradas': { label: 'Entradas', placeholder: 'Pesquisar matrícula, veículo ou vaga' },
  '/saidas': { label: 'Saídas', placeholder: 'Pesquisar matrícula ou ticket' },
  '/vagas': { label: 'Vagas', placeholder: 'Pesquisar bloco ou zona' },
  '/clientes': { label: 'Clientes', placeholder: 'Pesquisar cliente ou conta' }
}

const currentViewLabel = computed(() => {
  return viewMeta[route.path]?.label || 'Pesquisa'
})

const searchPlaceholder = computed(() => {
  return viewMeta[route.path]?.placeholder || 'Pesquisar'
})

function toggleUserMenu() {
  userMenuOpen.value = !userMenuOpen.value
}

function handleSearch() {
  console.log('Searching:', searchQuery.value)
}

function logout() {
  console.log('Logging out...')
}

// Close user menu when clicking outside
document.addEventListener('click', (e) => {
  const userMenu = e.target.closest('.header-user-menu')
  if (!userMenu) {
    userMenuOpen.value = false
  }
})
</script>

<style scoped>
.header {
  padding-left: var(--sidebar-width);
  border-bottom: 1px solid rgba(var(--primary-rgb), 0.08);
  background: rgba(244, 248, 252, 0.72);
  backdrop-filter: blur(10px);
}

.header-content {
  padding: 0.55rem 1rem 0.15rem 1.15rem;
}

.header-navbar-shell {
  display: flex;
  align-items: center;
  gap: 1rem;
}

.header-left {
  flex: 1 1 auto;
  min-width: 0;
}

.header-shell {
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 0.8rem;
  width: min(100%, 37.5rem);
  padding: 0.62rem 0.78rem;
  border-radius: 20px;
  background: rgba(255, 255, 255, 0.84);
  border: 1px solid rgba(var(--primary-rgb), 0.08);
  box-shadow: 0 12px 24px rgba(23, 63, 122, 0.06);
  backdrop-filter: blur(10px);
}

.header-overview {
  display: flex;
  align-items: center;
  gap: 0.65rem;
  min-width: 0;
  flex-shrink: 0;
}

.header-overview-badge {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  width: 2.1rem;
  height: 2.1rem;
  border-radius: 13px;
  background: linear-gradient(135deg, var(--primary) 0%, #1B5C90 100%);
  color: #fff;
  box-shadow: 0 10px 18px rgba(var(--primary-rgb), 0.18);
}

.header-overview-text h4 {
  margin: 0;
  font-size: 0.94rem;
  font-weight: 700;
  color: var(--text-main);
  font-family: var(--font-display);
}

.header-overview-text span {
  font-size: 0.66rem;
  font-weight: 600;
  letter-spacing: 0.04em;
  text-transform: uppercase;
  color: var(--text-muted);
}

.header-search-wrap {
  display: flex;
  justify-content: flex-end;
  flex: 1 1 auto;
  min-width: 0;
}

.header-search {
  display: flex;
  align-items: center;
  gap: 0.55rem;
  width: min(100%, 18.25rem);
  padding: 0.36rem 0.4rem 0.36rem 0.75rem;
  border-radius: 999px;
  background: rgba(244, 248, 252, 0.96);
  border: 1px solid rgba(var(--primary-rgb), 0.08);
  box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.75);
}

.header-search i {
  font-size: 0.8rem;
  color: var(--text-muted);
}

.header-search input {
  flex: 1 1 auto;
  min-width: 0;
  border: 0;
  background: transparent;
  font-size: 0.82rem;
  color: var(--text-main);
  outline: none;
}

.header-search input::placeholder {
  color: var(--text-muted);
}

.header-search button {
  border: 0;
  padding: 0.44rem 0.8rem;
  border-radius: 999px;
  background: linear-gradient(135deg, var(--primary) 0%, #1B5C90 100%);
  color: #fff;
  font-size: 0.74rem;
  font-weight: 700;
  box-shadow: 0 10px 18px rgba(var(--primary-rgb), 0.18);
  cursor: pointer;
}

.header-right {
  display: flex;
  align-items: center;
  margin-left: auto;
}

.header-user-menu {
  position: relative;
  padding-left: 1.2rem;
}

.header-user-menu::before {
  content: "";
  position: absolute;
  left: 0.45rem;
  top: 50%;
  transform: translateY(-50%);
  width: 1px;
  height: 2rem;
  background: rgba(var(--primary-rgb), 0.12);
}

.header-profile-summary {
  display: flex;
  align-items: center;
  gap: 0.75rem;
  padding: 0.5rem;
  background: transparent;
  border: none;
  cursor: pointer;
}

.header-profile-copy {
  text-align: right;
}

.header-profile-copy strong {
  display: block;
  font-size: 0.85rem;
  color: var(--text-main);
}

.header-profile-copy small {
  font-size: 0.7rem;
  color: var(--success);
}

.header-profile-avatar {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  width: 2.25rem;
  height: 2.25rem;
  border-radius: 50%;
  background: linear-gradient(135deg, var(--primary) 0%, #1B5C90 100%);
  color: #fff;
  font-weight: 700;
  font-size: 0.9rem;
  font-family: var(--font-display);
}

.header-profile-panel {
  position: absolute;
  top: calc(100% + 0.5rem);
  right: 0;
  min-width: 200px;
  padding: 0.75rem;
  background: var(--surface-strong);
  border-radius: 16px;
  border: 1px solid var(--border-soft);
  box-shadow: var(--shadow-soft);
  z-index: 100;
}

.header-profile-label {
  padding: 0.75rem;
  border-bottom: 1px solid var(--border-soft);
  margin-bottom: 0.5rem;
}

.header-profile-label strong {
  display: block;
  font-size: 0.9rem;
  color: var(--text-main);
}

.header-profile-label span {
  font-size: 0.75rem;
  color: var(--success);
}

.header-profile-action {
  display: flex;
  align-items: center;
  gap: 0.75rem;
  padding: 0.6rem 0.75rem;
  border-radius: 10px;
  text-decoration: none;
  color: var(--text-main);
  font-size: 0.85rem;
  transition: background 0.2s ease;
}

.header-profile-action:hover {
  background: rgba(var(--primary-rgb), 0.06);
}

.header-profile-action i {
  width: 1.5rem;
}

.text-primary { color: var(--primary) !important; }
.text-success { color: var(--success) !important; }
.text-danger { color: var(--error) !important; }

@media (max-width: 991px) {
  .header {
    padding-left: 0;
  }
}
</style>