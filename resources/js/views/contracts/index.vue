<template>
<div>
  <list-frame
    model="contracts"
    next="contracts.edit"
  >
  <template v-slot:default>
    <el-table-column prop="title" :label="t('contract.title')" width="180" />
    <el-table-column prop="project.name" :label="t('contract.project')" width="180" />
    <el-table-column prop="sid" :label="t('contract.sid')" width="180" />
    <el-table-column prop="peer_sid" :label="t('contract.peer_sid')" width="180" />
    <el-table-column prop="company.name" :label="t('contract.company')" width="180" />
    <el-table-column prop="type" :label="t('contract.type')" width="220">
      <template #default="scope">
        <so-format key="contracttype" :value="scope.row.type" />
      </template>
    </el-table-column>
    <el-table-column prop="stage" :label="t('contract.stage')" width="220">
      <template #default="scope">
        <so-format key="contractstage" :value="scope.row.stage" />
      </template>
    </el-table-column>
    <el-table-column prop="amount" :label="t('contract.amount')" width="220">
      <template #default="scope">
        <amount-format :value="scope.row.amount" />
      </template>
    </el-table-column>
    <el-table-column prop="sign_date" :label="t('contract.sign_date')" width="220">
      <template #default="scope">
        <date-format :value="scope.row.sign_date" />
      </template>
    </el-table-column>
    <el-table-column prop="start_date" :label="t('contract.start_date')" width="220">
      <template #default="scope">
        <date-format :value="scope.row.start_date" />
      </template>
    </el-table-column>
    <el-table-column prop="end_date" :label="t('contract.end_date')" width="220">
      <template #default="scope">
        <date-format :value="scope.row.end_date" />
      </template>
    </el-table-column>
    <el-table-column prop="contract_person.name" :label="t('contract.contract_person')" width="250" />
  </template>
  </list-frame>
</div>
</template>>

<script>
import ListFrame from '../../components/listframe/index.vue'
import SoFormat from '../../components/formatters/so.vue'
import DateFormat from '../../components/formatters/date.vue'
import AmountFormat from '../../components/formatters/amount.vue'
import { useI18n }  from 'vue-i18n'

export default {
  components: { ListFrame, SoFormat, AmountFormat, DateFormat },
  setup( ) {

    const { t } = useI18n()

    return {
      t
    }
	},
}
</script>>
