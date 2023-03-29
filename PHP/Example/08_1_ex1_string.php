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
$url = "https://www.google.com/search?q=php+%EC%98%AC%EB%A6%BC&sxsrf=APwXEdf3TazkV0P_qyr9cZzuY04rUoKjJA%3A1680076713186&ei=qe8jZOz8Cuu12roPzMaigAI&ved=0ahUKEwis9by91YD-AhXrmlYBHUyjCCAQ4dUDCA8&uact=5&oq=php+%EC%98%AC%EB%A6%BC&gs_lcp=Cgxnd3Mtd2l6LXNlcnAQAzIFCAAQgAQyBggAEAgQHjIGCAAQCBAeMgYIABAIEB4yBggAEAgQHjIGCAAQCBAeMgYIABAIEB4yCAgAEAgQHhAPOgoIABBHENYEELADOgcIABCKBRBDSgQIQRgAUK8FWOUJYPcKaAJwAXgAgAF6iAG7BZIBAzAuNpgBAKABAcgBCsABAQ&sclient=gws-wiz-serp";

$arr_url = parse_url($url);
//var_dump($arr_url);

parse_str($arr_url["query"], $arr_parse);

var_dump($arr_parse);