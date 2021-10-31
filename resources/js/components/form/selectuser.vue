<template>
<el-select
    v-model="value"
    :placeholder="placeholder"
    filterable
    remote
    reserve-keyword
    :remote-method="remoteMethod"
    :loading="loading"
 >
    <el-option
      v-for="item in options"
      :key="item.option"
      :label="item.value"
      :value="item.option"
    >
    </el-option>
  </el-select>
</template>

<script>
import { toRefs, reactive, computed, onMounted, watch } from 'vue'
import useUser from '../../composables/user'
import useRecord from '../../composables/record'

export default {
  props: {
    modelValue: {
      type: String,
      default: ''
    },
    placeholder: {
      type: String,
      default: '',
    }
  },
  setup(props, { emit }) {
    const state = reactive({
      options: [],
      loading: false,
    })

    const { doSearch, errors } = useUser()
    const { record, getRecord } = useRecord('users')

    const initOptions = async () => {
      await getRecord(value.value)
      const o = record.value

      state.options = [{
        option: value,
        value: o.name + ':' + o.email
      }]
    }

    const value = computed({
      get: () => props.modelValue,
      set: (value) => emit('update:modelValue', value)
    })

    watch(value,  (value, prevValue) => {
      if (prevValue === '') {
        initOptions()
      }
    })

    const remoteMethod = async (query) => {
      state.loading = true
      const res = await doSearch(query)

      if (errors.value === ''){
        state.options = res.map((o) => {
          return {
            option: o.id.toString(),
            value: o.name + ':' + o.email
          }
        })
      }
      state.loading = false
    }

    return {
      value,
      remoteMethod,
      ...toRefs(state)
    }
  }
}
</script>
