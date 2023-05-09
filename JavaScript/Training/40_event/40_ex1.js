// 1. 버튼을 클릭시 아래 내용의 알러트가 나옵니다.
	//"안녕하세요."
	//"숨어있는 div를 찾아보세요."

//2. 특정 영역에 마우스 포인터가 진입하면 아래 내용의 알러트가 나옵니다. 들킨 상태에서는 알러트가 안나옵니다.
	//"두근두근"

//3. 2번의 영역을 클릭하면 아래의 알러트를 출력하고, 배경색이 베이지 색으로 바뀌어 나타납니다.
	//"들켰다!"

//4. 3번의 상태에서 다시 한번더 클릭하면 아래의 알러트를 출력하고, 배경색이 흰색으로 바뀌어 안보이게 됩니다.
	//"다시 숨는다."

const btn = document.querySelector('#btn');
btn.onclick = function(){
	alert('안녕하세요\n숨어있는 div를 찾아보세요');
}

const wrap = document.querySelector('#wrap');

function popUp(){
	alert('두근두근');
}

wrap.addEventListener('mouseenter',popUp);

const box = document.querySelector('#box');

box.addEventListener('click',toggle);

function toggle(){
	if( box.className === "off"){
		box.classList.replace("off","on");
		alert("들켰다!");
		wrap.removeEventListener('mouseenter',popUp)
	}
	else if( box.className === "on"){
		box.classList.replace("on","off");
		alert("다시숨는다");
		wrap.addEventListener("mouseenter",popUp);
	}
}