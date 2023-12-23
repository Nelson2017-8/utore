<template>
	<div>
		<Dashboard/>
	</div>
</template>

<script lang="ts">
import { defineComponent } from 'vue'
import Dashboard from "@/components/layaout/Dashboard.vue";

export default defineComponent({
	name: 'Profile',
	components: {
		Dashboard
	}
})
</script>
