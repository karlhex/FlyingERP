<template>
<div>
  <list-frame
    model="companies"
    next="company.edit"
  >
    <template v-slot:default>
      <el-table-column prop="name" :label="t('company.name')" width="180" />
      <el-table-column prop="phone" :label="t('company.phone')" width="180" />
      <el-table-column prop="address" :label="t('company.address')" width="220" />
      <el-table-column prop="site" :label="t('company.site')" width="250" />
    </template>
  </list-frame>
</div>
</template>>

<script>
import ListFrame from '../../components/listframe/index.vue'
import { reactive, toRefs } from 'vue'
import { useI18n }  from 'vue-i18n'

export default {
  components: { ListFrame },
	setup() {

    const { t } = useI18n()

    const state = reactive({
    })

    return {
      t,
      ...toRefs(state),
    }
	},
}
</script>>
