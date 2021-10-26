import { ref } from 'vue'
import axios from 'axios'
import { ElMessage } from 'element-plus'

export default function useRecord(model) {
  const record = ref([])
  const records = ref([])

  const errors = ref('')

  const total = ref(1)

  const getRecords = async (page) => {
    let response = await axios.get(`/api/${model}?page=${page}`)
    records.value = response.data.data
    total.value = response.data.meta.total
  }

  const getRecord = async (id) => {
    let response = await axios.get(`/api/${model}/${id}`)
    record.value = response.data.data
  }

  const updateRecord = async (data) => {
    errors.value = ''
    try {
      if (data.id > 0) {
        await axios.patch(`/api/${model}/${data.id}`, data)
      }else {
        await axios.post(`/api/${model}`, data)
      }
    } catch (e) {
      if (e.response.status === 422) {
        for (const key in e.response.data.errors) {
          errors.value += e.response.data.errors[key][0] + ' '
        }
      }else {
        ElMessage.error(e.response.data.message)
      }
    }
  }

  const destroyRecord = async (id) => {
    await axios.delete(`/api/${model}/` + id)
  }

  return {
    errors,
    record,
    records,
    total,
    getRecords,
    getRecord,
    updateRecord,
    destroyRecord
  }
}
