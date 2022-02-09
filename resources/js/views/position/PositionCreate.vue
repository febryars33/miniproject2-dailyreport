<template>
  <div class="container-fluid px-4 my-4">
    <div class="card bg-light border-0 shadow-sm">
      <div class="card-body p-4">
        <h5>Create a new Position</h5>
        <div class="row mb-3">
          <div class="col-lg align-self-center">
            <router-link to="/positions"><i class="fa fa-chevron-left"></i> Back</router-link>
          </div>
        </div>
        <!-- form -->
        <form
          method="post"
          ref="position_form"
          @submit.prevent="submit"
        >
          <!-- Code -->
          <div class="mb-3 row">
            <label
              for="code"
              class="col-sm-2 col-form-label"
            >Code <sup class="text-danger">*</sup></label>
            <div class="col-sm-10">
              <input
                type="text"
                name="code"
                class="form-control"
                id="code"
                v-model="position_form.code"
              >
            </div>
          </div>
          <!-- Name -->
          <div class="mb-3 row">
            <label
              for="name"
              class="col-sm-2 col-form-label"
            >Name <sup class="text-danger">*</sup></label>
            <div class="col-sm-10">
              <input
                type="text"
                name="name"
                class="form-control"
                id="name"
                v-model="position_form.name"
              >
            </div>
          </div>
          <!-- Description -->
          <div class="mb-3 row">
            <label
              for="description"
              class="col-sm-2 col-form-label"
            >Description</label>
            <div class="col-sm-10">
              <textarea
                name="description"
                class="form-control"
                id="description"
                rows="6"
                v-model="position_form.description"
              ></textarea>
            </div>
          </div>
          <!-- Submit -->
          <div class="mb-3 row">
            <div class="offset-sm-2 col-sm-10">
              <div class="d-grid">
                <button
                  type="submit"
                  class="btn btn-outline-primary"
                ><i class="fa fa-paper-plane"></i> Create</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios'
import { mapGetters } from 'vuex'

export default {
  name: 'PositionCreate',
  metaInfo: {
    title: 'Create a new Position'
  },
  computed: {
    ...mapGetters({
      isLoggedIn: 'isLoggedIn',
      userdata: 'user'
    })
  },
  data () {
    return {
      position_form: {
        code: '',
        name: '',
        description: '',
      },
      errors: null
    }
  },
  created () {
    if (this.userdata.user.role !== 'ADMINISTRATOR') {
      this.$router.push({ path: '/' })
    }
  },
  methods: {
    submit () {
      if (this.position_form.code === '') {
        this.$toast.open({
          message: 'The code field is required.',
          type: 'error'
        })
      }
      else if (this.position_form.name === '') {
        this.$toast.open({
          message: 'The name field is required.',
          type: 'error'
        })
      }
      else {
        axios.post('/api/v1/position', this.position_form)
          .then(response => {
            this.$toast.open({
              message: response.data.results.message + ' With code : ' + response.data.results.data.code,
              type: 'success',
            })
            this.position_form = {
              code: '',
              name: '',
              description: ''
            }
          })
          .catch(error => {
            this.errors = error.response.data.results.errors
            for (var [key, index] of Object.entries(this.errors)) {
              this.$toast.open({
                message: index[0],
                type: 'error',
              })
            }
            // console.log(error.response.data.results.errors)
          })
      }
    }
  }
}
</script>

<style>
</style>