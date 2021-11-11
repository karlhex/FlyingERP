<template>
  <span>{{ toDate() }}</span>
</template>

<script>
  import { defineComponent } from 'vue'
import moment from 'moment'

  export default defineComponent({
  props: {
    value: ''
  },
	setup(props) {

    const toDate = () => {
      if (!props.value || props.value === '')  return ''

      return moment(props.value).format('YYYY-MM-DD')
    }

    return {
      toDate
    }
	},
  })
</script>
