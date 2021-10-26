<template>
  <edit-frame
    model="people"
    :form="form"
    dialog-title="Person"
    @set="setForm"
    @clear="clearForm"
  >
  <template v-slot:header>
    <th class="px-6 py-3 bg-gray-50">
      <span
        class="text-xs font-medium tracking-wider leading-4 text-left text-gray-500 uppercase">Name</span>
    </th>
    <th class="px-6 py-3 bg-gray-50">
      <span
        class="text-xs font-medium tracking-wider leading-4 text-left text-gray-500 uppercase">Phone</span>
    </th>
    <th class="px-6 py-3 bg-gray-50">
      <span
        class="text-xs font-medium tracking-wider leading-4 text-left text-gray-500 uppercase">Email</span>
    </th>
    <th class="px-6 py-3 bg-gray-50">
      <span
        class="text-xs font-medium tracking-wider leading-4 text-left text-gray-500 uppercase">Company</span>
    </th>
  </template>

  <template v-slot:detail="slotProps" >
          <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
            {{ slotProps.item.name }}
          </td>
          <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
            {{ slotProps.item.phone1 }}
          </td>
          <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
            {{ slotProps.item.email }}
          </td>
          <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
            {{ slotProps.item.company_name }}
          </td>
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

export default {
  components: { EditFrame },
	setup() {

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
        setForm,
        clearForm,
        ...toRefs(state),
      }
	  },
  }
</script>>
