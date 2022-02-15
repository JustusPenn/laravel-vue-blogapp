import { createRouter, createWebHistory } from 'vue-router';

import BlogIndex from '../components/blog/BlogIndex'
import BlogCreate from '../components/blog/BlogCreate'
import CompaniesIndex from '../components/companies/CompaniesIndex'
import CompaniesCreate from '../components/companies/CompaniesCreate'
import CompaniesEdit from '../components/companies/CompaniesEdit'

const routes = [
    {
        path: '/dashboard',
        name: 'blog.index',
        component: BlogIndex
    },
    {
        path: '/blog/create',
        name: 'blog.create',
        component: BlogCreate
    },
    {
        path: '/companies/all',
        name: 'companies.index',
        component: CompaniesIndex
    },
    {
        path: '/companies/create',
        name: 'companies.create',
        component: CompaniesCreate
    },
    {
        path: '/companies/:id/edit',
        name: 'companies.edit',
        component: CompaniesEdit,
        props: true
    }
];

const router = createRouter({
    history: createWebHistory(),
    routes
})

export default router;
