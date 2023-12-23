<template>
	<label v-if="isLabel"
		:for="id"
		class="block text-sm font-medium leading-6 text-gray-900"
	>
		{{ label }}
		<span
			v-if="important"
			class="text-red-800"
		>(*)</span>
	</label>
	<div class="mt-2">
		<select
			:id="id"
			:value="modelValue"
			:name="name"
			class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6"
			@input="updateValue"
		>
			<option
				v-for="(option, i) in options"
				:key="i"
				:value="i"
			>
				{{ option }}
			</option>
		</select>
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
	name: 'Select',
	props: {
		label: {
			type: String,
			required: true
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
		important: {
			type: Boolean,
			required: false,
			default: false
		},
		helpText: {
			type: String,
			required: false,
			default: ''
		},
		options: {
			required: true
		}
	},
	emits: ['update:modelValue'],
	methods: {
		updateValue (event: Event) {
			this.$emit('update:modelValue', event.target.value)
		}
	}
})
</script>
