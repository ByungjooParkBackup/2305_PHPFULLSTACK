<?php

// 첫 파라미터 빼기 두번 째 파라미터 함수를 구현해 주세요.
function fnc_minus( $int_a, $int_b )
{
	//$result = $int_a - $int_b;
	//return $result;

	return $int_a - $int_b;
}

// 두 매개변수를 나눈 함수를 구현해 주세요.
function fnc_div( $int_a, $int_b )
{
	$result = $int_a / $int_b;
	return $result;
}

// 두 매개 변수를 곱하는 함수를 구현해 주세요.
function fnc_multi( $int_a, $int_b )
{
	$result = $int_a * $int_b;
	return $result;
}

// 각각의 결과를 출력해 주세요.
//echo fnc_minus(10, 6), "\n";
//echo fnc_div(10, 6), "\n";
//echo fnc_multi(10, 6), "\n";


// 빼기, 곱하기, 나누기를 가변 파라미터 함수로 구현해 주세요.
// 빼기 예)  fnc(10, 2, 5) 결과가 "3"
// 나누기 예)  fnc(10, 2, 5) 결과가 "1"
function fnc_args_minus()
{
	$result_args = func_get_args();
	$result_minus = null;

	foreach( $result_args as $key => $val )
	{
		if( is_null($result_minus) )
		{
			$result_minus = $val;
		}
		else
		{
			$result_minus -= $val;
		}
	}
	return $result_minus;
}
echo fnc_args_minus(10, 10, 5);