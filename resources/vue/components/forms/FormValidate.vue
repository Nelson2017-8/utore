<template>
	<div :class="classObject">
		<slot name="input"></slot>
		<slot name="right"></slot>
		<div class="input-msg-errors" v-for="error of input.$errors" :key="error.$uid">
			<div class="error-msg">{{ error.$message }}</div>
		</div>
	</div>
</template>

<script lang="ts">
import { defineComponent } from 'vue'

export default defineComponent({
	name: 'FormValidate',
	components: {
	},
	props: {
		input: {
			type: Object,
			required: true
		},
		className: {
			type: String,
			default: ''
		},
		disableClassDefault: {
			type: Boolean,
			default: false
		}
	},
	computed: {
		classObject () {
			const styles = this.className
			return {
				styles,
				flex: !this.disableClassDefault,
				'flex-col': !this.disableClassDefault,
				'space-y-1': !this.disableClassDefault,
				'input-error': this.input.$errors.length > 0
			}
		}
	}
})
</script>
