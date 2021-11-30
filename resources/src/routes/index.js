export default [
  {
    path: '/',
    name:'home',
    component: () => import('@/pages/index.vue'),
    meta: {
      title: 'AutoStyle',
      middleware: [],
    },
  },
  {
    path: '/blogs',
    name:'blogs',
    component: () => import('@/pages/blogs/index.vue'),
    meta: {
      title: 'AutoStyle',
      middleware: [],
    },
  },
  {
    path: '/blogs/create',
    name:'blogs_create',
    component: () => import('@/pages/blogs/create.vue'),
    meta: {
      title: 'AutoStyle',
      middleware: [],
    },
  },
];
