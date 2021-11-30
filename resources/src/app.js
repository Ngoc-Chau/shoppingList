'use strict';

import { createApp } from 'vue';
import router from '@/routes/loader';
import store from '@/store';
import axios from '@/plugins/axios';
import "@/assets/bootstrap.scss";
import "@/assets/app.scss";

import App from '@/App.vue';

const app = createApp(App);
const plugin = {
  install () {
    app.config.globalProperties.$axios = axios;
  }
};

[store, router, plugin].forEach((plg) => {
  app.use(plg);
});

app.mount("#app");

