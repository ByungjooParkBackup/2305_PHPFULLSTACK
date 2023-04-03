<?php

	// 버블 정렬
	$arr = array(5, 10, 7, 3, 1);
	$cnt = count($arr) - 1 ; // 고정 배열 사이즈용
	$cnt_r = count($arr) - 1; // 가변 배열 사이즈용

	// 고정 배열 사이즈만큼 루프
	for( $cnt_loop = 0; $cnt_loop <= $cnt; $cnt_loop++ )
	{
		// 가변 배열 사이즈 만큼 루프
		for( $c_room = 0; $c_room < $cnt_r; $c_room++ )
		{
			$c_room2 = $c_room + 1; // 비교 대상 요소 키 셋팅
			if( $arr[$c_room] > $arr[$c_room2] )
			{
				// 값 스왑
				$temp = $arr[$c_room];
				$arr[$c_room] = $arr[$c_room2];
				$arr[$c_room2] = $temp;
			}
		}
		$cnt_r--; // 이미 정렬된 요소는 루프대상 제외를 위해 --
	}

	print_r($arr);

	// 다른 방법
	$cnt = count($arr);
	for ($ii = 1; $ii < $cnt; $ii++) {
		for ($i = $cnt; $i > $ii; $i--) {
			if ($arr[$i-1] <$arr[$i-2])
			{
				$temp = $arr[$i-1];
				$arr[$i-1] = $arr[$i-2];
				$arr[$i-2] = $temp;
			}
		}
	}

	print_r($arr);




	//배열 안에 최대 값, 최소 값을 출력해주는 함수를 각가 구현해 주세요.
	// 함수명은 "my_max", "my_min"
	$arr = array(5, 10, 7, 3, 1);
	
	function my_max( $param_arr )
	{
		$res_max = $param_arr[0]; // 배열의 첫번째 값으로 변수 선언
		
		// 배열 루프(2번 요소부터)
		for( $i = 1; $i < count($param_arr); $i++ )
		{
			// 셋팅값이 작을 경우 값 치환
			if( $res_max < $param_arr[$i] )
			{
				$res_max = $param_arr[$i];
			}
		}
		return $res_max;
	}

	function my_min( $param_arr )
	{
		$res_min = null;
		foreach ($param_arr as $val) {
			if( is_null($res_min) || $res_min > $val )
			{
				$res_min = $val;
			}
		}
		return $res_min;
	}
	echo my_max($arr);
	echo my_min($arr);