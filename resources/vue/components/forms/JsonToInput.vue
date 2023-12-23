<template>
	<div v-if="dataInput.isParse">
		<Input v-if="dataInput.form == 'input'"
			   :placeholder="dataInput.placeholder"
			   :type="dataInput.type"
			   :label="dataInput.label"
			   :id="dataInput.name"
			   :name="dataInput.name"
			   v-model="dataInput.model"
			   :isLabel="false"
		/>
		<Select v-else-if="dataInput.form == 'select'"
				:options="dataInput.options"
				:label="dataInput.label"
				:id="dataInput.name"
				:name="dataInput.name"
				v-model="dataInput.model"
				:isLabel="false"
		/>
		<div v-if="dataInput.isValidate" :class="classObject">
			<div class="input-msg-errors" v-for="error of v$.$errors" :key="error.$uid">
                <div class="error-msg">{{ error.$message }}</div>
            </div>
		</div>
	</div>

</template>

<script lang="ts">
import { ref, reactive, computed, toRef } from 'vue'
import Input from '@/components/forms/elems/Input.vue'
import { formattedRule } from '@/functions/utils'
import { useVuelidate } from '@vuelidate/core'
import Select from "@/components/forms/elems/Select.vue";
import { required, minLength, maxLength, email } from '@/i18n/i18n-validators'

const dataInput = {
	form: '',
	type: '',
	label: '',
	name: '',
	className: '',
	placeholder: '',
	model: '',
	isParse: false,
	isValidate: false,
	validation: [],
	options: []
}
const campoValidate = ref([])
export default {
	props: ['jsonInput'],
	emits: ['value-emit', 'validate-emit'],
	components: {
		Select,
		Input
	},
	validations () {
		return {}
	},
	data: () => ({
		dataInput,
		campoValidate
	}),
	setup (props) {
		const jsonInput = toRef(props, 'jsonInput')
		// console.log('jsonInput')
		// console.log(jsonInput)
		const valid = jsonInput.value.validation
		const objRules = {}
		if (valid !== null) {
			// console.log('valid', valid)
			const min = valid.minLength || false
			const max = valid.maxLength || false
			const requiredValue = valid.required || false
			const emailValue = valid.email || false
			if (min !== false) {
				objRules.minLength = minLength(min)
				// console.log('min', min)
			}
			if (max !== false) {
				objRules.maxLength = maxLength(max)
				// console.log('maxLength', max)
			}
			if (requiredValue !== false) {
				objRules.required = required
				// console.log('required', requiredValue)
			}
			if (emailValue !== false) {
				objRules.email = email
				// console.log('email', emailValue)
			}
		}
		// console.log(objRules, name)
		return {
			v$: useVuelidate(objRules, reactive(campoValidate))
		}
	},
	watch: {
		jsonInput (newValue, oldValue) {
			this.parseData(newValue)
		},
		'dataInput.model': {
			async handler (newVal, oldVal) {
				// hacer algo cuando cambie
				// console.log('newVal', newVal)
				// console.log('campoValidate', this.campoValidate)
				this.campoValidate = newVal
				// console.log('$v', this.v$)
				// console.log('campoValidate', this.campoValidate)
				const isValidate = await this.v$.$validate()

				this.dataInput.isValidate = false
				if (this.dataInput.validation !== null) {
					if (!isValidate) {
						this.dataInput.isValidate = true
						// this.$toast.error('Error validate')
					} else {
						this.dataInput.isValidate = false
						// this.$toast.success('Success validate')
					}
				}
				this.$emit('value-emit', newVal)
				this.$emit('validate-emit', this.dataInput.isValidate)
				// console.log('this.dataInput.isValidate', this.dataInput.isValidate)
			},
			deep: true
		}
	},
	methods: {
		parseData (object) {
			// eslint-disable-next-line no-unused-vars,@typescript-eslint/no-unused-vars
			const formatted = formattedRule(this.jsonInput.type)
			// console.log(formatted)
			const from = formatted[0]
			const type = formatted[1]
			this.dataInput.isParse = true
			this.dataInput.model = object.model || ''
			this.dataInput.placeholder = object.placeholder
			this.dataInput.name = object.name
			this.dataInput.label = object.label
			this.dataInput.className = ''
			this.dataInput.form = from
			this.dataInput.type = type || 'text'

			if (from === 'select' || from === 'checkbox' || from === 'radio') {
				this.dataInput.options = this.jsonInput.options || this.jsonInput.options_lang
			}
		}
	},
	computed: {
		classObject () {
			return {
				// styles,
				'flex-col': this.dataInput.isValidate,
				'space-y-1': this.dataInput.isValidate,
				'input-error': this.dataInput.isValidate
			}
		}
	},
	mounted () {
		void this.$nextTick(() => {
			this.parseData(this.jsonInput)
		})
	}
}
</script>
