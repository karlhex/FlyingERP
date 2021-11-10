<template>
  <div>
  <edit-dialog
    model="contracts"
    dialogTitle="Edit Contract"
    :form="form"
    @set="setForm"
    @clear="clearForm"
  >
    <template #default>
      <el-row type="flex" justify="space-between">
        <div :style="{width: '50%'}">
          <el-form-item :label="t('contract.sid')" :label-width="formLabelWidth">
            <el-input v-model="form.sid" autocomplete="off"></el-input>
          </el-form-item>
          <el-form-item :label="t('contract.peer_sid')" :label-width="formLabelWidth">
            <el-input v-model="form.peer_sid" placeholder="user" ></el-input>
          </el-form-item>
          <el-form-item :label="t('contract.project')" :label-width="formLabelWidth">
            <id-select
              v-model="form.project_id"
              placeholder="Select project"
              searchgroup="project"
              querygroup="projects"
              :columns="['sid', 'name']"
              :v-model:info="form.project"
              toedit="employee.edit">
            </id-select>
          </el-form-item>
          <el-form-item :label="t('contract.company')" :label-width="formLabelWidth">
            <id-select
              v-model="form.company_id"
              placeholder="Select company"
              searchgroup="company"
              querygroup="companies"
              :columns="['name']"
              :v-model:info="form.company"
              toedit="company.edit">
            </id-select>
          </el-form-item>
          <el-form-item :label="t('contract.type')" :label-width="formLabelWidth">
            <so-select v-model="form.type" placeholder="Type" skey="contracttype"></so-select>
          </el-form-item>
          <el-form-item :label="t('contract.stage')" :label-width="formLabelWidth">
            <so-select v-model="form.stage" placeholder="Type" skey="contractstage"></so-select>
          </el-form-item>
          <el-form-item :label="t('contract.amount')" :label-width="formLabelWidth">
            <currency-input
              v-model="form.amount"
              :options="{ currency: 'CNY', locale: 'zh' }"
              autocomplete="off">
            </currency-input>
          </el-form-item>
        </div>
        <div :style="{width: '50%'}">
          <el-form-item :label="t('contract.title')" :label-width="formLabelWidth">
            <el-input v-model="form.title" autocomplete="off"></el-input>
          </el-form-item>
          <el-form-item :label="t('contract.sign_date')" :label-width="formLabelWidth">
            <el-date-picker v-model="form.sign_date" type="date" placeholder="Pick a day"></el-date-picker>
          </el-form-item>
          <el-form-item :label="t('contract.start_date')" :label-width="formLabelWidth">
            <el-date-picker v-model="form.start_date" type="date" placeholder="Pick a day"></el-date-picker>
          </el-form-item>
          <el-form-item :label="t('contract.end_date')" :label-width="formLabelWidth">
            <el-date-picker v-model="form.end_date" type="date" placeholder="Pick a day"></el-date-picker>
          </el-form-item>
          <el-form-item :label="t('contract.contract_person')" :label-width="formLabelWidth">
            <id-select
              v-model="form.contact_person"
              placeholder="Select person"
              searchgroup="person"
              querygroup="people"
              :columns="['name', 'company_name']"
              :v-model:info="form.contact_person_info"
              toedit="person.edit"
            />
          </el-form-item>
        </div>
      </el-row>

      <list-box
        v-model="form.sops"
        :dialogTitle="t('sop.title')"
        :form="sopform"
        @set="setSopForm"
        @clear="clearSopForm"
      >
        <template v-slot:default>
          <el-table-column prop="schedule_date" :label="t('sop.schedule_date')" width="180">
            <template #default="scope">
              <date-format :value="scope.row.schedule_date" />
            </template>
          </el-table-column>
          <el-table-column prop="instruction" :label="t('sop.instruction')" width="180" />
          <el-table-column prop="tran_date" :label="t('sop.tran_date')" width="180">
            <template #default="scope">
              <date-format :value="scope.row.tran_date" />
            </template>
          </el-table-column>
          <el-table-column prop="drcr" :label="t('sop.drcr')" width="180">
            <template #default="scope">
              <so-format skey="drcr" :value="scope.row.drcr" />
            </template>
          </el-table-column>
          <el-table-column prop="amount" :label="t('sop.amount')" width="180">
            <template #default="scope">
              <amount-format :value="scope.row.amount" />
            </template>
          </el-table-column>
          <el-table-column prop="memo" :label="t('sop.memo')" width="180" />
        </template>

        <template v-slot:dialog >
          <el-form :model="sopform">
            <el-form-item :label="t('sop.instruction')" :label-width="formLabelWidth">
              <el-input v-model="sopform.instruction" autocomplete="off"></el-input>
            </el-form-item>
            <el-form-item :label="t('sop.schedule_date')" :label-width="formLabelWidth">
              <el-date-picker v-model="sopform.schedule_date" type="date" placeholder="Pick a day"></el-date-picker>
            </el-form-item>
            <el-form-item :label="t('sop.tran_date')" :label-width="formLabelWidth">
              <el-date-picker v-model="sopform.tran_date" type="date" placeholder="Pick a day"></el-date-picker>
            </el-form-item>
            <el-form-item :label="t('sop.drcr')" :label-width="formLabelWidth">
              <so-select v-model="sopform.drcr" placeholder="Drcr" skey="drcr"></so-select>
            </el-form-item>
            <el-form-item :label="t('sop.amount')" :label-width="formLabelWidth">
              <currency-input
                v-model="sopform.amount"
                :options="{ currency: 'CNY', locale: 'zh' }"
                autocomplete="off">
              </currency-input>
            </el-form-item>
            <el-form-item :label="t('sop.memo')" :label-width="formLabelWidth">
              <el-input v-model="sopform.memo" autocomplete="off"></el-input>
            </el-form-item>
          </el-form>
        </template>
      </list-box>

      <list-box
        v-model="form.products"
        :dialogTitle="t('product.title')"
        :form="prdform"
        @set="setPrdForm"
        @clear="clearPrdForm"
      >
        <template v-slot:default>
          <el-table-column prop="productinfo.name" :label="t('product.productinfo')" width="180" />
          <el-table-column prop="model" :label="t('product.model')" width="180" />
          <el-table-column prop="unit_price" :label="t('product.unit_price')" width="180" />
          <el-table-column prop="number" :label="t('product.number')" width="180" />
        </template>

        <template v-slot:dialog >
          <el-form :model="prdform">
            <el-form-item :label="t('product.info')" :label-width="formLabelWidth">
              <id-select
                v-model="prdform.productinfo_id"
                v-model:info="prdform.productinfo"
                placeholder="Select product"
                searchgroup="productinfo"
                querygroup="productinfos"
                :columns="['name', 'company_name']"
                toedit="productinfo.edit"
              />
            </el-form-item>
            <el-form-item :label="t('product.model')" :label-width="formLabelWidth">
              <el-input v-model="prdform.model" autocomplete="off"></el-input>
            </el-form-item>
            <el-form-item :label="t('product.unit_price')" :label-width="formLabelWidth">
              <el-input v-model="prdform.unit_price" autocomplete="off"></el-input>
            </el-form-item>
            <el-form-item :label="t('product.number')" :label-width="formLabelWidth">
              <el-input v-model="prdform.number" autocomplete="off"></el-input>
            </el-form-item>
          </el-form>
        </template>
      </list-box>
    </template>
  </edit-dialog>
  </div>
</template>

<script>
  import { reactive, toRefs, onMounted, watch } from 'vue'

import SoSelect from '../../components/form/soselect.vue'
import IdSelect from '../../components/form/idselect.vue'
import EditDialog from '../../components/editdialog/index.vue'
import DateFormat from '../../components/formatters/date.vue'
import AmountFormat from '../../components/formatters/amount.vue'
import SoFormat from '../../components/formatters/so.vue'
import CurrencyInput from '../../components/form/currencyInput.vue'

import ListBox from '../../components/listbox/index.vue'

import { useI18n }  from 'vue-i18n'

export default {
  components: { EditDialog, SoSelect, ListBox, DateFormat, IdSelect, AmountFormat, SoFormat, CurrencyInput },
	setup() {
    const state = reactive({
      zform: {
        id: 0,
        project_id: '',
        sid: '',
        peer_sid: '',
        title: '',
        company_id: '',
        type: 'sales',
        stage: 'started',
        amount: 0,
        sign_date: '20000101',
        start_date: '20000101',
        end_date: '20000101',
        contact_person: '',

        sops: [],
        products: [],
      },
      form: {},
      formLabelWidth: 120,

      sopzform: {
        id: -1,
        sequence: 0,
        schedule_date: '20000101',
        tran_date: '20000101',
        instruction: '',
        drcr: 'Dr',
        amount:  0,
        memo: ''
      },
      sopform: {},
      prdzform: {
        id: -1,
        sequence: 0,
        productinfo: undefined,
        productinfo_id: 0,
        model: '',
        unit_price: 0.0,
        number: 0,
      },
      prdform: {},
    })

    const { t } = useI18n()

    const setForm = (record) => {
      clearForm()
      Object.assign(state.form, record.value)
      state.form.project_id = record.value.project.id
      state.form.project = record.value.project
      state.form.company_id = record.value.company.id
      state.form.company = record.value.company
      state.form.contact_person = record.value.contact_person_info.id
      state.form.contact_person_info = record.value.contact_person_info
    }

    const clearForm = () => {
      state.form = { ...state.zform }
    }

    const setSopForm = (record) => {
      clearSopForm()
      Object.assign(state.sopform, record)
    }

    const clearSopForm = () => {
      state.sopform = { ...state.sopzform }
    }

    const setPrdForm = (record) => {
      clearPrdForm()
      Object.assign(state.prdform, record)
      state.prdform.productinfo_id = record.productinfo.id
      state.prdform.productinfo = { ...record.productinfo }
    }

    const clearPrdForm = () => {
      state.prdform = { ...state.prdzform }
    }

    watch(state.form, (value, prevValue) => {
      console.log('watch', value, prevValue)
    })

    return {
      t,
      setForm,
      clearForm,
      setSopForm,
      clearSopForm,
      setPrdForm,
      clearPrdForm,
      ...toRefs(state)
    }
	},
  }
</script>
