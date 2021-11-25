<!DOCTYPE html>
<html>
<body>

<?php

$n=(int)readline("Enter the used unit:");
echo "$n";

if($n>0 && $n<=50){
	$a=3.50*$n;
	echo "Total bill=$a";
}

elseif($n>50 && $n<=150){
	$a=3.50*50+4.00*($n-50);
	echo "Total bill=$a";
}

elseif($n>150 && $n<=250){
	$a=3.50*50+4.00*100+5.20*($n-150);
	echo "Total bill=$a";
}

elseif($n>250){
	$a=3.50*50+4.00*100+5.20*100+6.50*($n-250);
	echo "Total bill=$a";
}

?>

</body>
</html>