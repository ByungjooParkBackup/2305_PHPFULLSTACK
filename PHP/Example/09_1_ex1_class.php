<?php

// CLASS : 동종의 객체들이 모여있는 집합

class Student
{
	// 클레스 멤버 변수
	public $std_name; // 어디서든 접근 가능
	private $std_id; // Class 내에서만 접근 가능
	protected $std_age; // 자신과, 상속 Class 내에서만 접근 가능
	// 접근제어 지시자 : public, private, protected

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
// class를 초기화
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
echo $obj_Student->get_std_id();

