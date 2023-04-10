<?php

//상속 : 부모 클래스의 property를 자식 클래스가 상속받는 것

// 부모 클래스
class Food
{
	protected $name;
	protected $price;

	protected function print_food_info()
	{
		echo "$this->name : $this->price 원";
	}
}

// 자식 클래스
class KoreanFood extends Food
{
	protected $side_dish;

	public function __construct( $param_name, $param_price, $param_side_dish )
	{
		$this->name = $param_name;
		$this->price = $param_price;
		$this->side_dish = $param_side_dish;
	}

	public function print_korean_food()
	{
		$this->print_food_info();
		echo " (반찬 : $this->side_dish) ";
	}
}

$t = new KoreanFood( "짜장면", "4,500", "김치" );
$t->print_korean_food();


// 오버라이딩 : 부모 클래스에서 정의한 메소드를 동일한 이름과 다른 동작으로 자식클래스에서 재정의

