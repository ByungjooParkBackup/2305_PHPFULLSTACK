<?php

// DB 연결 
$dbc = mysqli_connect( "localhost", "root", "root506", "employees", 3306 );

//var_dump($dbc);

// 쿼리 요청
$result_query = mysqli_query( $dbc, "SELECT emp_no, first_name FROM employees LIMIT 5;");

// DB 연결 종료
mysqli_close($dbc);

//var_dump($result_query);

//while( $temp_row = mysqli_fetch_row( $result_query ) )
//{
//	var_dump($temp_row);
//}

while( $temp_row = mysqli_fetch_assoc( $result_query ) )
{
	var_dump($temp_row["first_name"]);
}
