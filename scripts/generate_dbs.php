<?php
$file = 'employee_schema.txt';
$rh = fopen($file, 'r');
$contents = fread($rh, filesize($file));
fclose($rh);
for($i=1; $i <= 3; $i++) {
	$db_name = 'employee_db_'.$i;
	$wh = fopen($db_name.'.sql', 'w');
	fwrite($wh, 'DROP DATABASE IF EXISTS '.$db_name.';'.PHP_EOL);
	fwrite($wh, 'CREATE DATABASE IF NOT EXISTS '.$db_name.';'.PHP_EOL);
	fwrite($wh, 'USE '.$db_name.';'.PHP_EOL);
	fwrite($wh, $contents);
	fclose($wh);
}