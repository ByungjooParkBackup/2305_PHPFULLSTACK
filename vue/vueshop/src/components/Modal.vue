<template>
	<div class="bg_black" v-if="modalFlg">
		<div class="bg_white">
			<img src="">
			<h4>{{ products[productNum].name }}</h4>
			<p>{{ products[productNum].content }}</p>
			<p>{{ products[productNum].count * products[productNum].price }}</p>
			<button @click="$emit('plus')">수량증가</button>
			<button @click="$emit('minus')">수량감소</button>
			<span>{{ products[productNum].count }}</span>
			<br>
			<button @click="$emit('closeModal');">닫기</button>
		</div>
	</div>
</template>
<script>
export default {
	name: 'Modal',
	props: {
		modalFlg: Boolean,
		products: Array,
		productNum: Number,
	}
}
</script>
<style>
	
</style>