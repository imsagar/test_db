<?php
$param = $argv;
$db_prefix = $argv[1];
$start = $argv[3]??1;
$end = $argv[4]??10;

set_time_limit(0);
$config = parse_ini_file('config.ini', true);

for($i=$start; $i <= $end; $i++) {
	echo "Dumping ".$db_prefix.$i.".sql".PHP_EOL;
	echo shell_exec('mysql -u'.$config['mysql']['db_user'].' -p'.$config['mysql']['db_pass'].' -h'.$config['mysql']['db_host'].' --port '.$config['mysql']['db_port'].' < '.$db_prefix.$i.'.sql');
	echo "Complete".PHP_EOL;
}