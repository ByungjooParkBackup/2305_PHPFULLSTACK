<?php
// 우리가 작성한 DB Connect 함수(my_db_conn)를 이용해서 아래 데이터를 출력해주세요.
include_once("../Example/12_2_ex2_fnc_db_conn.php");

//1. 전체 월급의 평균
//$sql = 
//	" SELECT "
//	." 	AVG(salary) "
//	." FROM "
//	." 	salaries "
//	." WHERE "
//	." 	to_date >= now() ";

//$obj_conn = null;
//my_db_conn( $obj_conn );
//// ------ query 메소드로 하는 방법 ------
//$stmt = $obj_conn->query( $sql );
//$result = $stmt->fetchAll();
//var_dump( $result );

//// ------ prepare 메소드로 하는방법 ------
//$stmt = $obj_conn->prepare( $sql );
//$stmt->execute();
//$result = $stmt->fetchAll();
//var_dump( $result );
//$obj_conn = null;


//2. 새로운 사원 정보를 employees 테이블에 등록해주세요.
//$sql =
//	" INSERT INTO employees( "
//	." 	emp_no "
//	." 	,birth_date "
//	." 	,first_name "
//	."	,last_name "
//	." 	,gender "
//	." 	,hire_date "
//	." 	,sup_no "
//	." 	) "
//	." VALUES( "
//	." 	:emp_no "
//	." 	,:birth_date "
//	." 	,:first_name "
//	."	,:last_name "
//	." 	,:gender "
//	." 	,:hire_date "
//	." 	,:sup_no "
//	." 	) "
//	;
//$arr_prepare =
//	array(
//		":emp_no" 		=> 1000000
//		,":birth_date" 	=> "2000-01-01"
//		,":first_name" 	=> "병주"
//		,":last_name" 	=> "박"
//		,":gender"		=> "M"
//		,":hire_date"	=> "2023-01-01"
//		,":sup_no"		=> null
//	);
//$obj_conn = null;
//my_db_conn( $obj_conn );
//$stmt = $obj_conn->prepare( $sql );
//$stmt->execute( $arr_prepare );
//$obj_conn->commit();
//$obj_conn = null;

//3. 2에서 등록한 사원의 이름을 "길동", 성은 "홍" 으로 변경해 주세요.
//$sql =
//	" UPDATE employees "
//	." SET "
//	." 	first_name = :first_name "
//	." 	,last_name = :last_name "
//	." WHERE "
//	." 	emp_no = :emp_no "
//	;
//$arr_prepare =
//	array(
//		":first_name" 	=> "길동"
//		,":last_name"	=> "홍"
//		,":emp_no"		=> 1000000
//	);

//$obj_conn = null;
//my_db_conn( $obj_conn );
//$stmt = $obj_conn->prepare( $sql );
//$stmt->execute( $arr_prepare );
//$obj_conn->commit();
//$obj_conn = null;

//4. 2에서 등록한 사원을 삭제해 주세요.
//$sql =
//	" DELETE FROM employees "
//	." WHERE "
//	." 	emp_no = :emp_no "
//	;
//$arr_prepare =
//	array(
//		":emp_no" => 1000000
//	);

//$obj_conn = null;
//my_db_conn( $obj_conn );
//$stmt = $obj_conn->prepare( $sql );
//$stmt->execute( $arr_prepare );
//$obj_conn->commit();
//$obj_conn = null;