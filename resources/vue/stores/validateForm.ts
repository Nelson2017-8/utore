// stores/validateForm.js
import { defineStore } from 'pinia'

export const useValidateFormStore = defineStore('validateForm', {
	state: () => {
		return {
			validate: true satisfies boolean,
			form: {} satisfies object
		}
	},
	actions: {
		setForm (form: object) {
			for (const i in form) {
				this.form[form[i].name] = form[i].model
				console.log(form[i].name)
				console.log(form[i].model)
			}
			// this.form = form
		},
		validation (form: object) {
			for (const i in form) {
				if (form[i].isValidate === true) {
					this.validate = false
					return
				}
			}

			this.validate = true
		}
	}
})
/***
     import { useCounterStore } from './stores/validateForm'

    const counter = useCounterStore()

    counter.count++
    // with autocompletion ✨
    counter.$patch({ count: counter.count + 1 })
    // or using an action instead
    counter.increment()
 **/
