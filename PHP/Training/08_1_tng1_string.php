<?php
// "I am always Hello."에서 "Hello"를 "Happy"로 바꾸어 출력하는
// 프로그램을 구현해 주세요.
$str_all = "I am always Hello.";
$str_expl = explode("Hello", $str_all);
$str_impl = implode("Happy", $str_expl);
//echo $str_impl;

//var_dump($str_expl);

// 함수명 : my_str_replace
// 리턴값 : String  $result_str
$str = "I am always Hello.";
//function my_str_replace($str)
//{
//	$str_expl = explode("Hello",$str);
//	$result_str = implode("Happy",$str_expl);
//	return $result_str;
//}
//echo my_str_replace($str);

// 재사용성 개선
function my_str_replace($pram_str, $param_separator, $param_ch)
{
	$arr_expl = explode($param_separator,$pram_str);
	$result_str = implode($param_ch,$arr_expl);
	return $result_str;
}
//echo my_str_replace($str, "am", "Apple");

// PHP 함수
echo str_replace("Hello", "Happy", $str);