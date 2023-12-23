<template>
	<div class="flex bg-gray-100 min-h-screen">
		<SidebarDashboard :navList="navList"/>
		<div class="flex-grow text-gray-800">
			<HeaderDashboard />
			<main class="p-6 sm:p-10 space-y-6">
				<ProfileDashboard v-if="currentPage === 'Profile'" :user="user" />
				<button class="bg-blue-900 text-white px-6 py-3" @click="getData">DATA USER</button>
			</main>
		</div>
	</div>
</template>

<script lang="ts">
import { defineComponent, ref } from 'vue'
import SidebarDashboard from '@/components/sidebars/SidebarDashboard.vue'
import { t } from '@/i18n'
import HeaderDashboard from '@/components/headers/HeaderDashboard.vue'
import ProfileDashboard from '@/components/containers/dashboard/ProfileDashboard.vue'
import Auth from '@/https/auth'

const navList = [
	{
		title: t('sidebars.dashboard.nav_list[0]'),
		url: '/dashboard',
		active: false,
		icon: 'squares2x2'
	},
	{
		title: t('sidebars.dashboard.nav_list[1]'),
		url: '/dashboard/profile',
		active: false,
		icon: 'user_circle'
	},
	{
		title: t('sidebars.dashboard.nav_list[2]'),
		url: '/dashboard/shopping',
		active: false,
		icon: 'shopping_bag'
	},
	{
		title: t('sidebars.dashboard.nav_list[3]'),
		url: '/dashboard/statistics',
		active: false,
		icon: 'dashboard'
	}
]
export default defineComponent({
	name: 'Dashboard',
	components: {
		ProfileDashboard,
		HeaderDashboard,
		SidebarDashboard
	},
	data () {
		return {
			navList
		}
	},
	setup () {
		const user = ref(null)
		return {
			user
		}
	},
	methods: {
		async getData () {
			const auth = new Auth()
			await auth.getUser().then(res => {
				console.log(res)
				console.log(res.data)
				this.user = res.data
			}).catch(err => {
				console.log(err)
				if (err.response.status === 401) {
					// void this.$router.push({ name: 'Login' })
				}
				// void this.$router.push('/login')
			})
		},
		isRoute(ruta: string) {
			const currentRoute = this.$route.path

			if (currentRoute === ruta) {
				return true
			}

			return false
		},
		itinerarRoute () {
			for (let i = 0; i < this.navList.length; i++) {
				this.navList[i].active = this.isRoute(this.navList[i].url)
			}
		}
	},
	computed: {
		currentPage () {
			return this.$route.name
		}
	},
	mounted () {
		this.getData()
		this.itinerarRoute()
	}
})
</script>
