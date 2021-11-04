<template>
  <div>
  <edit-dialog
    model="employees"
    dialogTitle="Edit Employee"
    :form="form"
    @set="setForm"
    @clear="clearForm"
  >
    <template #default>
      <el-row type="flex" justify="space-between">
        <div :style="{width: '50%'}">
          <el-form-item :label="t('employee.sid')" :label-width="formLabelWidth">
            <el-input v-model="form.employee_sid" autocomplete="off"></el-input>
          </el-form-item>
          <el-form-item :label="t('employee.userid')" :label-width="formLabelWidth">
            <select-user v-model="form.user_id" placeholder="user" ></select-user>
          </el-form-item>
          <el-form-item :label="t('employee.fullname')" :label-width="formLabelWidth">
            <el-input v-model="form.fullname" autocomplete="off"></el-input>
          </el-form-item>
          <el-form-item :label="t('employee.nationalid')" :label-width="formLabelWidth">
            <el-input v-model="form.national_id" autocomplete="off"></el-input>
          </el-form-item>
          <el-form-item :label="t('employee.sex')" :label-width="formLabelWidth">
            <fw-select v-model="form.sex" placeholder="Sex" skey="sex" />
          </el-form-item>
          <el-form-item :label="t('employee.birthday')" :label-width="formLabelWidth">
            <el-date-picker v-model="form.birthday" type="date" placeholder="Pick a day"></el-date-picker>
          </el-form-item>
          <el-form-item :label="t('employee.origin_city')" :label-width="formLabelWidth">
            <el-input v-model="form.origin_city" autocomplete="off"></el-input>
          </el-form-item>
          <el-form-item :label="t('employee.resident_city')" :label-width="formLabelWidth">
            <el-input v-model="form.resident_city" autocomplete="off"></el-input>
          </el-form-item>
          <el-form-item :label="t('employee.ethnic')" :label-width="formLabelWidth">
            <el-input v-model="form.ethnic" autocomplete="off"></el-input>
          </el-form-item>
          <el-form-item :label="t('employee.department')" :label-width="formLabelWidth">
            <fw-select v-model="form.department" placeholder="department" skey="department" ></fw-select>
          </el-form-item>
          <el-form-item :label="t('employee.role')" :label-width="formLabelWidth">
            <fw-select v-model="form.role" placeholder="role" skey="role"></fw-select>
          </el-form-item>
          <el-form-item :label="t('employee.level')" :label-width="formLabelWidth">
            <el-input v-model="form.level" autocomplete="off"></el-input>
          </el-form-item>
          <el-form-item :label="t('employee.join_date')" :label-width="formLabelWidth">
            <el-date-picker v-model="form.join_date" type="date" placeholder="Pick a day"></el-date-picker>
          </el-form-item>
          <el-form-item :label="t('employee.sign_date')" :label-width="formLabelWidth">
            <el-date-picker v-model="form.sign_date" type="date" placeholder="Pick a day"></el-date-picker>
          </el-form-item>
        </div>
        <div :style="{width: '50%'}">
          <el-form-item :label="t('employee.sign_type')" :label-width="formLabelWidth">
            <fw-select v-model="form.sign_type" skey="signtype" ></fw-select>
          </el-form-item>
          <el-form-item :label="t('employee.sign_period')" :label-width="formLabelWidth">
            <el-input v-model="form.sign_period" autocomplete="off"></el-input>
          </el-form-item>
          <el-form-item :label="t('employee.work_date')" :label-width="formLabelWidth">
            <el-date-picker v-model="form.work_date" type="date" placeholder="Pick a day"></el-date-picker>
          </el-form-item>
          <el-form-item :label="t('employee.phone')" :label-width="formLabelWidth">
            <el-input v-model="form.phone" autocomplete="off"></el-input>
          </el-form-item>
          <el-form-item :label="t('employee.address')" :label-width="formLabelWidth">
            <el-input v-model="form.address" autocomplete="off"></el-input>
          </el-form-item>
          <el-form-item :label="t('employee.emergency_person')" :label-width="formLabelWidth">
            <el-input v-model="form.emergency_person" autocomplete="off"></el-input>
          </el-form-item>
          <el-form-item :label="t('employee.emergency_phone')" :label-width="formLabelWidth">
            <el-input v-model="form.emergency_phone" autocomplete="off"></el-input>
          </el-form-item>
          <el-form-item :label="t('employee.email')" :label-width="formLabelWidth">
            <el-input v-model="form.email" autocomplete="off"></el-input>
          </el-form-item>
          <el-form-item :label="t('employee.bank')" :label-width="formLabelWidth">
            <el-input v-model="form.bank" autocomplete="off"></el-input>
          </el-form-item>
          <el-form-item :label="t('employee.account')" :label-width="formLabelWidth">
            <el-input v-model="form.account" autocomplete="off"></el-input>
          </el-form-item>
          <el-form-item :label="t('employee.si_city')" :label-width="formLabelWidth">
            <el-input v-model="form.si_city" autocomplete="off"></el-input>
          </el-form-item>
          <el-form-item :label="t('employee.si_account')" :label-width="formLabelWidth">
            <el-input v-model="form.si_account" autocomplete="off"></el-input>
          </el-form-item>
          <el-form-item :label="t('employee.pf_account')" :label-width="formLabelWidth">
            <el-input v-model="form.pf_account" autocomplete="off"></el-input>
          </el-form-item>
        </div>
      </el-row>

      <list-box
        v-model="form.work_experiences"
        :dialogTitle="t('we.title')"
        :form="weform"
        @set="setWeForm"
        @clear="clearWeForm"
      >
        <template v-slot:default>
          <el-table-column prop="start_date" :label="t('we.start_date')" width="180">
            <template #default="scope">
              <date-format :value="scope.row.start_date" />
            </template>
          </el-table-column>
          <el-table-column prop="end_date" :label="t('we.end_date')" width="180">
            <template #default="scope">
              <date-format :value="scope.row.end_date" />
            </template>
          </el-table-column>
          <el-table-column prop="company" :label="t('we.company')" width="180" />
          <el-table-column prop="department" :label="t('we.department')" width="180" />
          <el-table-column prop="position" :label="t('we.position')" width="180" />
        </template>

        <template v-slot:dialog >
          <el-form :model="weform">
            <el-form-item :label="t('we.start_date')" :label-width="formLabelWidth">
              <el-date-picker v-model="weform.start_date" type="date" placeholder="Pick a day"></el-date-picker>
            </el-form-item>
            <el-form-item :label="t('we.end_date')" :label-width="formLabelWidth">
              <el-date-picker v-model="weform.end_date" type="date" placeholder="Pick a day"></el-date-picker>
            </el-form-item>
            <el-form-item :label="t('we.company')" :label-width="formLabelWidth">
              <el-input v-model="weform.company" autocomplete="off"></el-input>
            </el-form-item>
            <el-form-item :label="t('we.department')" :label-width="formLabelWidth">
              <el-input v-model="weform.department" autocomplete="off"></el-input>
            </el-form-item>
            <el-form-item :label="t('we.position')" :label-width="formLabelWidth">
              <el-input v-model="weform.position" autocomplete="off"></el-input>
            </el-form-item>
          </el-form>
        </template>
      </list-box>

      <list-box
        v-model="form.educations"
        :dialogTitle="t('education.title')"
        :form="eduform"
        @set="setEduForm"
        @clear="clearEduForm"
      >
        <template v-slot:default>
          <el-table-column prop="start_date" :label="t('education.start_date')" width="180">
            <template #default="scope">
              <date-format :value="scope.row.start_date" />
            </template>
          </el-table-column>
          <el-table-column prop="end_date" :label="t('education.end_date')" width="180">
            <template #default="scope">
              <date-format :value="scope.row.end_date" />
            </template>
          </el-table-column>
          <el-table-column prop="school" :label="t('education.school')" width="180" />
          <el-table-column prop="degree" :label="t('education.degree')" width="180">
            <template #default="scope">
              <degree-format :degree="scope.row.degree" />
            </template>
          </el-table-column>
        </template>

        <template v-slot:dialog >
          <el-form :model="eduform">
            <el-form-item :label="t('education.start_date')" :label-width="formLabelWidth">
              <el-date-picker v-model="eduform.start_date" type="date" placeholder="Pick a day"></el-date-picker>
            </el-form-item>
            <el-form-item :label="t('education.end_date')" :label-width="formLabelWidth">
              <el-date-picker v-model="eduform.end_date" type="date" placeholder="Pick a day"></el-date-picker>
            </el-form-item>
            <el-form-item :label="t('education.school')" :label-width="formLabelWidth">
              <el-input v-model="eduform.school" autocomplete="off"></el-input>
            </el-form-item>
            <el-form-item :label="t('education.degree')" :label-width="formLabelWidth">
              <fw-select v-model="eduform.degree" placeholder="Degree" skey="degree" />
            </el-form-item>
          </el-form>
        </template>
      </list-box>
      <list-box
        v-model="form.project_experiences"
        :dialogTitle="t('pe.title')"
        :form="peform"
        @set="setPeForm"
        @clear="clearPeForm"
      >
        <template v-slot:default>
          <el-table-column prop="start_date" :label="t('pe.start_date')" width="180">
            <template #default="scope">
              <date-format :value="scope.row.start_date" />
            </template>
          </el-table-column>
          <el-table-column prop="end_date" :label="t('pe.end_date')" width="180">
            <template #default="scope">
              <date-format :value="scope.row.end_date" />
            </template>
          </el-table-column>
          <el-table-column prop="project" :label="t('pe.project')" width="180" />
          <el-table-column prop="role" :label="t('pe.role')" width="180" />
        </template>

        <template v-slot:dialog >
          <el-form :model="peform">
            <el-form-item :label="t('pe.start_date')" :label-width="formLabelWidth">
              <el-date-picker v-model="peform.start_date" type="date" placeholder="Pick a day"></el-date-picker>
            </el-form-item>
            <el-form-item :label="t('pe.end_date')" :label-width="formLabelWidth">
              <el-date-picker v-model="peform.end_date" type="date" placeholder="Pick a day"></el-date-picker>
            </el-form-item>
            <el-form-item :label="t('pe.project')" :label-width="formLabelWidth">
              <el-input v-model="peform.project" autocomplete="off"></el-input>
            </el-form-item>
            <el-form-item :label="t('pe.role')" :label-width="formLabelWidth">
              <el-input v-model="peform.role" autocomplete="off"></el-input>
            </el-form-item>
          </el-form>
        </template>
      </list-box>

      <list-box
        v-model="form.certificates"
        :dialogTitle="t('certificate.title')"
        :form="ceform"
        @set="setCeForm"
        @clear="clearCeForm"
      >
        <template v-slot:default>
          <el-table-column prop="cer_name" :label="t('certificate.name')" width="180"/>

          <el-table-column prop="cer_date" :label="t('certificate.cer_date')" width="180">
            <template #default="scope">
              <date-format :value="scope.row.cer_date" />
            </template>
          </el-table-column>
          <el-table-column prop="cer_source" :label="t('certificate.source')" width="180" />
        </template>

        <template v-slot:dialog >
          <el-form :model="ceform">
            <el-form-item :label="t('certificate.name')" :label-width="formLabelWidth">
              <el-input v-model="ceform.cer_name" autocomplete="off"></el-input>
            </el-form-item>
            <el-form-item :label="t('certificate.cer_date')" :label-width="formLabelWidth">
              <el-date-picker v-model="ceform.cer_date" type="date" placeholder="Pick a day"></el-date-picker>
            </el-form-item>
            <el-form-item :label="t('certificate.source')" :label-width="formLabelWidth">
              <el-input v-model="ceform.cer_source" autocomplete="off"></el-input>
            </el-form-item>
          </el-form>
        </template>
      </list-box>
    </template>
  </edit-dialog>
  </div>
</template>

<script>
  import { reactive, toRefs, onMounted } from 'vue'

import FwSelect from '../../components/form/soselect.vue'
import SelectUser from '../../components/form/selectuser.vue'
import EditDialog from '../../components/editdialog/index.vue'
import DateFormat from '../../components/formatters/date.vue'
import DegreeFormat from '../../components/formatters/degree.vue'

import ListBox from '../../components/listbox/index.vue'

import { useI18n }  from 'vue-i18n'

  export default {
    components: { EditDialog, FwSelect, SelectUser, ListBox, DateFormat, DegreeFormat },
	setup() {
    const state = reactive({
      zform: {
        id: 0,
        user_id: 0,
        employee_sid: '',
        fullname: '',
        national_id: '',
        sex: 'M',
        birthday: '',
        origin_city: '',
        resident_city: '',
        ethnic: '汉族',
        department: '',
        role: '',
        level: 0,
        join_date: '',
        sign_date: '',
        sign_type: 'LT',
        sign_period: 12,
        work_date: '',

        phone: '',
        address: '',
        emergency_person: '',
        emergency_phone: '',
        email: '',
        bank: '',
        accunt: '',
        si_city: '',
        si_account: '',
        pf_accouont: '',

        work_experiences: [],
        project_experiences: [],
        educations: [],
        certificates: [],
      },
      form: {},
      formLabelWidth: 120,

      wezform: {
        id: -1,
        sequence: 0,
        start_date: '20000101',
        end_date: '20000101',
        company: '',
        department: '',
        position: ''
      },
      weform: {},
      pezform: {
        id: -1,
        sequence: 0,
        start_date: '20000101',
        end_date: '20000101',
        project: '',
        role: '',
      },
      peform: {},
      eduzform: {
        id: -1,
        sequence: 0,
        start_date: '20000101',
        end_date: '20000101',
        school: '',
        degree: '',
      },
      eduform: {},
      cezform: {
        id: -1,
        sequence: 0,
        cer_name: '',
        cer_date: '20000101',
        cer_source: '',
      },
      ceform: {},

    })

    const { t } = useI18n()

    const setForm = (record) => {
      clearForm()
      Object.assign(state.form, record.value)
    }

    const clearForm = () => {
      state.form = { ...state.zform }
    }

    const setWeForm = (record) => {
      clearWeForm()
      Object.assign(state.weform, record)

      console.log('record', state.weform)
    }

    const clearWeForm = () => {
      state.weform = { ...state.wezform }
    }

    const setPeForm = (record) => {
      clearPeForm()
      Object.assign(state.peform, record)

    }

    const clearPeForm = () => {
      state.peform = { ...state.pezform }
    }

    const setCeForm = (record) => {
      clearCeForm()
      Object.assign(state.ceform, record)
    }

    const clearCeForm = () => {
      state.ceform = { ...state.cezform }
    }

    const setEduForm = (record) => {
      clearEduForm()
      Object.assign(state.eduform, record)
    }

    const clearEduForm = () => {
      state.eduform = { ...state.eduzform }
    }

    return {
      t,
      setForm,
      clearForm,
      setWeForm,
      clearWeForm,
      setPeForm,
      clearPeForm,
      setCeForm,
      clearCeForm,
      setEduForm,
      clearEduForm,
      ...toRefs(state)
    }
	},
  }
</script>
