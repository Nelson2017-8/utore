import { createRouter, createWebHistory, type RouteRecordRaw } from 'vue-router'

// Importa tus componentes y define las rutas
import Home from '@/pages/Home.vue'
import Login from '@/pages/Login.vue'
import Register from '@/pages/Register.vue'
import Forgot from '@/pages/Forgot.vue'
import Reset from '@/pages/Reset.vue'
import Shop from '@/pages/Shop.vue'
import Cart from '@/pages/Cart.vue'
import Contact from '@/pages/Contact.vue'
import About from '@/pages/About.vue'

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
	},
	{
		path: '/forgot',
		name: 'Forgot',
		component: Forgot
	},
	{
		path: '/register',
		name: 'Register',
		component: Register
	},
	{
		path: '/shop',
		name: 'Shop',
		component: Shop
	},
	{
		path: '/reset',
		name: 'Reset',
		component: Reset
	},
	{
		path: '/cart',
		name: 'Cart',
		component: Cart
	},
	{
		path: '/contact',
		name: 'Contact',
		component: Contact
	},
	{
		path: '/about',
		name: 'About',
		component: About
	},
	{
		path: '/terms',
		name: 'Terms',
		component: About
	},
	{
		path: '/conditions',
		name: 'conditions',
		component: About
	}
]

const router = createRouter({
	history: createWebHistory(),
	routes
})

export default router
