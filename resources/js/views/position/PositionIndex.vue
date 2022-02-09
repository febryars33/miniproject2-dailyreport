<template>
  <div class="container-fluid px-4 my-4">
    <div class="card bg-light border-0 shadow-sm">
      <div class="card-body p-4">
        <h5>List Positions</h5>
        <div class="row mb-3">
          <div class="col-lg align-self-center">
            <router-link to="/positions/create"><i class="fa fa-plus"></i> Create new here</router-link>
          </div>
          <div class="col-lg-4">
            <div class="input-group mb-3">
              <input
                type="text"
                class="form-control"
                placeholder="Search here..."
              >
              <button
                class="btn btn-outline-primary"
                type="button"
                id="button-addon2"
              ><i class="bi bi-search"></i></button>
            </div>
          </div>
        </div>
        <div class="table-responsive-xxl">
          <table class="table table-sm table-hover">
            <thead class="table-dark">
              <tr>
                <th>#</th>
                <th>Code</th>
                <th>Name</th>
                <th>Description</th>
                <th>Created At</th>
                <th>#</th>
              </tr>
            </thead>
            <tbody>
              <tr
                v-for="item, index in positions"
                :key="index"
                class="align-middle"
              >
                <td>{{ index+1 }}.</td>
                <td>{{ item.code }}</td>
                <td>{{ item.name }}</td>
                <td>{{ item.description }}</td>
                <td>{{ moment(item.created_at).startOf('day').fromNow() }}</td>
                <td>
                  <button
                    type="button"
                    class="btn btn-outline-danger btn-sm"
                  >
                    <i class="fa fa-trash"></i>
                  </button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios'
import { mapGetters } from 'vuex'

export default {
  name: 'PositionsList',
  metaInfo: {
    title: 'List Positions'
  },
  computed: {
    ...mapGetters({
      isLoggedIn: 'isLoggedIn',
      userdata: 'user'
    })
  },
  data () {
    return {
      positions: null,
    }
  },
  created () {
    if (this.userdata.user.role !== 'ADMINISTRATOR') {
      this.$router.push({ path: '/' })
    }
    else {
      axios.get('/api/v1/position')
        .then(response => {
          this.positions = response.data.results
        })
        .catch(error => {
          // console.log(error.response)
        })
    }
  },
}
</script>

<style>
</style>