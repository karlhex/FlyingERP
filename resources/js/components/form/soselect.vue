<template>
  <el-select v-model="value" :placeholder="placeholder" >
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
import { toRefs, reactive, onMounted, computed } from 'vue'
import { useStore } from 'vuex'

export default {
    props: {
        modelValue: {
            type: String,
            default: ''
        },
        skey: {
            type: String,
            default: ''
        },
        placeholder: {
            type: String,
            default: '',
        }
    },
    setup(props, { emit }) {
        const store = useStore()
        const getOptions = store.getters['sos/getOptions']

        const state = reactive({
            options: [],
        })

        const value = computed({
            get: () => props.modelValue,
            set: (value) => emit('update:modelValue', value)
        })

        const initFunc = () => {
            state.options = getOptions(props.skey)
            console.log('options', state.options)
        }

        onMounted(initFunc)

        return {
            value,
        ...toRefs(state)
        }
  }
}
</script>
