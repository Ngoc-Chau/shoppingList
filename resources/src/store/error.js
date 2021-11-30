export default {
  namespaced: true,

  state: {
    errors: {},
  },

  getters: {
    errors(state) {
      return state.errors;
    }
  },

  mutations: {
    setErrors(state, errors) {
      state.errors = errors;
    },
    resetErrors(state) {
        state.errors = {};
    }
  }
}
