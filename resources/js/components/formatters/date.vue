<template>
  <span>{{ toDate() }}</span>
</template>

<script>
  import { defineComponent } from 'vue'
import moment from 'moment'

  export default defineComponent({
  props: {
    value: {
      type: String,
      required: true
    }
  },
	setup(props) {

    const toDate = () => {
      return moment(props.value).format('YYYY-MM-DD')
    }

    return {
      toDate
    }
	},
  })
</script>
