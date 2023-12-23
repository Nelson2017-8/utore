<template>
	<div class="mx-0 px-0" id="header">
		<!-- Top Header -->
		<header class="bg-white py-6">
			<!-- Nabar Desktop -->
			<nav class="hidden md:flex mx-auto max-w-7xl items-center justify-between px-6 lg:px-8" aria-label="Global">
				<!-- Logo Desktop -->
				<router-link to="/" class="text-3xl font-bold">
					D I V I S I M A
				</router-link>

				<!-- Input search -->
				<div class="flex lg:gap-x-12">
					<div class="relative">
						<input
							type="search"
							class="bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-400 text-sm py-2 px-4 rounded-md input-search pl-10"
							placeholder="Buscar"
						>
						<IconSearch/>
					</div>
				</div>

				<!-- Navbar items -->
				<div class="flex items-center space-x-4">
					<div class="flex space-x-1">
						<ButtonProfile v-for="session in sessions" :key="session.url" id="login" :text="session.name" :href="session.url"/>
					</div>
				</div>
			</nav>

			<!-- Navabar Mobile -->
			<nav class="md:hidden mx-auto flex max-w-7xl items-center justify-between px-4" aria-label="Global">
				<!-- Logo Mobile -->
				<router-link to="/" class="text-3xl font-bold">
					D I
				</router-link>

				<!-- Input search -->
				<div class="flex lg:gap-x-12">
					<div class="relative">
						<input
							type="search"
							class="bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-400 text-sm py-2 px-4 rounded-md input-search pl-10"
							placeholder="Buscar"
						>
						<IconSearch/>
					</div>
				</div>

				<!-- Navbar items -->
				<div class="flex">
					<Menu
						as="div"
						class="relative inline-block text-center"
					>
						<div>
							<MenuButton class="inline-flex justify-center gap-x-1.5 rounded-md px-3 py-2">
								<IconBars3/>
							</MenuButton>
						</div>

						<transition
							enter-active-class="transition ease-out duration-100"
							enter-from-class="transform opacity-0 scale-95"
							enter-to-class="transform opacity-100 scale-100"
							leave-active-class="transition ease-in duration-75"
							leave-from-class="transform opacity-100 scale-100"
							leave-to-class="transform opacity-0 scale-95"
						>
							<MenuItems
								class="absolute right-0 z-10 w-menu-navbar origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
							>
								<div class="">
									<MenuItem v-slot="{ active }" v-for="session in sessions" :key="session.url">
										<router-link
											:to="session.url"
											:class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'block px-4 py-2 text-sm']"
										>
											{{ session.name }}
										</router-link>
									</MenuItem>
								</div>
							</MenuItems>
						</transition>
					</Menu>
				</div>
			</nav>
		</header>

		<!-- Bottom Header -->
		<header class="bg-primary py-4">
			<div class="container-navbar container mx-auto flex justify-between items-center">
				<nav class="hidden md:flex space-x-6 text-sm">
					<router-link
						v-for="item in menu"
						:key="item.url"
						class="text-gray-800 text-white hover:text-gray-300"
						:to="item.url"
					>{{ item.name }}</router-link>
				</nav>
				<nav class="md:hidden">
					<Menu
						as="div"
						class="relative inline-block text-left"
					>
						<div>
							<MenuButton
								class="inline-flex w-full justify-center gap-x-1.5 rounded-md  px-3 py-2 text-sm font-semibold text-gray-900
								shadow-sm ring-1 ring-inset ring-black text-white"
							>
								Menú
								<ChevronDownIcon
									class="-mr-1 h-5 w-5 text-gray-400"
									aria-hidden="true"
								/>
							</MenuButton>
						</div>

						<transition
							enter-active-class="transition ease-out duration-100"
							enter-from-class="transform opacity-0 scale-95"
							enter-to-class="transform opacity-100 scale-100"
							leave-active-class="transition ease-in duration-75"
							leave-from-class="transform opacity-100 scale-100"
							leave-to-class="transform opacity-0 scale-95"
						>
							<MenuItems
								class="absolute left-0 z-10 mt-2 w-56 origin-top-left rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
							>
								<div class="py-1">
									<MenuItem
										v-for="item in menu"
										v-slot="{ active }"
										:key="item.url"
									>
										<router-link
											:to="item.url"
											:class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'block px-4 py-2 text-sm']"
										>
											{{ item.name }}
										</router-link>
									</MenuItem>
								</div>
							</MenuItems>
						</transition>
					</Menu>
				</nav>

				<router-link
					:to="urls.cart.url"
					class="flex items-center text-sm text-white font-normal hover:text-gray-300"
				>
					<IconCart class="mr-2"/>
					0
				</router-link>
			</div>
		</header>
	</div>
</template>

<script lang="ts">
import { defineComponent } from 'vue'
import { getURLs } from '@/functions/urls'
import IconSearch from '@/components/svg/iconSearch.vue'
import IconCart from '@/components/svg/iconCart.vue'
import ButtonProfile from '@/components/buttons/anclas/ButtonProfile.vue'
import { Menu, MenuButton, MenuItem, MenuItems } from '@headlessui/vue'
import { ChevronDownIcon } from '@heroicons/vue/20/solid'
import IconBars3 from '@/components/svg/iconBars3.vue'

export default defineComponent({
	name: 'Header',
	components: { IconBars3, ButtonProfile, IconCart, IconSearch, ChevronDownIcon, Menu, MenuButton, MenuItem, MenuItems },
	data () {
		return {
			menu: getURLs.menu,
			urls: getURLs.all,
			searchQuery: '',
			items: ['Item 1', 'Item 2', 'Item 3']
		}
	},
	computed: {
		filteredItems () {
			return this.items.filter(item => {
				return item.toLowerCase().includes(this.searchQuery.toLowerCase())
			})
		},
		sessions () {
			// console.log([this.urls.login, this.urls.register])
			return [this.urls.login, this.urls.register]
		}
	},
	mounted () {
	},
	methods: {
		updateSearch (e: Event) {
			this.searchQuery = e.target.value
		}
	}
})
</script>
