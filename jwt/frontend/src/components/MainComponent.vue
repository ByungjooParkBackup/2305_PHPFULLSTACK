<template>
	<div>
		<h1>MainComponent</h1>
		<button @click="login()" v-if="!$store.state.isToken">로그인</button>
		<button @click="logout()" v-if="$store.state.isToken">로그아웃</button>
	</div>
</template>
<script>
export default {
	name: "MainComponent",
}
</script>
<style>
	
</style>