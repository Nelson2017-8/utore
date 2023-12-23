<script lang="ts">
import { defineComponent } from 'vue'
import { ValidationRules } from '@/functions/interfaces'

export default defineComponent({
    name: 'TextArea',
    props: {
        label: {
            type: String,
            required: true
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
        rules: {
            type: ValidationRules,
            required: false,
            default: {}
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
        helpText: {
            type: String,
            required: false,
            default: ''
        },
        rows: {
            type: String,
            required: false,
            default: '3'
        },
        required: {
            type: Boolean,
            required: false,
            default: false
        }
    },
	emits: ['update:modelValue'],
	methods: {
		updateValue (event: Event) {
			this.$emit('update:modelValue', event.target.value)
		}
	},
})
</script>

<template>
    <label
        :for="id"
        class="block text-sm font-medium leading-6 text-gray-900"
    >
        {{ label }} <span
        v-if="important"
        class="text-red-800"
    >(*)</span>
    </label>
    <div class="mt-2">
    <textarea
        :id="id"
        :value="modelValue" @input="updateValue"
        :name="name"
        :placeholder="placeholder"
        :rows="rows"
        :rules="rules"
        :required="required"
        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
    />
    </div>
    <p
        v-if="helpText!=''"
        class="mt-3 text-sm leading-6 text-gray-600"
    >
        {{ helpText }}
    </p>
</template>
