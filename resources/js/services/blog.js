import { ref } from 'vue'
import axios from 'axios'
import { useRouter } from 'vue-router'


export default function useBlogs() {
    const blogs = ref([])
    const blog = ref()
    const errors = ref('')
    const router = useRouter()

    const getBlogs = async () => {
        let response = await axios.get('/api/blogs')
        blogs.value = response.data.data;
    }

    const getBlog = async (slug) => {
        let response = await axios.get('/api/blogs/' + slug)
        blog.value = response.data.data;
    }

    const storeBlog = async (data) => {
        // try {
            await axios.post ('/api/blogs/', data)
            await router.push({ name: 'blogs.index'})
        // } catch (e) {
            // if (e.response.status === 422) {
            //     errors = e.response.data.errors;
            // }
        // }
    }

    const destroyBlog = async (id) => {
        await axios.delete('/api/blogs/' + id)
    }

    return {
        blog,
        blogs,
        errors,
        getBlog,
        getBlogs,
        storeBlog,
        destroyBlog
    }
}
