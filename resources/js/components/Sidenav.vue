<template>
  <!-- Sidebar Start -->
  <div class="sidebar pe-4 pb-3">
    <nav class="navbar bg-light navbar-light">
      <router-link
        to="/"
        class="navbar-brand mx-4 mb-3"
      >
        <!-- <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>DailyReport</h3> -->
        <img
          class="img-fluid"
          :src="this.$base_url + '/assets/img/logo_stmik_kampusmerdeka.png'"
          alt=""
        >
      </router-link>
      <div class="d-flex align-items-center ms-4 mb-4">
        <div class="position-relative">
          <img
            class="rounded-circle"
            :src="this.$base_url + '/assets/img/user.jpg'"
            alt=""
            style="width: 40px; height: 40px;"
          >
          <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1">
          </div>
        </div>
        <div class="ms-3">
          <h6 class="mb-0">{{ userdata.employee.name }}</h6>
          <span class="text-muted small">{{ userdata.user.role }}</span>
        </div>
      </div>
      <div class="navbar-nav w-100">
        <router-link
          to="/"
          class="nav-item nav-link"
        ><i class="fa fa-tachometer-alt me-2"></i>Home</router-link>
        <div class="nav-item dropdown">
          <a
            href="#"
            class="nav-link dropdown-toggle"
            data-bs-toggle="dropdown"
          ><i class="fa fa-users me-2"></i>Employees</a>
          <div class="dropdown-menu bg-transparent border-0">
            <router-link
              to="/employees"
              class="dropdown-item"
            >List</router-link>
            <router-link
              to="/employees/create"
              class="dropdown-item"
            >Create</router-link>
          </div>
        </div>
        <div class="nav-item dropdown">
          <a
            href="#"
            class="nav-link dropdown-toggle"
            data-bs-toggle="dropdown"
          ><i class="fa fa-network-wired me-2"></i>Positions</a>
          <div class="dropdown-menu bg-transparent border-0">
            <router-link
              to="/positions"
              class="dropdown-item"
            >List</router-link>
            <router-link
              to="/positions/create"
              class="dropdown-item"
            >Create</router-link>
          </div>
        </div>
        <a
          href="widget.html"
          class="nav-item nav-link"
        ><i class="fa fa-th me-2"></i>Widgets</a>
        <a
          href="form.html"
          class="nav-item nav-link"
        ><i class="fa fa-keyboard me-2"></i>Forms</a>
        <a
          href="table.html"
          class="nav-item nav-link"
        ><i class="fa fa-table me-2"></i>Tables</a>
        <a
          href="chart.html"
          class="nav-item nav-link"
        ><i class="fa fa-chart-bar me-2"></i>Charts</a>
        <div class="nav-item dropdown">
          <a
            href="#"
            class="nav-link dropdown-toggle"
            data-bs-toggle="dropdown"
          ><i class="far fa-file-alt me-2"></i>Pages</a>
          <div class="dropdown-menu bg-transparent border-0">
            <a
              href="signin.html"
              class="dropdown-item"
            >Sign In</a>
            <a
              href="signup.html"
              class="dropdown-item"
            >Sign Up</a>
            <a
              href="404.html"
              class="dropdown-item"
            >404 Error</a>
            <a
              href="blank.html"
              class="dropdown-item active"
            >Blank Page</a>
          </div>
        </div>
      </div>
    </nav>
  </div>
  <!-- Sidebar End -->
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
  },
  data: {
    hide: false
  }

}
</script>

<style>
</style>