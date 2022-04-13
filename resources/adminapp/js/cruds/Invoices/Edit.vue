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
                <strong>{{ $t('cruds.invoice.title_singular') }}</strong>
              </h4>
            </div>
            <div class="card-body">
              <back-button></back-button>
            </div>
            <div class="card-body">
              <bootstrap-alert />
              <div class="row">
                <div class="col-md-12">
                  <label>{{ $t('cruds.invoice.fields.service') }}</label>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.service_id !== null,
                      'is-focused': activeField == 'service'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.invoice.fields.service_helper')
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
                  <label>{{ $t('cruds.invoice.fields.client') }}</label>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.client_id !== null,
                      'is-focused': activeField == 'client'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.invoice.fields.client_helper')
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
                    <label>{{
                      $t('cruds.invoice.fields.is_gst_enabled')
                    }}</label>
                    <div class="form-group bmd-form-group has-items">
                      <label class="bmd-label-floating">{{
                        $t('cruds.invoice.fields.is_gst_enabled_helper')
                      }}</label>
                      <v-radio
                        :value="entry.is_gst_enabled"
                        :options="lists.is_gst_enabled"
                        @change="updateIsGstEnabled"
                      >
                      </v-radio>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>{{ $t('cruds.invoice.fields.gstin') }}</label>
                    <div
                      class="form-group bmd-form-group"
                      :class="{
                        'has-items': entry.gstin,
                        'is-focused': activeField == 'gstin'
                      }"
                    >
                      <label class="bmd-label-floating">{{
                        $t('cruds.invoice.fields.gstin_helper')
                      }}</label>
                      <input
                        class="form-control"
                        type="text"
                        :value="entry.gstin"
                        @input="updateGstin"
                        @focus="focusField('gstin')"
                        @blur="clearFocus"
                      />
                    </div>
                  </div>
                  <div class="form-group">
                    <label>{{
                      $t('cruds.invoice.fields.invoice_tax_rate_cgst')
                    }}</label>
                    <div
                      class="form-group bmd-form-group"
                      :class="{
                        'has-items': entry.invoice_tax_rate_cgst,
                        'is-focused': activeField == 'invoice_tax_rate_cgst'
                      }"
                    >
                      <label class="bmd-label-floating">{{
                        $t('cruds.invoice.fields.invoice_tax_rate_cgst_helper')
                      }}</label>
                      <input
                        class="form-control"
                        type="number"
                        step="0.01"
                        :value="entry.invoice_tax_rate_cgst"
                        @input="updateInvoiceTaxRateCgst"
                        @focus="focusField('invoice_tax_rate_cgst')"
                        @blur="clearFocus"
                      />
                    </div>
                  </div>
                  <div class="form-group">
                    <label>{{
                      $t('cruds.invoice.fields.invoice_tax_rate_sgst')
                    }}</label>
                    <div
                      class="form-group bmd-form-group"
                      :class="{
                        'has-items': entry.invoice_tax_rate_sgst,
                        'is-focused': activeField == 'invoice_tax_rate_sgst'
                      }"
                    >
                      <label class="bmd-label-floating">{{
                        $t('cruds.invoice.fields.invoice_tax_rate_sgst_helper')
                      }}</label>
                      <input
                        class="form-control"
                        type="number"
                        step="0.01"
                        :value="entry.invoice_tax_rate_sgst"
                        @input="updateInvoiceTaxRateSgst"
                        @focus="focusField('invoice_tax_rate_sgst')"
                        @blur="clearFocus"
                      />
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
    ...mapGetters('InvoicesSingle', ['entry', 'loading', 'lists'])
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
    ...mapActions('InvoicesSingle', [
      'fetchEditData',
      'updateData',
      'resetState',
      'setService',
      'setClient',
      'setIsGstEnabled',
      'setGstin',
      'setInvoiceTaxRateCgst',
      'setInvoiceTaxRateSgst'
    ]),
    updateService(value) {
      this.setService(value)
    },
    updateClient(value) {
      this.setClient(value)
    },
    updateIsGstEnabled(value) {
      this.setIsGstEnabled(value)
    },
    updateGstin(e) {
      this.setGstin(e.target.value)
    },
    updateInvoiceTaxRateCgst(e) {
      this.setInvoiceTaxRateCgst(e.target.value)
    },
    updateInvoiceTaxRateSgst(e) {
      this.setInvoiceTaxRateSgst(e.target.value)
    },
    submitForm() {
      this.updateData()
        .then(() => {
          this.$router.push({ name: 'invoices.index' })
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
