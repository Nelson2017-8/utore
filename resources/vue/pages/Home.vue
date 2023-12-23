<template>
	<Header/>
	<Slider/>
	<Hero/>
	<Sponsor :sponsors="sponsors"/>
	<ProductsHomeContainer />
	<FooterMain/>
</template>

<script lang="tsx">
import { defineComponent } from 'vue'
import Header from '@/components/headers/Header.vue'
import Hero from '@/components/hero/Hero.vue'
import Slider from '@/components/sliders/Slider.vue'
import Sponsor from '@/components/sponsors/Sponsor.vue'
import { useSponsorStore } from '../stores/sponsorStore'
import { type SponsorsType } from '../functions/interfaces'
import ProductsHomeContainer from '@/components/containers/ProductsHomeContainer.vue'
import FooterMain from '@/components/Footers/FooterMain.vue'

const sponsorsData: SponsorsType = [
	{
		sponsor: 'Proveedor 1',
		url: '/sponsors/1',
		logo: 'https://picsum.photos/125/125',
		description: 'string'
	},
	{
		sponsor: 'Proveedor 2',
		url: '/sponsors/2',
		logo: 'https://picsum.photos/125/126',
		description: 'string'
	},
	{
		sponsor: 'Proveedor 3',
		url: '/sponsors/3',
		logo: 'https://picsum.photos/126/125',
		description: 'string'
	},
	{
		sponsor: 'Proveedor 4',
		url: '/sponsors/1',
		logo: 'https://picsum.photos/126/126',
		description: 'string'
	},
	{
		sponsor: 'Proveedor 5',
		url: '/sponsors/2',
		logo: 'https://picsum.photos/124/124',
		description: 'string'
	},
	{
		sponsor: 'Proveedor 6',
		url: '/sponsors/3',
		logo: 'https://picsum.photos/127/127',
		description: 'string'
	},
	{
		sponsor: 'Proveedor 7',
		url: '/sponsors/1',
		logo: 'https://picsum.photos/125/127',
		description: 'string'
	},
	{
		sponsor: 'Proveedor 8',
		url: '/sponsors/8',
		logo: 'https://picsum.photos/127/125',
		description: 'string'
	}
]
export default defineComponent({
	name: 'Home',
	components: {
		FooterMain,
		ProductsHomeContainer,
		Sponsor,
		Slider,
		Hero,
		Header
	},
	data: () => ({

	}),
	computed: {
		sponsors: () => {
			const store = useSponsorStore()
			store.set(sponsorsData)

			return store.sponsors
		}
	}
})
</script>
