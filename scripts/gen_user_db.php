<?php
$params = $argv;
$template = $argv[1];

$config = parse_ini_file('config.ini', true);

for($i=1; $i <= $config['default']['total_db']; $i++) {
	$db_name = 'unicourt_'.$i;
	$wh = fopen($db_name.'.sql', 'w');
	fwrite($wh, 'DROP DATABASE IF EXISTS '.$db_name.';'.PHP_EOL);
	fwrite($wh, 'CREATE DATABASE IF NOT EXISTS '.$db_name.';'.PHP_EOL);
	fwrite($wh, 'USE '.$db_name.';'.PHP_EOL);
	fwrite($wh, 'source '.$template.' ;');
	fclose($wh);
}