<template>
  <el-row>
    <span>{{ dialogTitle }} </span>
  </el-row>

  <div class="grid grid-cols-2 border border-2 border-gray-200">
    <div class="col-span-1 m-1 p-3">
      <slot name="col1" />
    </div>
    <div class="col-span-1 m-1 p-3">
      <slot name="col2" />
    </div>
  </div>

</template>>

<script>
export default {
  props: {
    dialogTitle: '',
  },
}
</script>
