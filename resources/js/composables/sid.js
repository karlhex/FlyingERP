import axios from 'axios'
import { ref } from 'vue'
import { ElMessage } from 'element-plus'

export default function useSid(sidkey) {
  const errors = ref('')
  const doGetSid = async () => {
    try {
      const response = await axios.get(`/api/${sidkey}/sid`)
      return response.data.sid
    } catch(e) {
      ElMessage.error(e.response.data.message)
      errors.value = e.response.data.message
      return []
    }
  }

  return {
    errors,
    doGetSid,
  }
}
