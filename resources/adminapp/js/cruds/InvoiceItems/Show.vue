<template>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary card-header-icon">
            <div class="card-icon">
              <i class="material-icons">remove_red_eye</i>
            </div>
            <h4 class="card-title">
              {{ $t('global.view') }}
              <strong>{{ $t('cruds.invoiceItem.title_singular') }}</strong>
            </h4>
          </div>
          <div class="card-body">
            <back-button></back-button>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-12">
                <div class="table-responsive">
                  <div class="table">
                    <tbody>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.invoiceItem.fields.id') }}
                        </td>
                        <td>
                          {{ entry.id }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.invoiceItem.fields.invoice') }}
                        </td>
                        <td>
                          <datatable-single
                            :row="entry"
                            field="invoice.invoice_no"
                          >
                          </datatable-single>
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.invoiceItem.fields.title') }}
                        </td>
                        <td>
                          {{ entry.title }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.invoiceItem.fields.description') }}
                        </td>
                        <td>
                          {{ entry.description }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.invoiceItem.fields.unit') }}
                        </td>
                        <td>
                          {{ entry.unit }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.invoiceItem.fields.quantity') }}
                        </td>
                        <td>
                          {{ entry.quantity }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.invoiceItem.fields.price_per_unit') }}
                        </td>
                        <td>
                          {{ entry.price_per_unit }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.invoiceItem.fields.sub_total_price') }}
                        </td>
                        <td>
                          {{ entry.sub_total_price }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.invoiceItem.fields.discount') }}
                        </td>
                        <td>
                          {{ entry.discount }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{
                            $t('cruds.invoiceItem.fields.discount_percentage')
                          }}
                        </td>
                        <td>
                          {{ entry.discount_percentage }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.invoiceItem.fields.tax') }}
                        </td>
                        <td>
                          {{ entry.tax }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.invoiceItem.fields.tax_percentage') }}
                        </td>
                        <td>
                          {{ entry.tax_percentage }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.invoiceItem.fields.service') }}
                        </td>
                        <td>
                          <datatable-single :row="entry" field="service.title">
                          </datatable-single>
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.invoiceItem.fields.service_item') }}
                        </td>
                        <td>
                          <datatable-single
                            :row="entry"
                            field="service_item.title"
                          >
                          </datatable-single>
                        </td>
                      </tr>
                    </tbody>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { mapGetters, mapActions } from 'vuex'
import DatatableSingle from '@components/Datatables/DatatableSingle'

export default {
  components: {
    DatatableSingle
  },
  data() {
    return {}
  },
  beforeDestroy() {
    this.resetState()
  },
  computed: {
    ...mapGetters('InvoiceItemsSingle', ['entry'])
  },
  watch: {
    '$route.params.id': {
      immediate: true,
      handler() {
        this.resetState()
        this.fetchShowData(this.$route.params.id)
      }
    }
  },
  methods: {
    ...mapActions('InvoiceItemsSingle', ['fetchShowData', 'resetState'])
  }
}
</script>
