<template>
	<div>
		<h1>MainComponent</h1>
		<button @click="$store.dispatch('logout')" >로그아웃</button>
	</div>
</template>
<script>
export default {
	name: "MainComponent"
}
</script>
<style>
	
</style>