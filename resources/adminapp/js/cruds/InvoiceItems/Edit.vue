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
                <strong>{{ $t('cruds.invoiceItem.title_singular') }}</strong>
              </h4>
            </div>
            <div class="card-body">
              <back-button></back-button>
            </div>
            <div class="card-body">
              <bootstrap-alert />
              <div class="row">
                <div class="col-md-12">
                  <label class="required">{{
                    $t('cruds.invoiceItem.fields.invoice')
                  }}</label>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.invoice_id !== null,
                      'is-focused': activeField == 'invoice'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.invoiceItem.fields.invoice_helper')
                    }}</label>
                    <v-select
                      name="invoice"
                      label="invoice_no"
                      :key="'invoice-field'"
                      :value="entry.invoice_id"
                      :options="lists.invoice"
                      :reduce="entry => entry.id"
                      @input="updateInvoice"
                      @search.focus="focusField('invoice')"
                      @search.blur="clearFocus"
                    />
                  </div>
                  <div class="form-group">
                    <label>{{ $t('cruds.invoiceItem.fields.title') }}</label>
                    <div
                      class="form-group bmd-form-group"
                      :class="{
                        'has-items': entry.title,
                        'is-focused': activeField == 'title'
                      }"
                    >
                      <label class="bmd-label-floating">{{
                        $t('cruds.invoiceItem.fields.title_helper')
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
                  <div class="form-group">
                    <label>{{
                      $t('cruds.invoiceItem.fields.description')
                    }}</label>
                    <div
                      class="form-group bmd-form-group"
                      :class="{
                        'has-items': entry.description,
                        'is-focused': activeField == 'description'
                      }"
                    >
                      <label class="bmd-label-floating">{{
                        $t('cruds.invoiceItem.fields.description_helper')
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
                  </div>
                  <div class="form-group">
                    <label>{{ $t('cruds.invoiceItem.fields.unit') }}</label>
                    <div
                      class="form-group bmd-form-group"
                      :class="{
                        'has-items': entry.unit,
                        'is-focused': activeField == 'unit'
                      }"
                    >
                      <label class="bmd-label-floating">{{
                        $t('cruds.invoiceItem.fields.unit_helper')
                      }}</label>
                      <input
                        class="form-control"
                        type="text"
                        :value="entry.unit"
                        @input="updateUnit"
                        @focus="focusField('unit')"
                        @blur="clearFocus"
                      />
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="required">{{
                      $t('cruds.invoiceItem.fields.quantity')
                    }}</label>
                    <div
                      class="form-group bmd-form-group"
                      :class="{
                        'has-items': entry.quantity,
                        'is-focused': activeField == 'quantity'
                      }"
                    >
                      <label class="bmd-label-floating">{{
                        $t('cruds.invoiceItem.fields.quantity_helper')
                      }}</label>
                      <input
                        class="form-control"
                        type="number"
                        step="0.01"
                        :value="entry.quantity"
                        @input="updateQuantity"
                        @focus="focusField('quantity')"
                        @blur="clearFocus"
                        required
                      />
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="required">{{
                      $t('cruds.invoiceItem.fields.price_per_unit')
                    }}</label>
                    <div
                      class="form-group bmd-form-group"
                      :class="{
                        'has-items': entry.price_per_unit,
                        'is-focused': activeField == 'price_per_unit'
                      }"
                    >
                      <label class="bmd-label-floating">{{
                        $t('cruds.invoiceItem.fields.price_per_unit_helper')
                      }}</label>
                      <input
                        class="form-control"
                        type="text"
                        :value="entry.price_per_unit"
                        @input="updatePricePerUnit"
                        @focus="focusField('price_per_unit')"
                        @blur="clearFocus"
                        required
                      />
                    </div>
                  </div>
                  <div class="form-group">
                    <label>{{
                      $t('cruds.invoiceItem.fields.sub_total_price')
                    }}</label>
                    <div
                      class="form-group bmd-form-group"
                      :class="{
                        'has-items': entry.sub_total_price,
                        'is-focused': activeField == 'sub_total_price'
                      }"
                    >
                      <label class="bmd-label-floating">{{
                        $t('cruds.invoiceItem.fields.sub_total_price_helper')
                      }}</label>
                      <input
                        class="form-control"
                        type="number"
                        step="0.01"
                        :value="entry.sub_total_price"
                        @input="updateSubTotalPrice"
                        @focus="focusField('sub_total_price')"
                        @blur="clearFocus"
                      />
                    </div>
                  </div>
                  <div class="form-group">
                    <label>{{ $t('cruds.invoiceItem.fields.discount') }}</label>
                    <div
                      class="form-group bmd-form-group"
                      :class="{
                        'has-items': entry.discount,
                        'is-focused': activeField == 'discount'
                      }"
                    >
                      <label class="bmd-label-floating">{{
                        $t('cruds.invoiceItem.fields.discount_helper')
                      }}</label>
                      <input
                        class="form-control"
                        type="number"
                        step="0.01"
                        :value="entry.discount"
                        @input="updateDiscount"
                        @focus="focusField('discount')"
                        @blur="clearFocus"
                      />
                    </div>
                  </div>
                  <div class="form-group">
                    <label>{{
                      $t('cruds.invoiceItem.fields.discount_percentage')
                    }}</label>
                    <div
                      class="form-group bmd-form-group"
                      :class="{
                        'has-items': entry.discount_percentage,
                        'is-focused': activeField == 'discount_percentage'
                      }"
                    >
                      <label class="bmd-label-floating">{{
                        $t(
                          'cruds.invoiceItem.fields.discount_percentage_helper'
                        )
                      }}</label>
                      <input
                        class="form-control"
                        type="number"
                        step="0.01"
                        :value="entry.discount_percentage"
                        @input="updateDiscountPercentage"
                        @focus="focusField('discount_percentage')"
                        @blur="clearFocus"
                      />
                    </div>
                  </div>
                  <div class="form-group">
                    <label>{{ $t('cruds.invoiceItem.fields.tax') }}</label>
                    <div
                      class="form-group bmd-form-group"
                      :class="{
                        'has-items': entry.tax,
                        'is-focused': activeField == 'tax'
                      }"
                    >
                      <label class="bmd-label-floating">{{
                        $t('cruds.invoiceItem.fields.tax_helper')
                      }}</label>
                      <input
                        class="form-control"
                        type="number"
                        step="0.01"
                        :value="entry.tax"
                        @input="updateTax"
                        @focus="focusField('tax')"
                        @blur="clearFocus"
                      />
                    </div>
                  </div>
                  <div class="form-group">
                    <label>{{
                      $t('cruds.invoiceItem.fields.tax_percentage')
                    }}</label>
                    <div
                      class="form-group bmd-form-group"
                      :class="{
                        'has-items': entry.tax_percentage,
                        'is-focused': activeField == 'tax_percentage'
                      }"
                    >
                      <label class="bmd-label-floating">{{
                        $t('cruds.invoiceItem.fields.tax_percentage_helper')
                      }}</label>
                      <input
                        class="form-control"
                        type="number"
                        step="0.01"
                        :value="entry.tax_percentage"
                        @input="updateTaxPercentage"
                        @focus="focusField('tax_percentage')"
                        @blur="clearFocus"
                      />
                    </div>
                  </div>
                  <label>{{ $t('cruds.invoiceItem.fields.service') }}</label>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.service_id !== null,
                      'is-focused': activeField == 'service'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.invoiceItem.fields.service_helper')
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
                  <label>{{
                    $t('cruds.invoiceItem.fields.service_item')
                  }}</label>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.service_item_id !== null,
                      'is-focused': activeField == 'service_item'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.invoiceItem.fields.service_item_helper')
                    }}</label>
                    <v-select
                      name="service_item"
                      label="title"
                      :key="'service_item-field'"
                      :value="entry.service_item_id"
                      :options="lists.service_item"
                      :reduce="entry => entry.id"
                      @input="updateServiceItem"
                      @search.focus="focusField('service_item')"
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
    ...mapGetters('InvoiceItemsSingle', ['entry', 'loading', 'lists'])
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
    ...mapActions('InvoiceItemsSingle', [
      'fetchEditData',
      'updateData',
      'resetState',
      'setInvoice',
      'setTitle',
      'setDescription',
      'setUnit',
      'setQuantity',
      'setPricePerUnit',
      'setSubTotalPrice',
      'setDiscount',
      'setDiscountPercentage',
      'setTax',
      'setTaxPercentage',
      'setService',
      'setServiceItem'
    ]),
    updateInvoice(value) {
      this.setInvoice(value)
    },
    updateTitle(e) {
      this.setTitle(e.target.value)
    },
    updateDescription(e) {
      this.setDescription(e.target.value)
    },
    updateUnit(e) {
      this.setUnit(e.target.value)
    },
    updateQuantity(e) {
      this.setQuantity(e.target.value)
    },
    updatePricePerUnit(e) {
      this.setPricePerUnit(e.target.value)
    },
    updateSubTotalPrice(e) {
      this.setSubTotalPrice(e.target.value)
    },
    updateDiscount(e) {
      this.setDiscount(e.target.value)
    },
    updateDiscountPercentage(e) {
      this.setDiscountPercentage(e.target.value)
    },
    updateTax(e) {
      this.setTax(e.target.value)
    },
    updateTaxPercentage(e) {
      this.setTaxPercentage(e.target.value)
    },
    updateService(value) {
      this.setService(value)
    },
    updateServiceItem(value) {
      this.setServiceItem(value)
    },
    submitForm() {
      this.updateData()
        .then(() => {
          this.$router.push({ name: 'invoice_items.index' })
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
