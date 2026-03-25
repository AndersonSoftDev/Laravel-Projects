<template>
  <div class="content-body">
    <div class="container-fluid dashboard-view">
      <!-- Hero Section -->
      <div class="form-head dashboard-hero d-flex align-items-center mb-3">
        <div class="dashboard-hero-layout">
          <div class="dashboard-hero-main">
            <h2 class="font-w600">Parque em alta pressão</h2>
            <div class="dashboard-meta">
              <strong>DESVIAR</strong> entradas AGORA para Coberto Sul.
            </div>
            <div class="dashboard-decision-cluster">
              <ul class="dashboard-action-list" aria-label="Ações operacionais imediatas">
                <li class="dashboard-action-item is-critical">
                  <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
                  <div class="dashboard-action-copy">
                    <strong>Crítico</strong>
                    <span>Premium só com 2 vagas livres.</span>
                  </div>
                </li>
              </ul>
              <div class="dashboard-hero-cta">
                <a href="#parking-insights" class="btn btn-outline-primary">
                  <i class="fa fa-bolt" aria-hidden="true"></i>Agir agora
                </a>
              </div>
            </div>
          </div>
          <aside class="dashboard-hero-side" aria-label="Indicadores operacionais da Zona Premium">
            <div class="dashboard-ops-panel">
              <div class="dashboard-ops-head">
                <div>
                  <span class="dashboard-ops-kicker">Zona Premium</span>
                  <strong>Leitura operacional</strong>
                </div>
                <span class="dashboard-ops-badge is-critical">96% ocupado</span>
              </div>
              <div class="dashboard-ops-progress" aria-hidden="true">
                <span :style="{ width: occupancyRate + '%' }"></span>
              </div>
              <div class="dashboard-ops-progress-copy">
                <span>{{ occupiedSpots }} ocupadas de {{ totalSpots }} vagas</span>
                <strong>{{ availableSpots }} livres</strong>
              </div>
              <div class="dashboard-ops-stats">
                <div class="dashboard-ops-stat">
                  <span>Total de vagas</span>
                  <strong>{{ totalSpots }}</strong>
                </div>
                <div class="dashboard-ops-stat is-critical">
                  <span>Vagas livres</span>
                  <strong>{{ availableSpots }}</strong>
                </div>
                <div class="dashboard-ops-stat">
                  <span>Vagas ocupadas</span>
                  <strong>{{ occupiedSpots }}</strong>
                </div>
                <div class="dashboard-ops-stat is-muted">
                  <span>Em manutenção</span>
                  <strong>{{ maintenanceSpots }}</strong>
                </div>
              </div>
            </div>
          </aside>
        </div>
      </div>

      <!-- Secondary Strip -->
      <div class="row g-2 dashboard-secondary-strip" aria-label="Sinais secundários da operação">
        <div class="col-xl-6 col-md-6">
          <div class="dashboard-secondary-card is-info">
            <span class="dashboard-secondary-icon"><i class="fa fa-random" aria-hidden="true"></i></span>
            <div class="dashboard-secondary-copy">
              <span class="dashboard-secondary-kicker">Desvio</span>
              <strong>Novas entradas para Coberto Sul</strong>
              <small>Segura a Premium até recuperar folga operacional.</small>
            </div>
          </div>
        </div>
        <div class="col-xl-6 col-md-6">
          <div class="dashboard-secondary-card is-neutral">
            <span class="dashboard-secondary-icon"><i class="fa fa-clock-o" aria-hidden="true"></i></span>
            <div class="dashboard-secondary-copy">
              <span class="dashboard-secondary-kicker">Horário</span>
              <strong>Pico de saída previsto às 18:00</strong>
              <small>Prepare saídas antecipadas.</small>
            </div>
          </div>
        </div>
      </div>

      <!-- Metrics Row -->
      <div class="row g-3 mt-2">
        <div class="col-xl-3 col-md-6">
          <div class="parking-metric-card">
            <div class="parking-metric-top">
              <div>
                <span class="parking-metric-label">Ocupação Geral</span>
                <div class="parking-metric-value">{{ occupancyRate }}%</div>
              </div>
              <div class="parking-metric-icon">
                <i class="fa fa-pie-chart"></i>
              </div>
            </div>
            <p class="parking-metric-foot">Taxa média de ocupação nas últimas 24h</p>
          </div>
        </div>
        <div class="col-xl-3 col-md-6">
          <div class="parking-metric-card">
            <div class="parking-metric-top">
              <div>
                <span class="parking-metric-label">Entradas Hoje</span>
                <div class="parking-metric-value">{{ todayEntries }}</div>
              </div>
              <div class="parking-metric-icon">
                <i class="fa fa-sign-in"></i>
              </div>
            </div>
            <p class="parking-metric-foot">{{ entriesTrend }}% vs ontem</p>
          </div>
        </div>
        <div class="col-xl-3 col-md-6">
          <div class="parking-metric-card">
            <div class="parking-metric-top">
              <div>
                <span class="parking-metric-label">Saídas Hoje</span>
                <div class="parking-metric-value">{{ todayExits }}</div>
              </div>
              <div class="parking-metric-icon">
                <i class="fa fa-sign-out"></i>
              </div>
            </div>
            <p class="parking-metric-foot">{{ exitsTrend }}% vs ontem</p>
          </div>
        </div>
        <div class="col-xl-3 col-md-6">
          <div class="parking-metric-card">
            <div class="parking-metric-top">
              <div>
                <span class="parking-metric-label">Receita Hoje</span>
                <div class="parking-metric-value">{{ todayRevenue }}</div>
              </div>
              <div class="parking-metric-icon">
                <i class="fa fa-money"></i>
              </div>
            </div>
            <p class="parking-metric-foot">{{ revenueTrend }}% vs ontem</p>
          </div>
        </div>
      </div>

      <!-- Panels Row -->
      <div class="row g-3 mt-2">
        <div class="col-xl-8 col-md-12">
          <div class="parking-panel">
            <div class="parking-panel-header">
              <div>
                <h4>Fluxo de Operações</h4>
                <p>Processo de entrada e saída de veículos</p>
              </div>
              <span class="parking-panel-badge">Em tempo real</span>
            </div>
            <div class="parking-flow-grid">
              <div class="parking-flow-step" v-for="(step, index) in flowSteps" :key="index">
                <div class="parking-flow-stephead">
                  <div class="parking-flow-index">{{ index + 1 }}</div>
                  <span class="parking-endpoint">{{ step.endpoint }}</span>
                </div>
                <h5>{{ step.title }}</h5>
                <p>{{ step.description }}</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-md-12">
          <div class="parking-panel">
            <div class="parking-panel-header">
              <div>
                <h4>Resumo Rápido</h4>
                <p>Visão geral do sistema</p>
              </div>
            </div>
            <div class="quick-summary">
              <div class="quick-summary-item" v-for="(item, index) in quickSummary" :key="index">
                <i :class="'fa ' + item.icon"></i>
                <div class="quick-summary-info">
                  <span>{{ item.label }}</span>
                  <strong>{{ item.value }}</strong>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, computed } from 'vue'

// Mock data - would come from API
const totalSpots = ref(50)
const occupiedSpots = ref(48)
const maintenanceSpots = ref(0)

const availableSpots = computed(() => totalSpots.value - occupiedSpots.value - maintenanceSpots.value)
const occupancyRate = computed(() => Math.round((occupiedSpots.value / totalSpots.value) * 100))

const todayEntries = ref(127)
const todayExits = ref(112)
const todayRevenue = ref('2.450 MZN')

const entriesTrend = ref(+12)
const exitsTrend = ref(+8)
const revenueTrend = ref(+15)

const flowSteps = [
  {
    endpoint: 'POST /api/entries',
    title: 'Registro de Entrada',
    description: 'Captura de placa e geração de ticket'
  },
  {
    endpoint: 'GET /api/spots',
    title: 'Alocação de Vaga',
    description: 'Identificação de vaga disponível'
  },
  {
    endpoint: 'POST /api/payments',
    title: 'Processamento',
    description: 'Cálculo de tempo e valor'
  }
]

const quickSummary = [
  { icon: 'fa-car', label: 'Veículos no pátio', value: '48' },
  { icon: 'fa-clock', label: 'Tempo médio', value: '2h 15m' },
  { icon: 'fa-users', label: 'Clientes ativos', value: '156' },
  { icon: 'fa-ticket', label: 'Tickets abertos', value: '48' }
]
</script>

<style scoped>
.content-body {
  margin-left: var(--sidebar-width);
  min-height: calc(100vh - var(--nav-header-height));
  padding: 1.5rem;
  background: linear-gradient(180deg, rgba(var(--primary-rgb), 0.03) 0%, rgba(255, 255, 255, 0) 18rem);
}

.dashboard-view {
  max-width: 1400px;
}

.dashboard-hero {
  background: var(--surface);
  border-radius: 24px;
  padding: 1.5rem;
  border: 1px solid var(--border-soft);
  box-shadow: var(--shadow-soft);
}

.dashboard-hero-layout {
  display: grid;
  grid-template-columns: 1fr 320px;
  gap: 1.5rem;
  width: 100%;
}

.dashboard-hero h2 {
  font-size: 1.35rem;
  font-weight: 700;
  color: var(--text-main);
  margin-bottom: 0.5rem;
}

.dashboard-meta {
  font-size: 0.8rem;
  color: var(--text-muted);
}

.dashboard-meta strong {
  color: var(--text-main);
  font-weight: 700;
}

.dashboard-decision-cluster {
  margin-top: 1rem;
}

.dashboard-action-list {
  list-style: none;
  padding: 0;
  margin: 0 0 1rem 0;
}

.dashboard-action-item {
  display: flex;
  align-items: center;
  gap: 0.75rem;
  padding: 0.75rem 1rem;
  border-radius: 14px;
  background: rgba(var(--error-rgb), 0.08);
  border: 1px solid rgba(var(--error-rgb), 0.12);
}

.dashboard-action-item i {
  color: var(--error);
  font-size: 1.1rem;
}

.dashboard-action-copy strong {
  display: block;
  font-size: 0.8rem;
  color: var(--error);
}

.dashboard-action-copy span {
  font-size: 0.75rem;
  color: var(--text-muted);
}

.dashboard-hero-cta {
  margin-top: 1rem;
}

.dashboard-hero-cta .btn {
  display: inline-flex;
  align-items: center;
  gap: 0.5rem;
}

/* Ops Panel */
.dashboard-ops-panel {
  background: linear-gradient(180deg, rgba(var(--primary-rgb), 0.04) 0%, rgba(var(--primary-rgb), 0.01) 100%);
  border-radius: 18px;
  padding: 1rem;
  border: 1px solid var(--border-soft);
}

.dashboard-ops-head {
  display: flex;
  align-items: center;
  justify-content: space-between;
  margin-bottom: 0.75rem;
}

.dashboard-ops-kicker {
  font-size: 0.65rem;
  font-weight: 700;
  letter-spacing: 0.06em;
  text-transform: uppercase;
  color: var(--text-muted);
}

.dashboard-ops-head strong {
  display: block;
  font-size: 0.9rem;
  color: var(--text-main);
}

.dashboard-ops-badge {
  padding: 0.35rem 0.7rem;
  border-radius: 999px;
  background: rgba(var(--success-rgb), 0.12);
  color: var(--success);
  font-size: 0.72rem;
  font-weight: 700;
}

.dashboard-ops-badge.is-critical {
  background: rgba(var(--error-rgb), 0.12);
  color: var(--error);
}

.dashboard-ops-progress {
  height: 6px;
  border-radius: 999px;
  background: rgba(var(--primary-rgb), 0.08);
  overflow: hidden;
  margin-bottom: 0.5rem;
}

.dashboard-ops-progress span {
  display: block;
  height: 100%;
  border-radius: 999px;
  background: linear-gradient(90deg, var(--primary) 0%, var(--accent) 100%);
}

.dashboard-ops-progress-copy {
  display: flex;
  justify-content: space-between;
  font-size: 0.72rem;
  color: var(--text-muted);
  margin-bottom: 1rem;
}

.dashboard-ops-progress-copy strong {
  color: var(--text-main);
}

.dashboard-ops-stats {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: 0.75rem;
}

.dashboard-ops-stat {
  padding: 0.5rem 0.75rem;
  border-radius: 12px;
  background: rgba(255, 255, 255, 0.6);
}

.dashboard-ops-stat span {
  display: block;
  font-size: 0.65rem;
  color: var(--text-muted);
  text-transform: uppercase;
  letter-spacing: 0.04em;
}

.dashboard-ops-stat strong {
  display: block;
  font-size: 1.1rem;
  font-weight: 700;
  color: var(--text-main);
  font-family: var(--font-display);
}

/* Secondary Cards */
.dashboard-secondary-strip {
  margin-top: 1rem;
}

.dashboard-secondary-card {
  display: flex;
  align-items: center;
  gap: 0.75rem;
  padding: 1rem;
  border-radius: 18px;
  background: var(--surface);
  border: 1px solid var(--border-soft);
}

.dashboard-secondary-icon {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  width: 2.5rem;
  height: 2.5rem;
  border-radius: 12px;
  background: rgba(var(--info-rgb), 0.12);
  color: var(--info);
  font-size: 1rem;
}

.dashboard-secondary-kicker {
  font-size: 0.65rem;
  font-weight: 700;
  text-transform: uppercase;
  letter-spacing: 0.04em;
  color: var(--text-muted);
}

.dashboard-secondary-copy strong {
  display: block;
  font-size: 0.85rem;
  color: var(--text-main);
}

.dashboard-secondary-copy small {
  font-size: 0.72rem;
  color: var(--text-muted);
}

/* Metrics */
.parking-metric-card {
  height: 100%;
  padding: 1.1rem;
  border-radius: 22px;
  background: linear-gradient(180deg, rgba(255, 255, 255, 0.97) 0%, rgba(240, 246, 252, 0.92) 100%);
  border: 1px solid rgba(var(--primary-rgb), 0.08);
  box-shadow: 0 14px 28px rgba(23, 63, 122, 0.06);
}

.parking-metric-top {
  display: flex;
  align-items: flex-start;
  justify-content: space-between;
  gap: 0.8rem;
  margin-bottom: 1rem;
}

.parking-metric-label {
  display: block;
  font-size: 0.66rem;
  font-weight: 700;
  letter-spacing: 0.07em;
  text-transform: uppercase;
  color: var(--text-muted);
}

.parking-metric-value {
  margin-top: 0.28rem;
  font-family: var(--font-display);
  font-size: clamp(1.45rem, 1.7vw, 1.82rem);
  font-weight: 800;
  line-height: 1;
  color: var(--text-main);
}

.parking-metric-icon {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  width: 2.65rem;
  height: 2.65rem;
  border-radius: 16px;
  background: rgba(var(--primary-rgb), 0.1);
  color: var(--accent);
  font-size: 1rem;
  flex-shrink: 0;
}

.parking-metric-foot {
  margin: 0;
  font-size: 0.75rem;
  line-height: 1.45;
  color: #627974;
}

/* Panels */
.parking-panel {
  height: 100%;
  padding: 1.1rem;
  border-radius: 22px;
  background: linear-gradient(180deg, rgba(255, 255, 255, 0.97) 0%, rgba(240, 246, 252, 0.92) 100%);
  border: 1px solid rgba(var(--primary-rgb), 0.08);
  box-shadow: 0 14px 28px rgba(23, 63, 122, 0.06);
}

.parking-panel-header {
  display: flex;
  align-items: flex-start;
  justify-content: space-between;
  gap: 0.9rem;
  margin-bottom: 1rem;
}

.parking-panel-header h4 {
  margin: 0.22rem 0 0;
  font-size: 0.98rem;
  font-weight: 700;
  color: var(--text-main);
}

.parking-panel-header p {
  margin: 0.28rem 0 0;
  font-size: 0.75rem;
  line-height: 1.5;
  color: #667d78;
}

.parking-panel-badge {
  display: inline-flex;
  align-items: center;
  padding: 0.38rem 0.7rem;
  border-radius: 999px;
  background: rgba(var(--primary-rgb), 0.08);
  font-size: 0.7rem;
  font-weight: 700;
  color: var(--accent);
  white-space: nowrap;
}

/* Flow Grid */
.parking-flow-grid {
  display: grid;
  grid-template-columns: repeat(3, minmax(0, 1fr));
  gap: 0.9rem;
}

.parking-flow-step {
  padding: 0.95rem;
  border-radius: 18px;
  background: rgba(244, 248, 252, 0.92);
  border: 1px solid rgba(var(--primary-rgb), 0.08);
}

.parking-flow-stephead {
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 0.75rem;
  margin-bottom: 0.75rem;
}

.parking-flow-index {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  width: 2rem;
  height: 2rem;
  border-radius: 14px;
  background: linear-gradient(135deg, var(--primary) 0%, #1B5C90 100%);
  color: #fff;
  font-family: var(--font-display);
  font-size: 0.82rem;
  font-weight: 700;
}

.parking-endpoint {
  display: inline-flex;
  align-items: center;
  padding: 0.3rem 0.55rem;
  border-radius: 999px;
  background: rgba(33, 59, 54, 0.06);
  font-size: 0.7rem;
  font-weight: 700;
  color: #35514b;
}

.parking-flow-step h5 {
  margin: 0 0 0.35rem;
  font-size: 0.88rem;
  font-weight: 700;
  color: var(--text-main);
}

.parking-flow-step p {
  margin: 0;
  font-size: 0.75rem;
  color: var(--text-muted);
  line-height: 1.4;
}

/* Quick Summary */
.quick-summary {
  display: flex;
  flex-direction: column;
  gap: 1rem;
}

.quick-summary-item {
  display: flex;
  align-items: center;
  gap: 0.75rem;
  padding: 0.75rem;
  border-radius: 12px;
  background: rgba(244, 248, 252, 0.6);
}

.quick-summary-item i {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  width: 2rem;
  height: 2rem;
  border-radius: 10px;
  background: rgba(var(--primary-rgb), 0.1);
  color: var(--accent);
  font-size: 0.9rem;
}

.quick-summary-info {
  display: flex;
  flex-direction: column;
}

.quick-summary-info span {
  font-size: 0.72rem;
  color: var(--text-muted);
}

.quick-summary-info strong {
  font-size: 1rem;
  font-weight: 700;
  color: var(--text-main);
  font-family: var(--font-display);
}

/* Buttons */
.btn {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  gap: 0.5rem;
  padding: 0.6rem 1.25rem;
  border-radius: 12px;
  font-size: 0.85rem;
  font-weight: 600;
  text-decoration: none;
  cursor: pointer;
  transition: all 0.2s ease;
  border: 1px solid transparent;
}

.btn-primary {
  background: linear-gradient(135deg, var(--primary) 0%, #1B5C90 100%);
  color: #fff;
  border-color: transparent;
}

.btn-outline-primary {
  background: transparent;
  color: var(--primary);
  border-color: var(--primary);
}

.btn-outline-primary:hover {
  background: rgba(var(--primary-rgb), 0.05);
}

/* Grid System */
.row {
  display: flex;
  flex-wrap: wrap;
  margin-right: -0.5rem;
  margin-left: -0.5rem;
}

.col-xl-6, .col-xl-3, .col-xl-8, .col-xl-4, .col-md-6, .col-md-12 {
  position: relative;
  width: 100%;
  padding-right: 0.5rem;
  padding-left: 0.5rem;
}

@media (min-width: 768px) {
  .col-md-6 {
    flex: 0 0 50%;
    max-width: 50%;
  }
  .col-md-12 {
    flex: 0 0 100%;
    max-width: 100%;
  }
}

@media (min-width: 1200px) {
  .col-xl-3 {
    flex: 0 0 25%;
    max-width: 25%;
  }
  .col-xl-4 {
    flex: 0 0 33.333333%;
    max-width: 33.333333%;
  }
  .col-xl-6 {
    flex: 0 0 50%;
    max-width: 50%;
  }
  .col-xl-8 {
    flex: 0 0 66.666667%;
    max-width: 66.666667%;
  }
}

.g-2 {
  gap: 0.5rem;
}

.g-3 {
  gap: 1rem;
}

.mt-2 {
  margin-top: 1rem;
}

.mb-3 {
  margin-bottom: 1rem;
}

.d-flex {
  display: flex;
}

.align-items-center {
  align-items: center;
}

@media (max-width: 991px) {
  .content-body {
    margin-left: 0;
    padding: 1rem;
  }

  .dashboard-hero-layout {
    grid-template-columns: 1fr;
  }

  .parking-flow-grid {
    grid-template-columns: 1fr;
  }
}
</style>