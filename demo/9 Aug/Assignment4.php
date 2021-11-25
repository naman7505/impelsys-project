<?php

$string="India is a Republic country and is a country in South Asia";
$a=array_count_values(str_word_count($string,1));
print_r($a);

?>