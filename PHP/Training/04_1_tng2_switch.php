<?php
//Switch로 만들어주세요.
//성적 
//	범위 : 
//		이상 ~ 미만
//		100   : A+
//		90 : A
//		80 : B
//		70 : C
//		60 : D
//		그외: F

//출력 문구 : "당신의 점수는 XXX점 입니다. <등급>"

// 100, 90, 80, 70, 60 입력 받았을 때, "당신의 점수는 XXX점 입니다. <등급>" 라고 출력 하고,
// 그 외의 값일 경우 "잘못된 값을 입력 했습니다." 라고 출력해 주세요.

$val = 0;
$grade = ""; // 성적용 변수 선언 및 초기화

// 입력값 체크 오류
if ( $val < 0 || $val > 100 )
{
	echo "잘못된 값을 입력 했습니다.";
}
// 입력값 체크 정상
else
{
	switch ( $val ) {
		case 100:
			$grade = "A+";
			break;
		case 90:
			$grade = "A";
			break;
		case 80:
			$grade = "B";
			break;
		case 70:
			$grade = "C";
			break;
		case 60:
			$grade = "D";
			break;
		default:
			$grade = "F";
			break;
	}
	// 출력
	echo "당신의 점수는 ".$val."점 입니다. <".$grade.">";
}
?>