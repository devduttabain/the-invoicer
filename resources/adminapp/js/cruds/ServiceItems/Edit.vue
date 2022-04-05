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
                <strong>{{ $t('cruds.serviceItem.title_singular') }}</strong>
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
                    <label>{{ $t('cruds.serviceItem.fields.title') }}</label>
                    <div
                      class="form-group bmd-form-group"
                      :class="{
                        'has-items': entry.title,
                        'is-focused': activeField == 'title'
                      }"
                    >
                      <label class="bmd-label-floating">{{
                        $t('cruds.serviceItem.fields.title_helper')
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
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.description,
                      'is-focused': activeField == 'description'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.serviceItem.fields.description')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.description"
                      @input="updateDescription"
                      @focus="focusField('description')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div class="form-group">
                    <label>{{
                      $t('cruds.serviceItem.fields.estimated_effort_in_hours')
                    }}</label>
                    <div
                      class="form-group bmd-form-group"
                      :class="{
                        'has-items': entry.estimated_effort_in_hours,
                        'is-focused': activeField == 'estimated_effort_in_hours'
                      }"
                    >
                      <label class="bmd-label-floating">{{
                        $t(
                          'cruds.serviceItem.fields.estimated_effort_in_hours_helper'
                        )
                      }}</label>
                      <input
                        class="form-control"
                        type="number"
                        step="0.01"
                        :value="entry.estimated_effort_in_hours"
                        @input="updateEstimatedEffortInHours"
                        @focus="focusField('estimated_effort_in_hours')"
                        @blur="clearFocus"
                        min="1"
                      />
                    </div>
                  </div>
                  <div class="form-group">
                    <label>{{
                      $t('cruds.serviceItem.fields.cost_per_hour')
                    }}</label>
                    <div
                      class="form-group bmd-form-group"
                      :class="{
                        'has-items': entry.cost_per_hour,
                        'is-focused': activeField == 'cost_per_hour'
                      }"
                    >
                      <label class="bmd-label-floating">{{
                        $t('cruds.serviceItem.fields.cost_per_hour_helper')
                      }}</label>
                      <input
                        class="form-control"
                        type="number"
                        step="0.01"
                        :value="entry.cost_per_hour"
                        @input="updateCostPerHour"
                        @focus="focusField('cost_per_hour')"
                        @blur="clearFocus"
                      />
                    </div>
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.actual_effort_in_hour,
                      'is-focused': activeField == 'actual_effort_in_hour'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.serviceItem.fields.actual_effort_in_hour')
                    }}</label>
                    <input
                      class="form-control"
                      type="number"
                      step="0.01"
                      :value="entry.actual_effort_in_hour"
                      @input="updateActualEffortInHour"
                      @focus="focusField('actual_effort_in_hour')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div class="form-group">
                    <label>{{ $t('cruds.serviceItem.fields.deadline') }}</label>
                    <div
                      class="form-group bmd-form-group"
                      :class="{
                        'has-items': entry.deadline,
                        'is-focused': activeField == 'deadline'
                      }"
                    >
                      <label class="bmd-label-floating">{{
                        $t('cruds.serviceItem.fields.deadline_helper')
                      }}</label>
                      <datetime-picker
                        class="form-control"
                        type="text"
                        :value="entry.deadline"
                        @input="updateDeadline"
                        @focus="focusField('deadline')"
                        @blur="clearFocus"
                      >
                      </datetime-picker>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>{{ $t('cruds.serviceItem.fields.ended_at') }}</label>
                    <div
                      class="form-group bmd-form-group"
                      :class="{
                        'has-items': entry.ended_at,
                        'is-focused': activeField == 'ended_at'
                      }"
                    >
                      <label class="bmd-label-floating">{{
                        $t('cruds.serviceItem.fields.ended_at_helper')
                      }}</label>
                      <datetime-picker
                        class="form-control"
                        type="text"
                        :value="entry.ended_at"
                        @input="updateEndedAt"
                        @focus="focusField('ended_at')"
                        @blur="clearFocus"
                      >
                      </datetime-picker>
                    </div>
                  </div>
                  <label class="required">{{
                    $t('cruds.serviceItem.fields.service')
                  }}</label>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.service_id !== null,
                      'is-focused': activeField == 'service'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.serviceItem.fields.service_helper')
                    }}</label>
                    <v-select
                      name="service"
                      label="title"
                      :key="'service-field'"
                      :value="entry.service_id"
                      :options="lists.service"
                      :reduce="entry => entry.id"
                      @input="updateService"
                      @search.focus="focusField('service')"
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
    ...mapGetters('ServiceItemsSingle', ['entry', 'loading', 'lists'])
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
    ...mapActions('ServiceItemsSingle', [
      'fetchEditData',
      'updateData',
      'resetState',
      'setTitle',
      'setDescription',
      'setEstimatedEffortInHours',
      'setCostPerHour',
      'setActualEffortInHour',
      'setDeadline',
      'setEndedAt',
      'setService'
    ]),
    updateTitle(e) {
      this.setTitle(e.target.value)
    },
    updateDescription(e) {
      this.setDescription(e.target.value)
    },
    updateEstimatedEffortInHours(e) {
      this.setEstimatedEffortInHours(e.target.value)
    },
    updateCostPerHour(e) {
      this.setCostPerHour(e.target.value)
    },
    updateActualEffortInHour(e) {
      this.setActualEffortInHour(e.target.value)
    },
    updateDeadline(e) {
      this.setDeadline(e.target.value)
    },
    updateEndedAt(e) {
      this.setEndedAt(e.target.value)
    },
    updateService(value) {
      this.setService(value)
    },
    submitForm() {
      this.updateData()
        .then(() => {
          this.$router.push({ name: 'service_items.index' })
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
