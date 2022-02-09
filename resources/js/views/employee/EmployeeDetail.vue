<template>
  <div class="container-fluid px-4 my-4">
    <div class="card bg-light border-0 shadow-sm">
      <div class="card-body">
        <p class="mb-4">
          <span class="h5">Detail Employee</span>
          <router-link
            to="/employees"
            class="float-end"
          ><i class="fa fa-chevron-left"></i> Back</router-link>
        </p>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'EmployeeDetail',
  metaInfo: {
    title: 'EmployeeDetail'
  }
}
</script>