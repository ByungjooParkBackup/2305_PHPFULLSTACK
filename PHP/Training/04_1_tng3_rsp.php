<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<form method="post">
		<label for="pl_ans">
		<input type="number" id="pl_ans" name="pl_ans">
		<input type="submit">
	</form>
</body>
</html>

<?php
/**************************/
// 가위바위보 게임
// 0 : 가위, 1: 바위, 2: 보
/**************************/

$pl_ans = 0; // 유저 입력값
$com_ans = rand(0, 2); // 컴퓨터 입력값 (0~2 랜덤값 생성)
$result_game = "";
$str_lose = "패배했습니다.";
$str_win = "승리했습니다.";
$str_draw = "비겼습니다.";


// 유저 그 외(에러)
if( $pl_ans !== 0 && $pl_ans !== 1 && $pl_ans !== 2 )
{
	echo "잘못된 값 입력입니다. (0~2의 값을 넣어주세요.)";
}
else
{
	// 유저가 가위
	if( $pl_ans === 0 )
	{
		switch ($com_ans) {
			// 컴퓨터 가위
			case 0:
				$result_game = $str_draw;
				break;
			// 컴퓨터 바위
			case 1:
				$result_game = $str_lose;
				break;
			// 컴퓨터 보(그 외)
			default:
				$result_game = $str_win;
				break;
		}
	}
	// 유저 바위
	else if( $pl_ans === 1 )
	{
		switch ($com_ans) {
			// 컴퓨터 가위
			case 0:
				$result_game = $str_win;
				break;
			// 컴퓨터 바위
			case 1:
				$result_game = $str_draw;
				break;
			// 컴퓨터 보(그 외)
			default:
				$result_game = $str_lose;
				break;
		}
	}
	// 유저 보
	else if( $pl_ans === 2 )
	{
		switch ($com_ans) {
			// 컴퓨터 가위
			case 0:
				$result_game = $str_lose;
				break;
			// 컴퓨터 바위
			case 1:
				$result_game = $str_win;
				break;
			// 컴퓨터 보(그 외)
			default:
				$result_game = $str_draw;
				break;
		}
	}
	echo $result_game."\n"."유저 : ".$pl_ans.", 컴퓨터 : ".$com_ans;
}
