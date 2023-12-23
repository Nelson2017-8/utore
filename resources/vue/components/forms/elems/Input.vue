<template>
	<label v-if="isLabel" :for="id" class="block text-sm font-medium leading-6 text-gray-900">{{ label }} <span v-if="important" class="text-red-800">(*)</span></label>
	<div class="mt-2">
		<input
			:id="id"
			:value="modelValue"
			:type="type"
			:name="name"
			:placeholder="placeholder"
			@input="updateValue"
			class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
		>
	</div>
	<p
		v-if="helpText!=''"
		class="mt-3 text-sm leading-6 text-gray-600"
	>
		{{ helpText }}
	</p>
</template>

<script lang="ts">
import { defineComponent } from 'vue'

export default defineComponent({
	props: {
		label: {
			type: String,
			required: false
		},
		isLabel: {
			type: Boolean,
			required: false
		},
		name: {
			type: String,
			required: true
		},
		id: {
			type: String,
			required: true
		},
		modelValue: {
			type: String,
			required: true
		},
		placeholder: {
			type: String,
			required: false
		},
		important: {
			type: Boolean,
			required: false,
			default: false
		},
		type: {
			type: String,
			required: false,
			default: 'text'
		},
		helpText: {
			type: String,
			required: false,
			default: ''
		}
	},
	data () {
		return {
		}
	},
	emits: ['update:modelValue'],
	methods: {
		updateValue (event: Event) {
			const value = (event.target as HTMLInputElement).value
			// console.log(event.target.value)
			// console.log(value)
			this.$emit('update:modelValue', value)
		}
	}

})

</script>
