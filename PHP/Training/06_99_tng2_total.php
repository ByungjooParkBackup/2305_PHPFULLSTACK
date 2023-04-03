<?php
function print_star($num) {
	for($i=0; $i<$num; $i++) {
		echo "*";
	}
	echo "\n";
}

function print_star_rect($num) {
	for($i=0; $i<$num; $i++) {
		print_star($num);
	}
}

function print_star_tri($num) {
	for($i=1; $i<=$num; $i++) {
		print_star($i);
	}
}


print_star_rect(3); 
echo "-----------\n";

print_star_rect(4); 
echo "-----------\n";

print_star_tri(5);
echo "-----------\n";

