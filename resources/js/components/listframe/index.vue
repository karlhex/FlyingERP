<template>
  <el-table :data="records" style="width: 100%">
    <slot name="default" />
    <el-table-column fixed="right" prop="actions" label="actions" width="120">
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
</template>>

<script>
  import { onMounted, reactive, toRefs, computed } from 'vue'
import useRecord from '../../composables/record'
import { useRouter } from 'vue-router'

export default {
  props: {
    model: {
      type: String,
      required: true
    },
    next: {
      type: String,
      required: true
    }
  },
	setup(props) {

    const router = useRouter()
    
    const { records, total, getRecords, destroyRecord } = useRecord(props.model)

    const state = reactive({
      page: 1
    })

    const handleDelete = async (id) => {
      if (!window.confirm('Are you sure?')) {
        return
      }
      await destroyRecord(id)
    }

    const handleEdit = async (id) => {
      router.push({ name: props.next, params: { id: id } })
    }

    const handleCreate = async () => {
      router.push({ name: props.next, params: { id: '0' } })
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
      page_count,
      records,
      updatePage,
      handleDelete,
      handleEdit,
      handleCreate,
      ...toRefs(state),
    }
	},
}
</script>
