<?php

//1. Get Method로 사용자가 입력한 데이터를 HTTP Request합니다.
//2. 입력한 데이터의 상세 내역은 아래와 같습니다.
//	2-1. key : id, pw, name, birth_date
//3. echo를 이용해서 각각의 데이터를 출력해 주세요.

// URL을 직접 입력
//http://localhost/20_2_ex1_http_get_method.php?id=asd&pw=asd&name=asd&birth_date=2023-03-27
?>

<!-- form Tag를 이용하는 방법 -->
<!--<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<form method="GEt" action="20_2_ex1_http_get_method.php">
		<input type="text" name="id">
		<input type="password" name="pw">
		<input type="text" name="name">
		<input type="date" name="birth_date">
		<button type="submit">submit</button>
	</form>

</body>
</html>-->
<?php

$get_method = $_GET;
	
	foreach($get_method as $key => $val)
	{
		echo $key," : ",$val,"\n";
	}

?>