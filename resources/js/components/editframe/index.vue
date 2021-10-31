<template>
  <el-table :data="records" style="width: 100%">
    <slot name="default" />
    <el-table-column fixed="right" prop="actions" label="actions" width="150">
      <template #header>
        <el-button type="primary" icon="el-icon-plus" @click="handleCreate" circle>
        </el-button>
      </template>

      <template #default="scope">
        <el-button type="primary" icon="el-icon-edit" @click="handleEdit(scope.row.id)" circle>
        </el-button>
        <el-button type="danger" icon="el-icon-delete" @click="handleDelete(scope.row.id)" circle>
        </el-button>
      </template>

    </el-table-column>
  </el-table>

  <el-pagination :current-page="page" @update:current-page="updatePage" layout="prev, pager, next" :page-count="page_count"></el-pagination>

  <el-dialog v-model="dialogFormVisible" :title="dialogTitle">
    <div class="mt-2 mb-6 text-sm text-red-600" v-if="errors !== ''">
        {{ errors }}
    </div>

    <slot name="dialog" />

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
import useRecord from '../../composables/record'

export default {
  props: {
    model: {
      type: String,
      required: true
    },
    form: {
      type: Object,
      default: {}
    },
    dialogTitle: {
      type: String,
      default: ''
    },
  },
  emits: ['set', 'clear'],
	setup(props, emits) {

    const { errors, record, records, total, getRecord, getRecords, destroyRecord, updateRecord } = useRecord(props.model)

    const state = reactive({
      dialogFormVisible: false,
      page: 1
    })

    const handleDelete = async (id) => {
      if (!window.confirm('Are you sure?')) {
        return
      }
      await destroyRecord(id)
    }

    const saveFunction = async () => {
      errors.value = ''
      await updateRecord(props.form)
      console.log('errors', errors)
      if ( errors.value === '' ) {
        state.dialogFormVisible = false
      }
    }

    const handleEdit = async (id) => {
      await getRecord(id)
      emits.emit('set', record)
      state.dialogFormVisible = true
    }

    const handleCreate = async () => {
      emits.emit('clear')
      state.dialogFormVisible = true
    }

    const updatePage = async (newValue) => {
      state.page = newValue
      await getRecords(state.page)
    }

    const page_count = computed( () => {
      return Math.floor(((total.value - 1) / 5) + 1)
    })

    onMounted(updatePage(1))

    return {
      errors,
      page_count,
      records,
      updatePage,
      saveFunction,
      handleDelete,
      handleEdit,
      handleCreate,
      ...toRefs(state),
    }
	},
}
</script>
