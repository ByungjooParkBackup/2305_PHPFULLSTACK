// JavaScript는 동기적인(synchronous) 프로그래밍 언어입니다.
// 즉, 호이스팅이 된 이후부터 개발자가 작성한 코드의 순서대로 실행

// 비동기적(asynchronous)이라는 것은 특정 코드의 연산이 끝날 때 까지 코드의 실행을 멈추지 않고,
// 다음 코드를 먼저 실행 하는것
// 언제 코드가 실행될지 예측할 수 없습니다.
// 타이머 함수, HTTP 요청, 이벤트 핸들러가 비동기 처리 방식으로 동작

//console.log('A');
//console.log('B');
//console.log('C');
//console.log('D');


// 비동기 처리 방식
//console.log('A');
//setTimeout(() => {
//	console.log('B');
//}, 1000);
//console.log('C');

//const a = 2;
//const b = 3;
//const sum = function() {
//	setTimeout(() => {
//		return a + b;
//	}, 1000);
//}
//console.log(sum());


// 비동기 처리에서의 콜백 지옥
//setTimeout(() => {
//	console.log('A');
//	setTimeout(() => {
//		console.log('B');
//		setTimeout(() => {
//			console.log('C');
//		}, 1000);
//	}, 2000);
//}, 3000);


// 로그인 콜백 지옥 체험
const Login = {
	chkInput(id, pw, success, error) {
		setTimeout(() => {
			if(id !== '' && pw !== '') {
				success({chkId: id, chkPw: pw});
			} else {
				error(new Error('잘못 입력 하셨습니다.'));
			}
		}, 500);
	}
	, loginUser(id, pw, success, error) {
		setTimeout(() => {
			if(id === 'php506' && pw === '506') {
				success(id);
			} else {
				error(new Error('없는 유저입니다.'));
			}
		}, 500);
	}
	, chkAuth(id, success, error) {
		setTimeout(() => {
			if(id === 'php506') {
				success({authId: id, auth: 'admin'});
			} else {
				error(new Error('권한이 없습니다.'));
			}
		}, 500);
	}
}

const id = 'php506';
const pw = '506';

Login.chkInput(
	id
	, pw
	, chkData => {
		Login.loginUser(
			chkData.chkId
			, chkData.chkPw
			, loginId => {
				Login.chkAuth(
					loginId
					, authData => { console.log(`${authData.authId}유저님, 권한은 ${authData.auth}입니다.`); }
					, authError => { console.log(authError.message); }
				)
			}
			, loginError => { console.log(loginError.message); }
		)
	}
	, chkError => { console.log(chkError.message); }
);


// 콜백 함수
//function myCallBack(i) {
//	return i + 1;
//}

//function printNum(fn) {
//	console.log(fn(4));
//}

//printNum(myCallBack);