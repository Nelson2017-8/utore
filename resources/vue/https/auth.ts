import axios from 'axios'
import { getURLs } from '../functions/urls'
import { type formLoginType } from '../functions/interfaces'

const URLs = getURLs.all
class Auth {
	async setup (data: object) {
		// Guardamos el token
		localStorage.setItem('token', data.authorization.token)
	}

	// Check de token expirado
	async checkTokenExp (): Promise<boolean> {
		const token = localStorage.getItem('token')

		if (token === null) {
			return true
		}

		// Decode JWT token
		const decoded = JSON.parse(atob(token.split('.')[1]))

		// Comprobamos expiration
		if (decoded.exp < Date.now() / 1000) {
			// Token expirado
			localStorage.removeItem('token')
			return true
		}

		return false
	}

	async login (form: formLoginType) {
		return await new Promise((resolve, reject) => {
			axios.post(URLs._AuthLogin.url, form)
				.then(async response => {
					resolve(response)
				})
				.catch(error => {
					reject(error)
				})
		})
	}

	async register (form: object) {
		return await new Promise((resolve, reject) => {
			axios.post(URLs._AuthRegister.url, form)
				.then(async response => {
					resolve(response)
				})
				.catch(error => {
					reject(error)
				})
		})
	}

	async logout () {
		return await new Promise((resolve, reject) => {
			axios.post(URLs._AuthLogout.url)
				.then(response => {
					resolve(response)
				})
				.catch((error: Error) => {
					reject(error)
				})
		})
	}

	async getUser () {
		return await new Promise((resolve, reject) => {
			axios.post(URLs._AuthUserData.url)
				.then(response => {
					resolve(response)
				})
				.catch(error => {
					reject(error)
				})
		})
	}
}

export default Auth

/**
 * import { ref } from 'vue'
import axios from 'axios'

const api = axios.create({
	baseURL: '/api'
})

export default function useAPI() {

	const loading = ref(false)
	const error = ref(null)

	const request = async (url, options) => {
		loading.value = true
		error.value = null

		try {
			const response = await api(url, options)
			return response.data
		} catch (err) {
			error.value = err
			return Promise.reject(err)
		} finally {
			loading.value = false
		}
	}

	return {
		loading,
		error,
		request
	}

}
**/

/**
 *
 * **USO**
 * import { ref } from 'vue'
 * import useAPI from '@/api'
 * export default {
 *   setup() {
 *     const api = useAPI()
 *     const data = ref(null)
 *     api.request('/some-url').then(response => {
 *      data.value = response
 *     })
 *     return { api, data }
 *   }
 * }
 **/
