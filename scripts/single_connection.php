<?php
$params = $argv;
$db_name = $params[1];

set_time_limit(0);
$config = parse_ini_file('config.ini', true);
$pdo = new PDO('mysql:host='.$config['mysql']['db_host'].';port='.$config['mysql']['db_port'].';dbname='.$db_name, $config['mysql']['db_user'], $config['mysql']['db_pass']);
$stmt = $pdo->prepare("select count(*) as total from employees");
$stmt->execute();
$res = $stmt->fetchAll();	
print_r($res);
