import { type URLsType } from './interfaces'
import { t } from '@/i18n'

const u: URLsType = {
	baseUrl: {
		name: t('pages.home'),
		url: '/',
		method: 'GET'
	},
	baseApi: {
		name: 'API v1',
		url: '/',
		method: 'GET'
	},
	login: {
		name: t('buttons.login'),
		url: '/login',
		method: 'GET'
	},
	register: {
		name: t('buttons.register'),
		url: '/register',
		method: 'GET'
	},
	forgot: {
		name: t('forms.forgot'),
		url: '/forgot',
		method: 'GET'
	},
	home: {
		name: t('pages.home'),
		url: '/',
		method: 'GET'
	},
	shop: {
		name: t('pages.shop'),
		url: '/shop',
		method: 'GET'
	},
	cart: {
		name: t('pages.cart'),
		url: '/cart',
		method: 'GET'
	},
	contact: {
		name: t('pages.contact'),
		url: '/contact',
		method: 'GET'
	},
	about: {
		name: t('pages.about'),
		url: '/about',
		method: 'GET'
	},
	terms: {
		name: t('pages.terms'),
		url: '/terms',
		method: 'GET'
	},
	conditions: {
		name: t('pages.conditions'),
		url: '/conditions',
		method: 'GET'
	},
	profile: {
		name: t('pages.profile'),
		url: '/dashboard/profile',
		method: 'GET'
	},
	statistics: {
		name: t('pages.statistics'),
		url: '/dashboard/statistics',
		method: 'GET'
	},
	shopping: {
		name: t('pages.shopping'),
		url: '/dashboard/shopping',
		method: 'GET'
	},
	dashboard: {
		name: t('pages.dashboard'),
		url: '/dashboard',
		method: 'GET'
	}

}

// Base API
u.baseApi.url = u.baseUrl.url + 'api/v1/'

// URLs API, comienzan por la nomenclatura _
u._AuthLogin = { name: 'login', url: u.baseApi.url + 'auth/login', method: 'POST' }
u._AuthRegister = { name: 'register', url: u.baseApi.url + 'auth/register', method: 'POST' }
u._AuthUserData = { name: 'user_data', url: u.baseApi.url + 'auth/user-data', method: 'POST' }
u._AuthLogout = { name: 'logout', url: u.baseApi.url + 'auth/logout', method: 'POST' }
u._AuthRefresh = { name: 'refresh', url: u.baseApi.url + 'auth/refresh', method: 'POST' }

// Profile API
u._ProfileUpdate = { name: '', url: u.baseApi.url + 'auth/profile/update/', method: 'POST' }

// Export URLS
export const getURLs = {
	// URLs
	all: u,

	// Navbar Menu
	menu: [
		u.home,
		u.shop,
		u.contact,
		u.about
	]
}
export const urls = getURLs.all

export const go = (url: string) => {
	window.location.href = `${u.baseUrl.url}${url}`
}
