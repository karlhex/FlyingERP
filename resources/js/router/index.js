import { createRouter, createWebHistory } from 'vue-router'

import CompanyIndex from '../views/companies/index.vue'
import SosIndex from '../views/sos/index.vue'
import PersonIndex from '../views/people/index.vue'

const routes = [
    {
        path: '/companies',
        name: 'companies.index',
        component: CompanyIndex
    },
    {
        path: '/company/:id',
        name: 'company.edit',
        component: () => import('../views/companies/edit')
    },
    {
        path: '/sos',
        name: 'sos.index',
        component: SosIndex
    },
    {
        path: '/people',
        name: 'person.index',
        component: PersonIndex
    },
    {
        path: '/person/:id',
        name: 'person.edit',
        component: () => import('../views/people/edit')
    },
    {
        path: '/employees',
        component: () => import('../views/employees/index'),
        name: 'Employees',
    },
    {
        path: '/employee/:id',
        component: () => import('../views/employees/edit'),
        name: 'employee.edit',
    },
    {
        path: '/contracts',
        component: () => import('../views/contracts/index'),
        name: 'Contracts',
    },
    {
        path: '/contract/:id',
        component: () => import('../views/contracts/edit'),
        name: 'contract.edit',
    },
    {
        path: '/projects',
        component: () => import('../views/projects/index'),
        name: 'Projects',
    },
    {
        path: '/project/:id',
        component: () => import('../views/projects/edit'),
        name: 'project.edit',
    },
    {
        path: '/productinfos',
        component: () => import('../views/productinfos/index'),
        name: 'productinfos',
    },
    {
        path: '/productinfos/:id',
        component: () => import('../views/productinfos/edit'),
        name: 'productinfo.edit',
    }
];

const router = createRouter({
    history: createWebHistory(),
    routes
})

export default router
