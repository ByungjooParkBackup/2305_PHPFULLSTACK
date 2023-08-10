<template>
	<div>
		<h1>LoginComponent</h1>
		<input type="text" name="id" v-model="id">
		<button @click="btn();">Login</button>
	</div>
</template>
<script>
export default {
	name: "LoginComponent",
	data() {
		return {
			id: "",
		}
	},
	methods: {
		btn() {
			this.$store.dispatch("login", this.id);
		}
	}
}
</script>
<style>
	
</style>