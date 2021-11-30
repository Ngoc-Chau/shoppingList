<template>
  {{ errors }}
  <FormInputComp
    label="Blog title"
    :message="errors.title"
    v-model="params.title"
     />

  <FormInputComp
    label="Blog content"
    :form-type="false"
    :message="errors.body"
    v-model="params.content"
  />

  <button
  type="button"
  class="btn btn-primary"
  @click.prevent="createBlog"
  >Submit</button>
</template>

<script>
  import { mapGetters } from "vuex";
  import FormInputComp from "@/components/FormInputComp";
  export default {
    components: {
      FormInputComp
    },

    data() {
      return {
        params: {
          title: "",
          content: "",
        }
      }
    },

    computed: {
      ...mapGetters("error", [
        "errors"
      ])
    },

    // nuxt js
    async created() {
    },

    async mounted() {
    },

    unmounted() {
    },

    methods: {
      async createBlog() {
        try {
          const { data } = this.$axios({
          url: "/api/blogs/create",
          method: "post",
          data: this.params
          })
        } catch(error) {
          const { response } = error;

          console.log(error)
        }
      }
    }
  }

</script>
