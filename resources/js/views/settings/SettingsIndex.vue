<template>
  <div class="card border-0 shadow-sm">
    <div class="card-body p-4">
      <h5><i class="fa fa-cogs"></i> Settings</h5>
      <hr>
      <div class="row">
        <div class="col-6 col-lg-3">
          <div class="d-grid">
            <router-link
              to="/settings/change-email"
              class="btn btn-light shadow-sm"
            >
              <h2>
                <i class="fa fa-envelope"></i>
              </h2>
              Change Email
            </router-link>
          </div>
        </div>
        <div class="col-6 col-lg-3">
          <div class="d-grid">
            <router-link
              to="/settings/change-password"
              class="btn btn-light shadow-sm"
            >
              <h2>
                <i class="fa fa-key"></i>
              </h2>
              Change Password
            </router-link>
          </div>
        </div>
        <div class="col-6 col-lg-3">
          <div class="d-grid">
            <router-link
              to="/settings/change-number-phone"
              class="btn btn-light shadow-sm"
            >
              <h2>
                <i class="fa fa-phone"></i>
              </h2>
              Change Phone Number
            </router-link>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'SettingsIndex',
  metaInfo: {
    title: 'Settings'
  },
}
</script>