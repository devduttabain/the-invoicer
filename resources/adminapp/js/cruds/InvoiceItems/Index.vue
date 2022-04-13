<template>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary card-header-icon">
            <div class="card-icon">
              <i class="material-icons">assignment</i>
            </div>
            <h4 class="card-title">
              {{ $t('global.table') }}
              <strong>{{ $t('cruds.invoiceItem.title') }}</strong>
            </h4>
          </div>
          <div class="card-body">
            <router-link
              class="btn btn-primary"
              v-if="$can(xprops.permission_prefix + 'create')"
              :to="{ name: xprops.route + '.create' }"
            >
              <i class="material-icons">
                add
              </i>
              {{ $t('global.add') }}
            </router-link>
            <button
              type="button"
              class="btn btn-default"
              @click="fetchIndexData"
              :disabled="loading"
              :class="{ disabled: loading }"
            >
              <i class="material-icons" :class="{ 'fa-spin': loading }">
                refresh
              </i>
              {{ $t('global.refresh') }}
            </button>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-12">
                <div class="table-overlay" v-show="loading">
                  <div class="table-overlay-container">
                    <material-spinner></material-spinner>
                    <span>Loading...</span>
                  </div>
                </div>
                <datatable
                  :columns="columns"
                  :data="data"
                  :total="total"
                  :query="query"
                  :xprops="xprops"
                  :HeaderSettings="false"
                  :pageSizeOptions="[10, 25, 50, 100]"
                >
                  <global-search :query="query" class="pull-left" />
                  <header-settings :columns="columns" class="pull-right" />
                </datatable>
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
import DatatableActions from '@components/Datatables/DatatableActions'
import TranslatedHeader from '@components/Datatables/TranslatedHeader'
import HeaderSettings from '@components/Datatables/HeaderSettings'
import GlobalSearch from '@components/Datatables/GlobalSearch'
import DatatableSingle from '@components/Datatables/DatatableSingle'

export default {
  components: {
    GlobalSearch,
    HeaderSettings
  },
  data() {
    return {
      columns: [
        {
          title: 'cruds.invoiceItem.fields.id',
          field: 'id',
          thComp: TranslatedHeader,
          sortable: true,
          colStyle: 'width: 100px;'
        },
        {
          title: 'cruds.invoiceItem.fields.invoice',
          field: 'invoice.invoice_no',
          thComp: TranslatedHeader,
          tdComp: DatatableSingle,
          sortable: true
        },
        {
          title: 'cruds.invoiceItem.fields.title',
          field: 'title',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.invoiceItem.fields.description',
          field: 'description',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.invoiceItem.fields.unit',
          field: 'unit',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.invoiceItem.fields.quantity',
          field: 'quantity',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.invoiceItem.fields.price_per_unit',
          field: 'price_per_unit',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.invoiceItem.fields.sub_total_price',
          field: 'sub_total_price',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.invoiceItem.fields.discount',
          field: 'discount',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.invoiceItem.fields.discount_percentage',
          field: 'discount_percentage',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.invoiceItem.fields.tax',
          field: 'tax',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.invoiceItem.fields.tax_percentage',
          field: 'tax_percentage',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.invoiceItem.fields.service',
          field: 'service.title',
          thComp: TranslatedHeader,
          tdComp: DatatableSingle,
          sortable: true
        },
        {
          title: 'cruds.invoiceItem.fields.service_item',
          field: 'service_item.title',
          thComp: TranslatedHeader,
          tdComp: DatatableSingle,
          sortable: true
        },
        {
          title: 'global.actions',
          thComp: TranslatedHeader,
          tdComp: DatatableActions,
          visible: true,
          thClass: 'text-right',
          tdClass: 'text-right td-actions',
          colStyle: 'width: 150px;'
        }
      ],
      query: { sort: 'id', order: 'desc', limit: 100, s: '' },
      xprops: {
        module: 'InvoiceItemsIndex',
        route: 'invoice_items',
        permission_prefix: 'invoice_item_'
      }
    }
  },
  beforeDestroy() {
    this.resetState()
  },
  computed: {
    ...mapGetters('InvoiceItemsIndex', ['data', 'total', 'loading'])
  },
  watch: {
    query: {
      handler(query) {
        this.setQuery(query)
        this.fetchIndexData()
      },
      deep: true
    }
  },
  methods: {
    ...mapActions('InvoiceItemsIndex', [
      'fetchIndexData',
      'setQuery',
      'resetState'
    ])
  }
}
</script>
