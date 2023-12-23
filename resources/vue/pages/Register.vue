<template>
	<section id="register" class="bg-gray-100 w-full">
		<RegisterContainer/>
	</section>
</template>

<script lang="tsx">
import { defineComponent } from 'vue'
import RegisterContainer from '@/components/containers/RegisterContainer.vue'

export default defineComponent({
	name: 'Register',
	components: {
		RegisterContainer
	}
})
</script>
