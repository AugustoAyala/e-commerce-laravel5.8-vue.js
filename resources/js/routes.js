import Vue from 'vue'
import Router from 'vue-router'

Vue.use(Router)

export default new Router({
	routes: [
		{
			path: '/welcome',
			name: 'home',
			component: require('./views/Home').default
		},
		{
			path: '/carrito',
			name: 'carrito',
			component: require('./views/Carrito').default
		},
		{
			path: '*',
			component: require('./views/404').default
		}
	],
	mode: 'history',
	
})