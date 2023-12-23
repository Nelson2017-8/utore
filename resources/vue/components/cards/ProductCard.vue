<script lang="ts">
import { defineComponent, type PropType, ref } from 'vue'
import { type ProductType } from '../../functions/interfaces'
import { equalHeight, cropText } from '../../functions/DOM'
import { usePreloadImagesStore } from '../../stores/preloadImagesStore'

export default defineComponent({
	name: 'ProductCard',
	props: {
		products: {
			type: Array as PropType<ProductType[]>,
			required: true
		}
	},
	setup () {
		const animation = ref([])
		const preloadImagesStore = usePreloadImagesStore()
		return {
			animation,
			preloadImagesStore
		}
	},
	data: () => ({
	}),
	mounted () {
		setTimeout(() => {
			equalHeight(this.animation.map(el => el.querySelector('.shadow')))
			this.preloadResources()
		}, 100)
	},
	methods: {
		onHover (toggle: boolean, index: number) {
			// console.log(this.animation)
			// console.log(this.animation[index])
			// console.log(this.animation[index].querySelector('img'))
			// console.log(this.animation[index].querySelector('img').classList)
			// console.log(this.animation[index].children)
			const el = this.animation[index]
			if (toggle) {
				el.querySelector('.shadow').classList.add('shadow-2xl')
				el.querySelector('img').classList.add('transform')
				el.querySelector('img').classList.add('scale-125')
			} else {
				el.querySelector('.shadow').classList.remove('shadow-2xl')
				el.querySelector('img').classList.remove('transform')
				el.querySelector('img').classList.remove('scale-125')
			}
		},
		cropText (text: string, max: number) {
			return cropText(text, max)
		},
		preloadResources (): void {
			const images = this.products.map(product => product.image.url)
			const el = this.animation
			this.preloadImagesStore.load(images, el)
		}
	}
})
</script>

<template>
	<div
		v-for="(product, index) in products"
		:id="`product-${product.id}`"
		:key="product.id"
		:ref="el => animation[index] = el"
		class="lg:col-span-4 xl:col-span-4 md:col-span-6 sm:md:col-span-6"
		@mouseover="onHover(true, index)"
		@mouseout="onHover(false, index)"
	>
		<div class="text-xs p-4 w-full border rounded-lg shadow bg-white transition duration-300 hover:cursor-pointer">
			<a class="block relative h-32 rounded overflow-hidden">
				<img
					:alt="product.image.alt"
					:title="product.image.title"
					class="object-cover object-center w-full h-full block transition duration-300 product"
				>
			</a>
			<div class="mt-4">
				<h3 class="text-gray-500 text-xs tracking-widest title-font mb-1">
					{{ product.category }}
				</h3>
				<h2 class="text-gray-900 title-font text-base font-medium">
					{{ cropText(product.title, 35) }}
				</h2>
				<p class="mt-1">
					${{ product.price }}
				</p>
			</div>
		</div>

	</div>

</template>
