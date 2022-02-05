<template>
  <div>
    <nav
      style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);"
      aria-label="breadcrumb"
    >
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li
          class="breadcrumb-item active"
          aria-current="page"
        >Library</li>
      </ol>
    </nav>
    <div class="card border-0 shadow-sm">
      <div class="card-body p-4">

        <div class="row mb-4">
          <div class="col-6 col-lg-3">
            <div class="card bg-blue-100 border-0">
              <div class="card-body">
                <h5 class="card-text">Today Report</h5>
                <h3 class="card-text">500</h3>
              </div>
            </div>
          </div>
          <div class="col-6 col-lg-3">
            <div class="card bg-yellow-100 border-0">
              <div class="card-body">
                <h5 class="card-text">Today Report</h5>
                <h3 class="card-text">500</h3>
              </div>
            </div>
          </div>
          <div class="col-6 col-lg-3">
            <div class="card bg-teal-100 border-0">
              <div class="card-body">
                <h5 class="card-text">Today Report</h5>
                <h3 class="card-text">500</h3>
              </div>
            </div>
          </div>
          <div class="col-6 col-lg-3">
            <div class="card bg-red-100 border-0">
              <div class="card-body">
                <h5 class="card-text">Today Report</h5>
                <h3 class="card-text">500</h3>
              </div>
            </div>
          </div>
        </div>
        <h5 class="card-title">Report Chart</h5>
        <PlanetChart />
      </div>
    </div>
  </div>
</template>

<script>
import PlanetChart from '../components/PlanetChart.vue'

export default {
  name: "Home",
  metaInfo: {
    title: "Home",
  },
  components: {
    PlanetChart
  },
  methods: {
    //
  }
};
</script>

<style>
</style>