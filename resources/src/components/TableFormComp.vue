<template>
  <tr>
    <td>{{ k }}</td>
    <td>
      <input class="form-control" placeholder="Nhập tên họ">
    </td>
    <td>
      <input class="form-control" placeholder="Nhập tên">
    </td>
    <td>
      <button class="btn btn-sm btn-danger" @click.prevent="removeLine">Remove</button>
    </td>
  </tr>
</template>

<script>
  export default {
    props: {
      k: {
        type: Number,
        default: 1
      }
    },
    emits:["removeLine"],
    methods: {
      removeLine() {
        this.$emit('removeLine')
      }
    }
  }
</script>

params = [
  { position: 1, firstName: "Họ đã nhập 1", lastName: "Tên đã nhập 1" },
  { position: 2, firstName: "Họ đã nhập 2", lastName: "Tên đã nhập 2" },
  { position: 3, firstName: "Họ đã nhập 3", lastName: "Tên đã nhập 3" },
  { position: 4, firstName: "Họ đã nhập 4", lastName: "Tên đã nhập 4" },
  { position: 5, firstName: "Họ đã nhập 5", lastName: "Tên đã nhập 5" },
  { position: 6, firstName: "Họ đã nhập 6", lastName: "Tên đã nhập 6" },
]
