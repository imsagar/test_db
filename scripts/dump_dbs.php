<?php
$db_details = parse_ini_file('database.ini');

for($i=1; $i <= 3; $i++) {
	echo shell_exec('mysql -u'.$db_details['mysql']['db_user'].' -p'.$db_details['mysql']['db_pass'].' -h'.$db_details['mysql']['db_host'].' --port '.$db_details['mysql']['db_pass'].' < employees_'.$i.'.sql');
}