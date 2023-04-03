<?php

// CLASS : 동종의 객체들이 모여있는 집합의 정의하는 것

class Student
{
	// 클레스 멤버 변수
	// 접근제어 지시자 : public, private, protected
	public $std_name; // 어디서든 접근 가능
	private $std_id; // Class 내에서만 접근 가능
	protected $std_age; // 자신과, 상속 Class 내에서만 접근 가능

	// static : 인스턴스를 생성하지 않고도 변수와 함수를 사용할 수 있게 됩니다.
	public static $std_static = "static입니다.";

	// Class 안에 있는 function을 method라고 부릅니다.
	public function print_student( $param_std_name, $param_std_age )
	{
		$result_name = "이름 : ".$param_std_name;
		$result_age = "나이 : ".$param_std_age."세";
		echo $result_name;
		echo "\n";
		echo $result_age;
	}

	// private 객체에 접근하기위해 getter와 setter 생성
	public function set_std_id($param_id)
	{
		// this 포인터 : class 자기 자신을 가르키고 있음
		$this->std_id = $param_id;
	}

	public function get_std_id()
	{
		return $this->std_id;
	}
}
// Student Instance 생성
$obj_Student = new Student;
// class의 method를 호출
//$obj_Student->print_student("홍길동", 27);
// class의 멤버변수 사용방법
//echo $obj_Student->std_name;
//$obj_Student->std_name = "갑돌이";
//echo $obj_Student->std_name;

// 지시자가 private이기 때문에 접근 권한이 없다.
//$obj_Student->$std_id = "갑돌이id";

//getter, setter로 private 객체에 접근
$obj_Student->set_std_id("갑순이id");
//echo $obj_Student->get_std_id();



////////////
// 생성자(constructor) : 
//	 	- 클래스를 이용하여 객체를 생성할 때 사용
//		- 생성자를 정의 하지 않을때는 디폴트 생성자가 선언 됨
class food
{
	private $food_name;

	// 생성자
	public function __construct( $parama_food_name )
	{
		$this->food_name = $parama_food_name;
	}

	public function print_food_name()
	{
		echo $this->food_name;
	}
}

echo Student::$std_static; // static객체는 instance생성을 하지 않아도 호출할 수 있습니다.

$obj_food = new food( "탕수육" ); // 생성자를 이용해서 instance를 생성
$obj_food->print_food_name();


