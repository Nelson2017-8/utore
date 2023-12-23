<template>
	<section class="py-8">
		<div class="flex items-center min-h-screen p-4 lg:justify-center">
			<div class="flex flex-col overflow-hidden bg-white rounded-md shadow-lg max md:flex-row md:flex-1 lg:max-w-screen-md">
				<div class="p-4 py-6 text-white bg-primary md:w-80 md:flex-shrink-0 md:flex md:flex-col md:items-center md:justify-evenly">
					<div class="my-3 text-4xl font-bold tracking-wider text-center">
						<router-link :to="urls.home.url">{{ $t('general.app') }}</router-link>
					</div>
					<p class="mt-6 font-normal text-center text-gray-300 md:mt-0">
						{{ $t('cards.login.description', { app: $t('general.app') }) }}
					</p>
					<p class="flex flex-col items-center justify-center mt-10 text-center">
						<span>{{ $t('cards.login.not_account') }}</span>
						<router-link :to="urls.register.url" class="underline">{{ $t('cards.login.cta') }}</router-link>
					</p>
					<p class="mt-6 text-sm text-center text-gray-300">
						{{ $t('cards.login.terms[0]') }} <a :href="urls.terms.url">{{ $t('cards.login.terms[1]') }}</a> {{ $t('cards.login.terms[2]') }} <a :href="urls.conditions.url">{{ $t('cards.login.terms[3]') }}</a>
					</p>
				</div>
				<div class="p-5 bg-white md:flex-1">
					<h3 class="my-4 text-2xl font-semibold text-gray-700">
						{{ $t('buttons.login') }}
					</h3>
					<FormLogin/>
				</div>
			</div>
		</div>
	</section>
</template>

<script lang="ts">
import { defineComponent } from 'vue'
import FormLogin from '@/components/forms/FormLogin.vue'
import { urls } from '@/functions/urls'
export default defineComponent({
	name: 'LoginContainer',
	components: {
		FormLogin
	},
	setup () {
		return {
			urls
		}
	}
})
</script>
