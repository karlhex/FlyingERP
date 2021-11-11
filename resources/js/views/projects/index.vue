<template>
<div>
  <list-frame
    model="projects"
    next="project.edit"
  >
  <template v-slot:default>
    <el-table-column prop="sid" :label="t('project.sid')" width="180" />
    <el-table-column prop="name" :label="t('project.name')" width="180" />
    <el-table-column prop="start_date" :label="t('project.start_date')" width="220">
      <template #default="scope">
        <date-format :value="scope.row.start_date" />
      </template>
    </el-table-column>
    <el-table-column prop="end_date" :label="t('project.end_date')" width="220">
      <template #default="scope">
        <date-format :value="scope.row.end_date" />
      </template>
    </el-table-column>
    <el-table-column prop="status" :label="t('project.status')" width="250">
      <template #default="scope">
        <so-format :value="scope.row.status" skey="prjstatus" />
      </template>
    </el-table-column>
  </template>
  </list-frame>
</div>
</template>>

<script>
import ListFrame from '../../components/listframe/index.vue'
import SoFormat from '../../components/formatters/so.vue'
import DateFormat from '../../components/formatters/date.vue'
import { useI18n }  from 'vue-i18n'

export default {
  components: { ListFrame, DateFormat ,SoFormat },
  setup( ) {

    const { t } = useI18n()

    return {
      t
    }
	},
}
</script>>
