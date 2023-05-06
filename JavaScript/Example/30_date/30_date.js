

// DATE
const NOW = new Date('2023-04-30 15:20:30.123');

// getFullYear() : 연도만 가져오는 메소드
console.log( "연도 : " + NOW.getFullYear() );

// getMonth() : 월을 가져오는 메소드 ( +1을 해줘야 현재 월과 같아진다.)
console.log( "월 : " + ( NOW.getMonth() + 1 ) );

// getDate() : 날짜를 가져오는 메소드 
console.log( "일 : " + NOW.getDate() );

// getDay() : 요일을 가져오는 메소드 ( 일요일 = 0 ~ 토요일 = 6 )
console.log( "요일 : " + NOW.getDay() );

// getTime() : 1970/01/01 기준으로 얼마나 지났는지 밀리초를 가져온다.
console.log( "시간(Linux) : " + NOW.getTime() );

// getHours() : 시간을 가져오는 메소드
console.log( "시 : " + NOW.getHours() );

// getMinutes() : 분을 가져오는 메소드
console.log( "분 : " + NOW.getMinutes() );

// getSeconds() : 초를 가져오는 메소드
console.log( "초 : " + NOW.getSeconds() );

// getMilliseconds() : 밀리초를 가져오는 메소드
console.log( "밀리초 : " + NOW.getMilliseconds() );


// 기준일 : 2022년 9월 30일 19시 20분 10초
// 오늘 부터 몇일 전인지 출력해 주세요.
// 답 : 216일

const dday = new Date('2022-09-30 19:20:10');
const today = new Date();

console.log( dday.getTime() );
console.log( today.getTime() );
let day = Math.round((today.getTime() - dday.getTime() ) / 86400000);
console.log( day + "일" );