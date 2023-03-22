<?php

	//1. switch문
	// 조건에 따라서 서로 다른 처리를 할 수 있습니다.
	// 보통 값이 범위가 아니고 딱 고정되어 있는 경우 if문 대신 사용합니다.
	$val = 0;

	switch ( $val ) {
		case 0:
			echo "숫자 0입니다.";
			break;
		case 1:
			echo "숫자 1입니다.";
			break;
		default:
			echo "디폴트입니다.";
			break;
	}


?>