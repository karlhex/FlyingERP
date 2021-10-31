<template>
  <span>{{ getOptionValue('sex',sex) }}</span>
</template>

<script>
  import { defineComponent } from 'vue'
  import { useStore } from 'vuex'

  export default defineComponent({
  props: {
    sex: {
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
