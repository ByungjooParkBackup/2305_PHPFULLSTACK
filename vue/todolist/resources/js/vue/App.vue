<template>
	<div class="container">
		<div class="header">
			<h2 class="title">Todo List</h2>
			<div class="store">
				<input type="text" placeholder="할 일을 적어주세요." v-model="content">
				<button @click="storeItem()" class="btn-store">등록</button>
			</div>
		</div>

		<ListComponent
			:item="item"
			v-for="item in items" :key="item"
			@changeItem="getItems()"
		></ListComponent>
	</div>
</template>
<script>
import ListComponent from './ListComponent.vue';

export default {
	name: 'App',
	data() {
		return {
			items: null,
			content: '',
		}
	},
	methods: {
		// 전 List 획득
		getItems() {
			axios.get('/api/items')
			.then( res => {
				if(res.status == 200) {
					this.items = res.data;
				}			
			})
			.catch( err => {
				console.log(err);
			});
		},
		// List 작성
		storeItem() {
			let data = {
				"item": {
					"content": this.content,
				}
			}
			let headers = {
				"Content-Type": "application/json",
			}
			axios.post('/api/items', data, headers)
			.then( res => {
				if(res.status == 201) {
					this.items.unshift(res.data);
					this.content = '';
				}
			})
			.catch( err => {
				console.log(err);
			});
		}
	},
	components: {
		ListComponent,
	},
	created() {
		this.getItems();
	}
}
</script>
<style scoped>
input {
	outline: none;
	margin: 5px;
	width: 70%;
}
.container {
	width: 100%;
	max-width: 350px;
	margin: auto;
}
.header {
	background: black;
	padding: 5px;
	color: white;
}
.title {
	text-align: center;
}
.store {
	text-align: center;
}
.btn-store {
	border-radius: 20px;
}
</style>