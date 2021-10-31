<template>
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
    </template>
  </edit-dialog>
</template>

<script>
  import { reactive, toRefs, onMounted } from 'vue'

import FwSelect from '../../components/form/soselect.vue'
import SelectUser from '../../components/form/selectuser.vue'
import EditDialog from '../../components/editdialog/index.vue'
import { useI18n }  from 'vue-i18n'

  export default {
    components: { EditDialog, FwSelect, SelectUser },
	setup() {
    const state = reactive({
      zform: {
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
        pf_accouont: ''
      },
      form: {},
      formLabelWidth: 120,
    })

    const { t } = useI18n()

    const setForm = (record) => {
      clearForm()
      Object.assign(state.form, record.value)
    }

    const clearForm = () => {
      state.form = state.zform
    }

    return {
      t,
      setForm,
      clearForm,
      ...toRefs(state)
    }
	},
  }
</script>
