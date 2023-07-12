import { createStore } from 'vuex'
import axios from 'axios'

const store = createStore({
	state() {
		return {
			boardData: [], // 게시글 데이터
			lastId: '', // 가장 마지막에 로드된 게시물의 ID
			addBtnFlg: true, // 더보기 버튼 표시용 flg
			tabFlg: 0, // 탭UI flg (0:메인, 1:필터, 2:작성)
			imgUrl: '', // 이미지 url
			filter: '', // 필터명
			postImg : null,	// 업로드 이미지 파일 객체
		}
	},
	mutations: {
		// 초기 데이터 셋팅용
		createBoardData(state, data) {
			state.boardData = data;
			this.commit('changeLastId', data[data.length - 1].id);
		},
		// 더보기 데이터 셋팅용
		addBoardData(state, data) {
			state.boardData.push(data);
			this.commit('changeLastId', data.id);
		},
		// 작성글 데이터 셋팅용
		addWriteData(state, data) {
			state.boardData.unshift(data);
		},
		// lastId 변경
		changeLastId(state, id) {
			state.lastId = id;
		},
		// 탭UI flg 변경
		changeTabFlg(state, num) {
			state.tabFlg = num;
		},
		// 이미지 URL 변경
		changeImgUrl(state, imgUrl) {
			state.imgUrl = imgUrl;
		},
		// 필터명 변경
		changeFilter(state, filter) {
			state.filter = filter;
		},
		// 업로드 이미지 변경
		changePostImg(state, postImg){
			state.postImg = postImg;
		},
		// 초기화
		claerState(state) {
			state.filter = '';
			state.imgUrl = '';
			state.postImg = null;
		},
	},
	actions: {
		// 메인 게시글 습득
		getMainList(context) {
			axios.get('http://192.168.0.66/api/boards')
			.then(res => {
				context.commit('createBoardData', res.data);
			})
			.catch( err => {
				console.log(err);
			})
		},
		// 게시글 추가 습득
		getMoreList(context) {
			axios.get('http://192.168.0.66/api/boards/' + context.state.lastId)
			.then(res => {
				if(res.data){
					context.commit('addBoardData', res.data);
				} else {
					context.state.addBtnFlg = false;
					alert('없어용');
				}
			})
			.catch( err => {
				console.log(err);
			})
		},
		// 게시글 작성
		writeContent(context) {
			let content = document.getElementById('content');
			const data = {
				name: '박병주',
				filter: context.state.filter,
				img: context.state.postImg,
				content: content.value,
			};
			
			const header = {
				headers: {
					'Content-Type' : 'multipart/form-data',
				}
			};

			axios.post('http://192.168.0.66/api/boards', data, header)
			.then(res => {
				context.commit('addWriteData', res.data);
				context.commit('changeTabFlg', 0);
				context.commit('claerState');
			})
			.catch( err => {
				console.log(err);
			})
		},
	}
})

export default store