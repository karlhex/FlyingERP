<template>
  <span>{{ getOptionValue(skey, value) }}</span>
</template>

<script>
  import { defineComponent } from 'vue'
  import { useStore } from 'vuex'

  export default defineComponent({
  props: {
    skey: {
      type: String,
      required: true,
    },
    value: {
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
