<template>

	<aside class="p-4 rounded-lg">

		<h3 class="font-semibold text-xl mb-4">Ofertas Especiales</h3>

		<div class="text-sm">
			<p class="font-semibold mb-2">20% de descuento en electrónicos</p>
			<p>Aprovecha nuestra promoción por tiempo limitado en artículos seleccionados de electrónica, como laptops,
				celulares, tablets y más.</p>
		</div>

		<div class="border-t border-gray-300 my-4"></div>

		<div class="text-sm">
			<p class="font-semibold mb-2">Lleva 3, paga 2 en Ropa Deportiva</p>
			<p>No te pierdas esta oferta exclusiva en nuestra sección de ropa y calzado deportivo. ¡Date prisa!</p>
		</div>

		<div class="border-t border-gray-300 my-4"></div>

		<a href="#" class="inline-block bg-indigo-500 text-white rounded-lg px-4 py-2 mt-4 hover:bg-indigo-600">
			Ver todas las ofertas
		</a>
	</aside>

</template>

<script lang="ts">
import { defineComponent } from 'vue'

export default defineComponent({
	name: 'SidebarOfertHome'
})
</script>
