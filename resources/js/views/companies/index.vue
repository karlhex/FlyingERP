<template>
<div>
  <edit-frame
    model="companies"
    :form="form"
    dialog-title="Company"
    @set="setForm"
    @clear="clearForm"
  >
  <template v-slot:default>
    <el-table-column prop="name" :label="t('company.name')" width="180" />
    <el-table-column prop="phone1" :label="t('company.email')" width="180" />
    <el-table-column prop="address" :label="t('company.address')" width="220" />
    <el-table-column prop="website" :label="t('company.website')" width="250" />
  </template>

  <template v-slot:dialog >
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
  </edit-frame>
</div>
</template>>

<script>
import EditFrame from '../../components/editframe/index.vue'
import { reactive, toRefs } from 'vue'
import { useI18n }  from 'vue-i18n'

export default {
  components: { EditFrame },
	setup() {

    const { t } = useI18n()

    const state = reactive({
      form: {
        id: 0,
        name: '',
        email: '',
        address: '',
        website: '',
      },
      formLabelWidth: '120px',
    })

    const setForm = (record) => {
      Object.assign(state.form, record.value)
    }

    const clearForm = () => {
      Object.assign(state.form, {
        id: 0,
        name: '',
        email: '',
        address: '',
        website: ''
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
