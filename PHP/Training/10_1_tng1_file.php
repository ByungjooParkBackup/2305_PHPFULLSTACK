<?php

// 파일명 : gugudan.txt
// 파일 위치 : sam
// 내용은 아래와 같습니다.
// 2단
// 2 * 1 = 2
// 2 * 2 = 4
// ...
// 2 * 9 = 18

$f_gugudan = fopen("../Example/sam/gugudan.txt", "w");

$print_gugudan = "";
for( $dan = 2; $dan <= 9; $dan++ )
{ 
	$print_gugudan .= $dan."단\n";
	for( $num = 1; $num <= 9; $num++ )
	{
		$result = $dan." * ".$num." = ".$dan*$num."\n";
		$print_gugudan .= $result;
	}
}
fputs($f_gugudan, $print_gugudan );

fclose($f_gugudan);

// 구구단을 함수로 구현
//function fnc_gugumake($dan)
//{
//	$gugu_ans = $dan."단\n";

//	for ($i=0; $i < 10; $i++) 
//	{ 
//		$gugu_ans .= "$dan * $i = ".$dan*$i."\n";
//	}
//	return $gugu_ans;
//}
//fputs($f_gugudan, fnc_gugumake(2));
//fclose($f_gugudan);


/*
김밥
샌드위치
백반
국밥
크림우동
연어초밥
탕수육
돈까스

"국밥"과 "크림우동" 사이에 "스테이크"를 추가해주세요.

백반
국밥
스테이크
크림우동
연어초밥
*/

//$f_food2 = file("../Example/sam/food2.txt"); // 파일을 배열로 만들어주는 함수
//$print_food = "";
//foreach ($f_food2 as $val)
//{
//	if( trim($val) === "국밥" ) // 빈공간을 제거해주기 위해 trim
//	{
//		$print_food .= $val."스테이크\n";
//	}
//	else {
//		$print_food .= $val;
//	}
//}
//print $print_food;

//$f_food2 = fopen("../Example/sam/food2.txt", "w");
//fputs( $f_food2, $print_food );
//fclose( $f_food2);