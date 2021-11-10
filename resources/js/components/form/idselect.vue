<template>
  <div class="flex flex-row">
    <div>
    <el-select
       v-model="value"
      :placeholder="placeholder"
      filterable
      remote
      reserve-keyword
      :remote-method="remoteMethod"
      :loading="loading"
      @change="onChange"
    >
      <el-option
        v-for="item in options"
        :key="item.option"
        :label="item.value"
        :value="item.option"
      >
      </el-option>
    </el-select>
    </div>
    <div v-if="toedit" class="ml-1">
      <el-button icon="el-icon-edit" type="text" @click="handleTo" />
    </div>
  </div>
</template>

<script>
import { toRefs, reactive, computed, onMounted, watch } from 'vue'
import useSearch from '../../composables/search'
import useRecord from '../../composables/record'
import { Edit } from '@element-plus/icons'
import { useRouter } from 'vue-router'

export default {
  props: {
    modelValue: undefined,
    searchgroup: {
      type: String,
      required: true,
    },
    querygroup: {
      type: String,
      required: true,
    },
    info: {
      type: Object,
      default: undefined,
    },
    columns: {
      type: Array,
      default: [],
    },
    toedit: {
      type: String,
      default: undefined,
    },
    placeholder: '',
  },
  components: { Edit },
  setup(props, { emit }) {
    const state = reactive({
      options: [],
      loading: false,
    })

    const { doSearch, errors } = useSearch(props.searchgroup)
    const { record, getRecord } = useRecord(props.querygroup)
    const router = useRouter()

    let saveRecords = undefined

    const value = computed({
      get: () => props.modelValue,
      set: (value) => emit('update:modelValue', value)
    })

    const vinfo = computed({
      get: () => props.info,
      set: (info) => emit('update:info', info)
    })

    const constructValue = (info)  => {
      let v = ''

      props.columns.forEach( (o) => {
        if (v === '') v += info[o]
        else v += ',' + info[o]
      })

      return v
    }

    const initOptions = async () => {
      if (!value.value) return
      let o = undefined

      if ( vinfo.value ) {
        o = vinfo.value
      }else
      {
        await getRecord(value.value)
        o = record.value
      }

      saveRecords = [ o ]

      state.options = [{
        option: value,
        value: constructValue(o),
      }]
    }

    watch(value,  (value, prevValue) => {
        initOptions()
    })

    const remoteMethod = async (query) => {
      state.loading = true
      const res = await doSearch(query)

      if (errors.value === ''){
        state.options = res.map((o) => {
          return {
            option: o.id.toString(),
            value: constructValue(o),
          }
        })
      }
      saveRecords = res

      state.loading = false
    }

    const onChange = (val) => {
      console.log('onChange', val, saveRecords)
      vinfo.value = saveRecords.find((o) => { return o.id.toString() === val.toString() })
    }

    const handleTo = () => {
      router.push({ name: props.toedit, params: { id: value.value ? value.value : '0' } })
    }

    onMounted(initOptions)

    return {
      value,
      remoteMethod,
      handleTo,
      onChange,
      ...toRefs(state)
    }
  }
}
</script>
