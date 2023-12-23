<template>
	<div class="flex h-6 items-center">
		<input
			:id="name"
			type="checkbox"
			:name="name"
			class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600"
			:checked="modelValue" @change="updateValue"
		>
	</div>
	<div class="text-sm leading-6">
		<label
			:for="name"
			class="font-medium text-gray-900"
		>
			{{ label }}
			<span
				v-if="important"
				class="text-red-800"
			>(*)</span>
		</label>
		<p
			v-if="helpText!=''"
			class="text-gray-500"
		>
			{{ helpText }}
		</p>
	</div>
</template>

<script lang="ts">
import { defineComponent } from 'vue'

export default defineComponent({
	name: 'Checkbox',
	props: {
		name: {
			type: String,
			required: true
		},
		label: {
			type: String,
			required: true
		},
		modelValue: {
			type: Boolean,
			required: true
		},
		important: {
			type: Boolean,
			default: false
		},
		helpText: {
			type: String,
			default: ''
		}
	},
	emits: ['update:modelValue'],
	data: () => ({
		checkbox: false
	}),
	methods: {
		updateValue (event: Event) {
			this.$emit('update:modelValue', event.target.checked)
		}
	},
	mounted () {
		// this.checkbox = this.value
	}
})
</script>
