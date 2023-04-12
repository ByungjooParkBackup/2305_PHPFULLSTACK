<?php
	// Get Method로 넘어온 데이터를 담고있는 변수
	var_dump($_GET);
	
	// ** 주의사항 **
	// $_GET은 원본 데이터이므로 값이 수정되지 않게 조심해야 합니다.
	$post_get = $_GET;
	$post_get["test1"];
?>