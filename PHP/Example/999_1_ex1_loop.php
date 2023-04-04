<?php
// 1. while + 조합된거
//$i = 0;
//while( $i <= 4 )
//{
//	if( $i === 1 )
//	{
//		echo "1입니다.";
//	}
//	else if( $i === 4 )
//	{
//		echo "4입니다.";
//	}
//	++$i;
//}

// foreach + if 조합
//$arr_ass = array( "a" => 1, "b" => 2, "c" => 3 );
//foreach( $arr_ass as $key => $val )
//{
//	if( $key === "c" || $val === 2 )
//	{
//		echo "if";
//	}
//}

// 이중 루프
//for( $i = 2; $i <= 9; $i++ )
//{
//	echo "$i 단\n";
//	for( $x = 1; $x <= 9; $x++ )
//	{
//		echo "$i x $x = ", $i * $x, "\n";
//	}
//	echo "\n";
//}

// 1 ~ 100 숫자 중에 짝수의 합을 구해주세요.
//$sum = 0;
//for( $i = 1; $i <= 100; $i++ )
//{
//	if( $i % 2 === 0 )
//	{
//		$sum += $i;
//	}
//}
//for( $i = 1; $i * 2 <= 100; $i++ )
//{
//	$sum += $i * 2;
//}
//for( $i = 2; $i <= 100; $i += 2 )
//{
//	$sum += $i;
//}
//echo $sum;

//$arr_test = 
//	array(
//		1
//		,2
//		,array(
//			"info_a" => 3
//			,"info_b" => 4
//			,"info_arr" => 
//				array(
//					"f_1" => 5
//					,"f_2" => 7
//				)
//		)
//	);
//echo $arr_test[2]["info_arr"]["f_1"];


// 함수명   : fnc_sum
// 기능     : 파라미터를 더한 값을 리턴
// 파라미터 : INT  $param_a
//           INT  $param_b
// 리턴값   : INT  $sum;
function fnc_sum( $param_a, $param_b )
{
	$sum = $param_a + $param_b;
	return $sum;
}

//echo $param_a;

// 가변 파라미터
function fnc_sum2( ...$param_numbers )
{
	//$sum = 0;
	//foreach( $param_numbers as $val )
	//{
	//	$sum += $val;
	//}	
	//return $sum;
	return array_sum($param_numbers);
}
//echo fnc_sum2(3,4,5,6);


function fnc_global()
{
	global $global_i;
	$global_i = 0;
}
$global_i = 5;
//fnc_global();

//echo $global_i;

//function fnc_static()
//{
//	static $static_i = 0;
//	echo $static_i;
//	$static_i++;
//}

//fnc_static();
//fnc_static();
//fnc_static();


//function fnc_reference( &$param_str )
//{
//	$param_str = "fnc_reference";
//}
//$str = "aaa";
//fnc_reference( $str );
//echo $str;


//*
//**
//***
//****
//*****
// 함수를 하나 만들고, 호출하여 별찍기

