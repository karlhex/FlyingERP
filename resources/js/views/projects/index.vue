<template>
<div>
  <list-frame
    model="employees"
    next="employee.edit"
  >
  <template v-slot:default>
    <el-table-column prop="employee_sid" :label="t('employee.sid')" width="180" />
    <el-table-column prop="fullname" :label="t('employee.fullname')" width="180" />
    <el-table-column prop="sex" :label="t('employee.sex')" width="220">
      <template #default="scope">
        <sex-format :sex="scope.row.sex" />
      </template>
    </el-table-column>
    <el-table-column prop="department" :label="t('employee.department')" width="250">
      <template #default="scope">
        <department-format :department="scope.row.department" />
      </template>
    </el-table-column>
    <el-table-column prop="role" :label="t('employee.role')" width="250" >
      <template #default="scope">
        <so-format  skey="role" :value="scope.row.role" />
      </template>
    </el-table-column>
    <el-table-column prop="phone" :label="t('employee.phone')" width="250" />
  </template>
  </list-frame>
</div>
</template>>

<script>
import ListFrame from '../../components/listframe/index.vue'
import SexFormat from '../../components/formatters/sex.vue'
import DepartmentFormat from '../../components/formatters/department.vue'
import SoFormat from '../../components/formatters/so.vue'
import { useI18n }  from 'vue-i18n'

export default {
  components: { ListFrame, SexFormat, DepartmentFormat, SoFormat },
  setup( ) {

    const { t } = useI18n()

    return {
      t
    }
	},
}
</script>>
