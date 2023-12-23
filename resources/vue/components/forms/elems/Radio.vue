<script lang="ts">
import { defineComponent } from 'vue'
import { ValidationRules, OptionsInterface } from '@/functions/interfaces'

export default defineComponent({
    name: 'Radio',
    props: {
        name: {
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
        options: {
            type: OptionsInterface,
            required: true
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
    <div
        v-for="radio in options"
        :key="radio.op.id"
        class="flex items-center gap-x-3"
    >
        <input
            :id="radio.op.id"
            :value="modelValue" @input="updateValue"
            type="radio"
            :rules="rules"
            :name="name"
            :required="radio.op.required"
            class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600"
        >
        <label
            :for="radio.op.id"
            class="block text-sm font-medium leading-6 text-gray-900"
        >
            {{ radio.option.name }}
            <span
                v-if="radio.op.isImportant"
                class="text-red-800"
            >(*)</span>
        </label>
    </div>
</template>
