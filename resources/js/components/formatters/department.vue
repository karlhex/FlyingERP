<template>
  <span>{{ getOptionValue('department',department) }}</span>
</template>

<script>
  import { defineComponent } from 'vue'
  import { useStore } from 'vuex'

  export default defineComponent({
  props: {
    department: {
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
