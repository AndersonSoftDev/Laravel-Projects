<template>
  <div class="auth-page">
    <div class="authincation h-100">
      <div class="container h-100">
        <div class="row justify-content-center h-100 align-items-center">
          <div class="col-md-6">
            <div class="authincation-content">
              <div class="row no-gutters">
                <div class="col-xl-12">
                  <div class="auth-form">
                    <div class="text-center mb-3">
                      <a href="/">
                        <svg class="brand-logo-full" viewBox="0 0 260 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <text x="0" y="45" fill="white" font-family="Sora, sans-serif" font-size="36" font-weight="700">Parking</text>
                          <text x="160" y="45" fill="#2C9BD4" font-family="Sora, sans-serif" font-size="36" font-weight="700">Son</text>
                        </svg>
                      </a>
                    </div>

                    <h4 class="text-center mb-4 text-white">Iniciar sessão</h4>

                    <form @submit.prevent="handleLogin">
                      <div class="form-group">
                        <label class="mb-1 text-white"><strong>Email</strong></label>
                        <input type="email" class="form-control" v-model="email" placeholder="hello@example.com" required>
                      </div>

                      <div class="form-group">
                        <label class="mb-1 text-white"><strong>Palavra-passe</strong></label>
                        <div class="password-input-wrapper">
                          <input :type="showPassword ? 'text' : 'password'" class="form-control" v-model="password" placeholder="Palavra-passe" required>
                          <button type="button" class="show-password-toggle" @click="showPassword = !showPassword">
                            <i :class="showPassword ? 'fa fa-eye-slash' : 'fa fa-eye'"></i>
                          </button>
                        </div>
                      </div>

                      <div class="row d-flex justify-content-between mt-4 mb-2">
                        <div class="form-group">
                          <div class="form-check custom-checkbox ms-1 text-white">
                            <input type="checkbox" class="form-check-input" id="remember" v-model="remember">
                            <label class="form-check-label" for="remember">Lembrar-me</label>
                          </div>
                        </div>
                      </div>

                      <div class="text-center">
                        <button type="submit" class="btn bg-white text-primary btn-block" :disabled="isLoading">
                          <span v-if="!isLoading">Entrar</span>
                          <span v-else>A entrar...</span>
                        </button>
                      </div>
                    </form>

                    <div class="text-center mt-4">
                      <p class="text-white">
                        <small>Versão 1.0.0 | Parking Management System</small>
                      </p>
                    </div>
                  </div>
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
import { ref } from 'vue'
import { useRouter } from 'vue-router'

const router = useRouter()
const email = ref('')
const password = ref('')
const remember = ref(false)
const showPassword = ref(false)
const isLoading = ref(false)

function handleLogin() {
  isLoading.value = true

  // Simulate login API call
  setTimeout(() => {
    console.log('Login attempted with:', { email: email.value, password: password.value, remember: remember.value })
    isLoading.value = false

    // Navigate to dashboard after successful login
    router.push('/')
  }, 1000)
}
</script>

<style scoped>
.auth-page {
  min-height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
  background: linear-gradient(135deg, var(--primary) 0%, #1B5C90 100%);
}

.h-100 {
  height: 100%;
}

.container {
  width: 100%;
  padding-right: 15px;
  padding-left: 15px;
  margin-right: auto;
  margin-left: auto;
}

.row {
  display: flex;
  flex-wrap: wrap;
  margin-right: -15px;
  margin-left: -15px;
}

.no-gutters {
  margin-right: 0;
  margin-left: 0;
}

.no-gutters > [class*="col-"] {
  padding-right: 0;
  padding-left: 0;
}

.col-md-6 {
  position: relative;
  width: 100%;
  padding-right: 15px;
  padding-left: 15px;
}

@media (min-width: 768px) {
  .col-md-6 {
    flex: 0 0 50%;
    max-width: 50%;
  }
}

.col-xl-12 {
  position: relative;
  width: 100%;
  padding-right: 15px;
  padding-left: 15px;
}

.justify-content-center {
  justify-content: center !important;
}

.align-items-center {
  align-items: center !important;
}

.text-center {
  text-align: center !important;
}

.mb-3 {
  margin-bottom: 1rem !important;
}

.mb-4 {
  margin-bottom: 1.5rem !important;
}

.mt-4 {
  margin-top: 1.5rem !important;
}

.mb-2 {
  margin-bottom: 0.5rem !important;
}

.ms-1 {
  margin-left: 0.25rem !important;
}

.d-flex {
  display: flex !important;
}

.authincation {
  display: flex;
  align-items: center;
  justify-content: center;
  width: 100%;
}

.authincation-content {
  background: rgba(255, 255, 255, 0.1);
  backdrop-filter: blur(20px);
  border-radius: 24px;
  border: 1px solid rgba(255, 255, 255, 0.2);
  padding: 2.5rem;
  box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
}

.auth-form h4 {
  color: #fff;
  text-align: center;
  margin-bottom: 1.5rem;
  font-family: var(--font-display);
  font-weight: 600;
}

.brand-logo-full {
  display: block;
  width: auto;
  max-width: 100%;
  height: auto;
  margin: 0 auto;
}

.form-group {
  margin-bottom: 1.25rem;
}

.form-group label {
  display: block;
  margin-bottom: 0.5rem;
  font-size: 0.85rem;
  font-weight: 500;
}

.text-white {
  color: #fff !important;
}

.password-input-wrapper {
  position: relative;
}

.form-control {
  width: 100%;
  padding: 0.75rem 1rem;
  border-radius: 12px;
  border: 1px solid rgba(255, 255, 255, 0.2);
  background: rgba(255, 255, 255, 0.1);
  color: #fff;
  font-size: 0.9rem;
  outline: none;
  transition: all 0.2s ease;
  font-family: var(--font-ui);
}

.form-control::placeholder {
  color: rgba(255, 255, 255, 0.5);
}

.form-control:focus {
  border-color: rgba(255, 255, 255, 0.4);
  background: rgba(255, 255, 255, 0.15);
}

.show-password-toggle {
  position: absolute;
  right: 12px;
  top: 50%;
  transform: translateY(-50%);
  background: transparent;
  border: none;
  color: rgba(255, 255, 255, 0.6);
  cursor: pointer;
  font-size: 0.9rem;
  padding: 0.25rem;
}

.show-password-toggle:hover {
  color: #fff;
}

.form-check {
  display: flex;
  align-items: center;
  gap: 0.5rem;
}

.form-check-input {
  width: 1rem;
  height: 1rem;
  accent-color: var(--primary);
  cursor: pointer;
}

.form-check-label {
  font-size: 0.85rem;
  color: rgba(255, 255, 255, 0.9);
  cursor: pointer;
}

.btn {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  gap: 0.5rem;
  padding: 0.75rem 1.5rem;
  border-radius: 12px;
  font-size: 0.9rem;
  font-weight: 600;
  text-decoration: none;
  cursor: pointer;
  transition: all 0.2s ease;
  border: 1px solid transparent;
  font-family: var(--font-ui);
}

.btn-block {
  width: 100%;
}

.bg-white {
  background-color: #fff !important;
}

.text-primary {
  color: var(--primary) !important;
}

.btn:disabled {
  opacity: 0.7;
  cursor: not-allowed;
}

.btn:hover:not(:disabled) {
  transform: translateY(-1px);
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
}

@media (max-width: 576px) {
  .authincation-content {
    padding: 1.5rem;
    margin: 1rem;
  }
}
</style>