<template>
	<div>
		<div class="flex flex-col space-y-6 md:space-y-0 md:flex-row justify-between">
			<div class="mr-6">
				<h1 class="text-4xl font-semibold mb-2">Dashboard</h1>
				<h2 class="text-gray-600 ml-0.5">Mobile UX/UI Design course</h2>
			</div>
			<div class="flex flex-wrap items-start justify-end -mb-3">
				<button
					class="inline-flex px-5 py-3 text-purple-600 hover:text-purple-700 focus:text-purple-700 hover:bg-purple-100 focus:bg-purple-100 border border-purple-600 rounded-md mb-3">
					<svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor"
						 class="flex-shrink-0 h-5 w-5 -ml-1 mt-0.5 mr-2">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
							  d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
					</svg>
					Manage dashboard
				</button>
				<button
					class="inline-flex px-5 py-3 text-white bg-purple-600 hover:bg-purple-700 focus:bg-purple-700 rounded-md ml-6 mb-3">
					<svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor"
						 class="flex-shrink-0 h-6 w-6 text-white -ml-1 mr-2">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
							  d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
					</svg>
					Create new dashboard
				</button>
			</div>
		</div>
		<section class="flex flex-col col-span-12 justify-between mt-8" v-cloak v-if="user != null">
			<div class="flex flex-col col-span-12 pt-8 pb-14 px-12 bg-white shadow-xl rounded-lg">
				<div class="flex flex-col col-span-12">
					<h1 class="text-xl font-medium"> {{ $t('contents.dashboard.account_information') }}</h1>
					<h2 class="text-gray-500 text-sm">{{ $t('contents.dashboard.account_information_sub') }}</h2>
				</div>
				<div class="flex flex-col col-span-12 mt-4">
					<div class="inline-flex my-6">
						<div>
							<img class="w-32 h-32 rounded-full mx-auto" src='https://picsum.photos/125/126' alt='title'/>
						</div>
						<div class="ml-12">
							<h1 class="text-xl font-bold mt-5">{{ user.username }}</h1>
							<p class="text-gray-700">{{ user.email }}</p>
						</div>
					</div>
				</div>
				<div class="flex flex-col" v-if="editable != null">
					<div class="overflow-x-auto">
						<table class="table-auto border-0">
							<tbody>
							<tr v-for="(obj, i) in editable.edit" :key="i">
								<td class="px-4 py-2 font-bold">{{ $t(obj.label) }}</td>
								<td class="px-4 py-2">
									<div v-if="!obj.editing">
										<div v-if="obj.hidden_value">***********</div>
										<div v-else>{{ obj.value || 'No definido' }}</div>
									</div>
									<div v-else>
										<AutoInput :json-input="setObjectInput(obj)" @validate-emit="validate(obj, $event)" @value-emit="updateValue(obj, $event)"/>
									</div>
								</td>
								<td class="px-4 py-2">
									<a @click="btnEdit(obj, i)" class="text-sm text-blue-500 cursor-pointer hover:underline" v-if="!obj.editing">Editar</a>
									<a @click="btnUpdate(i, obj.value, obj)" class="text-sm text-blue-500 cursor-pointer hover:underline" v-else>Actualizar</a>
								</td>
							</tr>
							</tbody>
						</table>
					</div>
					<div class="mt-4">
						<button class="btn-primary" @click="btnUpdateForm">Guardar</button>
					</div>
				</div>

			</div>
		</section>
	</div>
</template>
<script lang="ts">
import { defineComponent } from 'vue'
import JsonToInput from '@/components/forms/JsonToInput.vue'
import { useValidateFormStore } from '@/stores/validateForm'
import Profile from '@/https/profile'
import AutoInput from '@/components/forms/AutoInput.vue'
import { objectInput } from '@/functions/utils'

export default defineComponent({
	name: 'ProfileDashboard',
	components: {
		AutoInput,
		JsonToInput
	},
	props: {
		user: {
			required: true
		}
	},
	data () {
		return {
			editable: null
		}
	},
	setup () {
		const formPinia = useValidateFormStore()
		return {
			formPinia,
			profile: new Profile()
		}
	},
	computed: {
	},
	methods: {
		setObjectInput (obj: object) {
			return objectInput(obj)
		},
		btnEdit (obj, i) {
			/* console.log(obj)
				{
					"name": "first_name",
					"label": "label_key",
					"value": null,
					"editing": false,
					"type": "input",
					"validation": {
						"minLength": 3,
						"maxLength": 50
					},
					"placeholder": "",
					"model": null,
					"hidden_value": false
				}
			 */
			// console.log(i) // first_name
			// console.log(obj, i)
			obj.editing = !obj.editing
		},
		btnUpdate (name, value, obj) {
			obj.editing = !obj.editing
		},
		updateValue (obj, event) {
			// console.log(obj)
			// console.log(event)
			// obj.value = event
			// console.log('update')
			// console.log(obj, event)

			if (event === '' || event === null) {
				obj.model = null
				obj.value = null
			} else {
				obj.model = event
				obj.value = event
			}
		},
		validate (obj, event) {
			// console.log('validate')
			// console.log(obj, event)
			obj.isValidate = event
		},
		async btnUpdateForm () {
			// console.log(this.editable.edit)
			const FORM = this.editable.edit
			// valido el formulario
			this.formPinia.validation(FORM)

			// si el formulario es valido
			if (this.formPinia.validate) {
				// seteo el formulario
				this.formPinia.setForm(FORM)

				console.log(this.formPinia.form)
				// envio el formulario
				/**const response = await this.profile.update(this.formPinia.form, this.user.id)
				response.then(response => {
					// console.log(response)
					if (response.status === 200) {
						this.$toast.success('Datos actualizados')
					} else {
						this.$toast.error('Error al actualizar los datos')
						this.$toast.error(response.data.message)
					}
				}).catch(error => {
					this.$toast.error('Error al actualizar los datos')
					this.$toast.error(error.message)
				})**/
			} else {
				// si el formulario no es valido
				this.$toast.error('El formulario no es valido')
			}
		}
	},
	mounted () {
		void this.$nextTick(() => {
			// Ejecutar la función después de que todos los recursos estén cargados
			this.editable = this.user
		})
	},
	watch: {
		user (newValue, oldValue) {
			// console.log('newValue')
			this.editable = newValue
		}
	}
})
</script>
