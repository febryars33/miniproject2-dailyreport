<template>
  <div class="card border-0 shadow-sm">
    <div class="card-body p-4">
      <h5><i class="fa fa-key"></i> Change Password</h5>
      <div class="row mb-3">
        <div class="col-lg align-self-center">
          <router-link to="/settings"><i class="fa fa-chevron-left"></i> Back</router-link>
        </div>
      </div>
      <!-- form -->
      <form
        method="post"
        ref="position_form"
        @submit.prevent="submit"
      >
        <!-- Current Password -->
        <div class="mb-3 row">
          <label
            for="current_password"
            class="col-sm-3 col-form-label"
          >Current Password <sup class="text-danger">*</sup></label>
          <div class="col-sm-9">
            <input
              type="password"
              name="current_password"
              class="form-control"
              id="current_password"
              v-model="form_data.current_password"
            >
          </div>
        </div>
        <!-- New Password -->
        <div class="mb-3 row">
          <label
            for="new_password"
            class="col-sm-3 col-form-label"
          >New Password <sup class="text-danger">*</sup></label>
          <div class="col-sm-9">
            <input
              type="password"
              name="new_password"
              class="form-control"
              id="new_password"
              v-model="form_data.new_password"
            >
          </div>
        </div>
        <!-- Confirm New Password -->
        <div class="mb-3 row">
          <label
            for="confirm_new_password"
            class="col-sm-3 col-form-label"
          >Confirm New Password <sup class="text-danger">*</sup></label>
          <div class="col-sm-9">
            <input
              type="password"
              name="confirm_new_password"
              class="form-control"
              id="confirm_new_password"
              v-model="form_data.confirm_new_password"
            >
          </div>
        </div>
        <!-- Submit -->
        <div class="row">
          <div class="offset-sm-3 col-sm-9">
            <div class="d-grid">
              <button
                type="submit"
                class="btn btn-outline-primary"
              ><i class="fa fa-paper-plane"></i> Submit</button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
export default {
  name: 'ChangePassword',
  metaInfo: {
    title: 'Change Password'
  },
  data () {
    return {
      form_data: {
        current_password: '',
        new_password: '',
        confirm_new_password: ''
      },
      errors: null
    }
  },
  methods: {
    submit () {
      if (this.form_data.current_password === '') {
        this.$toast.open({
          message: 'The current password field is required.',
          type: 'error',
        })
      }
      else if (this.form_data.new_password === '') {
        this.$toast.open({
          message: 'The new password field is required.',
          type: 'error',
        })
      }
      else if (this.form_data.confirm_new_password === '') {
        this.$toast.open({
          message: 'The confirm new password field is required.',
          type: 'error',
        })
      }
      else {
        axios.post('/api/v1/session/change-password', this.form_data)
          .then(response => {
            this.$toast.open({
              message: response.data.status.message,
              type: 'success'
            })
            this.form_data = {
              current_password: '',
              new_password: '',
              confirm_new_password: ''
            };
          })
          .catch(error => {
            // console.log(this.errors)
            this.errors = error.response.data.results.errors
            for (var [key, index] of Object.entries(this.errors)) {
              this.$toast.open({
                message: index[0],
                type: 'error'
              })
            }
          })
      }
    }
  }
}
</script>