<template>
	<div class="bg_black" v-if="modalFlg">
		<div class="bg_white">
			<img src="">
			<h4>{{ products[productNum].name }}</h4>
			<p>{{ products[productNum].content }}</p>
			<p>{{ inputCnt * products[productNum].price }}</p>
			<input type="text" v-model="inputCnt">
			<!--<button @click="$emit('plus')">수량증가</button>
			<button @click="$emit('minus')">수량감소</button>
			<span>{{ products[productNum].count }}</span>-->
			<br>
			<button @click="$emit('closeModal'); inputCnt = 0;">닫기</button>
		</div>
	</div>
</template>
<script>
export default {
	name: 'Modal',
	data() {
		return {
			inputCnt: 0,
		}
	},
	watch: {
		inputCnt(input) {
			if(input > 10) {
				alert('10개까지만 구매가능 합니다.');
				this.inputCnt = 10;
			}
		},
	},
	props: {
		modalFlg: Boolean,
		products: Array,
		productNum: Number,
	}
}
</script>
<style>
	
</style>