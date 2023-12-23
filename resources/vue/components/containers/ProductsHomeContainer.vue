<template>
	<section class="bg-gray-100">
		<section class="container mx-auto py-10">
			<section class="grid grid-cols-12 py-10">
				<div class="col-span-3">
					<SidebarOfertHome/>
				</div>
				<div class="col-span-9">
					<HomeShop class=""/>
				</div>
			</section>
		</section>
	</section>
</template>

<script lang="ts">
import { defineComponent } from 'vue'

import SidebarOfertHome from '@/components/sidebars/SidebarOfertHome.vue'
import HomeShop from '@/components/shop/HomeShop.vue'
export default defineComponent({
	name: 'ProductsHomeContainer',
	components: {
		HomeShop,
		SidebarOfertHome
	}
})
</script>
