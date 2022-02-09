<template>
  <div>
    <!-- Navbar -->

    <!-- End of Navbar -->

    <!-- Container -->
    <!-- <div class="container-fluid"> -->
    <!-- Row -->
    <div class="d-flex">
      <template v-if="isLoggedIn">
        <div class="col-lg-3">
          <Sidenav />
        </div>
      </template>
      <div class="col-lg">
        <template v-if="isLoggedIn">
          <Navbar />
        </template>
        <div class="col-lg-11 mx-auto py-4">
          <div
            class="wrapper"
            style="margin-bottom: 20rem"
          >
            <router-view></router-view>
          </div>
        </div>
      </div>
    </div>
    <!-- End of Row -->
    <!-- </div> -->
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
      userdata: 'user'
    })
  },
  created () {
    // document.body.style.backgroundColor = "#f8f9fa";
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