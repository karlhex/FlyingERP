<template>
<div>
  <list-frame
    model="productinfos"
    next="productinfo.edit"
  >
  <template v-slot:default>
    <el-table-column prop="name" :label="t('product.name')" width="180" />
    <el-table-column prop="company_name" :label="t('product.company_name')" width="180" />
    <el-table-column prop="unit" :label="t('product.unit')" width="180" />
    <el-table-column prop="type" :label="t('product.type')" width="180">
      <template #default="scope">
        <so-format skey="producttype" :value="scope.row.type" />
      </template>
    </el-table-column>
  </template>
  </list-frame>
</div>
</template>>

<script>
import ListFrame from '../../components/listframe/index.vue'
import { useI18n }  from 'vue-i18n'
import SoFormat from '../../components/formatters/so.vue'

export default {
  components: { ListFrame, SoFormat },
  setup( ) {

    const { t } = useI18n()

    return {
      t
    }
	},
}
</script>>
