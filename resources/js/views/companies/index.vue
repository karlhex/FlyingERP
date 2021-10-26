<template>
  <edit-frame
    model="companies"
    :form="form"
    dialog-title="Company"
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
        class="text-xs font-medium tracking-wider leading-4 text-left text-gray-500 uppercase">Email</span>
    </th>
    <th class="px-6 py-3 bg-gray-50">
      <span
        class="text-xs font-medium tracking-wider leading-4 text-left text-gray-500 uppercase">Address</span>
    </th>
    <th class="px-6 py-3 bg-gray-50">
      <span
        class="text-xs font-medium tracking-wider leading-4 text-left text-gray-500 uppercase">Website</span>
    </th>
  </template>

  <template v-slot:detail="slotProps" >
          <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
            {{ slotProps.item.name }}
          </td>
          <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
            {{ slotProps.item.email }}
          </td>
          <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
            {{ slotProps.item.address }}
          </td>
          <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
            {{ slotProps.item.website }}
          </td>
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
        setForm,
        clearForm,
        ...toRefs(state),
      }
	  },
  }
</script>>
