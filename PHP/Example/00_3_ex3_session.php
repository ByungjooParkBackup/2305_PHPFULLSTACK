<?php

$user_id = "php506";
$uesr_pw = "506";

// session명 지정, 지정하지 않으면 "PHPSESSID"로 지정됩니다.
session_name("kim");

// session 시작
session_start();

// ---------------
// 유저 인증작업 필요, 지금은 생략
// ---------------

// session에 데이터 저장
$_SESSION["id"] = $user_id;
$_SESSION["del"] = "delete";