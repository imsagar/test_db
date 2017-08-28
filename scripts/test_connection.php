<?php
set_time_limit(0);
$config = parse_ini_file('config.ini', true);

for($i=1; $i <= $config['default']['total_db']; $i++) {
	$db_name = 'employee_db_'.$i;
	$pdo = new PDO('mysql:host='.$config['mysql']['db_host'].';port='.$config['mysql']['db_port'].';dbname='.$db_name, $config['mysql']['db_user'], $config['mysql']['db_pass']);
	$pdo = null;
}