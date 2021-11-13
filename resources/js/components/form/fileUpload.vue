<template>
  <el-upload
    class="upload-demo"
    action="/api/upload"
    :on-success="handleUploaded"
    :show-file-list="false"
  >
    <el-button size="small" type="primary">Click to upload</el-button>
  </el-upload>
</template>

<script>
  import { reactive, toRefs, onMounted } from 'vue'
export default {
  setup() {
    const state = reactive({
      fileList: [
        {
          name: 'food.jpeg',
          url: 'https://fuss10.elemecdn.com/3/63/4e7f3a15429bfda99bce42a18cdd1jpeg.jpeg?imageMogr2/thumbnail/360x360/format/webp/quality/100',
        },
        {
          name: 'food2.jpeg',
          url: 'https://fuss10.elemecdn.com/3/63/4e7f3a15429bfda99bce42a18cdd1jpeg.jpeg?imageMogr2/thumbnail/360x360/format/webp/quality/100',
        },
      ],
    })

    const handleUploaded = (response, file, fileList) => {
      console.log('file', file)
    }

    return {
      handleUploaded,
      ...toRefs(state)
    }
  }
}
</script>
