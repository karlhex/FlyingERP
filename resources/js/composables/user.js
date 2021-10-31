import axios from 'axios'
import { ref } from 'vue'
import { ElMessage } from 'element-plus'

export default function useUser() {
  const errors = ref('')
  const doSearch = async (query) => {
    try {
      const response = await axios.get('/api/user/search', { search: query })
      return response.data.data
    } catch(e) {
      ElMessage.error(e.response.data.message)
      errors.value = e.response.data.message
      return []
    }
  }

  return {
    errors,
    doSearch,
  }
}
