<?php

// cookie 작성
setcookie("name", "Kim Mihyeon", time() + 30);
setcookie("age", "26", time() + 300);

// cookie 삭제 방법
setcookie("age", "", 0);