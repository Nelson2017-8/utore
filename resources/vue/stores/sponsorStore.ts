import { defineStore } from 'pinia'
import { type SponsorType } from '../functions/interfaces'

export const useSponsorStore = defineStore('sponsor', {
	state: () => {
		return {
			sponsors: [] as SponsorType[]
		}
	},
	actions: {
		add (spo: SponsorType) {
			this.sponsors.push(spo)
		},
		set (spons: SponsorType[]) {
			this.sponsors = spons
		}
	}
})
/***
 import { useCounterStore } from './stores/validateForm'

 const counter = useCounterStore()

 counter.count++
 // with autocompletion ✨
 counter.$patch({ count: counter.count + 1 })
 // or using an action instead
 counter.increment()
 **/
