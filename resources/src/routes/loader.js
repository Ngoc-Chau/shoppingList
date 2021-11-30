import { createRouter, createWebHistory } from 'vue-router';
import routes from '@/routes';
import store from '@/store';

const router = createRouter({
  routes,
  history: createWebHistory(),
  linkActiveClass: "active",
  scrollBehavior (to, from, savedPosition) {
    return { x: 0, y: 0 };
  }
});

export default router;














