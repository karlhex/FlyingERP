<template>
<el-autocomplete
  v-model="value"
  :fetch-suggestions="querySearch"
  class="w-full"
  placeholder="Input sid"
  suffix-icon= "el-icon-coordinate"
  @select="handleSelect"
/>
</template>

<script>
import { computed } from 'vue'
import useSid from '../../composables/sid'

export default {
  name: "sidInput",
  props: {
    modelValue: '',
    sidkey: String,
  },
  setup(props, { emit }) {

    const value = computed({
      get: () => props.modelValue,
      set: (value) => emit('update:modelValue', value)
    })

    const { doGetSid } = useSid(props.sidkey)

    const querySearch = async (queryString, cb) => {
      let results = []

      if ( !queryString || queryString.trim() === '') {
        const sid = await doGetSid()

        results = [
            { value:sid },
        ]
      }
      cb(results)
    }

    const handleSelect = (item) => {
      console.log('item', item)
    }

    return {
      value,
      querySearch,
      handleSelect,
    };
  },
};
</script>
