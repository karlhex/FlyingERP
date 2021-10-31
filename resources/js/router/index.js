import { createRouter, createWebHistory } from 'vue-router'

import CompanyIndex from '../views/companies/index.vue'
import SosIndex from '../views/sos/index.vue'
import PersonIndex from '../views/people/index.vue'

const routes = [
    {
        path: '/dashboard',
        name: 'companies.index',
        component: CompanyIndex
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
    path: '/employees',
    component: () => import('../views/employees/index'),
    name: 'Employees',
  },
  {
    path: '/employee/:id',
    component: () => import('../views/employees/edit'),
    name: 'employee.edit',
  }
];

const router = createRouter({
    history: createWebHistory(),
    routes
})

export default router
