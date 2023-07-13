<template>
	<div class="list-contaner">
		<input @click="completedItem()" type="checkbox" v-model="item.completed">
		<span :class="[item.completed ? 'completed' : '', '.item-content']" class="item-content">{{ item.content }}</span>
		<button @click="removeItem()" class="remove-item">삭제</button>
	</div>
</template>
<script>
export default {
	name: 'ListComponent',
	props: {
		item: Object,
	},
	methods: {
		// List 작성
		completedItem() {
			let data = {
				"item":	{
					"completed": !this.item.completed,
				}
			}
			let headers = {
				"Content-Type": "application/json",
			}
			axios.put('/api/items/' + this.item.id, data, headers)
			.then( res => {
				if(res.status == 200) {
					this.$emit('changeItem');
				}
			})
			.catch( err => {
				console.log(err);
			});
		},
		// List 삭제
		removeItem() {
			axios.delete('/api/items/' + this.item.id)
			.then( res => {
				if(res.status == 200) {
					this.$emit('changeItem');
				}
			})
			.catch( err => {
				console.log(err);
			});
		}
	}
}
</script>
<style scoped>
.list-contaner {
	background: black;
	color: white;
	padding: 5px;
	margin: 5px 0;
}
.completed {
	text-decoration: line-through;
	opacity: 0.5;
}
.item-content {
	padding: 5px;
}
.remove-item {
	float: right;
	background: red;
	color: white;
	border-radius: 20px;
}
</style>