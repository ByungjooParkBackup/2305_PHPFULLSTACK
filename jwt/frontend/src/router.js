import { createWebHistory, createRouter } from 'vue-router';
import Main from './components/MainComponent.vue';
import Login from './components/LoginComponent.vue';

const routes = [
	{
		path: "/main",
		name: "main",
		component: Main
	},
	{
		path: "/login",
		name: "login",
		component: Login
	}
];

const router = createRouter({
	history: createWebHistory(),
	routes
});

export default router;