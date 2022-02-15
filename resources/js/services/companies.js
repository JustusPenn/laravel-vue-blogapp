import { ref } from 'vue'
import axios from 'axios'
import { useRouter } from 'vue-router'


export default function useCompanies() {
    const company = ref('')
    const companies = ref([])
    const errors = ref('')
    const router = useRouter()

    const getCompanies = async () => {
        let response = await axios.get('/api/companies')
        companies.value = response.data.data;
    }

    const getCompany = async (id) => {
        let response = await axios.get('/api/companies/' + id)
        company.value = response.data.data;
        // console.log(company.value);
    }

    const storeCompany = async (data) => {
        errors.value = ''
        try {
            await axios.post ('/api/companies/', data)
            await router.push({ name: 'companies.index'})
        } catch (e) {
            if (e.response.status === 422) {
                errors = e.response.data.errors;
            }
        }
    }

    const destroyCompany = async (id) => {
        await axios.delete('/api/companies/' + id)
    }

    return {
        errors,
        company,
        companies,
        getCompany,
        getCompanies,
        storeCompany,
        destroyCompany
    }
}
