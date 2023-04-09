<?php
/***************************
파일명 :
시스템명 :
이력
	v001 : new - d1111
	v002 : fnc_print_str 수정 - d1111


****************************/


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
//function fun_print_str($param_num) // v002 del
function fun_print_str($param_num, $param_str = "*" ) // v002 add
{
	for( $i = 1; $i <= $param_num; $i++ )
	{
		//echo "*"; // v002 del
		echo $param_str; // v002 add
	}
	echo"\n";
}
//fun_print_str(3);
//fun_print_str(2);
//fun_print_str(1);

function fnc_reference2( &$param_str )
{
	echo "2번 : $param_str \n";
	$param_str = "fnc_refernce2에서 값 변경";
	echo "3번 : $param_str \n";
}
//$str = "aaa";
//echo "1번 : $str \n";
//fnc_reference2( $str );
//echo "4번 : $str \n";



// -------- class ---------
class Food
{
	// 접근 제어 지시자
	// public    : 어디서든(class밖에서도) 접근이 가능
	// private   : 해당 class내에서만 접근 가능
	// protected : class 자기 자신과 상속 class 내에서만 접근 가능
	
	// 멤버 변수
	protected $str_name;
	protected $int_price;

	// 메소드
	public function __construct( $param_name, $param_price )
	{
		$this->str_name = $param_name;
		$this->int_price = $param_price;
	}

	public function fnc_print_food()
	{
		$str = $this->str_name." : ".$this->int_price."원\n";
		echo $str;
	}

	public function set_int_price( $param_price )
	{
		$this->int_price = $param_price;
	}
}

//$obj_food = new Food( "탕수육", 10000 );
////Food Class의 멤버 변수 $int_price의 값을 12000 바꾸어 주세요.
//$obj_food->set_int_price( 12000 );
//$obj_food->fnc_print_food();


// 상속 : 부모 클래스의 객체들을 자식 클레스가 상속받아 사용할 수 있다.
class KoreanFood extends Food
{
	protected $side_dish;

	public function __construct( $param_name, $param_price, $param_side_dish)
	{
		$this->str_name = $param_name;
		$this->int_price = $param_price;
		$this->side_dish = $param_side_dish;
	}

	// 오버라이딩 : 부모클래스에서 정의된 메소드를 자식클래스에서 재정의
	public function fnc_print_food()
	{
		//$str = $this->str_name." : ".$this->int_price."원\n"."반찬 : ".$this->side_dish."\n";
		parent::fnc_print_food();
		$str = "반찬 : ".$this->side_dish."\n";
		echo $str;
	}
}

//$obj_korean_food = new KoreanFood( "치킨", 20000, "치킨무" );
//$obj_korean_food->fnc_print_food();

class People
{
	private $name;

	public function set_name( $param_name )
	{
		$this->name = $param_name;
	}

	public function people_print()
	{
		echo "이름 : $this->name \n";
	}
}

class Student extends People
{
	protected $id;

	function set_id( $param_id )
	{
		$this->id = $param_id;
	}

	function student_print()
	{
		parent::people_print();
		echo "아이디 : $this->id \n";
	}
}

$obj_std = new Student();
$obj_std->set_name( "박병주" );
$obj_std->set_id( 123456789 );
$obj_std->student_print();
