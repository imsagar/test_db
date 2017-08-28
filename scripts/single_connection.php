<?php
$params = $argv;
$db_name = $params[1];

set_time_limit(0);
$config = parse_ini_file('config.ini', true);
$pdo[$i] = new PDO('mysql:host='.$config['mysql']['db_host'].';port='.$config['mysql']['db_port'].';dbname='.$db_name, $config['mysql']['db_user'], $config['mysql']['db_pass']);
$stmt = $pdo[$i]->prepare("select count(*) as total_".$i." from employees");
$stmt->execute();
$res = $stmt->fetchAll();	
print_r($res);
