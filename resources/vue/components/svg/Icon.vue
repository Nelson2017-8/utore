<template>
	<IconFolder v-if="icon=='folder'" :className="className"/>
	<IconBars3 v-else-if="icon=='bars3'" :className="className"/>
	<IconBars4 v-else-if="icon=='bars4'" :className="className"/>
	<IconSetting v-else-if="icon=='setting'" :className="className"/>
	<IconTwitter v-else-if="icon=='twitter'" :className="className"/>
	<IconSearch v-else-if="icon=='search'" :className="className"/>
	<IconUser v-else-if="icon=='user'" :className="className"/>
	<IconCart v-else-if="icon=='cart'" :className="className"/>
	<IconDashboard v-else-if="icon=='dashboard'" :className="className"/>
	<IconDocument v-else-if="icon=='document'" :className="className"/>
	<IconMessage v-else-if="icon=='message'" :className="className"/>
	<IconUserCircle v-else-if="icon=='user_circle'" :className="className"/>
	<IconShoppingBag v-else-if="icon=='shopping_bag'" :className="className"/>
	<IconSquares2x2 v-else-if="icon=='squares2x2'" :className="className"/>
</template>

<script lang="ts">
import { defineComponent } from 'vue'
import IconFolder from '@/components/svg/iconFolder.vue'
import IconBars3 from '@/components/svg/iconBars3.vue'
import IconBars4 from '@/components/svg/iconBars4.vue'
import IconSetting from '@/components/svg/iconSetting.vue'
import IconTwitter from '@/components/svg/iconTwitter.vue'
import IconSearch from '@/components/svg/iconSearch.vue'
import IconUser from '@/components/svg/iconUser.vue'
import IconCart from '@/components/svg/iconCart.vue'
import IconDashboard from '@/components/svg/iconDashboard.vue'
import IconDocument from '@/components/svg/iconDocument.vue'
import IconMessage from '@/components/svg/iconMessage.vue'
import IconUserCircle from "@/components/svg/iconUserCircle.vue";
import IconShoppingBag from "@/components/svg/iconShoppingBag.vue";
import IconSquares2x2 from "@/components/svg/iconSquares2x2.vue";
export default defineComponent({
	name: 'Icon',
	components: {
		IconSquares2x2,
		IconShoppingBag,
		IconUserCircle,
		IconMessage,
		IconDocument,
		IconDashboard,
		IconCart,
		IconUser,
		IconSearch,
		IconTwitter,
		IconSetting,
		IconBars4,
		IconBars3,
		IconFolder
	},
	props: {
		icon: {
			type: String,
			required: true
		},
		className: {
			type: String,
			required: true
		}
	}
})
</script>
