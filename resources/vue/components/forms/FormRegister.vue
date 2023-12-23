<template>
	<form class="flex flex-col space-y-5 w-full" @submit.prevent="send" ref="formRef">
		<FormValidate :input="v$.form.username">
			<template #input>
				<Input id="username" v-model="v$.form.username.$model" :label="$t('forms.username')" name="username"/>
			</template>
		</FormValidate>

		<FormValidate :input="v$.form.email">
			<template #input>
				<Input id="email" v-model="v$.form.email.$model" :label="$t('forms.email')" name="email" type="email"/>
			</template>
		</FormValidate>

		<FormValidate :input="v$.form.password">
			<template #input>
				<Input id="password" v-model="v$.form.password.$model" :label="$t('forms.password')" name="password" type="password"/>
			</template>
		</FormValidate>

		<FormValidate :input="v$.confirm_password">
			<template #input>
				<Input id="confirm_password" v-model="v$.confirm_password.$model" :label="$t('forms.confirm_password')" name="password" type="password"/>
			</template>
		</FormValidate>

		<div>
			<button type="submit" class="btn-primary w-full px-4 py-2 text-lg font-semibold">
				{{ $t('buttons.register') }}
			</button>
		</div>
	</form>
</template>

<script lang="ts">
import { defineComponent, ref } from 'vue'
import Input from '@/components/forms/elems/Input.vue'
import Auth from '@/https/auth'
import FormValidate from '@/components/forms/FormValidate.vue'
import { useVuelidate } from '@vuelidate/core'
import { required, minLength, maxLength, email, sameAs } from '@/i18n/i18n-validators'
import { t } from '@/i18n'
import { getURLs } from '@/functions/urls'
import Errors from '@/https/errors'

export default defineComponent({
	name: 'FormRegister',
	components: {
		Input,
		FormValidate
	},
	props: {},
	setup () {
		const auth = new Auth()
		const formRef = ref(null)

		return {
			auth,
			formRef,
			errors: new Errors(),
			v$: useVuelidate()
		}
	},
	data: () => ({
		form: {
			email: '',
			password: '',
			username: ''
		},
		confirm_password: '',
		urls: getURLs.all
	}),
	validations () {
		return {
			form: {
				email: {
					required: required,
					email: email,
					minLength: minLength(4),
					maxLength: maxLength(255)
				},
				password: {
					required,
					minLength: minLength(8),
					maxLength: maxLength(25)
				},
				username: {
					required,
					minLength: minLength(3),
					maxLength: maxLength(25)
				}
			},
			confirm_password: {
				required,
				minLength: minLength(3),
				maxLength: maxLength(25),
				sameAs: sameAs(this.form.password)
			}
		}
	},
	methods: {
		async send () {
			// eliminar espacios en blanco
			this.form.email = this.form.email.trim()

			// validacion de campos
			const isFormCorrect = await this.v$.$validate()
			if (!isFormCorrect) return

			// intento de registro
			await this.auth.register(this.form).then((response) => {
				console.log(response)
				// si todo sale bien
				if (response.status === 200) {
					// redireccionar a login
					this.$router.push('/login')
				} else {
					// mostrar error
					// console.log(response)
					this.$toast.error(t('forms.errors.register.general'))
				}
			}).catch((error: never) => {
				const errorValidationForm = this.errors.is422(error)
				for (const errorValidationFormElement of errorValidationForm) {
					this.$toast.error(errorValidationFormElement)
					console.log(errorValidationFormElement)
				}
			})
		}
	},
	mounted () {
	}
})
</script>
