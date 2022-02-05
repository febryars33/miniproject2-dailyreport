<template>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
    <div class="container">
      <router-link
        class="navbar-brand"
        to="/"
      >
        <img
          :src="this.$base_url + '/assets/img/logo_stmik_kampusmerdeka.png'"
          alt=""
          width="60%"
          height="60%"
        >
      </router-link>
      <button
        class="navbar-toggler"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#navbarNav"
        aria-controls="navbarNav"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>
      <div
        class="collapse navbar-collapse"
        id="navbarNav"
      >
        <ul class="navbar-nav ms-auto">
          <li class="nav-item dropdown">
            <a
              class="nav-link dropdown-toggle"
              href="#"
              id="navbarScrollingDropdown"
              role="button"
              data-bs-toggle="dropdown"
              aria-expanded="false"
            >
              {{ user.employee.name }}
            </a>
            <ul
              class="dropdown-menu animate slideIn w-100 border-0 shadow"
              aria-labelledby="navbarScrollingDropdown"
            >
              <li>
                <router-link
                  class="dropdown-item"
                  to="/profile"
                ><i class="fa fa-user-alt"></i> Profile</router-link>
              </li>
              <li>
                <router-link
                  class="dropdown-item"
                  to="/settings"
                ><i class="fa fa-cogs"></i> Settings</router-link>
              </li>
              <li class="px-3">
                <hr class="dropdown-divider">
              </li>
              <li><a
                  class="dropdown-item"
                  href=""
                  v-on:click.prevent.stop="showResponder(responder)"
                  @click="logout"
                ><i class="fa fa-sign-out-alt"></i> Sign Out</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</template>

<script>
import { mapGetters } from 'vuex'

export default {
  name: 'Navbar',
  computed: {
    ...mapGetters({
      isLoggedIn: 'isLoggedIn',
      user: 'user'
    })
  },
  methods: {
    logout () {
      this.$store.dispatch('logout')
        .then(() => {
          this.$toast.open({
            message: 'Logout Successfully.',
            type: 'success'
          })
          this.$router.push({ name: 'Login' })
        })
    }
  }
}
</script>

<style>
@media (min-width: 768px) {
  .animate {
    animation-duration: 0.3s;
    -webkit-animation-duration: 0.3s;
    animation-fill-mode: both;
    -webkit-animation-fill-mode: both;
  }
}

@keyframes slideIn {
  0% {
    transform: translateY(1rem);
    opacity: 0;
  }

  100% {
    transform: translateY(0rem);
    opacity: 1;
  }

  0% {
    transform: translateY(1rem);
    opacity: 0;
  }
}

@-webkit-keyframes slideIn {
  0% {
    -webkit-transform: transform;
    -webkit-opacity: 0;
  }

  100% {
    -webkit-transform: translateY(0);
    -webkit-opacity: 1;
  }

  0% {
    -webkit-transform: translateY(1rem);
    -webkit-opacity: 0;
  }
}

.slideIn {
  -webkit-animation-name: slideIn;
  animation-name: slideIn;
}

/* Other styles for the page not related to the animated dropdown */
</style>