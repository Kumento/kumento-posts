import da from './locales/da.json';
import en from './locales/en.json';
import {createI18n} from "vue-i18n";

export default new createI18n({
    locale: 'da',
    fallbackLocale: 'en',
    messages: {
        da: da,
        en: en
    }
})