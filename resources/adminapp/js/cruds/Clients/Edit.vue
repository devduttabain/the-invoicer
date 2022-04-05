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
                <strong>{{ $t('cruds.client.title_singular') }}</strong>
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
                      $t('cruds.client.fields.name')
                    }}</label>
                    <div
                      class="form-group bmd-form-group"
                      :class="{
                        'has-items': entry.name,
                        'is-focused': activeField == 'name'
                      }"
                    >
                      <label class="bmd-label-floating">{{
                        $t('cruds.client.fields.name_helper')
                      }}</label>
                      <input
                        class="form-control"
                        type="text"
                        :value="entry.name"
                        @input="updateName"
                        @focus="focusField('name')"
                        @blur="clearFocus"
                        required
                      />
                    </div>
                  </div>
                  <div class="form-group">
                    <label>{{ $t('cruds.client.fields.email') }}</label>
                    <div
                      class="form-group bmd-form-group"
                      :class="{
                        'has-items': entry.email,
                        'is-focused': activeField == 'email'
                      }"
                    >
                      <label class="bmd-label-floating">{{
                        $t('cruds.client.fields.email_helper')
                      }}</label>
                      <input
                        class="form-control"
                        type="email"
                        :value="entry.email"
                        @input="updateEmail"
                        @focus="focusField('email')"
                        @blur="clearFocus"
                      />
                    </div>
                  </div>
                  <div class="form-group">
                    <label>{{ $t('cruds.client.fields.phone') }}</label>
                    <div
                      class="form-group bmd-form-group"
                      :class="{
                        'has-items': entry.phone,
                        'is-focused': activeField == 'phone'
                      }"
                    >
                      <label class="bmd-label-floating">{{
                        $t('cruds.client.fields.phone_helper')
                      }}</label>
                      <input
                        class="form-control"
                        type="text"
                        :value="entry.phone"
                        @input="updatePhone"
                        @focus="focusField('phone')"
                        @blur="clearFocus"
                      />
                    </div>
                  </div>
                  <div class="form-group">
                    <label>{{ $t('cruds.client.fields.address') }}</label>
                    <div
                      class="form-group bmd-form-group"
                      :class="{
                        'has-items': entry.address,
                        'is-focused': activeField == 'address'
                      }"
                    >
                      <label class="bmd-label-floating">{{
                        $t('cruds.client.fields.address_helper')
                      }}</label>
                      <input
                        class="form-control"
                        type="text"
                        :value="entry.address"
                        @input="updateAddress"
                        @focus="focusField('address')"
                        @blur="clearFocus"
                      />
                    </div>
                  </div>
                  <div class="form-group">
                    <label>{{ $t('cruds.client.fields.is_business') }}</label>
                    <div class="form-group bmd-form-group has-items">
                      <label class="bmd-label-floating">{{
                        $t('cruds.client.fields.is_business_helper')
                      }}</label>
                      <v-radio
                        :value="entry.is_business"
                        :options="lists.is_business"
                        @change="updateIsBusiness"
                      >
                      </v-radio>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>{{ $t('cruds.client.fields.business_name') }}</label>
                    <div
                      class="form-group bmd-form-group"
                      :class="{
                        'has-items': entry.business_name,
                        'is-focused': activeField == 'business_name'
                      }"
                    >
                      <label class="bmd-label-floating">{{
                        $t('cruds.client.fields.business_name_helper')
                      }}</label>
                      <input
                        class="form-control"
                        type="text"
                        :value="entry.business_name"
                        @input="updateBusinessName"
                        @focus="focusField('business_name')"
                        @blur="clearFocus"
                      />
                    </div>
                  </div>
                  <div class="form-group">
                    <label>{{
                      $t('cruds.client.fields.is_gst_enabled')
                    }}</label>
                    <div class="form-group bmd-form-group has-items">
                      <label class="bmd-label-floating">{{
                        $t('cruds.client.fields.is_gst_enabled_helper')
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
                    <label>{{ $t('cruds.client.fields.gstin') }}</label>
                    <div
                      class="form-group bmd-form-group"
                      :class="{
                        'has-items': entry.gstin,
                        'is-focused': activeField == 'gstin'
                      }"
                    >
                      <label class="bmd-label-floating">{{
                        $t('cruds.client.fields.gstin_helper')
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
    ...mapGetters('ClientsSingle', ['entry', 'loading', 'lists'])
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
    ...mapActions('ClientsSingle', [
      'fetchEditData',
      'updateData',
      'resetState',
      'setName',
      'setEmail',
      'setPhone',
      'setAddress',
      'setIsBusiness',
      'setBusinessName',
      'setIsGstEnabled',
      'setGstin'
    ]),
    updateName(e) {
      this.setName(e.target.value)
    },
    updateEmail(e) {
      this.setEmail(e.target.value)
    },
    updatePhone(e) {
      this.setPhone(e.target.value)
    },
    updateAddress(e) {
      this.setAddress(e.target.value)
    },
    updateIsBusiness(value) {
      this.setIsBusiness(value)
    },
    updateBusinessName(e) {
      this.setBusinessName(e.target.value)
    },
    updateIsGstEnabled(value) {
      this.setIsGstEnabled(value)
    },
    updateGstin(e) {
      this.setGstin(e.target.value)
    },
    submitForm() {
      this.updateData()
        .then(() => {
          this.$router.push({ name: 'clients.index' })
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
