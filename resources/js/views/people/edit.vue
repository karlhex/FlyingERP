<template>
  <div>
  <edit-dialog
    model="people"
    dialogTitle="Edit person"
    :form="form"
    @set="setForm"
    @clear="clearForm"
  >
    <template #default>
    <el-form :model="form">
      <el-form-item label="Person Name" :label-width="formLabelWidth">
        <el-input v-model="form.name" autocomplete="off"></el-input>
      </el-form-item>
      <el-form-item label="Phone1" :label-width="formLabelWidth">
        <el-input v-model="form.phone1" autocomplete="off"></el-input>
      </el-form-item>
      <el-form-item label="Phone2" :label-width="formLabelWidth">
        <el-input v-model="form.phone2" autocomplete="off"></el-input>
      </el-form-item>
      <el-form-item label="Phone3" :label-width="formLabelWidth">
        <el-input v-model="form.phone3" autocomplete="off"></el-input>
      </el-form-item>
      <el-form-item label="Email" :label-width="formLabelWidth">
        <el-input v-model="form.email" autocomplete="off"></el-input>
      </el-form-item>
      <el-form-item label="Company" :label-width="formLabelWidth">
        <el-input v-model="form.company_name" autocomplete="off"></el-input>
      </el-form-item>
      <el-form-item label="Department" :label-width="formLabelWidth">
        <el-input v-model="form.department" autocomplete="off"></el-input>
      </el-form-item>
      <el-form-item label="Position" :label-width="formLabelWidth">
        <el-input v-model="form.position" autocomplete="off"></el-input>
      </el-form-item>
    </el-form>
    </template>
  </edit-dialog>
  </div>
</template>

<script>
  import { reactive, toRefs, onMounted } from 'vue'

import FwSelect from '../../components/form/soselect.vue'
import EditDialog from '../../components/editdialog/index.vue'

import { useI18n }  from 'vue-i18n'

  export default {
    components: { EditDialog, FwSelect },
	setup() {
    const state = reactive({
      zform: {
        id: 0,
        name: '',
        phone1: '',
        phone2: '',
        phone3: '',
        email: '',
        company_name: '',
        department: '',
        position: '',
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
