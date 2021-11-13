<template>
  <el-row>
    <span>{{ t('file.title') }} </span>
  </el-row>
  <el-table :data="value" style="width: 100%">
    <el-table-column prop="name" :label="t('file.name')" width="300" />
    <el-table-column prop="origin_name" :label="t('file.origin_name')" width="500" />

    <el-table-column fixed="right" prop="actions" label="actions" width="220">
      <template #header>
        <el-button type="primary" icon="el-icon-plus" @click="handleCreate" circle>
        </el-button>
      </template>

      <template #default="scope">
        <el-button type="primary" icon="el-icon-edit" @click="handleEdit(scope.$index)" circle>
        </el-button>
        <el-button type="primary" icon="el-icon-view" @click="handleView(scope.$index)" circle>
        </el-button>
        <el-button type="primary" icon="el-icon-download" @click="handleDownload(scope.$index)" circle>
        </el-button>
        <el-button type="danger" icon="el-icon-delete" @click="handleDelete(scope.$index)" circle>
        </el-button>
      </template>

    </el-table-column>
  </el-table>

  <el-dialog v-model="dialogFormVisible" title="Edit">
    <el-form :model="form">
      <el-form-item :label="t('file.name')" :label-width="formLabelWidth">
        <el-input v-model="form.name" autocomplete="off"></el-input>
      </el-form-item>
      <el-form-item :label="t('file.origin_name')" :label-width="formLabelWidth">
        <div class="flex">
        <el-input v-model="form.origin_name" disabled autocomplete="off"></el-input>
        <el-upload
          action="/api/upload"
          :on-success="handleUploaded"
          :show-file-list="false"
          :before-upload="beforeUpload"
        >
          <el-button type="primary">Upload</el-button>
        </el-upload>
        </div>
      </el-form-item>
    </el-form>

    <template #footer>
      <span class="dialog-footer">
        <el-button @click="dialogFormVisible = false">Cancel</el-button>
        <el-button type="primary" @click="saveFunction"
                   >Confirm</el-button>
      </span>
    </template>
  </el-dialog>
</template>>

<script>
  import { onMounted, reactive, toRefs, computed } from 'vue'
import { useI18n }  from 'vue-i18n'
import { ElMessageBox, ElMessage } from 'element-plus'

export default {
  props: {
    modelValue: {
      type: Array,
      default: []
    },
  },
	setup(props, { emit } ) {

    const state = reactive({
      zform: {
        id: 0,
        sequence: 0,
        name: '',
        origin_name: '',
        file: '',
        type: 'doc',
        thumbnail: '',
      },
      form: {},
      dialogFormVisible: false,
      formLabelWidth: 120,
      sqno: -1,
    })

    const { t } = useI18n()

    const value = computed({
      get: () => props.modelValue,
      set: (value) => emit('update:modelValue', value)
    })

    const clearForm = () => {
      state.form = { ...state.zform }
    }

    const handleDelete = (sq) => {
      const a = value.value
      a.splice(sq,1)
      value.value = a
    }

    const saveFunction = async () => {
      const s = value.value
      console.log('before value', s)
      if (state.sqno >= 0) {
        s[state.sqno] = state.form
      }else{
        s.push(state.form)
      }
      value.value = s
      console.log('value', value.value)

      state.dialogFormVisible = false
    }

    const handleEdit = async (sq) => {
      const s = value.value

      Object.assign(state.form, s[sq])
      state.sqno = sq

      state.dialogFormVisible = true
    }

    const handleCreate = async () => {
      clearForm()
      state.sqno = -1
      state.dialogFormVisible = true
    }

    const handleView = (sq) => {
      console.log('view', sq)
    }

    const handleDownload = (sq) => {
      console.log('download', sq)
    }

    const handleUploaded = (response, file, fileList) => {
      console.log('file', file)
      state.form.file = response.data.file
      state.form.origin_name = file.name
    }

    const beforeUpload = (file) => {
      if (file.size > 5 * 1024 * 1024)
      {
        ElMessageBox.alert('File size exceeded', 'Title', {
          confirmButtonText: 'OK',
        })
        return false
      }
      return true
    }

    return {
      t,
      value,
      handleDelete,
      handleEdit,
      handleCreate,
      saveFunction,
      handleView,
      handleDownload,
      handleUploaded,
      beforeUpload,
      ...toRefs(state),
    }
	},
}
</script>
