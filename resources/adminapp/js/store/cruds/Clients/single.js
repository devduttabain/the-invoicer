function initialState() {
  return {
    entry: {
      id: null,
      name: '',
      email: null,
      phone: '',
      address: '',
      is_business: null,
      business_name: '',
      is_gst_enabled: null,
      gstin: '',
      created_at: '',
      updated_at: '',
      deleted_at: ''
    },
    lists: {
      is_business: [],
      is_gst_enabled: []
    },
    loading: false
  }
}

const route = 'clients'

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
  setName({ commit }, value) {
    commit('setName', value)
  },
  setEmail({ commit }, value) {
    commit('setEmail', value)
  },
  setPhone({ commit }, value) {
    commit('setPhone', value)
  },
  setAddress({ commit }, value) {
    commit('setAddress', value)
  },
  setIsBusiness({ commit }, value) {
    commit('setIsBusiness', value)
  },
  setBusinessName({ commit }, value) {
    commit('setBusinessName', value)
  },
  setIsGstEnabled({ commit }, value) {
    commit('setIsGstEnabled', value)
  },
  setGstin({ commit }, value) {
    commit('setGstin', value)
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
  setName(state, value) {
    state.entry.name = value
  },
  setEmail(state, value) {
    state.entry.email = value
  },
  setPhone(state, value) {
    state.entry.phone = value
  },
  setAddress(state, value) {
    state.entry.address = value
  },
  setIsBusiness(state, value) {
    state.entry.is_business = value
  },
  setBusinessName(state, value) {
    state.entry.business_name = value
  },
  setIsGstEnabled(state, value) {
    state.entry.is_gst_enabled = value
  },
  setGstin(state, value) {
    state.entry.gstin = value
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
