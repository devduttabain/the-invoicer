<template>
  <div class="container-fluid">
    <form @submit.prevent="submitForm">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary card-header-icon">
              <div class="card-icon">
                <i class="material-icons">edit</i>
              </div>
              <h4 class="card-title">
                {{ $t('global.edit') }}
                <strong>{{ $t('cruds.service.title_singular') }}</strong>
              </h4>
            </div>
            <div class="card-body">
              <back-button></back-button>
            </div>
            <div class="card-body">
              <bootstrap-alert />
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>{{ $t('cruds.service.fields.title') }}</label>
                    <div
                      class="form-group bmd-form-group"
                      :class="{
                        'has-items': entry.title,
                        'is-focused': activeField == 'title'
                      }"
                    >
                      <label class="bmd-label-floating">{{
                        $t('cruds.service.fields.title_helper')
                      }}</label>
                      <input
                        class="form-control"
                        type="text"
                        :value="entry.title"
                        @input="updateTitle"
                        @focus="focusField('title')"
                        @blur="clearFocus"
                      />
                    </div>
                  </div>
                  <label class="required">{{
                    $t('cruds.service.fields.client')
                  }}</label>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.client_id !== null,
                      'is-focused': activeField == 'client'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.service.fields.client_helper')
                    }}</label>
                    <v-select
                      name="client"
                      label="name"
                      :key="'client-field'"
                      :value="entry.client_id"
                      :options="lists.client"
                      :reduce="entry => entry.id"
                      @input="updateClient"
                      @search.focus="focusField('client')"
                      @search.blur="clearFocus"
                    />
                  </div>
                  <div class="form-group">
                    <label class="required">{{
                      $t('cruds.service.fields.starts_from')
                    }}</label>
                    <div
                      class="form-group bmd-form-group"
                      :class="{
                        'has-items': entry.starts_from,
                        'is-focused': activeField == 'starts_from'
                      }"
                    >
                      <label class="bmd-label-floating">{{
                        $t('cruds.service.fields.starts_from_helper')
                      }}</label>
                      <datetime-picker
                        class="form-control"
                        type="text"
                        picker="date"
                        :value="entry.starts_from"
                        @input="updateStartsFrom"
                        @focus="focusField('starts_from')"
                        @blur="clearFocus"
                        required
                      >
                      </datetime-picker>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>{{ $t('cruds.service.fields.type') }}</label>
                    <div class="form-group bmd-form-group has-items">
                      <label class="bmd-label-floating">{{
                        $t('cruds.service.fields.type_helper')
                      }}</label>
                      <v-radio
                        :value="entry.type"
                        :options="lists.type"
                        @change="updateType"
                      >
                      </v-radio>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>{{ $t('cruds.service.fields.ends_at') }}</label>
                    <div
                      class="form-group bmd-form-group"
                      :class="{
                        'has-items': entry.ends_at,
                        'is-focused': activeField == 'ends_at'
                      }"
                    >
                      <label class="bmd-label-floating">{{
                        $t('cruds.service.fields.ends_at_helper')
                      }}</label>
                      <input
                        class="form-control"
                        type="text"
                        :value="entry.ends_at"
                        @input="updateEndsAt"
                        @focus="focusField('ends_at')"
                        @blur="clearFocus"
                      />
                    </div>
                  </div>
                  <div class="form-group">
                    <label>{{ $t('cruds.service.fields.priority') }}</label>
                    <div class="form-group bmd-form-group has-items">
                      <label class="bmd-label-floating">{{
                        $t('cruds.service.fields.priority_helper')
                      }}</label>
                      <v-radio
                        :value="entry.priority"
                        :options="lists.priority"
                        @change="updatePriority"
                      >
                      </v-radio>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer">
              <vue-button-spinner
                class="btn-primary"
                :status="status"
                :isLoading="loading"
                :disabled="loading"
              >
                {{ $t('global.save') }}
              </vue-button-spinner>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</template>

<script>
import { mapGetters, mapActions } from 'vuex'

export default {
  data() {
    return {
      status: '',
      activeField: ''
    }
  },
  computed: {
    ...mapGetters('ServicesSingle', ['entry', 'loading', 'lists'])
  },
  beforeDestroy() {
    this.resetState()
  },
  watch: {
    '$route.params.id': {
      immediate: true,
      handler() {
        this.resetState()
        this.fetchEditData(this.$route.params.id)
      }
    }
  },
  methods: {
    ...mapActions('ServicesSingle', [
      'fetchEditData',
      'updateData',
      'resetState',
      'setTitle',
      'setClient',
      'setStartsFrom',
      'setType',
      'setEndsAt',
      'setPriority'
    ]),
    updateTitle(e) {
      this.setTitle(e.target.value)
    },
    updateClient(value) {
      this.setClient(value)
    },
    updateStartsFrom(e) {
      this.setStartsFrom(e.target.value)
    },
    updateType(value) {
      this.setType(value)
    },
    updateEndsAt(e) {
      this.setEndsAt(e.target.value)
    },
    updatePriority(value) {
      this.setPriority(value)
    },
    submitForm() {
      this.updateData()
        .then(() => {
          this.$router.push({ name: 'services.index' })
          this.$eventHub.$emit('update-success')
        })
        .catch(error => {
          this.status = 'failed'
          _.delay(() => {
            this.status = ''
          }, 3000)
        })
    },
    focusField(name) {
      this.activeField = name
    },
    clearFocus() {
      this.activeField = ''
    }
  }
}
</script>
