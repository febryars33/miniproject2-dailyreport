<template>
  <div class="card border-0 shadow-sm mb-4">
    <div class="card-body">
      <div class="text-center">
        <router-link to="/">
          <img
            :src="this.$base_url + '/assets/img/user.jpg'"
            alt=""
            class="img-thumbnail shadow mb-2 rounded-circle"
            width="150px"
            height="150px"
          >
        </router-link>
      </div>
      <div class="text-center mt-2">
        <h6 class="fw-bold">{{ userdata.employee.name }}</h6>
        <span class="badge bg-danger mx-auto">Administrator</span>
      </div>
      <div class="flex-shrink-0 p-2 pb-0 bg-white">
        <ul class="list-unstyled ps-0">
          <li class="border-top my-3"></li>
          <li class="mb-1">
            <button class="btn btn-toggle align-items-center rounded collapsed">
              Home
            </button>
          </li>
          <li class="mb-1">
            <button
              class="btn btn-toggle align-items-center rounded collapsed"
              data-bs-toggle="collapse"
              data-bs-target="#home-collapse"
              aria-expanded="true"
            >
              Home
            </button>
            <div
              class="collapse show"
              id="home-collapse"
            >
              <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                <li><a
                    href="#"
                    class="link-dark rounded"
                  >Overview</a></li>
                <li><a
                    href="#"
                    class="link-dark rounded"
                  >Updates</a></li>
                <li><a
                    href="#"
                    class="link-dark rounded"
                  >Reports</a></li>
              </ul>
            </div>
          </li>
          <li class="mb-1">
            <button
              class="btn btn-toggle align-items-center rounded collapsed"
              data-bs-toggle="collapse"
              data-bs-target="#dashboard-collapse"
              aria-expanded="false"
            >
              Employee
            </button>
            <div
              class="collapse"
              id="dashboard-collapse"
            >
              <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                <li><a
                    href="#"
                    class="link-dark rounded"
                  >List</a></li>
                <li><a
                    href="#"
                    class="link-dark rounded"
                  >Create</a></li>
              </ul>
            </div>
          </li>
          <template v-if="userdata.user.role === 'ADMINISTRATOR'">
            <li class="mb-1">
              <button
                class="btn btn-toggle align-items-center rounded collapsed"
                data-bs-toggle="collapse"
                data-bs-target="#orders-collapse"
                aria-expanded="false"
              >
                Positions
              </button>
              <div
                class="collapse"
                id="orders-collapse"
              >
                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                  <li>
                    <router-link
                      to="/positions"
                      class="link-dark rounded"
                    >List</router-link>
                  </li>
                  <li>
                    <router-link
                      to="/positions/create"
                      class="link-dark rounded"
                    >Create</router-link>
                  </li>
                </ul>
              </div>
            </li>
          </template>
          <li class="border-top my-3"></li>
          <li>
            <button
              class="btn btn-toggle align-items-center rounded collapsed"
              data-bs-toggle="collapse"
              data-bs-target="#account-collapse"
              aria-expanded="false"
            >
              Account
            </button>
            <div
              class="collapse"
              id="account-collapse"
            >
              <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                <li><a
                    href="#"
                    class="link-dark rounded"
                  >New...</a></li>
                <li><a
                    href="#"
                    class="link-dark rounded"
                  >Profile</a></li>
                <li><a
                    href="#"
                    class="link-dark rounded"
                  >Settings</a></li>
                <li><a
                    href="#"
                    class="link-dark rounded"
                  >Sign out</a></li>
              </ul>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
</template>

<script>
import { mapGetters } from 'vuex'
export default {
  name: 'Sidenav',
  computed: {
    ...mapGetters({
      isLoggedIn: 'isLoggedIn',
      userdata: 'user'
    })
  }

}
</script>

<style>
</style>