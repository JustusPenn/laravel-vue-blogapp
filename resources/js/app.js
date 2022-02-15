require('./bootstrap');

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();
import Swal from 'sweetalert2';
window.Swal = Swal

const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    onOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseenter', Swal.resumeTimer)
    }
})

window.Toast = Toast

import VueProgressBar from "@aacassandra/vue3-progressbar";

const v3poptions = {
    color: "#bffaf3",
    failedColor: "#874b4b",
    thickness: "5px",
    transition: {
      speed: "0.2s",
      opacity: "0.6s",
      termination: 300,
    },
    autoRevert: true,
    location: "left",
    inverse: false,
}

import { createApp } from 'vue'
import router from './router'
import CompaniesIndex from './components/companies/CompaniesIndex'
createApp({
    components:{
        CompaniesIndex
    }
})
.use(router)
.use(VueProgressBar, v3poptions)
.mount('#app')
