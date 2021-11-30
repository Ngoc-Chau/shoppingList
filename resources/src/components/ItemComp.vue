<template>
  <div class="container">
  <div class="row">
    <div class="col-12">
      <slot name="header"></slot>
    </div>
    <div class="col-12">
      Content
    </div>
    <div class="col-12">
      <slot name="footer"></slot>
    </div>
  </div>
  </div>
</template>

<script>
  export default {

  data() {
    return {

    }
  },

  computed: {

  },

  methods: {

  }
  }
</script>
