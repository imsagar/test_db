<?php
$params = $argv;
$template = $argv[1];
$db_prefix = $argv[2];
$start = $argv[3]??1;
$end = $argv[4]??10;

$config = parse_ini_file('config.ini', true);

for($i=$start; $i <= $end; $i++) {
	$db_name = $db_prefix.$i;
	$wh = fopen($db_name.'.sql', 'w');
	fwrite($wh, 'DROP DATABASE IF EXISTS '.$db_name.';'.PHP_EOL);
	fwrite($wh, 'CREATE DATABASE IF NOT EXISTS '.$db_name.';'.PHP_EOL);
	fwrite($wh, 'USE '.$db_name.';'.PHP_EOL);
	fwrite($wh, 'source '.$template.' ;');
	fclose($wh);
}