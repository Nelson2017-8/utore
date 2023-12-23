// https://github.com/MeForma/vue-toaster

export const toash = ($toast, option = {
	text: '',
	type: 'error' // success, error, warning, info
}) => {
	$toast.show(option.text, {
		type: option.type
	})
}
