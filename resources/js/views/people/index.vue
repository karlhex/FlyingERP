<template>
  <list-frame
    model="people"
    next="person.edit"
  >
  <template v-slot:default>
    <el-table-column prop="name" :label="t('person.name')" width="180" />
    <el-table-column prop="phone1" :label="t('person.phone')" width="180" />
    <el-table-column prop="email" :label="t('person.email')" width="220" />
    <el-table-column prop="company_name" :label="t('person.company')" width="250" />
  </template>
  </list-frame>
</template>

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
