// SELECT OPTIONS
export interface OptionInterface {
	value: string
	name: string
}

export interface OptionsInterface {
	op: OptionInterface[]
}

// CHECKBOX & RADIO BUTTON
export interface OptionCheckboxInterface {
	value: string
	name: string
	id: string
	isImportant: boolean
	required: boolean
	help: string
}

export interface OptionsCheckboxInterface {
	op: OptionCheckboxInterface[]
}

// URLS
export interface URLInterface {
	name: string
	url: string
	method: string
}

export type URLsType = Record<string, URLInterface>

// Sponsor Interface
export interface SponsorInterface {
	sponsor: string
	url: string
	logo: string
	description: string
}
export type SponsorsType = SponsorInterface[]
export type SponsorType = SponsorInterface

// Product Interface
export interface ProductImgInterface {
	url: string
	description: string
	alt: string
	title: string
	class: string
}
export interface ProductInterface {
	id: number
	name: string
	category: string
	sponsor: string
	title: string
	description: string
	price: number
	image: ProductImgInterface
	images: ProductImgInterface[]
}
export type ProductType = ProductInterface
/**
export interface URLsInterface {
    [key: string]: URLInterface
}**/

// Auth Interface
export interface formLoginInterface {
	email: string
	password: string
	remember: boolean
}
export type formLoginType = formLoginInterface
