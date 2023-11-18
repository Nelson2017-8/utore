import { createRouter, createWebHistory, type RouteRecordRaw } from 'vue-router'

// Importa tus componentes y define las rutas
import Home from './components/pages/Home.vue'
import Login from './components/pages/Login.vue'

const routes: RouteRecordRaw[] = [
  {
    path: '/',
    name: 'Home',
    component: Home
  },
  {
    path: '/login',
    name: 'Login',
    component: Login
  }
  // Agrega más rutas según tus necesidades
]

const router = createRouter({
  history: createWebHistory(),
  routes
})

export default router
