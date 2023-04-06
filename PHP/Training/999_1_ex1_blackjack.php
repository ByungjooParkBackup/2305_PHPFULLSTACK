<?php
//-----------------------------------------------------
// 파일명 		: 999_1_ex1_blackjack.php
// 기능			: 블랙잭 게임(터미널에서 입력값 받아 진행)
// 이력			: v001 : new - BJ.Park
//-----------------------------------------------------

//블랙잭 게임
//-카드 숫자를 합쳐 가능한 21에 가깝게 만들면 이기는 게임

//1. 게임 시작시 유저와 딜러는 카드를 2개 받는다.
// 1-1. 이때 유저 또는 딜러의 카드 합이 21이면 결과 출력
//2. 카드 합이 21을 초과하면 패배
// 2-1. 유저 또는 딜러의 카드의 합이 21이 넘으면 결과 바로 출력
//4. 카드의 계산은 아래의 규칙을 따른다.
// 4-1.카드 2~9는 그 숫자대로 점수
// 4-2. K·Q·J,10은 10점
// 4-3. A는 1점 또는 11점 둘 중의 하나로 계산
//5. 카드의 합이 같으면 다음의 규칙에 따름
// 5-1. 카드수가 적은 쪽이 승리
// 5-2. 카드수가 같을경우 비긴다.
//6. 유저가 카드를 받을 때 딜러는 아래의 규칙을 따른다.
// 6-1. 딜러는 카드의 합이 17보다 낮을 경우 카드를 더 받음
// 6-2. 17 이상일 경우는 받지 않는다.
//7. 1입력 : 카드 더받기, 2입력 : 카드비교, 0입력 : 게임종료
//8. 한번 사용한 카드는 다시 쓸 수 없다.
class Card
{
	private $arr_card;
	private $cnt;

	public function __construct( $param_arr )
	{
		$this->$arr_card = $param_arr;
		$this->$cnt = sizeof( $param_arr );
	}
}

class Deck
{
	private $arr_card_num; 		// 카드 번호
	private $arr_card_shape;	// 카드 모양
	private $arr_deck;			// 게임용 덱
	private $cnt_deck;			// 덱 카운트
	// construct
	public function __construct()
	{
		$this->arr_card_num		= array( "A", "2", "3", "4", "5", "6", "7", "8", "9", "10", "J", "Q", "K");
		$this->arr_card_shape	= array("♥", "◆", "♣", "♠");
		$this->cnt_deck			= ( sizeof( $this->arr_card_num ) * sizeof( $this->arr_card_shape ) ) - 1;
		$this->set_deck();
	}

	// ---------------------------------
	// 메소드명	: set_deck
	// 기능		: 랜덤하게 카드 덱을 셋팅
	//			 배열 depth1 : 인덱스배열, depth2 : 연상배열
	// 파라미터	: 없음
	// 리턴값	: 없음
	// ---------------------------------
	private function set_deck()
	{
		// 카드 52장 덱에 셋팅 ( 예 : array( array( "card_num" => 1, "card_shape" => 1 ), ... ) )
		foreach( $this->arr_card_shape as $shape_key => $shape_val )
		{
			foreach( $this->arr_card_num as $num )
			{
				$this->arr_deck[] = array( "card_num" => $num, "card_shape" => $shape_key);
			}
		}
		// 덱 셔플
		shuffle( $this->arr_deck );
	}

	// ---------------------------------
	// 메소드명	: give_card
	// 기능		: 덱에서 카드 한장을 파라미터에 주기
	// 파라미터	: Array		&$param_arr 
	// 리턴값	: 없음
	// ---------------------------------
	public function give_card( &$param_arr )
	{
		$param_arr[] = $this->arr_deck[$this->cnt_deck];

		// 덱 카운트 1감소
		$this->cnt_deck--;
	}
	
	// TODO : debug
	public function debug()
	{
		var_dump( $this->arr_deck ,$this->cnt_deck );
	}
}

class BlackJack extends Deck
{
	private $arr_user_card;		// 유저 현재 카드
	private $arr_com_card;		// 딜러 현재 카드

	// ---------------------------------
	// 메소드명	: start_game_set_card
	// 기능		: 게임 시작시 카드 2장 주기
	// 파라미터	: 없음
	// 리턴값	: 없음
	// ---------------------------------
	public function start_game_set_card()
	{
		$cnt = 0;
		while( $cnt <= 1 )
		{
			$this->give_card( $this->arr_user_card );
			$this->give_card( $this->arr_com_card );
			$cnt++;
		}
	}
	// ---------------------------------
	// 메소드명	: end_game_set_card
	// 기능		: 게임 시작시 카드 2장 주기
	// 파라미터	: 없음
	// 리턴값	: 없음
	// ---------------------------------

	// TODO : debug
	public function debug()
	{
		parent::debug();
		var_dump( $this->arr_user_card,  $this->arr_com_card );
	}
}
$obj_bj = new BlackJack();
$obj_bj->start_game_set_card();
$obj_bj->debug();


//while(true) {
//	echo '시작';
//	print "\n";
//	fscanf(STDIN, "%d\n", $input);        
//	if($input === 0) {
//		break;
//	}
//	echo $input;
//	print "\n";
//}
//echo "끝!\n";