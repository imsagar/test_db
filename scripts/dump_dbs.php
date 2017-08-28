<?php
$db_details = parse_ini_file('database.ini', true);

for($i=1; $i <= 3; $i++) {
	echo shell_exec('mysql -u'.$db_details['mysql']['db_user'].' -p'.$db_details['mysql']['db_pass'].' -h'.$db_details['mysql']['db_host'].' --port '.$db_details['mysql']['db_pass'].' < employee_db_'.$i.'.sql');
}