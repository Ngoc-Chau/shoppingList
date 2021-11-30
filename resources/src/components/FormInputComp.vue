<template>
  <div class="mb-3">
    <label class="form-label">{{ label }}</label>
    <input
      v-if="formType"
      type="text"
      class="form-control"
      @input="handleValue"
    >
    <textarea
      v-else type="text"
      class="form-control"
      @input="handleValue"
    ></textarea>
    <div class="form-text text-danger">{{ message }}</div>
  </div>
</template>

<script>
  // String, Number, Object | Array, Boolean
  export default {
    props: {
      label: {
        type: String,
        default: ""
      },
      formType: {
        type: Boolean, // true => input | false => textarea
        default: true
      },
      message: {
        type: String,
        default: ""
      },
    },

    emits: ['update:modelValue'],

    methods: {
      handleValue(event) {
        this.$emit('update:modelValue', event.target.value)
      }
    }

  }
</script>
