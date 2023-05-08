// 타이머 함수

// 1. setTimeout() / clearTimeout()
//const timeOut = setTimeout(() => console.log('A'), 2000); // 타이머 셋팅
//clearTimeout(timeOut); // 타이머 제거

//2. setInterval() / clearInterval()
//const myInterval = setInterval(() => console.log('A'), 1000); // 인터벌 셋팅
//clearInterval(myInterval); // 인터벌 제거

// 1~5를 1초마다 콘솔에 출력해 주세요.
// 1
// 2
// 3
// 4
// 5
//setTimeout(() => console.log(1), 1000);
//setTimeout(() => console.log(2), 2000);
//setTimeout(() => console.log(3), 3000);
//setTimeout(() => console.log(4), 4000);
//setTimeout(() => console.log(5), 5000);
let i = 1;
const interval1 = setInterval(() =>{
	console.log(i);
	if(i++ === 5) {
		clearInterval(interval1); // i가 5일 때 인터벌 제거
	}
}, 1000);
