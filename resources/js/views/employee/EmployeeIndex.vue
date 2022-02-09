<template>
  <div class="container-fluid px-4 my-4">
    <div class="card bg-light border-0 shadow-sm">
      <div class="card-body">
        <p class="mb-4">
          <span class="h5">Employees Data</span>
          <router-link
            to="/"
            class="float-end"
          ><i class="fa fa-chevron-left"></i> Back</router-link>
        </p>
        <!-- List of Employees -->
        <div class="row">
          <div
            class="col-lg-4 mb-3"
            v-for="item, index in employees"
            :key="index"
          >
            <router-link :to="'/employees/' + item.id">
              <div class="card border-0 card-hover h-100">
                <div class="card-body">
                  <div class="row">
                    <div class="col-lg-4">
                      <div class="text-center">
                        <img
                          :src="'/assets/img/No-image-available.png'"
                          class="img-fluid rounded-3 mb-2"
                        >
                      </div>
                    </div>
                    <div class="col-lg align-self-center">
                      <h6>{{ item.name }}</h6>
                      <template v-if="item.is_lecturer === 1">
                        <span class="badge bg-primary">Lecturer</span>
                      </template>
                    </div>
                  </div>
                </div>
              </div>
            </router-link>
          </div>
        </div>
        <div class="text-center">
          <button
            type="button"
            class="btn btn-sm btn-outline-primary"
          ><i class="fa fa-spinner"></i> Load More...</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios'
export default {
  name: 'EmployeeIndex',
  metaInfo: {
    title: 'List Employees'
  },
  data () {
    return {
      employees: null
    }
  },
  created () {
    axios.get('/api/v1/employee')
      .then(response => {
        this.employees = response.data.results.employees
      })
      .catch(error => {
        console.log(error.response)
      })
  }
}
</script>