<?php
	//1. while문
	//$i = 0;
	//while( $i < 10 )
	//{
	//	echo $i++;
	//	//break; // 반복문을 종료 합니다.
	//}

	// 구구단 2단을 while문으로 작성해 주세요.
	// 2 * 1 = 2
	// 2 * 2 = 4 

	//$dan = 2;
	//$num = 1;
	//while( $num < 10 )
	//{
	//	$result = $dan." * ".$num." = ". $dan * $num. "\n";
	//	echo $result;
	//	$num++;
	//}
	
	// 구구단 2단~9단을 while문으로 작성해 주세요.
	// 2단
	// 2 * 1 = 2
	// 2 * 2 = 4 
	// 3단
	// 3 * 1 = 3
	// 3 * 2 = 6 

	//$dan = 2;
	//$num = 1;
	//$max_dan = 19;
	//while( $dan <= $max_dan )
	//{
	//	echo $dan, "단\n";
	//	$num = 1;
	//	while( $num <= $max_dan )
	//	{
	//		$result = $dan." * ".$num." = ".$dan*$num."\n";
	//		echo $result;
	//		++$num;
	//	}
	//	++$dan;
	//}


	//2. do while문
	//do{
	//	반복 할 처리
	//}
	//while( 조건 );

	//$i = 0;
	//do{
	//	echo $i, " do while";
	//}
	//while( $i === 1 );

	//while( $i === 1 )
	//{
	//	echo $i, " while";
	//}

	//3. for문
	//for( 시작; 조건; 증가/증감 연산자) { 
	//	반복 하고 싶은 처리
	//}
	for( $dan = 2; $dan <= 9; $dan++ )
	{ 
		//echo $dan, "단\n";
		for( $num = 1; $num <= 9; $num++ )
		{
			//$result = $dan." * ".$num." = ".$dan*$num."\n";
			//echo $result;
		}
	}


	
?>