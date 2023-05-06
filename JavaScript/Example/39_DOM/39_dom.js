// 1. DOM ( Document Object Model )이란? - 교제 P.679 그림 참조
// 	- 웹 문서를 제어하기 위해서 웹 문서를 객체화한 것
// 	- DOM API를 통해서 HTML의 구조나 내용 또는 스타일등을 동적으로 조작 가능

// 2. 요소 선택
// 	2-1. 고유한 ID로 요소를 요소를 선택
// 		document.getElementById('')
const title = document.getElementById('title');
title.style.color = 'blue'; // id가 title인 요소의 글자색을 파랑색으로 변경


// 	2-2. 태그명으로 요소를 선택
// 		document.getElementsByTagName('')
const li = document.getElementsByTagName('li');

// 탕수육은 노란색, 짬뽕은 빨강색으로 변경
//li[1].style.color = 'yellow';
//li[2].style.color = 'red';

// 탕수육, 볶음밥, 깐풍기는 배경색상을 오렌지색
// 짜장면, 짬뽕, 라조기는 배경색상을 베이지색
for( let i = 0; i < li.length; i++ ) {
	if( i % 2 === 0 ) {
		li[i].style.backgroundColor = 'orange';
	} else {
		li[i].style.backgroundColor = 'beige';
	}
}

// 	2-3. 클래스로 요소를 선택
// 		document.getElementsByClassName('')
const noneli = document.getElementsByClassName('none-li');


// 	2-4. CSS 선택자를 사용해 요소를 찾는 메서드
// 		document.querySelector() : 복수의 요소가 있다면 가장 첫번째 것만 선택
const title2 = document.querySelector('#title');
const li2 = document.querySelector('.none-li');

// 		document.querySelectorAll() : 복수의 요소라면 전부 선택
const li3 = document.querySelectorAll('.none-li');


// 3. 요소 조작
// textContent : 순수한 텍스트 데이터를 전달, 이전의 태그들은 모두 제거
title.textContent = '<span>바꿧지롱~</span>';

// innerHTML : 태그는 태그로 인식해서 전달, 이전의 태그들은 모두 제거
title.innerHTML = '<span>inner로 바꿧지롱~</span>';

// setAttribute('', '') : 요소에 속성을 추가
const it = document.getElementById('it');
it.setAttribute('placeholder', '셋어트리뷰트로 삽입');

const aa = document.getElementById('aa');
aa.setAttribute('href', 'http://www.naver.com');

// removeAttribute('') : 요소의 속성을 제거
it.removeAttribute('placeholder');
//aa.removeAttribute('href');


// 4. 요소 스타일링
// style : 인라인으로 스타일 추가
//aa.style.textDecoration = 'none';
//aa.style.color = 'skyblue';

// classList : 클래스로 스타일 추가
aa.classList.add('aa1', 'aa2', 'aa3');


// 5. 새로운 요소 만들기
// 요소 만들기
const cli = document.createElement('li');
cli.innerHTML = '야끼우동';

// 요소를 자식요소의 가장 마지막에 삽입
const ul = document.getElementsByTagName('ul');
//ul[0].appendChild(cli);

// 요소를 특정 위치에 삽입하는 방법
const zzam = document.querySelector('li:nth-child(3)');
ul[0].insertBefore( cli, zzam );

// 해당 요소를 지우는 방법
//cli.remove();

// 라조기와 깐풍기 사이에 "잡채밥", "동파육"을 순서대로 넣고,
// 배경색깔 넣은것도 재대로 나오도록 수정
const kkan = document.querySelector('li:nth-child(7)');
const zab = document.createElement('li');
zab.innerHTML = '잡채밥';
const dong = document.createElement('li');
dong.innerHTML = '동파육';
ul[0].insertBefore( zab, kkan );
ul[0].insertBefore( dong, kkan );

for( let i = 0; i < li.length; i++ ) {
	if( i % 2 === 0 ) {
		li[i].style.backgroundColor = 'orange';
	} else {
		li[i].style.backgroundColor = 'beige';
	}
}


// 6. 참조
// 	DOM 속성
// 	https://developer.mozilla.org/ko/docs/Web/API/Element

// 	Document
// 	https://developer.mozilla.org/ko/docs/Web/API/Document