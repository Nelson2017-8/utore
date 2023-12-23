<template>
	<section class="container px-5 mx-auto" :class="class">
		<div class="block">
			<h1 class="font-semibold text-xl mb-4">Tendencias de Productos</h1>
		</div>
		<div class="grid grid-cols-12 lg:gap-3 xl:gap-3 sm:gap-2 md:gap-2">
			<ProductCard :products="products"/>
		</div>
	</section>
</template>

<script lang="ts">
import { defineComponent } from 'vue'
import ProductCard from '@/components/cards/ProductCard.vue'
import { type ProductType } from '../../functions/interfaces'
import { useProductStore } from '../../stores/productStore'

export default defineComponent({
	name: 'HomeShop',
	components: {
		ProductCard
	},
	props: {
		class: {
			type: String,
			default: '',
			required: true
		}
	},
	data: () => ({
		products: [] as ProductType[]
	}),
	methods: {
		getProduct () {
			const products = [
				{
					id: 1,
					name: 'Zapatillas Running',
					category: 'Calzado',
					sponsor: 'Adidas',
					title: 'Zapatillas Adidas Galaxy 4',
					description: 'Zapatillas de running ligeras con amortiguación',
					price: 120,
					image: {
						url: 'https://picsum.photos/200/201',
						description: 'Zapatillas Adidas Galaxy 4 color negro',
						alt: 'Zapatillas Adidas Galaxy 4',
						title: 'Zapatillas Adidas Galaxy 4',
						class: ''
					},
					images: []
				},
				{
					id: 2,
					name: 'Macbook Pro 2022',
					category: 'Computadoras',
					sponsor: 'Apple',
					title: 'Macbook Pro 2022 16GB RAM 1TB SSD',
					description: 'La última Macbook Pro con el nuevo chip M2',
					price: 2499,
					image: {
						url: 'https://picsum.photos/200/200',
						description: 'Macbook Pro 2022 color gris espacial',
						alt: 'Macbook Pro 2022',
						title: 'Macbook Pro 2022',
						class: ''
					},
					images: []
				}
			]

			this.products = products
		},
		randomGenerateProduct (cantidad: number): ProductType[] {
			const store = useProductStore()
			return store.generarListaProductos(cantidad)
		}
	},
	mounted () {
		// this.getProduct()
		this.products = this.randomGenerateProduct(12)
	}
})
</script>
