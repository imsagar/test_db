<?php
$params = $argv;
$db_name = $params[1];

$config = parse_ini_file('config.ini', true);
echo "Connecting to DB: ".$db_name.PHP_EOL;
$pdo = new PDO('mysql:host='.$config['mysql']['db_host'].';port='.$config['mysql']['db_port'].';dbname='.$db_name, $config['mysql']['db_user'], $config['mysql']['db_pass']);
$stmt = $pdo->prepare("select count(*) as total from employees");
$stmt->execute();
$res = $stmt->fetchAll();	
print_r($res);
