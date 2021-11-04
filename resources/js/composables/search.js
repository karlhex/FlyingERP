import axios from 'axios'
import { ref } from 'vue'
import { ElMessage } from 'element-plus'

export default function useSearch(searcher) {
  const errors = ref('')
  const doSearch = async (query) => {
    try {
      const response = await axios.get(`/api/${searcher}/search?search=${query}`)
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
