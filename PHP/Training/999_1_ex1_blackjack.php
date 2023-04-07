<?php
//-----------------------------------------------------
// 파일명 		: 999_1_ex1_blackjack.php
// 기능			: 블랙잭 게임(터미널에서 입력값 받아 진행)
// 이력			: v001 : new - BJ.Park
//-----------------------------------------------------
define( "FILE_NAME_DECK", "999_2_deck.txt");
define( "FILE_NAME_HAND", "999_2_hand.txt");
define( "STR_CARD_NUM", "card_num");
define( "STR_CARD_SHAPE_KEY", "card_shape_key");
define( "FLG_DEBUG", true );

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

// **********************************
// 클래스	: Card
// **********************************
class Card
{
	private $arr_card_num; 		// 카드 번호
	private $arr_card_shape;	// 카드 모양
	public function __construct()
	{
		$this->arr_card_num		= array( "A", "2", "3", "4", "5", "6", "7", "8", "9", "10", "J", "Q", "K" );
		$this->arr_card_shape	= array( "♥", "◆", "♣", "♠" );
	}

	// ---------------------------------
	// 메소드명	: get_card_num_score
	// 기능		: 문양 카드 숫자로 변환
	// 파라미터	: String|INT	$param_num
	//			 INT			$param_score
	// 리턴값	: INT
	// ---------------------------------
	public function get_card_num_score( $param_num, $param_score )
	{
		switch( $param_num )
		{
			case "J":
			case "Q":
			case "K":
				return 10;
			case "A":
				if( $param_score > 10 )
				{
					return 1;
				}
				else
				{
					return 11;
				}
			default:
				return (int)$param_num;
		}
	}

	// ---------------------------------
	// 메소드명	: get_card_shape
	// 기능		: 카드 모양 리턴
	// 파라미터	: String	$param_key
	// 리턴값	: String	"♥", "◆", "♣", "♠"
	// ---------------------------------
	public function get_card_shape( $param_key )
	{
		return $this->arr_card_shape[$param_key];
	}
	
	// ---------------------------------
	// 메소드명	: get_arr_card_num
	// 기능		: 카드 숫자 배열 리턴
	// 파라미터	: 없음
	// 리턴값	: Array		$arr_card_num
	// ---------------------------------
	public function get_arr_card_num()
	{
		return $this->arr_card_num;
	}

	// ---------------------------------
	// 메소드명	: get_arr_card_shape
	// 기능		: 카드 모양 배열 리턴
	// 파라미터	: 없음
	// 리턴값	: Array		$arr_card_shape
	// ---------------------------------
	public function get_arr_card_shape()
	{
		return $this->arr_card_shape;
	}

	// ---------------------------------
	// 메소드명	: get_cnt_card
	// 기능		: 카드 모양 배열 리턴
	// 파라미터	: 없음
	// 리턴값	: INT		$cnt_card
	// ---------------------------------
	public function get_cnt_card()
	{
		return $this->cnt_card;
	}
}

// **********************************
// 클래스	: Deck
// **********************************
class Deck
{
	private $arr_deck;		// 게임용 덱
	private $cnt_deck;		// 덱 카운트
	private $size_deck;		// 덱 사이즈
	// construct
	public function __construct()
	{
		$obj_card = new Card();
		$this->set_deck( $obj_card->get_arr_card_num(), $obj_card->get_arr_card_shape() );
		$this->cnt_deck	= 0;
		$this->size_deck = sizeof($this->arr_deck);
		$obj_card = null;
	}

	// ---------------------------------
	// 메소드명	: set_deck
	// 기능		: 랜덤하게 카드 덱을 셋팅
	//			 배열 depth1 : 인덱스배열, depth2 : 연상배열
	// 파라미터	: Array		$param_arr_card_num
	//			 Array		$param_arr_card_shape
	// 리턴값	: 없음
	// ---------------------------------
	private function set_deck( $param_arr_card_num, $param_arr_card_shape )
	{
		// 카드 52장 덱에 셋팅 ( 예 : array( array( "card_num" => 1, "card_shape" => 1 ), ... ) )
		foreach( $param_arr_card_shape as $shape_key => $shape_val )
		{
			foreach( $param_arr_card_num as $num )
			{
				$this->arr_deck[] = array( STR_CARD_NUM => $num, STR_CARD_SHAPE_KEY => $shape_key);
			}
		}
		// 덱 셔플
		shuffle( $this->arr_deck );

		// ************** DEBUG **************
		if( FLG_DEBUG )
		{
			DebugBJ::put_file( FILE_NAME_DECK, $this->arr_deck, "w" );
		}
			// ************** DEBUG **************
	}

	// ---------------------------------
	// 메소드명	: give_card
	// 기능		: 덱에서 카드 한장을 파라미터에 주기
	// 파라미터	: 없음
	// 리턴값	: (Array)$card / false
	// ---------------------------------
	public function give_card()
	{
		if( $this->cnt_deck === $this->size_deck )
		{
			return false;
		}
		$card = array_shift($this->arr_deck);

		// 덱 카운트 1증가
		$this->cnt_deck++;

		return $card;
	}
}

// **********************************
// 클래스	: Player
// **********************************
class Player
{
	private $hand;
	private $score;
	private	$obj_card;
	protected $player_name;

	public function __construct()
	{
		$this->hand = array();
		$this->score = 0;
		$this->obj_card = new Card();
	}

	// ---------------------------------
	// 메소드명	: print_open_card
	// 기능		: 플레이어의 현재 카드 정보를 출력
	// 파라미터	: 없음
	// 리턴값	: 없음
	// ---------------------------------
	public function print_open_card()
	{
		$str = $this->player_name;
		foreach( $this->hand as $card )
		{
			$str .= $this->obj_card->get_card_shape($card[STR_CARD_SHAPE_KEY]).$card[STR_CARD_NUM]." ";
		}
		echo $str;
	}

	// ---------------------------------
	// 메소드명	: clear_var
	// 기능		: 플레이어의 현재 카드 정보와 점수를 초기화
	// 파라미터	: 없음
	// 리턴값	: 없음
	// ---------------------------------
	public function clear_var()
	{
		$this->hand = array();
		$this->score = 0;
	}

	// ---------------------------------
	// 메소드명	: set_score
	// 기능		: 플레이어의 점수를 가산
	// 파라미터	: INT		$param_score
	// 리턴값	: 없음
	// ---------------------------------
	public function set_score( $param_score )
	{
		$this->score += $param_score;
	}
	
	// ---------------------------------
	// 메소드명	: get_score
	// 기능		: 플레이어의 점수를 반환
	// 파라미터	: 없음
	// 리턴값	: INT	score
	// ---------------------------------
	public function get_score()
	{
		return $this->score;
	}

	// ---------------------------------
	// 메소드명	: set_var
	// 기능		: 플레이어의 카드 정보와 점수를 셋팅
	// 파라미터	: Object		$param_obj_deck
	// 리턴값	: 없음
	// ---------------------------------
	public function set_var( &$param_obj_deck )
	{
		$arr_card = $param_obj_deck->give_card();
		$this->hand[] = $arr_card;
		$this->set_score( $this->obj_card->get_card_num_score( $arr_card[STR_CARD_NUM], $this->get_score() ) );

		// ************** DEBUG **************
		if( FLG_DEBUG )
		{
			DebugBJ::put_file( FILE_NAME_HAND, $arr_card, "a" );
		}
		// ************** DEBUG **************
	}

	// ---------------------------------
	// 메소드명	: get_hand
	// 기능		: 플레이어의 카드정보를 반환
	// 파라미터	: 없음
	// 리턴값	: Array		hand
	// ---------------------------------
	public function get_hand()
	{
		return $this->hand;
	}
}

// **********************************
// 클래스	: User extends Player
// **********************************
class User extends Player
{
	public function __construct()
	{
		parent::__construct();
		$this->player_name = "USER : "; // USER로 설정
	}
}

// **********************************
// 클래스	: Dealer extends Player
// **********************************
class Dealer extends Player
{
	public function __construct()
	{
		parent::__construct();
		$this->player_name = "DEALER : "; // DEALER로 설정
	}

	// ---------------------------------
	// 메소드명	: set_var
	// 기능		: (Overriding)플레이어의 카드 정보와 점수를 셋팅
	// 파라미터	: Object		$param_obj_deck
	// 리턴값	: 없음
	// ---------------------------------
	public function set_var( &$param_obj_deck )
	{
		if( $this->get_score() < 17 )
		{
			parent::set_var( $param_obj_deck);
		}
	}
}

// **********************************
// 클래스	: Play
// **********************************
class Play
{
	private $obj_user;		// 유저 클래스
	private $obj_dealer;	// 딜러 클래스
	private $obj_deck;		// 덱 클래스

	public function __construct()
	{
		$this->obj_user		= new User();
		$this->obj_dealer	= new Dealer();
		$this->obj_deck		= new Deck();
	}

	// ---------------------------------
	// 메소드명	: set_card
	// 기능		: 카드 분배
	// 파라미터	: 없음
	// 리턴값	: 없음
	// ---------------------------------
	public function set_card()
	{
		if( sizeof( $this->obj_user->get_hand() ) > 0 )
		{
			$this->obj_user->set_var( $this->obj_deck );
			$this->obj_dealer->set_var( $this->obj_deck );
		}
		else
		{
			$this->obj_user->set_var( $this->obj_deck );
			$this->obj_dealer->set_var( $this->obj_deck );
			$this->obj_user->set_var( $this->obj_deck );
			$this->obj_dealer->set_var( $this->obj_deck );
		}
	}

	// ---------------------------------
	// 메소드명	: chk_score
	// 기능		: 점수 체크
	// 파라미터	: 없음
	// 리턴값	: Boolean	$flg_burst
	// ---------------------------------
	public function chk_score()
	{
		$user_score = $this->obj_user->get_score();
		$dealer_score = $this->obj_dealer->get_score();
		$flg_burst = false;
		$arr_player = array();
		$str_con = "";

		if( ( $user_score > 21 && $dealer_score > 21) )
		{
			$arr_player[] = "User";
			$arr_player[] = "Dealer";
			$int_result = 0;
			$str_con = "Burst";
			$flg_burst = true;
		}
		else if( $user_score > 21)
		{
			$arr_player[] = "User";
			$int_result = 2;
			$str_con = "Burst";
			$flg_burst = true;
		}
		else if( $dealer_score > 21 )
		{
			$arr_player[] = "Dealer";
			$int_result = 1;
			$str_con = "Burst";
			$flg_burst = true;
		}
		else if( $user_score === 21 )
		{
			$arr_player[] = "User";
			$int_result = 1;
			$str_con = "Black Jack!!";
			$flg_burst = true;
		}
		else if( $dealer_score === 21 )
		{
			$arr_player[] = "Dealer";
			$int_result = 2;
			$str_con = "Black Jack!!";
			$flg_burst = true;
		}
		
		if( $flg_burst )
		{
			$this->print_result( $arr_player, $int_result, $str_con );
		}

		return $flg_burst;
	}

	// ---------------------------------
	// 메소드명	: chk_result
	// 기능		: 결과 체크
	// 파라미터	: 없음
	// 리턴값	: 없음
	// ---------------------------------
	public function chk_result()
	{
		$user_score = $this->obj_user->get_score();
		$dealer_score = $this->obj_dealer->get_score();
		$flg_burst = false;
		$arr_player = array();

		if( $user_score > $dealer_score )
		{
			$arr_player[] = "User";
			$int_result = 1;
			$flg_burst = true;
		}
		else if( $user_score < $dealer_score )
		{
			$arr_player[] = "Dealer";
			$int_result = 2;
			$flg_burst = true;
		}
		else if( $user_score === $dealer_score )
		{
			$int_result = 1;
			$flg_burst = true;
		}
		
		$this->print_result( $arr_player, $int_result );
	}

	// ---------------------------------
	// 메소드명	: print_result
	// 기능		: 결과 출력
	// 파라미터	: 없음
	// 리턴값	: 없음
	// ---------------------------------
	public function print_result( $param_arr, $param_int_result, $param_str_con = "" )
	{
		$str = implode( ", ", $param_arr ). " ";
		switch( $param_int_result )
		{
			case 0:
				$str .= $param_str_con.", 무승부입니다.\n";
				break;
			case 1:
				$str .= $param_str_con.", 승리했습니다.\n";
				break;
			case 2:
				$str .= $param_str_con.", 패배했습니다.\n";
				break;
		}
		
		echo $str;
		$this->obj_user->print_open_card();
		echo " / ";
		$this->obj_dealer->print_open_card();
		echo "\n";
	}

	// ---------------------------------
	// 메소드명	: open_player_card
	// 기능		: 소유한 카드 출력
	// 파라미터	: 없음
	// 리턴값	: 없음
	// ---------------------------------
	public function open_player_card()
	{
		$this->obj_user->print_open_card();

		// ************** DEBUG **************
		if( FLG_DEBUG )
		{
			$this->obj_dealer->print_open_card();
		}
		// ************** DEBUG **************

		echo "\n";
	}

	// ---------------------------------
	// 메소드명	: clare_player_card
	// 기능		: 소유한 카드 초기와
	// 파라미터	: 없음
	// 리턴값	: 없음
	// ---------------------------------
	public function clare_player_card()
	{
		$this->obj_user->clear_var();
		$this->obj_dealer->clear_var();
	}

	// ---------------------------------
	// 메소드명	: game_start
	// 기능		: 게임시작
	// 파라미터	: 없음
	// 리턴값	: 없음
	// ---------------------------------
	public function game_start()
	{
		$flg_clare_card = true;
		echo "----- Black Jack -----\n";
		while(true) {
			if( $flg_clare_card )
			{
				echo "----- New Game -----\n";
				$this->set_card();
				$flg_clare_card = false;
				if( $this->chk_score() )
				{
					$this->clare_player_card();
					$flg_clare_card = true;
				}
				else
				{
					$this->open_player_card();
				}
			}
			fscanf(STDIN, "%d", $input);  
			echo "입력값 : $input \n";
			
			if( $input === 1 )
			{
				$this->set_card();
				$this->open_player_card();
				if( $this->chk_score() )
				{
					$this->clare_player_card();
					$flg_clare_card = true;
				}
			}
			else if( $input === 2 )
			{
				if( !$this->chk_score() )
				{
					$this->chk_result();
				}
				$this->clare_player_card();
				$flg_clare_card = true;
			}
			else if( $input === 0 )
			{
				break;
			}
			else if( $input === 90 )
			{
				if( FLG_DEBUG )
				{
					DebugBJ::delete_file();
					break;
				}
			}
			else
			{
				echo "잘못 입력하셨습니다.\n";
				$input = 1;
			}
			print "\n";
		}
		echo "끝!\n";
	}
}



$obj_play = new play();
$obj_play->game_start();
// $obj_play->set_card();





// ************** DEBUG **************
// **********************************
// 클래스	: DebugBJ
// **********************************
class DebugBJ
{
	public static function put_file( $param_file_name, $param_arr, $param_mode )
	{
		$fh = fopen( $param_file_name, $param_mode );
		fputs( $fh, DebugBJ::arr_to_string( $param_arr ) );
		fclose( $fh );
	}

	public static function arr_to_string( $param_arr )
	{
		$str = "";
		foreach( $param_arr as $key => $val )
		{
			if( is_array( $val ) )
			{
				$str .= DebugBJ::arr_to_string( $val );
			}
			else
			{
				$str .= $key." : ".$val."\n";
			}
		}
		return $str;
	}

	public static function delete_file()
	{
		unlink(FILE_NAME_HAND);
		unlink(FILE_NAME_DECK);
	}
}
// ************** DEBUG **************