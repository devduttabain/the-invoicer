function initialState() {
  return {
    entry: {
      id: null,
      invoice_no: '',
      service_id: null,
      client_id: null,
      is_gst_enabled: null,
      gstin: '',
      invoice_tax_rate_cgst: '',
      invoice_tax_rate_sgst: '0',
      created_at: '',
      updated_at: '',
      deleted_at: ''
    },
    lists: {
      service: [],
      client: [],
      is_gst_enabled: []
    },
    loading: false
  }
}

const route = 'invoices'

const getters = {
  entry: state => state.entry,
  lists: state => state.lists,
  loading: state => state.loading
}

const actions = {
  storeData({ commit, state, dispatch }) {
    commit('setLoading', true)
    dispatch('Alert/resetState', null, { root: true })

    return new Promise((resolve, reject) => {
      let params = objectToFormData(state.entry, {
        indices: true,
        booleansAsIntegers: true
      })
      axios
        .post(route, params)
        .then(response => {
          resolve(response)
        })
        .catch(error => {
          let message = error.response.data.message || error.message
          let errors = error.response.data.errors

          dispatch(
            'Alert/setAlert',
            { message: message, errors: errors, color: 'danger' },
            { root: true }
          )

          reject(error)
        })
        .finally(() => {
          commit('setLoading', false)
        })
    })
  },
  updateData({ commit, state, dispatch }) {
    commit('setLoading', true)
    dispatch('Alert/resetState', null, { root: true })

    return new Promise((resolve, reject) => {
      let params = objectToFormData(state.entry, {
        indices: true,
        booleansAsIntegers: true
      })
      params.set('_method', 'PUT')
      axios
        .post(`${route}/${state.entry.id}`, params)
        .then(response => {
          resolve(response)
        })
        .catch(error => {
          let message = error.response.data.message || error.message
          let errors = error.response.data.errors

          dispatch(
            'Alert/setAlert',
            { message: message, errors: errors, color: 'danger' },
            { root: true }
          )

          reject(error)
        })
        .finally(() => {
          commit('setLoading', false)
        })
    })
  },
  setInvoiceNo({ commit }, value) {
    commit('setInvoiceNo', value)
  },
  setService({ commit }, value) {
    commit('setService', value)
  },
  setClient({ commit }, value) {
    commit('setClient', value)
  },
  setIsGstEnabled({ commit }, value) {
    commit('setIsGstEnabled', value)
  },
  setGstin({ commit }, value) {
    commit('setGstin', value)
  },
  setInvoiceTaxRateCgst({ commit }, value) {
    commit('setInvoiceTaxRateCgst', value)
  },
  setInvoiceTaxRateSgst({ commit }, value) {
    commit('setInvoiceTaxRateSgst', value)
  },
  setCreatedAt({ commit }, value) {
    commit('setCreatedAt', value)
  },
  setUpdatedAt({ commit }, value) {
    commit('setUpdatedAt', value)
  },
  setDeletedAt({ commit }, value) {
    commit('setDeletedAt', value)
  },
  fetchCreateData({ commit }) {
    axios.get(`${route}/create`).then(response => {
      commit('setLists', response.data.meta)
    })
  },
  fetchEditData({ commit, dispatch }, id) {
    axios.get(`${route}/${id}/edit`).then(response => {
      commit('setEntry', response.data.data)
      commit('setLists', response.data.meta)
    })
  },
  fetchShowData({ commit, dispatch }, id) {
    axios.get(`${route}/${id}`).then(response => {
      commit('setEntry', response.data.data)
    })
  },
  resetState({ commit }) {
    commit('resetState')
  }
}

const mutations = {
  setEntry(state, entry) {
    state.entry = entry
  },
  setInvoiceNo(state, value) {
    state.entry.invoice_no = value
  },
  setService(state, value) {
    state.entry.service_id = value
  },
  setClient(state, value) {
    state.entry.client_id = value
  },
  setIsGstEnabled(state, value) {
    state.entry.is_gst_enabled = value
  },
  setGstin(state, value) {
    state.entry.gstin = value
  },
  setInvoiceTaxRateCgst(state, value) {
    state.entry.invoice_tax_rate_cgst = value
  },
  setInvoiceTaxRateSgst(state, value) {
    state.entry.invoice_tax_rate_sgst = value
  },
  setCreatedAt(state, value) {
    state.entry.created_at = value
  },
  setUpdatedAt(state, value) {
    state.entry.updated_at = value
  },
  setDeletedAt(state, value) {
    state.entry.deleted_at = value
  },
  setLists(state, lists) {
    state.lists = lists
  },
  setLoading(state, loading) {
    state.loading = loading
  },
  resetState(state) {
    state = Object.assign(state, initialState())
  }
}

export default {
  namespaced: true,
  state: initialState,
  getters,
  actions,
  mutations
}
