<template>
  <div>
    <!-- Navbar -->
    <template v-if="isLoggedIn">
      <Navbar />
    </template>
    <!-- End of Navbar -->

    <!-- Container -->
    <div class="container-fluid">
      <!-- Row -->
      <div class="row mt-4">
        <template v-if="isLoggedIn">
          <div class="col-lg-3">
            <Sidenav />
          </div>
        </template>
        <div class="col-lg">
          <router-view></router-view>
        </div>
      </div>
      <!-- End of Row -->
    </div>
    <!-- End of Container -->
  </div>
</template>

<script>
import Navbar from './components/Navbar.vue'
import Sidenav from './components/Sidenav.vue'
import { mapGetters } from 'vuex'

export default {
  name: 'App',
  components: {
    Navbar,
    Sidenav
  },
  metaInfo: {
    titleTemplate: "%s | Daily Report STMIK Bandung",
  },
  computed: {
    ...mapGetters({
      isLoggedIn: 'isLoggedIn',
      user: 'user'
    })
  },
  created () {
    document.body.style.backgroundColor = "#f8f9fa";
    /* global bootstrap: false */
    (function () {
      'use strict'
      var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
      tooltipTriggerList.forEach(function (tooltipTriggerEl) {
        new bootstrap.Tooltip(tooltipTriggerEl)
      })
    })()
  },
};
</script>

<style lang="scss">
.sidebar {
  height: auto;
  width: 25rem;
  color: white;
}
</style>