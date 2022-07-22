import {createStore} from "vuex";

const store = createStore({
   state: {
      user: {
         data: {},
         token: sessionStorage.getItem("TOKEN"),
      },
   },
   getters: {},
   actions: {
     
   },
   mutations: {
      logout: (state) => {
         state.user.token = null;
         state.user.data = {};
      },
      setUser: (state, userData) => {
         state.user.token = userData.token;
         state.user.data = userData.user;
         sessionStorage.setItem("TOKEN", userData.token);
      },
   },
   modules: {},
});
export default store;
