<?php

// 사번이 10005 이하 사원의 사번, 이름(성 이름), 성별, 생일 
// DB 연결 
$dbc = mysqli_connect( "localhost", "root", "root506", "employees", 3306 );

// 쿼리 요청
$sql = 
	"
	SELECT
		emp_no 
		,concat(last_name, ' ', first_name) full_name
		,gender
		,birth_date
		FROM
			employees
		WHERE
			emp_no <= 10005;
	";
$result_query = mysqli_query( $dbc, $sql);

// 플레그를 이용하는 방법
$flg_cnt = false;
while( $tmp_row = mysqli_fetch_assoc($result_query) )
{
	echo implode( " ", $tmp_row ), "\n";
	$flg_cnt = true;
}
if( !$flg_cnt )
{
	echo "데이터가 0건 입니다.";
}


//// mysqli_num_rows() 를 이용해서 레코드 수를 체크 하는 방법
//if( mysqli_num_rows( $result_query ) === 0 )
//{
//	echo "데이터가 0건 입니다.";
//}
//else
//{
//	while( $tmp_row = mysqli_fetch_assoc($result_query) )
//	{
//		echo implode( " ", $tmp_row ), "\n";
//	}
//}



// DB 연결 종료
mysqli_close($dbc);
