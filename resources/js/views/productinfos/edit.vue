<template>
  <div>
  <edit-dialog
    model="productinfos"
    dialogTitle="Edit product info"
    :form="form"
    @set="setForm"
    @clear="clearForm"
  >
    <template #default>
    <el-form :model="form">
      <el-form-item :label="t('product.name')" :label-width="formLabelWidth">
        <el-input v-model="form.name" autocomplete="off"></el-input>
      </el-form-item>
      <el-form-item :label="t('product.company_name')" :label-width="formLabelWidth">
        <el-input v-model="form.company_name" autocomplete="off"></el-input>
      </el-form-item>
      <el-form-item :label="t('product.unit')" :label-width="formLabelWidth">
        <el-input v-model="form.unit" autocomplete="off"></el-input>
      </el-form-item>
      <el-form-item :label="t('product.type')" :label-width="formLabelWidth">
        <so-select v-model="form.type" placeholder="Type" skey="producttype"></so-select>
      </el-form-item>
      <el-form-item :label="t('product.description')" :label-width="formLabelWidth">
        <el-input v-model="form.description" autocomplete="off"></el-input>
      </el-form-item>
    </el-form>
    </template>
  </edit-dialog>
  </div>
</template>

<script>
  import { reactive, toRefs, onMounted } from 'vue'

import EditDialog from '../../components/editdialog/index.vue'
import SoSelect from '../../components/form/soselect.vue'

import { useI18n }  from 'vue-i18n'

  export default {
    components: { EditDialog, SoSelect },
	setup() {
    const state = reactive({
      zform: {
        id: 0,
        company_name: '',
        unit: '',
        type: '',
        description: '',
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
      state.form = { ...state.zform }
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
