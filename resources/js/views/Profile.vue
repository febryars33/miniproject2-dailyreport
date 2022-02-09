<template>
  <div class="container-fluid px-4 my-4">
    <p class="mb-2">
      <span class="h3">Febriansyah Riki Setiadi</span>
      <router-link
        to="/"
        class="float-end"
      ><i class="fa fa-chevron-left"></i> Back</router-link>
    </p>
    <p class="text-muted small">
      <span class="me-3"><i class="fa fa-map-marker-alt text-danger"></i> Location: Bandung, Jawa Barat</span>
      <span><i class="fa fa-chalkboard-teacher text-primary"></i> Dosen STMIK Bandung</span>
    </p>
    <template v-if="userdata.user.email_verified_at === null">
      <!-- Alert email not verified -->
      <div
        class="alert alert-danger d-flex align-items-center"
        role="alert"
      >
        <i class="fa fa-exclamation-triangle fa-2x"></i>
        <div class="ms-2">
          Email has not been verified on your account. please immediately verify to increase the security of your account.
          <a href="#">Request verify to email.</a>
        </div>
      </div>
    </template>
    <div class="card bg-light border-0 shadow-sm">
      <div class="card-body">
        <h5 class="mb-4">User Information</h5>
        <div class="row mb-3">
          <div class="col-lg-4">
            <span class="fw-bold">Name</span>
          </div>
          <div class="col-lg-6">
            <span>{{ userdata.employee.name }}</span>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-lg-4">
            <span class="fw-bold">Email</span>
          </div>
          <div class="col-lg-6">
            <span>{{ userdata.user.email }}</span>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-lg-4">
            <span class="fw-bold">Phone</span>
          </div>
          <div class="col-lg-6">
            <span>{{ userdata.user.phone }}</span>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-lg-4">
            <span class="fw-bold">Bio</span>
          </div>
          <div class="col-lg-6">
            <!-- <transition name="fade"> -->
            <template v-if="bio_show === true">
              <textarea
                name="bio"
                rows="2"
                class="form-control mb-2"
                v-model="forms.bio"
              ></textarea>
              <a
                href=""
                class="text-danger me-3"
                v-on:click.prevent="bioFormToFalse()"
              >Cancel</a>
              <a
                href=""
                v-on:click.prevent="bioFormSave(aaa)"
              >Save</a>
            </template>
            <template v-else>
              <a
                href="#"
                v-on:dblclick="bio_show = !bio_show"
                v-on:click.prevent
                id="bio"
              >{{ this.forms.bio }}</a>
              <template v-if="forms.bio === null">
                <a
                  href="#"
                  class="text-success"
                  v-on:dblclick="bio_show = !bio_show"
                  v-on:click.prevent
                  id="bio"
                >Double Click to add Bio</a>
              </template>
            </template>
            <!-- </transition> -->
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-lg-4">
            <span class="fw-bold">Location</span>
          </div>
          <div class="col-lg-6">
            <span>{{ userdata.employee.location }}</span>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-4">
            <span class="fw-bold">Positions</span>
          </div>
          <div class="col-lg-6">
            <ul>
              <li
                v-for="item, index in userdata.positions"
                :key="index"
              >
                {{ item.name }}
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios'
import { mapGetters } from 'vuex'

export default {
  name: 'Profile',
  computed: {
    ...mapGetters({
      isLoggedIn: 'isLoggedIn',
      userdata: 'user'
    })
  },
  metaInfo: {
    title: "Profile",
  },
  data () {
    return {
      positions: null,
      counter: 0,
      bio_show: false,
      forms: {
        bio: ''
      }
    }
  },
  methods: {
    bioFormToFalse () {
      this.bio_show = false
      this.forms.bio = this.userdata.employee.bio
    },
    bioFormSave (aaa) {
      axios.post('/api/v1/session/change-bio', this.forms)
        .then(response => {
          this.forms.bio = response.data.results.bio
          this.bio_show = false
        })
        .catch(error => {
          console.log(error)
        })
    }
  },
  mounted () {
    this.forms.bio = this.userdata.employee.bio
  }
}
</script>