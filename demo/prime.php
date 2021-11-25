<!DOCTYPE html>
<html>
<body>

<?php

echo "SUM OF ALL PRIME NUMBER BETWEEN 1 TO 500:-<br>";
$sum=0;

	for($i=2;$i<=500;$i++)
	{
		$prime=true;

	for($j=2;$j<$i;$j++)
		{
			if($i%$j==0)
			{
				$prime=false;
				break;
			}
			}

			if($prime)
			{
				echo $i."<br>";
				
			}
			
				$sum=$sum+$i;
			}
			
			echo "Sum of all prime number between 1 to 500 is:".$sum."<br>";
			?>



</body>
</html>
