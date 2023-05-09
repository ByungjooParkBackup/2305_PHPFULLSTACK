setDate(); // 현재시각을 화면에 바로 표시하기 위해 호출, 안하면 화면 나오고 1초 후에 시간 표시

let objInterval = setInterval(setDate, 1000); // 인터벌 셋팅

// 현재시각을 화면에 표시
function setDate() {
	const now = new Date();
	document.getElementById('clock').innerHTML = now.toLocaleTimeString();
}

// 인터벌 제거(시간 멈추기)
function stopClock() {
	objInterval = clearInterval(objInterval);
}

// 인터벌 재설정(시간 재시작)
function reStartClock() {
	if(!objInterval){
		setDate(); // 현재시각을 화면에 바로 표시하기 위해 호출, 안하면 최대 1초 후에 시간 표시
		objInterval = setInterval(setDate, 1000);
	}
}


//const showTime = document.querySelector('.time_now');
//function clockTime() {
//	const nowTime = new Date();
//	//const hours = nowTime.getHours();
//	//const min = nowTime.getMinutes();
//	//const sec = nowTime.getSeconds();

//	//showTime.innerHTML = (hours<10? '0'+hours : hours) + ":" + (min<10? '0'+min : min) + ":" + (sec<10? '0'+sec : sec);
	
//	const hours = nowTime.getHours().toString();
//	const min = nowTime.getMinutes().toString();
//	const sec = nowTime.getSeconds().toString();
//	showTime.innerHTML = hours.padStart(2, '0') + ":" + min.padStart(2, '0') + ":" + sec.padStart(2, '0');
//}

//const setTime = setInterval(clockTime, 1000);

//const stopBtn = document.querySelector('.stop_btn');
//stopBtn.addEventListener('click', function() {
//	clearInterval(setTime);
//})