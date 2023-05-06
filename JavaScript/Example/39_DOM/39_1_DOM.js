/*
1. DOM ( Document Object Model )이란? - 교제 P.679 그림 참조
	- 웹 문서를 제어하기 위해서 웹 문서를 객체화한 것
	- DOM API를 통해서 HTML의 구조나 내용 또는 스타일등을 동적으로 조작 가능



2. 요소 선택
	2-1. 고유한 ID로 요소를 요소를 선택
		document.getElementById('')

	2-2. 태그명으로 요소를 선택
		document.getElementsByTagName('')

	2-3. 클래스로 요소를 선택
		document.getElementsByClassName('')

	2-4. CSS 선택자를 사용해 요소를 찾는 메서드
		document.querySelector('')
		document.querySelectorAll('')


3. 요소 조작
	- textContent('')
		태그를 모두 제거하고 순수한 텍스트 데이터만 제공
	- innerHTML('')
		태그를 그대로 제공
	- setAttribute('', '')
		요소에서 주어진 이름의 속성값을 입력
	- getAttribute('')
		요소에서 주어진 속성의 값 획득
	- removeAttribute('')
		요소에서 주어진 이름의 속성을 제거


4. 요소 스타일링
	- style
		style 프로퍼티를 사용하여 직접 수정
	- classList
		classList 객체를 사용하여 class를 수정
			classList.add('', '')
			classList.remove('', '')

5. 참조
	DOM 속성
	https://developer.mozilla.org/ko/docs/Web/API/Element

	Document
	https://developer.mozilla.org/ko/docs/Web/API/Document

*/