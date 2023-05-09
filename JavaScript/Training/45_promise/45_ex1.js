//setTimeout(function() {
//	console.log('A');
//}, 3000);

//setTimeout(function() {
//	console.log('B');
//}, 2000);

//setTimeout(function() {
//	console.log('C');
//}, 1000);

// 1. 콜백함수를 이용해서 A, B, C 순서로 콘솔에 출력해 주세요.
//setTimeout(function() {
//	console.log('A');
//	setTimeout(function() {
//		console.log('B');
//		setTimeout(function() {
//			console.log('C');
//		}, 1000);
//	}, 2000);
//}, 3000);

// 2. promise를 이용해서  A, B, C 순서로 콘솔에 출력해 주세요.
//	( Promise를 함수로 등록해서 구현 )
//function printDelay(ms, str) {
//	return new Promise((resolve) => {
//		setTimeout(() => {
//			console.log(str);
//			resolve();
//		}, ms);
//	});
//}

//printDelay(3000, 'A')
//.then(() => printDelay(2000, 'B'))
//.then(() => printDelay(1000, 'C'));

