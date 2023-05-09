// 인라인 이벤트 등록
// html파일의 11행, 13행 참조
//onclick

const tt = true;

// 프로퍼티 리스너
const btn1 = document.querySelector('#btn1');
btn1.onclick = function() {
	location.href = "http://www.google.com"; // 현재창에서 이동
}


// addEventListener(eventType, function) 방식wwww
const btn2 = document.querySelector('#btn2');
let newWindow = null;
btn2.addEventListener('click', () => {
	newWindow = open('40_window.html', 'test', 'width=500, height=400'); // 새창으로 이동
});

const btn2Close = document.querySelector('#btn2Close');
const eventClose = () => { newWindow.close(); }
btn2Close.addEventListener('click', eventClose);


// 이벤트 삭제
// removeEventListener(eventType, function) 
// addEventListener()로 등록한 이벤트의 인수와 같은 인수를 셋팅해야 삭제됩니다.
// btn2Close.removeEventListener('click', eventClose);


// 이벤트 타입
// 1. 마우스 이벤트
// - mousedown - 마우스가 요소안에서 클릭이 눌릴 때
// - mouseup - 마우스가 요소안에서 클릭이 해제될 때
// - mouseenter - 마우스 포인터가 요소 안으로 진입 했을 때
// - mouseleave - 마우스 포인터가 요소 밖깥으로 나갔을 때
// - mousemove - 마우스 포인터가 요소 안에서 움직일 때
// - event.clientX, event.clientY - 브라우저 화면 기준 X, Y 좌표
// - event.pageX, event.pageY - 전체화면 기준(스크롤 포함) X, Y좌표
// - event.target.getBoundingClientRect() - 요소의 크기와 뷰포트로 부터 상대적인 위치를 반환

// 2. 키보드 이벤트
// - keydown
// - keypress
// - keyup
// - event.key : 사용자가 누른 키 값을 반환합니다.
// - event.keyCode : 사용자가 누른 키 코드(ASCII) 값을 반환합니다.

// 3. 포커스 이벤트
// - focus
// - blur
// - change

// 4. 폼 이벤트
// 	- submit : 양식(Form)이 제출하기전에 발생 하는 이벤트 입니다. 주로 전송될 값을 유효성 체크할 때 사용합니다.

// 5. 진행(progress) 이벤트
//	- load
//	- error
