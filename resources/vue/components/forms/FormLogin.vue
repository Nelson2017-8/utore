<template>
	<form class="flex flex-col space-y-5" @submit.prevent="send" ref="formRef">
		<FormValidate :input="v$.form.email">
			<template #input>
				<Input id="email" v-model="v$.form.email.$model" label="Correo electronico" name="email" type="email"/>
			</template>
		</FormValidate>

		<FormValidate :input="v$.form.password">
			<template #input>
				<div class="flex items-center justify-between">
					<label for="password" class="block text-sm font-medium leading-6 text-gray-900">Contraseña</label>
					<router-link :to="urls.forgot.url" class="text-xs text-blue-600 hover:underline focus:text-blue-800">¿Olvidaste tu contraseña?</router-link>
				</div>
				<div class="mt-4">
					<input id="password" v-model="v$.form.password.$model" type="password" name="password" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
				</div>
			</template>
		</FormValidate>

		<div class="flex items-center space-x-2">
			<Checkbox name="remember" label="Recordar me" v-model="form.remember"/>
		</div>
		<div>
			<button type="submit" class="btn-primary w-full text-lg font-semibold">
				Iniciar Sesion
			</button>
		</div>
		<div class="flex flex-col space-y-5">
			<span class="flex items-center justify-center space-x-2">
				<span class="h-px bg-gray-400 w-14"></span>
				<span class="font-normal text-gray-500">o iniciar con</span>
				<span class="h-px bg-gray-400 w-14"></span>
			</span>
			<div class="flex flex-col space-y-4">
				<ButtonGithub href="/"/>
				<ButtonTwitter href="/"/>
			</div>
		</div>
	</form>
</template>

<script lang="ts">
import { defineComponent, ref } from 'vue'
import Input from '@/components/forms/elems/Input.vue'
import ButtonGithub from '@/components/buttons/social/ButtonGithub.vue'
import ButtonTwitter from '@/components/buttons/social/ButtonTwitter.vue'
import { type formLoginInterface } from '@/functions/interfaces'
import Auth from '@/https/auth'
import Checkbox from '@/components/forms/elems/Checkbox.vue'
import FormValidate from '@/components/forms/FormValidate.vue'
import { useVuelidate } from '@vuelidate/core'
import { required, minLength, maxLength, email } from '@/i18n/i18n-validators'
import { getURLs } from '@/functions/urls'
import { t } from '@/i18n'
import Errors from '@/https/errors'

export default defineComponent({
	name: 'FormLogin',
	components: {
		Checkbox,
		Input,
		ButtonTwitter,
		ButtonGithub,
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
			remember: false
		} satisfies formLoginInterface,
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
				}
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
			await this.auth.login(this.form).then((response) => {
				console.log(response)
				// si todo sale bien
				if (response.status === 200) {
					// redireccionar a login
					this.$router.push()
				} else {
					// mostrar error
					this.$toast.error(t('forms.errors.login.general'))
				}
			}).catch((error: never) => {
				const errorValidationForm = this.errors.is422(error)
				for (const errorValidationFormElement of errorValidationForm) {
					this.$toast.error(errorValidationFormElement)
				}
			})
		}
	}
})
</script>
