<template>
<div>
  <edit-dialog
    model="companies"
    dialogTitle="Edit company"
    :form="form"
    @set="setForm"
    @clear="clearForm"
  >
    <template #default>
      <el-form :model="form">
        <el-form-item label="Company Name" :label-width="formLabelWidth">
          <el-input v-model="form.name" autocomplete="off"></el-input>
        </el-form-item>
        <el-form-item label="Email" :label-width="formLabelWidth">
          <el-input v-model="form.email" autocomplete="off"></el-input>
        </el-form-item>
        <el-form-item label="Address" :label-width="formLabelWidth">
          <el-input v-model="form.address" autocomplete="off"></el-input>
        </el-form-item>
        <el-form-item label="WebSite" :label-width="formLabelWidth">
          <el-input v-model="form.website" autocomplete="off"></el-input>
        </el-form-item>
      </el-form>
    </template>
  </edit-dialog>
</div>
</template>

<script>
  import { reactive, toRefs, onMounted } from 'vue'

import EditDialog from '../../components/editdialog/index.vue'

import { useI18n }  from 'vue-i18n'

  export default {
    components: { EditDialog },
	setup() {
    const state = reactive({
      zform: {
        id: 0,
        name: '',
        email: '',
        address: '',
        website: '',
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
