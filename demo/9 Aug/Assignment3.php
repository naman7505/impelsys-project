<?php

$string="google";
$a=array('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z');
for($i=0;$i<26;$i++)
{
	$b=substr_count(strtolower($string),$a[$i]);

	echo $a[$i]."=".$b."<br>";

}
?>