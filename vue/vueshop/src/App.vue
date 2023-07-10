<template>
  <img alt="Vue logo" src="./assets/logo.png">
  
  <!-- 네비 -->
  <Navi :navList="navList" />
  <!--<div class="nav">
    <a>홈</a>
    <a>상품</a>
    <a>기타</a>
  </div>-->

  <!-- 모달 -->
  <Modal
    @closeModal="modalFlg = false;"
    @plus="plus(productNum);"
    @minus="minus(productNum);"
    :products="products"
    :productNum="productNum"
    :modalFlg="modalFlg"
  />
  <!--<div class="bg_black" v-if="modalFlg">
    <div class="bg_white">
      <img :src="products[productNum].img">
      <h4>{{ products[productNum].name }}</h4>
      <p>{{ products[productNum].content }}</p>
      <p>{{ productPrice }}</p>
      <button @click="plus(productNum);">수량증가</button>
      <button @click="minus(productNum);">수량감소</button>
      <span>{{ products[productNum].count }}</span>
      <br>
      <button @click="modalFlg = false">닫기</button>
    </div>
  </div>-->

  <!-- 상품리스트 -->
  <ProductList
    @openModal="modalFlg = true; productNum = i"
    :product="product" v-for="(product, i) in products" :key="i"
  />
  <!--<div v-for="(item, i) in products" :key="i">
    <img :src="item.img" alt="">
    <h4 @click="openModal(i);">{{ item.name }}</h4>
    <p>{{ item.price }} 원</p>
    <p>{{ item.count }} 개</p>
  </div>-->

  <!-- if -->
  <p v-if="1 == 1">if문 테스트</p>

  <!--<div>
    <h4>{{ product1 }}</h4>
    <p>{{ price1 }}원</p>
  </div>
  <div>
    <h4 :style="styleR">{{ product2 }}</h4>
    <p>{{ price2 }}원</p>
  </div>-->
</template>

<script>
import data from './assets/js/data.js';

import Navi from './components/Navi.vue';
import ProductList from './components/ProductList.vue';
import Modal from './components/Modal.vue';

export default {
  name: 'App',
  data() { // 데이터 바인딩
    return {
      navList: ['홈', '상품', '기타'],
      products: data,
      modalFlg: false,
      productNum: 0,
      productPrice: 0,
      product1: '양말',
      price1: '3800',
      product2: '바지',
      price2: '5000',
      styleR: 'color:red',
    }
  },
  methods: { // 함수를 설정한는 영역
    plus(i) {
      this.products[i].count++;
      this.productPrice = this.products[i].count * this.products[i].price;
    },
    minus(i) {
      this.products[i].count--;
      this.productPrice = this.products[i].count * this.products[i].price;
    },
    openModal(i) {
      this.modalFlg = true;
      this.productNum = i;
      this.productPrice = this.products[i].price;
      this.products[i].count = 1;
    },
  },
  components: { // 컴포넌트 정의
    Navi,
    ProductList,
    Modal,
  }
}
</script>

<style>
@import url('./assets/css/app.css');

#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
/*.nav {
  background-color: #2c3e50;
  padding: 15px;
  border-radius: 10px;
}
.nav a {
  color: white;
  padding: 10px;
}*/
</style>
