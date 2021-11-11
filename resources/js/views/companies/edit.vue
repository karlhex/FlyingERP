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
      <edit-box :dialog-title="t('project.title')">
        <template #col1>
          <el-form-item label="Company Name" :label-width="formLabelWidth">
            <el-input v-model="form.name" autocomplete="off"></el-input>
          </el-form-item>
          <el-form-item label="Phone" :label-width="formLabelWidth">
            <el-input v-model="form.phone" autocomplete="off"></el-input>
          </el-form-item>
          <el-form-item label="Email" :label-width="formLabelWidth">
            <el-input v-model="form.email" autocomplete="off"></el-input>
          </el-form-item>
        </template>
        <template #col2>
          <el-form-item label="Address" :label-width="formLabelWidth">
            <el-input v-model="form.address" autocomplete="off"></el-input>
          </el-form-item>
          <el-form-item label="WebSite" :label-width="formLabelWidth">
            <el-input v-model="form.site" autocomplete="off"></el-input>
          </el-form-item>
          <el-form-item label="Business Person" :label-width="formLabelWidth">
            <id-select
              v-model="form.business_person_id"
              placeholder="Select person"
              searchgroup="person"
              querygroup="people"
              :columns="['name', 'company_name']"
              :v-model:info="form.business_person"
              toedit="person.edit"
              />
          </el-form-item>
          <el-form-item label="Tech Person" :label-width="formLabelWidth">
            <id-select
              v-model="form.tech_person_id"
              placeholder="Select person"
              searchgroup="person"
              querygroup="people"
              :columns="['name', 'company_name']"
              :v-model:info="form.tech_person"
              toedit="person.edit"
              />
          </el-form-item>
        </template>
      </edit-box>
    </template>
  </edit-dialog>
</div>
</template>

<script>
  import { reactive, toRefs, onMounted } from 'vue'

import EditDialog from '../../components/editdialog/index.vue'
import IdSelect from '../../components/form/idselect.vue'
import EditBox from '../../components/editbox/index.vue'

import { useI18n }  from 'vue-i18n'

  export default {
    components: { EditDialog, EditBox, IdSelect },
	setup() {
    const state = reactive({
      zform: {
        id: 0,
        name: '',
        phone: '',
        email: '',
        address: '',
        site: '',
        business_person_id: 0,
        business_person: {},
        tech_person_id: 0,
        tech_person: {},
        account_id: 0,
        account: {},
        tax_info_id: 0,
        tax_info: {},
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
