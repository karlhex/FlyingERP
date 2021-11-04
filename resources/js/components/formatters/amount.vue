<template>
  <span>{{ amount }}</span>
</template>

<script>
  import { defineComponent, computed } from 'vue'

  export default defineComponent({
  props: {
    value: {
      type: Number,
      required: true
    }
  },
	setup(props) {

    const amount = computed({
      get: () => props.value.toFixed(2)
    })

    return {
      amount
    }
	},
  })
</script>
