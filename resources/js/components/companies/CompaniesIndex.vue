<template>
    <div class="mt-5 p-4 tab">
        <div class="d-flex align-items-center justify-content-between mb-2">
            <h3>List Of Companies</h3>
            <div class="">
                <router-link :to="{ name: 'companies.create' }" class="btn btn-outline-success">Create Company</router-link>
            </div>
        </div>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>
                        <span class="text-uppercase">Name</span>
                    </th>
                    <th>
                        <span class="text-uppercase">Email</span>
                    </th>
                    <th>
                        <span class="text-uppercase">Address</span>
                    </th>
                    <th>
                        <span class="text-uppercase">Website</span>
                    </th>
                    <th>
                        <span class="text-uppercase"></span>
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200 divide-solid">
                <template v-for="item in companies" :key="item.id">
                    <tr class="bg-white">
                        <td>
                            {{ item.name }}
                        </td>
                        <td>
                            {{ item.email }}
                        </td>
                        <td>
                            {{ item.address }}
                        </td>
                        <td>
                            {{ item.website }}
                        </td>
                        <td>
                            <router-link :to="{ name: 'companies.edit', params: {id : item.id}}" class="btn btn-info me-2"><span class="fas fa-pencil"></span></router-link>
                            <button @click="deleteCompany(item.id)" class="btn btn-danger"><span class="fas fa-trash"></span></button>
                        </td>
                    </tr>
                </template>
            </tbody>
        </table>
    </div>
</template>

<script>
import useCompanies from '../../services/companies'
import { onMounted } from 'vue'
export default {
    setup() {
        const { companies, getCompanies, destroyCompany } = useCompanies()

        onMounted(getCompanies)

        const deleteCompany = async (id) => {

            if (!window.confirm('Are you sure?')) {
                return
            }
            await destroyCompany(id)
            await getCompanies()
        }

        return {
            companies,
            deleteCompany
        }
    }
}
</script>
