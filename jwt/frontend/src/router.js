import { createWebHistory, createRouter } from 'vue-router';
import Main from './components/MainComponent.vue';
import Login from './components/LoginComponent.vue';
import Home from './components/HomeComponent.vue';
import TokenController from './js/TokenController';

const configFlg = {
	home: false,
	main: true,
	login: false
};

const beforeAuth = path => (to, from, next) => {
	const isToken = TokenController.getToken();
	const flg = configFlg[path];

	if( isToken ) {
		if( path == 'login' ) {
			next('/main');
		}

		return next();
	} else {
		if( flg ) {
			next('/login');
		}

		return next();
	}
};

const routes = [
	{
		path: "/",
		name: "home",
		component: Home,
		beforeEnter: beforeAuth('home')
	},
	{
		path: "/main",
		name: "main",
		component: Main,
		beforeEnter: beforeAuth('main')
	},
	{
		path: "/login",
		name: "login",
		component: Login,
		beforeEnter: beforeAuth('login')
	}
];

const router = createRouter({
	history: createWebHistory(),
	routes
});

export default router;