<?php
set_time_limit(0);
$config = parse_ini_file('config.ini', true);

for($i=1; $i <= $config['default']['total_db']; $i++) {
	echo "Dumping employee_db_".$i.".sql".PHP_EOL;
	echo shell_exec('mysql -u'.$config['mysql']['db_user'].' -p'.$config['mysql']['db_pass'].' -h'.$config['mysql']['db_host'].' --port '.$config['mysql']['db_port'].' < employee_db_'.$i.'.sql');
	echo "Complete".PHP_EOL;
}