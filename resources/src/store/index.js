import { createStore } from 'vuex';
import error from './error';

const store = createStore({
  modules: {
    error
  }
});

export default store;
