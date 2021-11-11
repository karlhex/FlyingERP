<template>
  <div>
  <edit-dialog
    model="projects"
    dialogTitle="Edit project"
    :form="form"
    @set="setForm"
    @clear="clearForm"
  >
    <template #default>
      <edit-box :dialog-title="t('project.title')">
        <template #col1>
          <el-form-item :label="t('project.sid')" :label-width="formLabelWidth">
            <sid-input
              v-model="form.sid"
              sidkey="project"
            />
          </el-form-item>
          <el-form-item :label="t('project.name')" :label-width="formLabelWidth">
            <el-input v-model="form.name" autocomplete="off"></el-input>
          </el-form-item>
          <el-form-item :label="t('project.status')" :label-width="formLabelWidth">
            <so-select v-model="form.status" placeholder="status" skey="prjstatus"></so-select>
          </el-form-item>
        </template>
        <template #col2>
          <el-form-item :label="t('project.start_date')" :label-width="formLabelWidth">
            <el-date-picker v-model="form.start_date" type="date" placeholder="Pick a day"></el-date-picker>
          </el-form-item>
          <el-form-item :label="t('project.end_date')" :label-width="formLabelWidth">
            <el-date-picker v-model="form.end_date" type="date" placeholder="Pick a day"></el-date-picker>
          </el-form-item>
        </template>
      </edit-box>

      <list-box
        v-model="form.plans"
        :dialogTitle="t('plan.title')"
        :form="plform"
        @set="setPlForm"
        @clear="clearPlForm"
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
          <el-table-column prop="instruction" :label="t('plan.instruction')" width="180" />
          <el-table-column prop="act_start_date" :label="t('plan.act_start_date')" width="180">
            <template #default="scope">
              <date-format :value="scope.row.start_date" />
            </template>
          </el-table-column>
          <el-table-column prop="act_end_date" :label="t('plan.act_end_date')" width="180">
            <template #default="scope">
              <date-format :value="scope.row.act_end_date" />
            </template>
          </el-table-column>
          <el-table-column prop="status" :label="t('plan.status')" width="180">
            <template #default="scope">
              <so-format skey="planstatus" :value="scope.row.status" />
            </template>
          </el-table-column>
        </template>

        <template v-slot:dialog >
          <el-form :model="plform">
            <el-form-item :label="t('plan.instruction')" :label-width="formLabelWidth">
              <el-input v-model="plform.instruction" autocomplete="off"></el-input>
            </el-form-item>
            <el-form-item :label="t('plan.start_date')" :label-width="formLabelWidth">
              <el-date-picker v-model="plform.start_date" type="date" placeholder="Pick a day"></el-date-picker>
            </el-form-item>
            <el-form-item :label="t('plan.end_date')" :label-width="formLabelWidth">
              <el-date-picker v-model="plform.end_date" type="date" placeholder="Pick a day"></el-date-picker>
            </el-form-item>
            <el-form-item :label="t('plan.act_start_date')" :label-width="formLabelWidth">
              <el-date-picker v-model="plform.act_start_date" type="date" placeholder="Pick a day"></el-date-picker>
            </el-form-item>
            <el-form-item :label="t('plan.act_end_date')" :label-width="formLabelWidth">
              <el-date-picker v-model="plform.act_end_date" type="date" placeholder="Pick a day"></el-date-picker>
            </el-form-item>
            <el-form-item :label="t('plan.charge_employee')" :label-width="formLabelWidth">
              <id-select
                v-model="plform.charge_employee_id"
                placeholder="Select employee"
                searchgroup="employee"
                querygroup="employees"
                :columns="['employee_sid', 'fullname']"
                v-model:info="plform.charge_employee"
                toedit="employee.edit" >
              </id-select>
            </el-form-item>
            <el-form-item :label="t('plan.status')" :label-width="formLabelWidth">
              <so-select v-model="plform.status" placeholder="Type" skey="planstatus"></so-select>
            </el-form-item>
            <el-form-item :label="t('plan.action_employee')" :label-width="formLabelWidth">
              <id-select
                v-model="plform.action_employee_id"
                placeholder="Select employee"
                searchgroup="employee"
                querygroup="employees"
                :columns="['employee_sid', 'fullname']"
                v-model:info="plform.action_employee"
                toedit="employee.edit" >
              </id-select>
            </el-form-item>
          </el-form>
        </template>
      </list-box>

      <list-box
        v-model="form.roles"
        :dialogTitle="t('role.title')"
        :form="roleform"
        @set="setRoleForm"
        @clear="clearRoleForm"
      >
        <template v-slot:default>
          <el-table-column prop="role" :label="t('role.role')" width="180">
            <template #default="scope">
              <so-format skey="prrole" :value="scope.row.role" />
            </template>
          </el-table-column>
          <el-table-column prop="employee.fullname" :label="t('role.employee')" width="180" />
        </template>

        <template v-slot:dialog >
          <el-form :model="roleform">
            <el-form-item :label="t('role.role')" :label-width="formLabelWidth">
              <so-select v-model="roleform.role" placeholder="Type" skey="prrole"></so-select>
            </el-form-item>
            <el-form-item :label="t('role.employee')" :label-width="formLabelWidth">
              <id-select
                v-model="roleform.employee_id"
                placeholder="Select employee"
                searchgroup="employee"
                querygroup="employees"
                :columns="['employee_sid', 'fullname']"
                v-model:info="roleform.employee"
                toedit="employee.edit" >
              </id-select>
            </el-form-item>
          </el-form>
        </template>
      </list-box>
    </template>
  </edit-dialog>
  </div>
</template>

<script>
  import { reactive, toRefs, watch } from 'vue'

import SoSelect from '../../components/form/soselect.vue'
import IdSelect from '../../components/form/idselect.vue'
import EditDialog from '../../components/editdialog/index.vue'
import DateFormat from '../../components/formatters/date.vue'
import SoFormat from '../../components/formatters/so.vue'
import SidInput from '../../components/form/sidInput.vue'

import ListBox from '../../components/listbox/index.vue'
import EditBox from '../../components/editbox/index.vue'

import { useI18n }  from 'vue-i18n'

  export default {
    components: { EditDialog, SoSelect, EditBox, ListBox, DateFormat, SoFormat, SidInput, IdSelect },
	setup() {
    const state = reactive({
      zform: {
        id: 0,
        name: '',
        sid: '',
        start_date: '20000101',
        end_date: '20000101',
        status: '',
        memo: '',

        roles: [],
        plans: [],
      },
      form: {},
      formLabelWidth: 120,

      plzform: {
        id: -1,
        sequence: 0,
        instruction: '',
        status: '',
        start_date: '20000101',
        end_date: '20000101',
        act_start_date: '20000101',
        act_end_date: '20000101',
        charge_employee_id: 0,
        charge_employee: {},
        action_employee_id: 0,
        action_employee: {},
      },
      plform: {},
      rolezform: {
        id: -1,
        sequence: 0,
        role: '',
        employee_id: 0,
        employee: {},
      },
      roleform: {},
    })

    const { t } = useI18n()

    const setForm = (record) => {
      clearForm()
      Object.assign(state.form, record.value)
    }

    const clearForm = () => {
      state.form = { ...state.zform }
    }

    const setPlForm = (record) => {
      clearPlForm()
      Object.assign(state.plform, record)

      state.plform.charge_employee = record.charge_employee
      state.plform.charge_employee_id = record.charge_employee.id
      state.plform.action_employee = record.action_employee
      state.plform.action_employee_id = record.action_employee.id
    }

    const clearPlForm = () => {
      state.plform = { ...state.plzform }
    }

    const setRoleForm = (record) => {
      clearRoleForm()
      Object.assign(state.roleform, record)

      state.roleform.employee = record.employee
      state.roleform.employee_id = record.employee.id
      console.log('roleform', state.roleform)
    }

    const clearRoleForm = () => {
      state.roleform = { ...state.rolezform }
      console.log('roleform', state.roleform)
    }

    watch(state.roleform, (value, prevValue) => {
      console.log('roleform', value, prevValue)
    })

    return {
      t,
      setForm,
      clearForm,
      setPlForm,
      clearPlForm,
      setRoleForm,
      clearRoleForm,
      ...toRefs(state)
    }
	},
  }
</script>
