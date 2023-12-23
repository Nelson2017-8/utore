<template>
  <section id="login" class="bg-gray-100 w-full">
    <LoginContainer />
  </section>
</template>

<script lang="tsx">
import { defineComponent } from 'vue'
import LoginContainer from '@/components/containers/LoginContainer.vue'
export default defineComponent({
	name: 'Login',
	components: {
		LoginContainer
	}
})
</script>
