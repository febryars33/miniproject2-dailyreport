<template>
  <!-- Blank Start -->
  <div class="container-fluid pt-4 px-4">
    <div class="row vh-100 bg-light rounded align-items-center justify-content-center mx-0">
      <div class="text-center">
        <h3>Report Chart</h3>
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