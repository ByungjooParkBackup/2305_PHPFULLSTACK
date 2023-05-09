// 타이머 함수

// 1. setTimeout() / clearTimeout() : 두번째 인수(단위 : ms)만큼 시간이 흐른 후, 첫번째 인수(콜백 함수)를 호출
// const id = setTimeout(() => {
// 	console.log("A");
// }, 2000);

// clearTimeout(id);


// 2. setInterval() / clearInterval() : 두번째 인수(단위 : ms)의 시간마다 반복하여, 첫번째 인수(콜백 함수)를 호출
// let cnt = 0;
// const id = setInterval(() => {
// 	console.log(`${cnt} 출력`);
// 	if( cnt++ === 5 ) {
// 		clearInterval(id);
// 	}
// }, 1000);