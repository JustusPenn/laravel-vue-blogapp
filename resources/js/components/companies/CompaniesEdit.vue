<template>
    <form @submit.prevent="saveCompany" class="mt-5">
        <div class="mb-2">
            <ul class="text-danger">
                <li v-for="(error, i) in errors" :key="i">{{ error }}</li>
            </ul>
        </div>
        <div class="p-4 rounded-md shadow-sm">
            <h3>Modify {{ company.name }}</h3>
            <div class="mb-3">
                <label for="name">Name</label>
                <div class="mt-1">
                    <input type="text" name="form.name" id="name" class="form-control" v-model="company.name">
                    <small class="text-danger">{{ nameError }}</small>
                </div>
            </div>
            <div class="mb-3">
                <label for="email">Email</label>
                <div class="mt-1">
                    <input type="email" name="form.email" id="email" class="form-control" v-model="company.email">
                    <small class="text-danger">{{ emailError }}</small>
                </div>
            </div>
            <div class="mb-3">
                <label for="address">Address</label>
                <div class="mt-1">
                    <input type="text" name="form.address" id="address" class="form-control" v-model="company.address">
                    <small class="text-danger">{{ addressError }}</small>
                </div>
            </div>
            <div class="mb-3">
                <label for="website">Website</label>
                <div class="mt-1">
                    <input type="text" name="form.website" id="website" class="form-control" v-model="company.website">
                    <small class="text-danger">{{ websiteError }}</small>
                </div>
            </div>
            <button class="btn btn-primary" type="submit">Submit</button>
        </div>
    </form>
</template>

<script>
import { onBeforeMount } from 'vue'
import useCompanies from '../../services/companies'

export default {
    props: {
        id: {
            required: true,
            type: String
        }
    },
    setup(props) {

        const { errors, company, getCompany, updateCompany } = useCompanies()

        onBeforeMount(() => getCompany(props.id))

        const saveCompany = async () => {
            await updateCompany(props.id)
        }

        return {
            errors,
            company,
            saveCompany
        };
    }
}
</script>

<style>

</style>
