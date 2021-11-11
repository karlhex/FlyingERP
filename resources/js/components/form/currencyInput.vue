<template>
  <el-input ref="inputRef" :modelValue="formattedValue" />
</template>

<script>
import { watch, computed } from 'vue'
import { useCurrencyInput } from "vue-currency-input";

export default {
  name: "currencyInput",
  props: {
    modelValue: 0,
    options: Object,
  },
  setup(props) {
    const { inputRef, formattedValue, setValue } = useCurrencyInput(props.options);

    const value = computed({
      get: () => props.modelValue,
      set: (value) => emit('update:modelValue', value)
    })

    watch(value, (value) => {
      setValue(value)
    })

    return { inputRef, formattedValue };
  },
};
</script>
