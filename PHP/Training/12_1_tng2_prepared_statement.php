<?php
// 아래 쿼리로 결과를 출력하는 프로그램을 만들어 주세요.

// ---- 쿼리 ----
//SELECT emp_no, salary FROM salaries WHERE to_date = ? AND salary >= ? ORDER BY salary DESC LIMIT ?

// ---- prepare 셋팅값 ----
//to_date : "9999-01-01"
//salary : 50000
//LIMIT : 5
$date = "9999-01-01";
$sal = 50000;
$lim = 5;
$result = null;

$dbc = mysqli_connect( "localhost", "root", "root506", "employees", 3306 ); // DB 연결
$stmt = $dbc->stmt_init(); // mysqli_stmt_prepare를 사용하기 위한 객체를 초기화하고 리턴해 줍니다.
$stmt->prepare( " SELECT emp_no, salary FROM salaries WHERE to_date = ? AND salary >= ? ORDER BY salary DESC LIMIT ? " );
$stmt->bind_param( "sii", $date, $sal, $lim ); // prepared statement의 값을 셋팅
$stmt->execute(); // 쿼리를 실행

$result = $stmt->get_result(); // DB의 쿼리 결과를 저장
while( $row = $result->fetch_assoc() )
{
	echo "emp_no :".$row["emp_no"]." salary :". $row["salary"]."\n";
}
$dbc->close(); // DB Close