<template>
<div class="overflow-hidden overflow-x-auto min-w-full align-middle sm:rounded-md">
  <table class="min-w-full border divide-y divide-gray-200">
    <thead>
      <tr>
        <slot name="header" />

        <th class="px-6 py-3 bg-gray-50">
          <el-button type="primary" @click="handleCreate">
            Create
          </el-button>
        </th>
      </tr>
    </thead>

    <tbody class="bg-white divide-y divide-gray-200 divide-solid">
      <template v-for="item in records" :key="item.id">
        <tr class="bg-white">

          <slot name="detail" :item="item" />

          <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
            <el-button type="primary" @click="handleEdit(item.id)">
              Edit
            </el-button>
            <el-button type="danger" @click="handleDelete(item.id)">
              Delete
            </el-button>
          </td>
        </tr>
      </template>
    </tbody>
  </table>

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

</div>
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
	setup(props, context) {

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
      context.emit('set', record)
      state.dialogFormVisible = true
    }

    const handleCreate = async () => {
      context.emit('clear')
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
