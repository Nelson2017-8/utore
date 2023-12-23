<template>
	<aside class="hidden sm:flex sm:flex-col">
		<router-link :to="urls.profile.url" class="inline-flex items-center justify-center h-20 w-20 bg-purple-600 hover:bg-purple-500 focus:bg-purple-500">
			<LogoSmall/>
		</router-link>
		<div class="flex-grow flex flex-col justify-between text-gray-500 bg-gray-800">
			<nav class="flex flex-col mx-4 my-6 space-y-4">
				<div v-for="(navItem, index) in navListPage" :key="index">
					<router-link :to="navItem.url" :class="nav_item" v-if="!navItem.active">
						<span class="sr-only">{{ navItem.title }}</span>
						<Icon :className="'h-6 w-6'" :icon="navItem.icon"/>
					</router-link>
					<router-link :to="navItem.url" :class="nav_active_item" v-else>
						<span class="sr-only">{{ navItem.title }}</span>
						<Icon :className="'h-6 w-6'" :icon="navItem.icon"/>
					</router-link>
				</div>
			</nav>
			<div class="inline-flex items-center justify-center h-20 w-20 border-t border-gray-700">
				<button
					class="p-3 hover:text-gray-400 hover:bg-gray-700 focus:text-gray-400 focus:bg-gray-700 rounded-lg">
					<span class="sr-only">{{ $t('sidebars.dashboard.setting') }}</span>
					<Icon :className="'h-6 w-6'" icon="setting"/>
				</button>
			</div>
		</div>
	</aside>
</template>

<script lang="ts">
import { defineComponent } from 'vue'
import { urls } from '@/functions/urls'
import LogoSmall from '@/components/logo/LogoSmall.vue'
import Icon from "@/components/svg/icon.vue"

export default defineComponent({
	name: 'SidebarDashboard',
	components: {
		LogoSmall,
		Icon
	},
	props: {
		navList: {
			type: Object,
			required: true
		}
	},
	setup () {
		return {
			urls
		}
	},
	data () {
		return {
			navListPage: null
		}
	},
	computed: {
		nav_item: () => 'p-3 inline-flex items-center justify-center hover:text-gray-400 hover:bg-gray-700 focus:text-gray-400 focus:bg-gray-700 rounded-lg',
		nav_active_item: () => 'p-3 inline-flex items-center justify-center text-purple-600 bg-white rounded-lg'
	},
	methods: {
		currentPage () {
			const currentPage = this.$route.pathname
			const list = this.navList
			for (let i = 0; i < list.length; i++) {
				if (list[i].url === currentPage) {
					list[i].active = true
				}
			}
			return list
		}
	},
	mounted () {
		setTimeout(() => {
			this.navListPage = this.currentPage()
		}, 1000)
	}
})
</script>
