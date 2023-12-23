import { t } from '@/i18n'
class Errors {
	public data: object = {}
	public errors = []
	public errorsValidate = ['validation.unique', 'validation.required', 'validation.max', 'validation.min', 'validation.email']

	public checkError (error: string, input: string) {
		let err = ''
		switch (error) {
			case 'validation.unique':
				err = t('forms.errors.unique', input)
				break

			case 'validation.required':
				err = t('forms.errors.required', input)
				break

			case 'validation.email':
				err = t('forms.errors.email', input)
				break

			case 'validation.number':
				err = t('forms.errors.number', input)
				break
			default:
				err = t('forms.errors.default', input)
				break
		}

		return err
	}

	// Error de validación de formulario
	is422 (error) {
		let errors_array = []
		// console.log(error)
		if (error.response.status === 422) {
			const errors = error.response.data.errors
			// console.log(errors)
			for (const key in errors) {
				const item = errors[key]

				for (const i in item) {
					const err = this.checkError(item[i], key)
					errors_array.push(err)
				}
			}
		}
		return errors_array
	}
}

export default Errors
