<?php

// function
function fnc_add($int_a, $int_b)
{
	$sum = $int_a + $int_b;

	return $sum;
}

// fnc_add 함수를 호출
$result_add = fnc_add(10, 9);
//echo $result_add;


// 변수 $a와 $b를 더한 후 출력
//$a = 32;
//$b = 2;

//$sum = $a + $b;

//echo $sum;


// 가변 파라미터 함수
function fnc_args_add()
{
	$args = func_get_args(); // 가변 파라미터 습득
	$sum = 0; // 더하기 결과 저장 변수

	// 루프 : 더하기 실행
	foreach ($args as $val) {
		$sum += $val;
	}

	return $sum;
}

//echo fnc_args_add(1, 2, 3, 4);


// 재귀함수
function rcc( $param_a )
{
	if( $param_a === 1 )
	{
		return 1;
	}
	return $param_a * rcc( $param_a - 1 );
}

echo rcc(4);