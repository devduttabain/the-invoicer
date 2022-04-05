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
                <strong>{{
                  $t('cruds.clientCustomData.title_singular')
                }}</strong>
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
                    <label class="required">{{
                      $t('cruds.clientCustomData.fields.label')
                    }}</label>
                    <div
                      class="form-group bmd-form-group"
                      :class="{
                        'has-items': entry.label,
                        'is-focused': activeField == 'label'
                      }"
                    >
                      <label class="bmd-label-floating">{{
                        $t('cruds.clientCustomData.fields.label_helper')
                      }}</label>
                      <input
                        class="form-control"
                        type="text"
                        :value="entry.label"
                        @input="updateLabel"
                        @focus="focusField('label')"
                        @blur="clearFocus"
                        required
                      />
                    </div>
                  </div>
                  <div class="form-group">
                    <label>{{
                      $t('cruds.clientCustomData.fields.value')
                    }}</label>
                    <div
                      class="form-group bmd-form-group"
                      :class="{
                        'has-items': entry.value,
                        'is-focused': activeField == 'value'
                      }"
                    >
                      <label class="bmd-label-floating">{{
                        $t('cruds.clientCustomData.fields.value_helper')
                      }}</label>
                      <input
                        class="form-control"
                        type="text"
                        :value="entry.value"
                        @input="updateValue"
                        @focus="focusField('value')"
                        @blur="clearFocus"
                      />
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="required">{{
                      $t('cruds.clientCustomData.fields.value_type')
                    }}</label>
                    <div class="form-group bmd-form-group has-items">
                      <label class="bmd-label-floating">{{
                        $t('cruds.clientCustomData.fields.value_type_helper')
                      }}</label>
                      <v-radio
                        :value="entry.value_type"
                        :options="lists.value_type"
                        @change="updateValueType"
                      >
                      </v-radio>
                    </div>
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.client_id !== null,
                      'is-focused': activeField == 'client'
                    }"
                  >
                    <label class="bmd-label-floating required">{{
                      $t('cruds.clientCustomData.fields.client')
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
    ...mapGetters('ClientCustomDatasSingle', ['entry', 'loading', 'lists'])
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
    ...mapActions('ClientCustomDatasSingle', [
      'fetchEditData',
      'updateData',
      'resetState',
      'setLabel',
      'setValue',
      'setValueType',
      'setClient'
    ]),
    updateLabel(e) {
      this.setLabel(e.target.value)
    },
    updateValue(e) {
      this.setValue(e.target.value)
    },
    updateValueType(value) {
      this.setValueType(value)
    },
    updateClient(value) {
      this.setClient(value)
    },
    submitForm() {
      this.updateData()
        .then(() => {
          this.$router.push({ name: 'client_custom_datas.index' })
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
