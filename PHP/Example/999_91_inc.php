<?php
// "999_90_inc.php"에서 require한 파일
echo "999_91_inc : 시작\n";

echo "999_91_inc : "._PATH_SRC."\n"; // "999_90_inc.php"에서 이미 config파일을 require 했으므로, 상수'_PATH_SRC'를 사용 가능
echo "999_91_inc : 종료\n";

