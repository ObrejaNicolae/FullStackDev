import { createApp } from 'vue'
import App from './App.vue'

import routes from './routes/route'


createApp(App).use(routes).mount('#app')
