<?php
//IF로 만들어주세요.
//성적 
//	범위 : 
//		이상 ~ 미만
//		100   : A+
//		90~100 : A
//		80~90 : B
//		70~80 : C
//		60~70 : D
//		60미만: F

//출력 문구 : "당신의 점수는 XXX점 입니다. <등급>"

// 0~100 입력 받았을 때, "당신의 점수는 XXX점 입니다. <등급>" 라고 출력 하고,
// 그 외의 값일 경우 "잘못된 값을 입력 했습니다." 라고 출력해 주세요.

$num = 80;
$str_f = "당신의 점수는";
$str_blank = " ";
$str_b = "점 입니다.";
$grade = "";

if ( $num < 0 || $num > 100 )
{
	echo "잘못된 값을 입력 했습니다.";
}
else
{
	if( $num == 100 )
	{
		$grade = "A+";
	}
	else if( $num >= 90 )
	{
		$grade = "A";
	}
	else if( $num >= 80 )
	{
		$grade = "B";
	}
	else if( $num >= 70  )
	{
		$grade = "C";
	}
	else if( $num >= 60 )
	{
		$grade = "D";
	}
	else
	{
		$grade = "F";
	}
	echo $str_f.$str_blank.$num.$str_b."<".$grade.">";
}



?>