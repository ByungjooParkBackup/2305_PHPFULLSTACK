import { createStore } from 'vuex';
import router from './router';
import TokenController from './js/TokenController';
import ApiController from './js/ApiController';

const store = createStore({
	state() {
		return {
			isToken: false,
		}
	},
	mutations: {
		setToken(state, token) {
			TokenController.setToken(token);
			state.isToken = true;
		},
		destroyToken(state) {
			TokenController.destroyToken();
			state.isToken = false;
		}
	},
	actions: {
		login(context, id) {
			ApiController.post('/api/token', {id: id})
			.then(res => {
				let token = res.data["token"];
				console.log(token);
				context.commit("setToken", token);
				router.push('main');
			})
			.catch(error => {
				console.log(error);
			});
		},
		logout(context) {
			context.commit("destroyToken");
			router.push("login");
		}
	}
});

export default store;