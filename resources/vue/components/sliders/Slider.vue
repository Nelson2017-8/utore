<template>
	<Carousel ref="carousel" v-bind="settings" :autoplay="5000" :wrap-around="true">
		<Slide v-for="slide in 3" :key="slide">
			<div class="carousel__item">
				<img :src="`/img/slider/${slide}.jpg`" alt="slider">
			</div>

		</Slide>

		<template #addons>
			<Navigation/>
			<Pagination/>
		</template>
	</Carousel>
</template>

<script lang="ts">
import { defineComponent } from 'vue'
// If you are using PurgeCSS, make sure to whitelist the carousel CSS classes
import 'vue3-carousel/dist/carousel.css'
import { Carousel, Slide, Pagination, Navigation } from 'vue3-carousel/dist/carousel.es.js'
export default defineComponent({
	name: 'Slider',
	components: {
		Carousel,
		Slide,
		Pagination,
		Navigation
	},
	data: () => ({
		// carousel settings
		settings: {
			itemsToShow: 1,
			snapAlign: 'center'
		}
	})
})
</script>

<style>
.carousel__item {
	max-height: 400px;
	width: 100%;
	background-color: #000;
	color: #ffffff;
	font-size: 20px;
	border-radius: 0;
	display: flex;
	justify-content: center;
	align-items: center;
}
.carousel__item img {
	width: 100%;
	min-width: 100%;
}

.carousel__slide {
	/* padding: 10px; */
	padding: 0;
}

/*.carousel__prev,
.carousel__next {
  box-sizing: content-box;
  border: 5px solid white;
}*/
.carousel__prev {
	border-bottom-right-radius: 30px;
	border-top-right-radius: 30px;
}
.carousel__next {
	border-bottom-left-radius: 30px;
	border-top-left-radius: 30px;
}
.carousel__prev,
.carousel__next {
	transition: .25s linear;
	height: 60px;
	width: 50px;
	margin-left: 3px;
	margin-right: 3px;
}
.carousel__prev:hover,
.carousel__next:hover {
	background-color: #fff;
	margin-left: -5px;
	margin-right: -5px;

}
.carousel__prev:hover .carousel__icon,
.carousel__next:hover .carousel__icon {
	color: #000;
}
.carousel__icon {
	color: white;
}

.carousel__pagination-button::after {
	background: transparent;
	border: 2px solid #fff;
	width: 10px;
	height: 10px;
	border-radius: 50%;
}
.carousel__pagination-button.carousel__pagination-button--active::after{
	background: #fff;
}

.carousel__pagination{
	margin-top: -40px;
	z-index: 2!important;
	position: relative;
}

</style>
