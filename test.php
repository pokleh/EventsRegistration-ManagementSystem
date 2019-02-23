<?php

error_reporting(0);

$str = 'In My Cart : 11 12 items13 14 15';
preg_match_all('!\d+!', $str, $matches);

$total;
for($x = 0; $x <= count($matches[0]);$x++)
{
	$total = $total + $matches[0][$x];
}

echo $total;

?>