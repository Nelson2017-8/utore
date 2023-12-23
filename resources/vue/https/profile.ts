import axios from 'axios'
import { urls } from '../functions/urls'

class Profile {
	async update (form: object, id: number) {
		return await new Promise((resolve, reject) => {
			axios.post(urls._ProfileUpdate.url + id, form)
				.then(async response => {
					resolve(response)
				})
				.catch(error => {
					reject(error)
				})
		})
	}
}

export default Profile
