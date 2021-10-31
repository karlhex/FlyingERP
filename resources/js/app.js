require('./bootstrap');

require('alpinejs');

import { createApp } from 'vue';
import router from './router'
import ElementPlus from 'element-plus'
import 'element-plus/dist/index.css'
import store from './store'

import { createI18n } from 'vue-i18n'
import zh from './lang/zh'
import en from './lang/en'

const messages = {
  en: en,
  zh: zh,
}

const i18n = createI18n({
  legacy: false,
  locale: 'zh',
  fallbackLocale: 'en',
  messages,
})

createApp({
}).use(router)
  .use(i18n)
  .use(store)
  .use(ElementPlus)
  .mount('#app')
