import { createApp } from 'vue'
import { createPinia } from 'pinia'
import App from './App.vue'
import router from './routes/dashboard_routes'
import { i18n } from './i18n'
import Toaster from '@meforma/vue-toaster'

const app = createApp(App)
const pinia = createPinia()

app.use(pinia)
app.use(router)
app.use(i18n)
app.use(Toaster)
app.mount('#app')
