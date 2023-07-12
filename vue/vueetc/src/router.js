import { createWebHistory, createRouter } from "vue-router";
import ContainerComponent from "./components/ContainerComponent.vue";
import PostComponent from "./components/PostComponent.vue";

const routes = [
	{
		path: '/',
		component: ContainerComponent,
	},
	{
		path: '/post',
		component: PostComponent,
	}
];

const router = createRouter({
	history: createWebHistory(),
	routes,
});

export default router;