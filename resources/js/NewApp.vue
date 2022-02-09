<template>
  <div>
    <template v-if="isLoggedIn">
      <div class="container-xxl position-relative bg-white d-flex p-0">

        <Sidenav />

        <!-- Content Start -->
        <div class="content">

          <Navbar />

          <router-view></router-view>
          <vue-progress-bar></vue-progress-bar>

          <Footer />
        </div>
        <!-- Content End -->

        <!-- Back to Top -->
        <a
          href="#"
          class="btn btn-primary back-to-top"
        ><i class="bi bi-arrow-up"></i></a>
      </div>
    </template>
    <template v-else>
      <router-view></router-view>
    </template>
  </div>
</template>

<script>
import Navbar from './components/Navbar.vue'
import Sidenav from './components/Sidenav.vue'
import Footer from './components/Footer.vue'
import { mapGetters } from 'vuex'
export default {
  name: 'App',
  components: {
    Navbar,
    Sidenav,
    Footer
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
  mounted () {
    this.$Progress.finish()
    this.$nextTick(() => {

      // Back to top button
      $(window).scroll(function () {
        if ($(this).scrollTop() > 300) {
          $('.back-to-top').fadeIn('fast');
        } else {
          $('.back-to-top').fadeOut('fast');
        }
      });

      $('.back-to-top').click(function () {
        $('html, body').animate({ scrollTop: 0 }, 500, 'easeInOutExpo');
        return false;
      });

      // Sidebar Toggler
      $('.sidebar-toggler').click(function () {
        $('.sidebar, .content').toggleClass("open");
        return false;
      });

    })
  },
  created () {
    //  [App.vue specific] When App.vue is first loaded start the progress bar
    this.$Progress.start()
    //  hook the progress bar to start before we move router-view
    this.$router.beforeEach((to, from, next) => {
      //  does the page we want to go to have a meta.progress object
      if (to.meta.progress !== undefined) {
        let meta = to.meta.progress
        // parse meta tags
        this.$Progress.parseMeta(meta)
      }
      //  start the progress bar
      this.$Progress.start()
      //  continue to next page
      next()
    })
    //  hook the progress bar to finish after we've finished moving router-view
    this.$router.afterEach((to, from) => {
      //  finish the progress bar
      this.$Progress.finish()
    })
  }
}
</script>