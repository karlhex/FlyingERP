<template>
  <span>{{ getOptionValue('degree',degree) }}</span>
</template>

<script>
  import { defineComponent } from 'vue'
  import { useStore } from 'vuex'

  export default defineComponent({
  props: {
    degree: {
      type: String,
      required: true
    }
  },
	setup( ) {
    const store = useStore()

    const getOptionValue = store.getters['sos/getOptionValue']

    return {
      getOptionValue
    }
	},
  })
</script>
