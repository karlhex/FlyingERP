<template>
  <edit-frame
    model="sos"
    :form="form"
    dialog-title="Select Option"
    @set="setForm"
    @clear="clearForm"
  >
  <template v-slot:header>
    <th class="px-6 py-3 bg-gray-50">
      <span
        class="text-xs font-medium tracking-wider leading-4 text-left text-gray-500 uppercase">{{ t('sos.key') }}</span>
    </th>
    <th class="px-6 py-3 bg-gray-50">
      <span
        class="text-xs font-medium tracking-wider leading-4 text-left text-gray-500 uppercase"> {{ t('sos.option') }}</span>
    </th>
    <th class="px-6 py-3 bg-gray-50">
      <span
        class="text-xs font-medium tracking-wider leading-4 text-left text-gray-500 uppercase">{{ t('sos.value') }}</span>
    </th>
  </template>

  <template v-slot:detail="slotProps" >
    <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
      {{ slotProps.item.key }}
    </td>
    <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
      {{ slotProps.item.option }}
    </td>
    <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
      {{ slotProps.item.value }}
    </td>
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
