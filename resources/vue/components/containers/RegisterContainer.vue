<template>
	<section class="py-8">
		<div class="flex items-center min-h-screen p-4 lg:justify-center">
			<div class="flex flex-col overflow-hidden bg-white rounded-md shadow-lg max md:flex-1 lg:max-w-screen-md">
				<div class="p-4 py-6 md:flex md:flex-col md:items-center md:justify-center md:p-12 md:w-full">
					<h3 class="my-4 text-2xl font-semibold text-gray-700">
						{{ $t('buttons.register') }}
					</h3>
					<FormRegister/>
				</div>
				<div class="px-14 pb-10">
					<div class="border-b border-2 border-gray-300"></div>
					<p class="text-center my-4">
						<router-link :to="urls.login.url" class="text-grey-dark text-sm no-underline hover:text-grey-darker">{{ $t('buttons.is_account') }}</router-link>
					</p>
				</div>
			</div>
		</div>
	</section>
</template>

<script lang="ts">
import { defineComponent } from 'vue'
import { urls } from '@/functions/urls'
import FormRegister from '@/components/forms/FormRegister.vue'
export default defineComponent({
	name: 'RegisterContainer',
	components: {
		FormRegister
	},
	setup () {
		return {
			urls
		}
	}
})
</script>
