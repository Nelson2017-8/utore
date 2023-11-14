import { createRouter, createWebHistory, RouteRecordRaw } from 'vue-router';

// Importa tus componentes y define las rutas
import Home from './components/Home.vue';
import About from './components/About.vue';

const routes: Array<RouteRecordRaw> = [
  {
    path: '/',
    name: 'Home',
    component: Home,
  },
  {
    path: '/about',
    name: 'About',
    component: About,
  },
  // Agrega más rutas según tus necesidades
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;
