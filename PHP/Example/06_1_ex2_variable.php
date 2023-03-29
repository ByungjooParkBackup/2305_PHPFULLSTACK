<?php

// 전역 변수
function fnc_add()
{
	global $global_int_a; // 전역변수 선언
	$global_int_a = $global_int_a + 10;
	return $global_int_a;
}

$global_int_a = 10; // 전역변수 초기화(값 대입)

//echo fnc_add();


// 정적 변수
//function fnc_add_1()
//{
//	$i = 1;
//	echo $i."\n";
//	$i++;
//}

//for($i = 0; $i < 3; $i++)
//{
//	fnc_add_1();
//}



// call by value
//function fnc_val($int_a, $int_b)
//{
//	$int_a = 3;
//	$int_b = 4;
//	echo "function => ",$int_a, " ", $int_b, "\n";
//}

//$int_a = 1;
//$int_b = 2;
//fnc_val(5, 6);

//echo $int_a, " ", $int_b;



// call by reference
function fnc_val(&$a, &$b)
{
	$a = 3;
	$b = 4;
	return array($a, $b);
}

$int_a = 1;
$int_b = 2;
fnc_val($int_a, $int_b);

echo $int_a, " ", $int_b;




