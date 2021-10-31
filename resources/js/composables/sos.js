import axios from 'axios'
import { ref } from 'vue'
import { ElMessage } from 'element-plus'

export default function useSos() {
  const errors = ref('')
  const getSelectOptions = async () => {
    try {
      const response = await axios.get('/api/allsos')
      return response.data.data
    } catch(e) {
      ElMessage.error(e.response.data.message)
      errors.value = e.response.data.message
      return []
    }
  }

  return {
    errors,
    getSelectOptions,
  }
}
