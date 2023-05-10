// 1. async & await 란?
// 	비동기처리를 좀 더 가독성 좋고 편하게 쓰기위해 promise를사용했는데,
// 	promise 또한 체이닝이 계속 될 경우 코드가 난잡해 질 수 있어 async & await가 도입되었습니다.
// 	async & await는 promise를 기반으로 동작합니다.


// 2. async
// 동기 처리
// function delay() {
// 	const delayTime = Date.now() + 2000;
// 	while(Date.now() < delayTime) {

// 	}
// 	console.log('B');
// }

// console.log('A');
// delay();
// console.log('C');

// promise로 비동기 처리
// function delay() {
// 	return new Promise((resolve) => {
// 		const delayTime = Date.now() + 2000;
// 		while(Date.now() < delayTime) {
// 		}
// 		resolve('B');
// 	});
// }

// console.log('A');
// delay()
// .then(console.log);
// console.log('C');

// async로 비동기 처리
// async function delay() {
// 	const delayTime = Date.now() + 2000;
// 	while(Date.now() < delayTime) {
// 	}
// 	return 'B';
// }

// console.log('A');
// delay()
// .then(console.log);
// console.log('C');


//3. await : async가 붙은 함수안에서만 사용 가능
//function delay(ms) {
//	return new Promise(resolve => setTimeout(resolve, ms));
//}

//async function getA() {
//	await delay(1000);
//	return 'A';
//}
//async function getB() {
//	await delay(2000);
//	return 'B';
//}

// promise도 체이닝이 많아지면 콜백지옥이랑 비슷해집니다.
// function getAll() {
// 	return getA()
// 		.then(strA => {
// 			return getB()
// 				.then(strB => `${strA} : ${strB}`);
// 		});
// }
// getAll().then(console.log);

// async를 이용할 경우 아래와 같이 코드 작성 가능
// async function getAll() {
// 	const strA = await getA();
// 	const strB = await getB();
// 	return `${strA} : ${strB}`;
// }
// getAll().then(console.log);


// 병렬처리를 하려는 경우
// 병렬처리 방법 1 : 이렇게도 가능하지만 이렇게 안씁니다.
// async function getAll() {
// 	const promiseA = getA();
// 	const promiseB = getB();
// 	const strA = await promiseA;
// 	const strB = await promiseB;
// 	return `${strA} : ${strB}`;
// }
// getAll().then(console.log);


// 병렬처리 방법 2 : Promise.all() 메소드 이용
// async function getAll() {
// 	return Promise.all([getA(), getB()])
// 	.then(all => all.join(' : '));
// }
// getAll().then(console.log);


// 복수의 Promise객체 중 먼저 완료 된 객체만 이용 : Promise.race() 메소드
// async function getAll() {
// 	return Promise.race([getA(), getB()]);
// }
// getAll().then(console.log);
