import { createApp } from 'vue'
import { createI18n } from 'vue-i18n'
import './style.css'
import App from './App.vue'
import settings from "./Settings";
import i18n from "./i18n";


createApp(App)
            .mixin({
                data(){
                    return {
                        settings: settings,
                    }
                }
            })
            .use(i18n)
            .mount('#kumentoApp')