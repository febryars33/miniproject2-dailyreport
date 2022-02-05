<template>
  <div class="container">
    <div class="col-lg-6 card shadow border-0 mx-auto mt-5">
      <div class="card-body">
        <div class="text-center">
          <img
            src="assets/img/STMIK Bandung.png"
            alt="STMIK Bandung"
            title="STMIK Bandung"
            class="img-fluid my-3"
            width="180px"
            height="180px"
          />
          <h4 class="fw-bold">Daily Report</h4>
          <p class="text-muted">Please login for continue.</p>
        </div>
        <form @submit.prevent="submit">
          <div class="form-floating mb-3">
            <!-- <label for="email">Email Address</label> -->
            <input
              type="email"
              class="form-control"
              id="floatingEmail"
              v-model="credentials.email"
              placeholder="example@example.com"
            />
            <label for="floatingEmail">Email address</label>
          </div>
          <div class="form-floating mb-3">
            <!-- <label for="password">Password</label> -->
            <input
              type="password"
              class="form-control"
              id="floatingPassword"
              placeholder="*****"
              v-model="credentials.password"
            />
            <label for="floatingPassword">Password</label>
          </div>
          <div class="mb-3">
            <div class="form-check form-switch">
              <input
                class="form-check-input"
                type="checkbox"
                role="switch"
                id="flexSwitchCheckDefault"
              />
              <label
                class="form-check-label"
                for="flexSwitchCheckDefault"
              >Remember Me</label>
            </div>
          </div>
          <div class="mb-3">
            <div class="d-grid">
              <button
                type="submit"
                class="btn btn-primary"
                :disabled="anim_loading"
              >
                <template v-if="anim_loading === true">
                  <span
                    class="spinner-border spinner-border-sm"
                    role="status"
                    aria-hidden="true"
                  ></span>
                  Loading...
                </template>
                <template v-else>
                  Login
                </template>
              </button>
            </div>
          </div>
          <router-link to="/forgot-password">Forgot Password</router-link>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios'

export default {
  name: "Login",
  metaInfo: {
    title: "Login",
  },
  data () {
    return {
      credentials: {
        email: "",
        password: "",
        device_name: 'browser'
      },
      anim_loading: false
      // errors: {}
    };
  },
  methods: {

    submit () {
      if (this.credentials.email == "") {
        this.$toast.open({
          message: 'The email field is required.',
          type: 'error'
        })
      }
      else if (this.credentials.password == "") {
        this.$toast.open({
          message: 'The password field is required.',
          type: 'error'
        })
      }
      else {
        this.anim_loading = true;
        this.$store
          .dispatch('login', this.credentials)
          .then((response) => {
            location.reload()
          })
          .catch((error) => {
            this.anim_loading = false;
            // this.errors = error.response.data
            // console.log(error.response.data.status.message)
            this.$toast.open({
              message: error.response.data.status.message,
              type: 'error'
            })
          })
      }
    },
  },
};
</script>

<style>
</style>
