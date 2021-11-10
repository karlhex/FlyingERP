<template>
  <span>{{ '¥' + amount }}</span>
</template>

<script>
  import { defineComponent, computed } from 'vue'

export default defineComponent({
  props: {
    value: 0
  },
	setup(props) {

    const amount = computed( () => {
      const v = Number(props.value)
      return v.toFixed(2)
    })

    return {
      amount
    }
	},
})
</script>
