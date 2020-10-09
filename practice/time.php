<?php

// Last week
echo date('d/m/Y',strtotime('-2 sunday'));
echo ":";
echo date('d/m/Y',strtotime('-1 saturday'));
// This week
echo PHP_EOL;
echo date('d/m/Y',strtotime('-1 sunday'));
echo ":";
echo date('d/m/Y',strtotime('saturday'));
// Next week
echo PHP_EOL;
echo date('d/m/Y',strtotime('1 sunday'));
echo ":";
echo date('d/m/Y',strtotime('2 saturday'));
echo PHP_EOL;

// Last month,This month,Next month
echo date('m/d/Y',strtotime('first day of last month'));
echo ":";
echo date('m/d/Y',strtotime('last day of last month'));



$date="12/10/2020";
$result=explode ("/",$date);
var_dump(checkdate($result[1],$result[0],$result[2]));

date_default_timezone_set('Asia/Jakarta');
echo "Tanggal= ".date('l, d-M-Y / H:i:s a');

?>