/*
1. promise 객체
	- 비동기 프로그래밍의 근간이 되는 기법 중 하나
	- 프로미스를 사용하면 콜백 함수를 대체하고, 비동기 작업의 흐름을 쉽게 제어가능
	- Promise 객체는 비동기 작업의 최종 완료 또는 실패를 나타내는 독자적인 객체

*/

// 2. promise 사용법
	// promise객체 만드실 때 보내는 콜백함수 
	// 	- resolve : 호출하면 then이 실행
	// 	- reject : 호출하면 catch가 실행
//const promise1 = new Promise((resolve, reject) => {
// 	// 비동기 작업 수행
//	const data = false;
	
//	if(data) {
//		resolve('성공'); // 요청 성공 시 resolve()를 호출
//	} else {
//		reject('error'); // 요청 실패 시 reject()를 호출
//	}
//});

//promise1
//.then(data => {console.log(data);}) // 성공적으로 수행했을 때 실행되는 코드
//.catch(error => {console.log(error);}) // 실패했을 때 실행되는 코드
//.finally(() => {console.log('파이널리');}) // 성공하든 실패하든 무조건 실행되는 코드


// 3. promise 함수 등록
	// 재사용성, 가독성, 확장성을 이유로 현업에서는 아래와 같이 함수를 등록하고 사용
//function myPromise() {
//	return new Promise((resolve, reject) => {
// 	// 비동기 작업 수행
//		const data = true;

//		if(data) {
//			resolve('성공'); // 요청 성공 시 resolve()를 호출
//		} else {
//			reject('error'); // 요청 실패 시 reject()를 호출
//		}
//	});
//}
//myPromise()
//.then(data => {console.log(data);}) // 성공적으로 수행했을 때 실행되는 코드
//.catch(error => {console.log(error);}) // 실패했을 때 실행되는 코드
//.finally(() => {console.log('파이널리');}) // 성공하든 실패하든 무조건 실행되는 코드




// 로그인 promise로 구현
const Login = {
	chkInput(id, pw) {
		return new Promise((resolve, reject) => {
			setTimeout(() => {
				if(id !== '' && pw !== '') {
					resolve({chkId: id, chkPw: pw});
				} else {
					reject(new Error('잘못 입력 하셨습니다.'));
				}
			}, 500);
		});
	}
	, loginUser(id, pw) {
		return new Promise((resolve, reject) => {
			setTimeout(() => {
				if(id === 'php506' && pw === '506') {
					resolve(id);
				} else {
					reject(new Error('없는 유저입니다.'));
				}
			}, 500);
		});
	}
	, chkAuth(id) {
		return new Promise((resolve, reject) => {
			setTimeout(() => {
				if(id === 'php506') {
					resolve({authId: id, auth: 'admin'});
				} else {
					reject(new Error('권한이 없습니다.'));
				}
			}, 500);
		});
	}
}

const id = 'php506';
const pw = '506';

Login.chkInput(id, pw)
.then(chkData => Login.loginUser(chkData.chkId, chkData.chkPw))
.then(loginId => Login.chkAuth(loginId))
.then(authData => console.log(`${authData.authId}유저님, ${authData.auth}권한 입니다.`))
.catch(error => console.log(error.message));

