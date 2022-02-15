<template>
    <form @submit.prevent="saveCompany" class="mt-5">
        <div class="p-4 rounded-md shadow-sm">
            <h3>Modify Company</h3>
            <div class="mb-3">
                <label for="name">Name</label>
                <div class="mt-1">
                    <input type="text" name="form.name" id="name" class="form-control" v-model="name">
                    <small class="text-danger">{{ nameError }}</small>
                </div>
            </div>
            <div class="mb-3">
                <label for="email">Email</label>
                <div class="mt-1">
                    <input type="email" name="form.email" id="email" class="form-control" v-model="email">
                    <small class="text-danger">{{ emailError }}</small>
                </div>
            </div>
            <div class="mb-3">
                <label for="address">Address</label>
                <div class="mt-1">
                    <input type="text" name="form.address" id="address" class="form-control" v-model="address">
                    <small class="text-danger">{{ addressError }}</small>
                </div>
            </div>
            <div class="mb-3">
                <label for="website">Website</label>
                <div class="mt-1">
                    <input type="text" name="form.website" id="website" class="form-control" v-model="website">
                    <small class="text-danger">{{ websiteError }}</small>
                </div>
            </div>
            <button class="btn btn-primary" type="submit">Create</button>
        </div>
    </form>
</template>

<script>
import { onMounted } from 'vue'
import useCompanies from '../../services/companies'
// import { useField, useForm } from 'vee-validate'
// import * as yup from 'yup'

export default {
    props: {
        id: {
            required: true,
            type: String
        }
    },
    setup(props) {

        const { company, getCompany } = useCompanies()
        getCompany(props.id)


        onMounted(() => {
            console.log(company);
        })

        const saveCompany = async () => {
            // const form = {
            //     name : name.value,
            //     email : email.value,
            //     address : address.value,
            //     website : website.value,
            // }
            // console.log(form);
            // await storeCompany({...form});
        }


        return {
            company,
            saveCompany
        };
    }
}
</script>

<style>

</style>
