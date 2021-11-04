<template>
  <el-form v-model="form" :title="dialogTitle">
    <div class="mt-2 mb-6 text-sm text-red-600" v-if="errors !== ''">
        {{ errors }}
    </div>

    <slot />

    <el-row>
        <el-button @click="goback">Cancel</el-button>
        <el-button type="primary" @click="saveFunction">
          Confirm
        </el-button>
    </el-row>
  </el-form>
</template>>

<script>
  import { onMounted, reactive, toRefs, computed } from 'vue'
import useRecord from '../../composables/record'
import { useRouter, useRoute } from 'vue-router'

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

    const { errors, record, getRecord, destroyRecord, updateRecord } = useRecord(props.model)

    const route = useRoute()
    const router = useRouter()

    const state = reactive({
      dialogFormVisible: false,
      id: 0
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
      if ( errors.value === '' ) {
        goback()
      }
    }

    const handleEdit = async (id) => {
      console.log('edit')
      await getRecord(id)
      emits.emit('set', record)
    }

    const handleCreate = async () => {
      emits.emit('clear')
    }

    const loadRecord = () => {
      const id = route.params.id

      if ( id === '0' ) {
        handleCreate()
      }else{
        handleEdit(id)
      }
    }

    const goback = () => {
      router.back()
    }

    onMounted(loadRecord)

    return {
      errors,
      record,
      goback,
      saveFunction,
      handleDelete,
      handleEdit,
      handleCreate,
      ...toRefs(state),
    }
	},
}
</script>
