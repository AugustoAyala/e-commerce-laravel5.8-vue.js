
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
import Vue from 'vue'
import BootstrapVue from 'bootstrap-vue'

Vue.use(BootstrapVue)
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'
window.Vue = require('vue');

Vue.component('app', 				require('./components/AppComponent.vue').default);


import router from './routes'
const Vuex = require('vuex');

const store = new Vuex.Store({
  state: {
    contador: 0
  },
  mutations:{
    //recuperar la cantidad de articulos en el carrito
    contar(state){
      var urlcarrito = 'carrito/mostrar';
			axios.get(urlcarrito).then(response => {    
       state.contador = response.data.contador      
      });
      return state.contador;
    },
    
  }
})
const app = new Vue({
    el: '#app',
    router,
    store: store,
    
});
