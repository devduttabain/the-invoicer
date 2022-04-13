function initialState() {
  return {
    entry: {
      id: null,
      invoice_id: null,
      title: '',
      description: '',
      unit: '',
      quantity: '1',
      price_per_unit: '0',
      sub_total_price: '',
      discount: '0',
      discount_percentage: '0',
      tax: '0',
      tax_percentage: '0',
      service_id: null,
      service_item_id: null,
      created_at: '',
      updated_at: '',
      deleted_at: ''
    },
    lists: {
      invoice: [],
      service: [],
      service_item: []
    },
    loading: false
  }
}

const route = 'invoice-items'

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
  setInvoice({ commit }, value) {
    commit('setInvoice', value)
  },
  setTitle({ commit }, value) {
    commit('setTitle', value)
  },
  setDescription({ commit }, value) {
    commit('setDescription', value)
  },
  setUnit({ commit }, value) {
    commit('setUnit', value)
  },
  setQuantity({ commit }, value) {
    commit('setQuantity', value)
  },
  setPricePerUnit({ commit }, value) {
    commit('setPricePerUnit', value)
  },
  setSubTotalPrice({ commit }, value) {
    commit('setSubTotalPrice', value)
  },
  setDiscount({ commit }, value) {
    commit('setDiscount', value)
  },
  setDiscountPercentage({ commit }, value) {
    commit('setDiscountPercentage', value)
  },
  setTax({ commit }, value) {
    commit('setTax', value)
  },
  setTaxPercentage({ commit }, value) {
    commit('setTaxPercentage', value)
  },
  setService({ commit }, value) {
    commit('setService', value)
  },
  setServiceItem({ commit }, value) {
    commit('setServiceItem', value)
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
  setInvoice(state, value) {
    state.entry.invoice_id = value
  },
  setTitle(state, value) {
    state.entry.title = value
  },
  setDescription(state, value) {
    state.entry.description = value
  },
  setUnit(state, value) {
    state.entry.unit = value
  },
  setQuantity(state, value) {
    state.entry.quantity = value
  },
  setPricePerUnit(state, value) {
    state.entry.price_per_unit = value
  },
  setSubTotalPrice(state, value) {
    state.entry.sub_total_price = value
  },
  setDiscount(state, value) {
    state.entry.discount = value
  },
  setDiscountPercentage(state, value) {
    state.entry.discount_percentage = value
  },
  setTax(state, value) {
    state.entry.tax = value
  },
  setTaxPercentage(state, value) {
    state.entry.tax_percentage = value
  },
  setService(state, value) {
    state.entry.service_id = value
  },
  setServiceItem(state, value) {
    state.entry.service_item_id = value
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
