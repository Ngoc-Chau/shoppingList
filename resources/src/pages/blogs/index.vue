<template>
  <div class="container">
  <div class="row">
  <div class="col">
    <router-link :to="{ name: 'blogs_create' }" class="btn btn-primary">Create</router-link>
    <button class="btn btn-danger">Delete</button>

    <div class="table-responsive">
    <table class="table table-sm">
      <thead>
      <tr>
        <th>
        <input id="checkall" type="checkbox" />
        </th>
        <th>title</th>
        <th>created</th>
        <th>create by</th>
        <th>#</th>
      </tr>
      </thead>
      <tbody>
        <keep-alive>
        <tr v-for="blog in blogs">
          <td>
            <input
              class="checkbox"
              type="checkbox"
              name="ids[]"
              :value="blog.id"
            />
          </td>
          <td>{{ blog.title }}</td>
          <td>{{ blog.content }}</td>
          <td>
            <button class="btn btn-primary btn-sm">Edit</button>
            <button class="btn btn-danger btn-sm">Delete</button>
          </td>
        </tr>
    </keep-alive>
      </tbody>
    </table>
    </div>
  </div>
  </div>
</div>
</template>

<script>
  export default {

    data() {
      return {
        blogs: []
      }
    },
    async created() {
      await this.getBlogs();
    },

    methods: {
      async getBlogs() {
        try {
          const { data } = await this.$axios({
            url: "/api/blogs",
            method: "GET",
            params: {}
          });
          this.blogs = data;
        } catch(error) {
          console.log(error.response)
        }
      }
    }
  }

</script>
