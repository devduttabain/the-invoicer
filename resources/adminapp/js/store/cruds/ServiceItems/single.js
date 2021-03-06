function initialState() {
  return {
    entry: {
      id: null,
      title: '',
      description: '',
      estimated_effort_in_hours: '1',
      cost_per_hour: '100',
      actual_effort_in_hour: '1',
      deadline: '',
      ended_at: '',
      service_id: null,
      created_at: '',
      updated_at: '',
      deleted_at: ''
    },
    lists: {
      service: []
    },
    loading: false
  }
}

const route = 'service-items'

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
  setTitle({ commit }, value) {
    commit('setTitle', value)
  },
  setDescription({ commit }, value) {
    commit('setDescription', value)
  },
  setEstimatedEffortInHours({ commit }, value) {
    commit('setEstimatedEffortInHours', value)
  },
  setCostPerHour({ commit }, value) {
    commit('setCostPerHour', value)
  },
  setActualEffortInHour({ commit }, value) {
    commit('setActualEffortInHour', value)
  },
  setDeadline({ commit }, value) {
    commit('setDeadline', value)
  },
  setEndedAt({ commit }, value) {
    commit('setEndedAt', value)
  },
  setService({ commit }, value) {
    commit('setService', value)
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
  setTitle(state, value) {
    state.entry.title = value
  },
  setDescription(state, value) {
    state.entry.description = value
  },
  setEstimatedEffortInHours(state, value) {
    state.entry.estimated_effort_in_hours = value
  },
  setCostPerHour(state, value) {
    state.entry.cost_per_hour = value
  },
  setActualEffortInHour(state, value) {
    state.entry.actual_effort_in_hour = value
  },
  setDeadline(state, value) {
    state.entry.deadline = value
  },
  setEndedAt(state, value) {
    state.entry.ended_at = value
  },
  setService(state, value) {
    state.entry.service_id = value
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
