import { createStore, createLogger } from 'vuex'
import sos from './modules/sos'

const debug = process.env.NODE_ENV !== 'production'

const store = createStore({
  modules: {
    sos,
  },
  strict: debug,
  plugins: debug ? [createLogger()] : []
})

store.dispatch('sos/load')

export default store
