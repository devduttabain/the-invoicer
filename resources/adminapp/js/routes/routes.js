import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

const View = { template: '<router-view></router-view>' }

const routes = [
  {
    path: '/',
    component: () => import('@pages/Layout/DashboardLayout.vue'),
    redirect: 'dashboard',
    children: [
      {
        path: 'dashboard',
        name: 'dashboard',
        component: () => import('@pages/Dashboard.vue'),
        meta: { title: 'global.dashboard' }
      },
      {
        path: 'user-management',
        name: 'user_management',
        component: View,
        redirect: { name: 'permissions.index' },
        children: [
          {
            path: 'permissions',
            name: 'permissions.index',
            component: () => import('@cruds/Permissions/Index.vue'),
            meta: { title: 'cruds.permission.title' }
          },
          {
            path: 'permissions/create',
            name: 'permissions.create',
            component: () => import('@cruds/Permissions/Create.vue'),
            meta: { title: 'cruds.permission.title' }
          },
          {
            path: 'permissions/:id',
            name: 'permissions.show',
            component: () => import('@cruds/Permissions/Show.vue'),
            meta: { title: 'cruds.permission.title' }
          },
          {
            path: 'permissions/:id/edit',
            name: 'permissions.edit',
            component: () => import('@cruds/Permissions/Edit.vue'),
            meta: { title: 'cruds.permission.title' }
          },
          {
            path: 'roles',
            name: 'roles.index',
            component: () => import('@cruds/Roles/Index.vue'),
            meta: { title: 'cruds.role.title' }
          },
          {
            path: 'roles/create',
            name: 'roles.create',
            component: () => import('@cruds/Roles/Create.vue'),
            meta: { title: 'cruds.role.title' }
          },
          {
            path: 'roles/:id',
            name: 'roles.show',
            component: () => import('@cruds/Roles/Show.vue'),
            meta: { title: 'cruds.role.title' }
          },
          {
            path: 'roles/:id/edit',
            name: 'roles.edit',
            component: () => import('@cruds/Roles/Edit.vue'),
            meta: { title: 'cruds.role.title' }
          },
          {
            path: 'users',
            name: 'users.index',
            component: () => import('@cruds/Users/Index.vue'),
            meta: { title: 'cruds.user.title' }
          },
          {
            path: 'users/create',
            name: 'users.create',
            component: () => import('@cruds/Users/Create.vue'),
            meta: { title: 'cruds.user.title' }
          },
          {
            path: 'users/:id',
            name: 'users.show',
            component: () => import('@cruds/Users/Show.vue'),
            meta: { title: 'cruds.user.title' }
          },
          {
            path: 'users/:id/edit',
            name: 'users.edit',
            component: () => import('@cruds/Users/Edit.vue'),
            meta: { title: 'cruds.user.title' }
          }
        ]
      },
      {
        path: 'client-management',
        name: 'client_management',
        component: View,
        redirect: { name: 'clients.index' },
        children: [
          {
            path: 'clients',
            name: 'clients.index',
            component: () => import('@cruds/Clients/Index.vue'),
            meta: { title: 'cruds.client.title' }
          },
          {
            path: 'clients/create',
            name: 'clients.create',
            component: () => import('@cruds/Clients/Create.vue'),
            meta: { title: 'cruds.client.title' }
          },
          {
            path: 'clients/:id',
            name: 'clients.show',
            component: () => import('@cruds/Clients/Show.vue'),
            meta: { title: 'cruds.client.title' }
          },
          {
            path: 'clients/:id/edit',
            name: 'clients.edit',
            component: () => import('@cruds/Clients/Edit.vue'),
            meta: { title: 'cruds.client.title' }
          },
          {
            path: 'client-custom-datas',
            name: 'client_custom_datas.index',
            component: () => import('@cruds/ClientCustomDatas/Index.vue'),
            meta: { title: 'cruds.clientCustomData.title' }
          },
          {
            path: 'client-custom-datas/create',
            name: 'client_custom_datas.create',
            component: () => import('@cruds/ClientCustomDatas/Create.vue'),
            meta: { title: 'cruds.clientCustomData.title' }
          },
          {
            path: 'client-custom-datas/:id',
            name: 'client_custom_datas.show',
            component: () => import('@cruds/ClientCustomDatas/Show.vue'),
            meta: { title: 'cruds.clientCustomData.title' }
          },
          {
            path: 'client-custom-datas/:id/edit',
            name: 'client_custom_datas.edit',
            component: () => import('@cruds/ClientCustomDatas/Edit.vue'),
            meta: { title: 'cruds.clientCustomData.title' }
          }
        ]
      },
      {
        path: 'service-job',
        name: 'service_job',
        component: View,
        redirect: { name: 'services.index' },
        children: [
          {
            path: 'services',
            name: 'services.index',
            component: () => import('@cruds/Services/Index.vue'),
            meta: { title: 'cruds.service.title' }
          },
          {
            path: 'services/create',
            name: 'services.create',
            component: () => import('@cruds/Services/Create.vue'),
            meta: { title: 'cruds.service.title' }
          },
          {
            path: 'services/:id',
            name: 'services.show',
            component: () => import('@cruds/Services/Show.vue'),
            meta: { title: 'cruds.service.title' }
          },
          {
            path: 'services/:id/edit',
            name: 'services.edit',
            component: () => import('@cruds/Services/Edit.vue'),
            meta: { title: 'cruds.service.title' }
          },
          {
            path: 'service-items',
            name: 'service_items.index',
            component: () => import('@cruds/ServiceItems/Index.vue'),
            meta: { title: 'cruds.serviceItem.title' }
          },
          {
            path: 'service-items/create',
            name: 'service_items.create',
            component: () => import('@cruds/ServiceItems/Create.vue'),
            meta: { title: 'cruds.serviceItem.title' }
          },
          {
            path: 'service-items/:id',
            name: 'service_items.show',
            component: () => import('@cruds/ServiceItems/Show.vue'),
            meta: { title: 'cruds.serviceItem.title' }
          },
          {
            path: 'service-items/:id/edit',
            name: 'service_items.edit',
            component: () => import('@cruds/ServiceItems/Edit.vue'),
            meta: { title: 'cruds.serviceItem.title' }
          },
          {
            path: 'invoices',
            name: 'invoices.index',
            component: () => import('@cruds/Invoices/Index.vue'),
            meta: { title: 'cruds.invoice.title' }
          },
          {
            path: 'invoices/create',
            name: 'invoices.create',
            component: () => import('@cruds/Invoices/Create.vue'),
            meta: { title: 'cruds.invoice.title' }
          },
          {
            path: 'invoices/:id',
            name: 'invoices.show',
            component: () => import('@cruds/Invoices/Show.vue'),
            meta: { title: 'cruds.invoice.title' }
          },
          {
            path: 'invoices/:id/edit',
            name: 'invoices.edit',
            component: () => import('@cruds/Invoices/Edit.vue'),
            meta: { title: 'cruds.invoice.title' }
          },
          {
            path: 'invoice-items',
            name: 'invoice_items.index',
            component: () => import('@cruds/InvoiceItems/Index.vue'),
            meta: { title: 'cruds.invoiceItem.title' }
          },
          {
            path: 'invoice-items/create',
            name: 'invoice_items.create',
            component: () => import('@cruds/InvoiceItems/Create.vue'),
            meta: { title: 'cruds.invoiceItem.title' }
          },
          {
            path: 'invoice-items/:id',
            name: 'invoice_items.show',
            component: () => import('@cruds/InvoiceItems/Show.vue'),
            meta: { title: 'cruds.invoiceItem.title' }
          },
          {
            path: 'invoice-items/:id/edit',
            name: 'invoice_items.edit',
            component: () => import('@cruds/InvoiceItems/Edit.vue'),
            meta: { title: 'cruds.invoiceItem.title' }
          }
        ]
      },
      {
        path: 'contact-management',
        name: 'contact_management',
        component: View,
        redirect: { name: 'contact_companies.index' },
        children: [
          {
            path: 'contact-companies',
            name: 'contact_companies.index',
            component: () => import('@cruds/ContactCompanies/Index.vue'),
            meta: { title: 'cruds.contactCompany.title' }
          },
          {
            path: 'contact-companies/create',
            name: 'contact_companies.create',
            component: () => import('@cruds/ContactCompanies/Create.vue'),
            meta: { title: 'cruds.contactCompany.title' }
          },
          {
            path: 'contact-companies/:id',
            name: 'contact_companies.show',
            component: () => import('@cruds/ContactCompanies/Show.vue'),
            meta: { title: 'cruds.contactCompany.title' }
          },
          {
            path: 'contact-companies/:id/edit',
            name: 'contact_companies.edit',
            component: () => import('@cruds/ContactCompanies/Edit.vue'),
            meta: { title: 'cruds.contactCompany.title' }
          },
          {
            path: 'contact-contacts',
            name: 'contact_contacts.index',
            component: () => import('@cruds/ContactContacts/Index.vue'),
            meta: { title: 'cruds.contactContact.title' }
          },
          {
            path: 'contact-contacts/create',
            name: 'contact_contacts.create',
            component: () => import('@cruds/ContactContacts/Create.vue'),
            meta: { title: 'cruds.contactContact.title' }
          },
          {
            path: 'contact-contacts/:id',
            name: 'contact_contacts.show',
            component: () => import('@cruds/ContactContacts/Show.vue'),
            meta: { title: 'cruds.contactContact.title' }
          },
          {
            path: 'contact-contacts/:id/edit',
            name: 'contact_contacts.edit',
            component: () => import('@cruds/ContactContacts/Edit.vue'),
            meta: { title: 'cruds.contactContact.title' }
          }
        ]
      },
      {
        path: 'basic-c-r-m',
        name: 'basic_c_r_m',
        component: View,
        redirect: { name: 'crm_statuses.index' },
        children: [
          {
            path: 'crm-statuses',
            name: 'crm_statuses.index',
            component: () => import('@cruds/CrmStatuses/Index.vue'),
            meta: { title: 'cruds.crmStatus.title' }
          },
          {
            path: 'crm-statuses/create',
            name: 'crm_statuses.create',
            component: () => import('@cruds/CrmStatuses/Create.vue'),
            meta: { title: 'cruds.crmStatus.title' }
          },
          {
            path: 'crm-statuses/:id',
            name: 'crm_statuses.show',
            component: () => import('@cruds/CrmStatuses/Show.vue'),
            meta: { title: 'cruds.crmStatus.title' }
          },
          {
            path: 'crm-statuses/:id/edit',
            name: 'crm_statuses.edit',
            component: () => import('@cruds/CrmStatuses/Edit.vue'),
            meta: { title: 'cruds.crmStatus.title' }
          },
          {
            path: 'crm-customers',
            name: 'crm_customers.index',
            component: () => import('@cruds/CrmCustomers/Index.vue'),
            meta: { title: 'cruds.crmCustomer.title' }
          },
          {
            path: 'crm-customers/create',
            name: 'crm_customers.create',
            component: () => import('@cruds/CrmCustomers/Create.vue'),
            meta: { title: 'cruds.crmCustomer.title' }
          },
          {
            path: 'crm-customers/:id',
            name: 'crm_customers.show',
            component: () => import('@cruds/CrmCustomers/Show.vue'),
            meta: { title: 'cruds.crmCustomer.title' }
          },
          {
            path: 'crm-customers/:id/edit',
            name: 'crm_customers.edit',
            component: () => import('@cruds/CrmCustomers/Edit.vue'),
            meta: { title: 'cruds.crmCustomer.title' }
          },
          {
            path: 'crm-notes',
            name: 'crm_notes.index',
            component: () => import('@cruds/CrmNotes/Index.vue'),
            meta: { title: 'cruds.crmNote.title' }
          },
          {
            path: 'crm-notes/create',
            name: 'crm_notes.create',
            component: () => import('@cruds/CrmNotes/Create.vue'),
            meta: { title: 'cruds.crmNote.title' }
          },
          {
            path: 'crm-notes/:id',
            name: 'crm_notes.show',
            component: () => import('@cruds/CrmNotes/Show.vue'),
            meta: { title: 'cruds.crmNote.title' }
          },
          {
            path: 'crm-notes/:id/edit',
            name: 'crm_notes.edit',
            component: () => import('@cruds/CrmNotes/Edit.vue'),
            meta: { title: 'cruds.crmNote.title' }
          },
          {
            path: 'crm-documents',
            name: 'crm_documents.index',
            component: () => import('@cruds/CrmDocuments/Index.vue'),
            meta: { title: 'cruds.crmDocument.title' }
          },
          {
            path: 'crm-documents/create',
            name: 'crm_documents.create',
            component: () => import('@cruds/CrmDocuments/Create.vue'),
            meta: { title: 'cruds.crmDocument.title' }
          },
          {
            path: 'crm-documents/:id',
            name: 'crm_documents.show',
            component: () => import('@cruds/CrmDocuments/Show.vue'),
            meta: { title: 'cruds.crmDocument.title' }
          },
          {
            path: 'crm-documents/:id/edit',
            name: 'crm_documents.edit',
            component: () => import('@cruds/CrmDocuments/Edit.vue'),
            meta: { title: 'cruds.crmDocument.title' }
          }
        ]
      }
    ]
  }
]

export default new VueRouter({
  mode: 'history',
  base: '/admin',
  routes
})
