<script lang="ts">
import {defineComponent} from 'vue'

export default defineComponent({
	name: "Dashboard"
})
</script>

<template>
  <div class="container-fluid">
	  Dashboard
	  <router-link to="/dashboard/profile">Volver</router-link>
  </div>
</template>

<style scoped>

</style>
