export let imageBase64: string | ArrayBuffer | null = ''
export function fileBase64 (event: Event) {
	if (event.target != null) {
		const file = event.target.files[0]
		const reader = new FileReader()

		reader.onload = e => {
			if (e.target != null) {
				const base64 = e.target.result
				// hacer algo con el base64
				imageBase64 = base64
			}
		}

		reader.readAsDataURL(file)
	}
}
