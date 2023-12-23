<template>
    <div>
        <label
            :for="id"
            class="block text-sm font-medium leading-6 text-gray-900"
        >
            {{ label }}
            <span class="text-red-800" v-if="important">(*)</span>
        </label>

        <div class="mt-2">
            <input
                :id="id"
                :name="name"
                type="file"
                :required="required"
                :placeholder="placeholder"
                v-validate="rules"
                @fileChanged="$emit('onFileChanged')"
                @change="onFileChange"
                class="block w-full rounded-md border border-gray-300 px-3 py-2 text-gray-900 shadow-sm focus:border-blue-500 focus:ring-blue-500"
            >
        </div>

        <p v-if="helpText" class="mt-2 text-sm text-gray-500">{{ helpText }}</p>

    </div>
</template>

<script lang="ts">
import { defineComponent } from 'vue'
import { fileBase64 } from '@/functions/FileBase64'

export default defineComponent({
    data() {
        return {
            file: null,
            base64: null
        }
    },

    methods: {
        onFileChange (event: Event) {
            if (event.target != null) {
                this.file = event.target.files[0]
                this.base64 = fileBase64(event)
                console.log(this.base64)
                this.$emit('fileChanged', this.file)
            }
        }
    },
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
        model: {
            type: String,
            required: true
        },
        rules: {
            type: String,
            required: false,
            default: 'image' // 'required|image'
        },
        required: {
            type: Boolean,
            required: false,
            default: false
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
        }
    }
})

</script>
