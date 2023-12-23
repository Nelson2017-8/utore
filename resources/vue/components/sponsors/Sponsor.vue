<script lang="ts">
import { defineComponent, type PropType } from 'vue'
import { type SponsorsType } from '../../functions/interfaces'

export default defineComponent({
	name: 'Sponsor',
	props: {
		sponsors: {
			type: Array as PropType<SponsorsType>,
			required: true
		}
	}
})
</script>

<template>
	<section class="sponsor">
		<section class="py-9">

			<h2 class="text-3xl font-medium text-center mb-8">Nuestros Proveedores</h2>

			<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

				<div class="grid grid-cols-2 gap-8 md:grid-cols-3 lg:grid-cols-8">

					<div class="col-span-1 text-center" v-for="sponsor in sponsors" :key="sponsor.sponsor">
						<a :href="sponsor.url" class="sponsor-ancla">
							<div class="sponsor-logo">
								<img :src="sponsor.logo" :alt="sponsor.sponsor">
							</div>
							<h1 class="text-lg py-2 font-medium">{{ sponsor.sponsor }}</h1>
						</a>
					</div>

				</div>

			</div>

		</section>

	</section>
</template>
