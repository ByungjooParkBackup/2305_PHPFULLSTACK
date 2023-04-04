<?php

include_once("./12_2_ex2_fnc_db_conn.php");

// try-catch문 : 예외처리를 하기위한 문법
//try
//{
//	// 우리가 실행하고 싶은 소스코드를 작성
//}
//catch( Exception $e )
//{
//	// 예외가 발생 했을 때 실행되는 소스코드를 작성
//}
//finally
//{
//	// 정상처리 또는 예외처리에 관계 없이 무조건 실행되는 소스코드를 작성
//}

try
{
	$obj_conn = null;
	my_db_conn( $obj_conn );
	$sql = " SELEC * FROM employees WHERE emp_no = 10001111 ";
	$stmt = $obj_conn->query( $sql );
	$result = $stmt->fetchAll();

	if( count( $result ) === 0 )
	{
		// throw Exception : 예외를 강제로 일으키는 구문
		throw new Exception("E99");
	}

	var_dump( $result );
	echo "Try\n";
}
catch( Exception $e )
{
	echo "----에러 발생----\n";
	echo $e->getMessage();
	echo "\n----에러 발생----\n";
}
finally
{
	echo "Finally\n";
	$obj_conn = null;
}

echo "종료";