<template>
<div>
  <edit-frame
    model="sos"
    :form="form"
    dialog-title="Select Option"
    @set="setForm"
    @clear="clearForm"
  >
  <template v-slot:default>
    <el-table-column prop="key" :label="t('sos.key')" width="180" />
    <el-table-column prop="option" :label="t('sos.option')" width="180" />
    <el-table-column prop="value" :label="t('sos.value')" width="180" />
  </template>

  <template v-slot:dialog >
    <el-form :model="form">
      <el-form-item label="Option Key" :label-width="formLabelWidth">
        <el-input v-model="form.key" autocomplete="off"></el-input>
      </el-form-item>
      <el-form-item label="Option" :label-width="formLabelWidth">
        <el-input v-model="form.option" autocomplete="off"></el-input>
      </el-form-item>
      <el-form-item label="Value" :label-width="formLabelWidth">
        <el-input v-model="form.value" autocomplete="off"></el-input>
      </el-form-item>
    </el-form>
  </template>
  </edit-frame>
</div>
</template>>

<script>
import EditFrame from '../../components/editframe/index.vue'

import { onMounted, reactive, toRefs } from 'vue'

import { useI18n }  from 'vue-i18n'

export default {
  components: { EditFrame },
	setup() {

    const { t } = useI18n()

    const state = reactive({
      form: {
        id: 0,
        key: '',
        option: '',
        value: '',
      },
      formLabelWidth: '120px'
    })

    const setForm = (record) => {
      Object.assign(state.form, record.value)
    }

    const clearForm = () => {
      Object.assign(state.form, {
        id: 0,
        key: '',
        option: '',
        value: ''
      })
    }

      return {
        t,
        setForm,
        clearForm,
        ...toRefs(state),
      }
	  },
  }
</script>>
