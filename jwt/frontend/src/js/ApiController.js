import axios from 'axios';
import tc from './TokenController.js';

const apiController = axios.create({
	baseURL: "http://localhost:8000"
});

apiController.interceptors.request.use(
	config => {
		config.headers["Content-Type"] = "application/json; charset=utf-8";
		if( tc.getToken() ) {
			config.headers["Authorization"] = tc.getToken();
		}
		return config;
	},
	error => {
		console.log(error);
		return Promise.reject(error);
	}
);

export default apiController;