import Vue from 'vue'
import Vuex from 'vuex'

import Alert from './modules/alert'
import I18NStore from './modules/i18n'

import PermissionsIndex from './cruds/Permissions'
import PermissionsSingle from './cruds/Permissions/single'
import RolesIndex from './cruds/Roles'
import RolesSingle from './cruds/Roles/single'
import UsersIndex from './cruds/Users'
import UsersSingle from './cruds/Users/single'
import ClientsIndex from './cruds/Clients'
import ClientsSingle from './cruds/Clients/single'
import ServicesIndex from './cruds/Services'
import ServicesSingle from './cruds/Services/single'
import ContactCompaniesIndex from './cruds/ContactCompanies'
import ContactCompaniesSingle from './cruds/ContactCompanies/single'
import ContactContactsIndex from './cruds/ContactContacts'
import ContactContactsSingle from './cruds/ContactContacts/single'
import CrmStatusesIndex from './cruds/CrmStatuses'
import CrmStatusesSingle from './cruds/CrmStatuses/single'
import CrmCustomersIndex from './cruds/CrmCustomers'
import CrmCustomersSingle from './cruds/CrmCustomers/single'
import CrmNotesIndex from './cruds/CrmNotes'
import CrmNotesSingle from './cruds/CrmNotes/single'
import CrmDocumentsIndex from './cruds/CrmDocuments'
import CrmDocumentsSingle from './cruds/CrmDocuments/single'
import ServiceItemsIndex from './cruds/ServiceItems'
import ServiceItemsSingle from './cruds/ServiceItems/single'

Vue.use(Vuex)

const debug = process.env.NODE_ENV !== 'production'

export default new Vuex.Store({
  modules: {
    Alert,
    I18NStore,
    PermissionsIndex,
    PermissionsSingle,
    RolesIndex,
    RolesSingle,
    UsersIndex,
    UsersSingle,
    ClientsIndex,
    ClientsSingle,
    ServicesIndex,
    ServicesSingle,
    ContactCompaniesIndex,
    ContactCompaniesSingle,
    ContactContactsIndex,
    ContactContactsSingle,
    CrmStatusesIndex,
    CrmStatusesSingle,
    CrmCustomersIndex,
    CrmCustomersSingle,
    CrmNotesIndex,
    CrmNotesSingle,
    CrmDocumentsIndex,
    CrmDocumentsSingle,
    ServiceItemsIndex,
    ServiceItemsSingle
  },
  strict: debug
})
