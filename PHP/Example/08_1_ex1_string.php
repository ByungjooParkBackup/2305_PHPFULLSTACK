<?php

// 문자열 합치기
$str_1 = "aaa";
$str_2 = "bbb";
$str_sum = $str_1 . $str_2 . $str_1;

//echo $str_sum;


$str_en = "abcd efgh";

//// 소문자 변환 
//echo strtolower($str_en), "\n";

//// 대문자 변환
//echo strtoupper($str_en), "\n";

//// 맨 앞 글자만 대문자로 변환
//echo ucfirst($str_en), "\n";

//// 각 단언의 맨앞글자만 대문자로 변환
//echo ucwords($str_en), "\n";

// URL관련 함수
//$url = "https://www.google.com/search?q=php+%EC%98%AC%EB%A6%BC&sxsrf=APwXEdf3TazkV0P_qyr9cZzuY04rUoKjJA%3A1680076713186&ei=qe8jZOz8Cuu12roPzMaigAI&ved=0ahUKEwis9by91YD-AhXrmlYBHUyjCCAQ4dUDCA8&uact=5&oq=php+%EC%98%AC%EB%A6%BC&gs_lcp=Cgxnd3Mtd2l6LXNlcnAQAzIFCAAQgAQyBggAEAgQHjIGCAAQCBAeMgYIABAIEB4yBggAEAgQHjIGCAAQCBAeMgYIABAIEB4yCAgAEAgQHhAPOgoIABBHENYEELADOgcIABCKBRBDSgQIQRgAUK8FWOUJYPcKaAJwAXgAgAF6iAG7BZIBAzAuNpgBAKABAcgBCsABAQ&sclient=gws-wiz-serp";

//$arr_url = parse_url($url);
////var_dump($arr_url);

//parse_str($arr_url["query"], $arr_parse);

//var_dump($arr_parse);

// 역순의 문자열
$str_abcd = "abcd";
//echo strrev($str_abcd);


// 문자열 자르기
$str_1 = "가나다라마";
//echo mb_substr($str_1, 2), "\n";
//echo mb_substr($str_1, 2, 1), "\n";
//echo mb_substr($str_1, 3, 2), "\n";
//echo mb_substr($str_1, -1), "\n"; // 스타트 파라미터가 음수이면 오른쪽부터 자릅니다.

// 문자열 자르기로 "PHP입니다."만 출력해 주세요.
$str_tng = "안녕하세요. PHP입니다.";
//echo mb_substr($str_tng, 7, 7), "\n";
//echo mb_substr($str_tng, -7, 7), "\n";
//echo mb_substr($str_tng, -7), "\n";
//echo mb_substr($str_tng, 7), "\n";

//// 문자열 자르기로 "세요. P"만 출력해 주세요.
//echo mb_substr($str_tng, -11, 5), "\n";
//echo mb_substr($str_tng, 3, 5), "\n";

// 문자열 빈공간 지우기
$str_trim = "	abcd    ";
//echo trim($str_trim), "\n";
//echo rtrim($str_trim), "\n";
//echo ltrim($str_trim), "\n";

// 문자열의 길이를 구하는 함수
$str_len = "가나다라";

//echo mb_strlen($str_len);


// 문자열 포맷에 따라 출력하는 함수
define("WELCOME", "안녕하세요. %s님.");
//printf(WELCOME, "홍길동");


// 기본 포맷 : ERROR(숫자) : XXX ERROR가 발생했습니다.
// 에러 번호 : 에러종류
//	1 : 시스템
//	2 : 로그인
//	3 : 접속
define("ERROR_MSG", "ERROR(%d) : %s ERROR가 발생했습니다.");
//printf(ERROR_MSG, 1, "시스템");
//echo "\n";
//printf(ERROR_MSG, 2, "로그인");
//echo "\n";
//printf(ERROR_MSG, 3, "접속");

// 문자열을 분리하는 함수
$str_sscanf = "가나다라 50 abcd";
sscanf($str_sscanf, "%s %d %s", $str_ko, $int_d, $str_en);
//echo $str_ko, "\n", $int_d, "\n", $str_en, "\n";

// 문자열 반복해서 찍어주는 함수
//echo str_repeat("가나", 3);

// 문자열을 특정 문자열로 분리하는 함수 : explode()
$str_expl = "홍길동,27세,남자,의적,조선";
$arr_expl = explode(",", $str_expl);
//print_r($arr_expl);

// 배열을 특정 문자열로 합치는 함수 : implode()
$str_impl = implode("123", $arr_expl);
echo $str_impl;









