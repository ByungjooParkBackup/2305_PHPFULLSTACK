<?php

// 1. 배열의 길이를 반환하는 my_len() 함수를 작성하시오.
$arr_base = array(1, 2, 3, 4, 5);

//echo my_len($arr_base);

function my_len($arr_len)
{
	$result = 0;
	foreach ($arr_len as $val)
	{
		$result += 1;
	}
	return $result;
}

// 별찍기를 함수로 만들어봅시다.
$in_num = 6;
for( $for1 = 1; $for1 <= $in_num; $for1++ )
{ 
	for( $for2 = 0; $for2 < $for1; $for2++ )
	{ 
		echo "*";
	}
	echo "\n";
}

print_star_rect(3); 
//*** (개행)
//*** (개행)
//*** (개행)

print_star_rect(4); 
//**** (개행)
//**** (개행)
//**** (개행)
//**** (개행)
