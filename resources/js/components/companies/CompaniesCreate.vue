<template>
    <form @submit.prevent="saveCompany" class="mt-5">
        <div class="p-4 rounded-md shadow-sm">
            <h3>Create Company</h3>
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
import { computed} from 'vue'
import useCompanies from '../../services/companies'
import { useField, useForm } from 'vee-validate'
import * as yup from 'yup'

export default {
    setup() {

        const schema = computed(() => {
            return yup.object({
                name: yup.string().required("Name is required"),
                email: yup.string().email().required("Email is required"),
                address: yup.string().nullable(),
                website: yup.string().url().nullable(),
            })
        });

        useForm({
            validationSchema: schema,
        });

        const { value: name, errorMessage: nameError } = useField('name');
        const { value: email, errorMessage: emailError } = useField('email');
        const { value: address, errorMessage: addressError } = useField('address');
        const { value: website, errorMessage: websiteError } = useField('website');

        const { storeCompany } = useCompanies()

        const saveCompany = async () => {
            const form = {
                name : name.value,
                email : email.value,
                address : address.value,
                website : website.value,
            }
            // console.log(form);
            await storeCompany({...form});
        }

        return {
            name, nameError,
            email, emailError,
            address, addressError,
            website, websiteError,
            saveCompany
        };
    }
}
</script>

<style>

</style>
