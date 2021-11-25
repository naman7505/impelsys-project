<?php
$string="Avul Pakir Jainulabdeen abdul Kalam ";

	$letter=explode(" ",$string);
	$res=$string[0].".".ucwords($string[5]).".".ucwords($string[11]).".".ucwords($string[24]).".".$letter[len($letter)-1];

echo $res;
?>