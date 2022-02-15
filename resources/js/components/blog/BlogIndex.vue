<template>
    <h1>Blogs</h1>
</template>

<script setup>
    import { getCurrentInstance } from "vue";

    const internalInstance = getCurrentInstance();
    internalInstance.appContext.config.globalProperties.$Progress.start();
    setTimeout(() => {
      internalInstance.appContext.config.globalProperties.$Progress.finish();
    }, 3500);
</script>

<style>

</style>
