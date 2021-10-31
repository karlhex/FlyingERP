<template>
  <edit-frame
    model="people"
    :form="form"
    dialog-title="Person"
    @set="setForm"
    @clear="clearForm"
  >
  <template v-slot:default>
    <el-table-column prop="name" :label="t('person.name')" width="180" />
    <el-table-column prop="phone1" :label="t('person.phone')" width="180" />
    <el-table-column prop="email" :label="t('person.email')" width="220" />
    <el-table-column prop="company_name" :label="t('person.company')" width="250" />
  </template>

  <template v-slot:dialog >
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
  </edit-frame>
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
        phone1: '',
        phone2: '',
        phone3: '',
        email: '',
        company_name: '',
        department: '',
        position: '',
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
        phone1: '',
        phone2: '',
        phone3: '',
        email: '',
        company_name: '',
        department: '',
        position: '',
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
