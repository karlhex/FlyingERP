<template>
  <el-row>
    <span>{{ dialogTitle }} </span>
  </el-row>
  <el-table :data="value" style="width: 100%">
    <slot name="default" />
    <el-table-column fixed="right" prop="actions" label="actions" width="220">
      <template #header>
        <el-button type="primary" icon="el-icon-plus" @click="handleCreate" circle>
        </el-button>
      </template>

      <template #default="scope">
        <el-button type="primary" icon="el-icon-edit" @click="handleEdit(scope.$index)" circle>
        </el-button>
        <el-button type="primary" icon="el-icon-arrow-up" @click="handleUp(scope.$index)" circle>
        </el-button>
        <el-button type="primary" icon="el-icon-arrow-down" @click="handleDown(scope.$index)" circle>
        </el-button>
        <el-button type="danger" icon="el-icon-delete" @click="handleDelete(scope.$index)" circle>
        </el-button>
      </template>

    </el-table-column>
  </el-table>

  <el-dialog v-model="dialogFormVisible" title="Edit">
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

export default {
  props: {
    modelValue: {
      type: Array,
      default: []
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
  emits: ['set', 'clear', 'update:modelValue'],
	setup(props, emits ) {

    const state = reactive({
      dialogFormVisible: false,
      sqno: -1,
    })

    const value = computed({
      get: () => props.modelValue,
      set: (value) => emits.emit('update:modelValue', value)
    })

    const handleDelete = (sq) => {
      const a = value.value
      a.splice(sq,1)
      value.value = a
    }

    const saveFunction = async () => {
      const s = value.value
      if (state.sqno >= 0) {
        s[state.sqno] = props.form
      }else{
        s.push(props.form)
      }
      value.value = s
      state.dialogFormVisible = false
    }

    const handleEdit = async (sq) => {
      const s = value.value
      emits.emit('set', s[sq])
      state.sqno = sq
      state.dialogFormVisible = true
    }

    const handleCreate = async () => {
      emits.emit('clear')
      state.sqno = -1
      state.dialogFormVisible = true
    }

    const swap = (s1, s2) => {
      const s = value.value

      if (s1 <0 || s1 >= s.length) return
      if (s2 <0 || s2 >= s.length) return

      const v1 = s[s1]
      const v2 = s[s2]

      s[s1] = v2
      s[s2] = v1

      value.value = s
    }

    const handleUp = (sq) => {
      swap(sq-1, sq)
    }

    const handleDown = (sq) => {
      swap(sq, sq+1)
    }

    return {
      value,
      handleDelete,
      handleEdit,
      handleCreate,
      saveFunction,
      handleUp,
      handleDown,
      ...toRefs(state),
    }
	},
}
</script>
