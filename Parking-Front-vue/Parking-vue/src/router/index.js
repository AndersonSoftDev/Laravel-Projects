import { createRouter, createWebHistory } from 'vue-router'
import AppLayout from '../components/layout/AppLayout.vue'

const router = createRouter({
  history: createWebHistory(),
  routes: [
    {
      path: '/login',
      component: () => import('../views/LoginView.vue'),
      meta: { public: true }
    },
    {
      path: '/',
      component: AppLayout,
      children: [
        { path: '', component: () => import('../views/DashboardView.vue') },
        { path: 'entradas', component: () => import('../views/EntradaView.vue') },
        { path: 'saidas', component: () => import('../views/SaidaView.vue') },
        { path: 'vagas', component: () => import('../views/VagasView.vue') },
        { path: 'clientes', component: () => import('../views/ClientesView.vue') }
      ]
    }
  ]
})

// Navigation guard
router.beforeEach((to, from, next) => {
  // For now, allow all routes (add authentication check here later)
  next()
})

export default router