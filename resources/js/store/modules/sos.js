import  useSos from '../../composables/sos'

const  { getSelectOptions } = useSos()

const state = () => ({
  select_options: []
})

const getters = {
  getOptions: (state) => (key) => {
    const o = state.select_options.filter((o) => (o.key === key) )
    console.log('o', o)
    return o
  },
  getOptionValue: (state) => (key, option) => {
    const o = state.select_options.find((o) => o.key === key && o.option === option)
    return o ? o.value : ''
  }
}

const actions = {
  async load ( {commit, state} ) {
    const so = await getSelectOptions()
    commit('setSelectOptions', so)
  }
}

const mutations = {
  setSelectOptions(state, so) {
    state.select_options = so
  }
}

export default {
  namespaced: true,
  state,
  getters,
  actions,
  mutations,
}
