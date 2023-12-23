import { createRouter, createWebHistory, type RouteRecordRaw } from 'vue-router'

// Importa tus componentes y define las rutas
import Profile from '@/pages/Profile.vue'
import Statistics from '@/pages/Statistics.vue'
import Shopping from '@/pages/Shopping.vue'
import Dashboard from '@/pages/Dashboard.vue'

const routes: RouteRecordRaw[] = [
	{
		path: '/dashboard/profile',
		name: 'Profile',
		component: Profile
	},
	{
		path: '/dashboard/statistics',
		name: 'statistics',
		component: Statistics
	},
	{
		path: '/dashboard/shopping',
		name: 'shopping',
		component: Shopping
	},
	{
		path: '/dashboard',
		name: 'dashboard',
		component: Dashboard
	}
]

const router = createRouter({
	history: createWebHistory(),
	routes
})

export default router
