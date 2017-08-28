<?php
set_time_limit(0);
$config = parse_ini_file('config.ini', true);

$cmd = "mysql -u".$config['mysql']['db_user']." -p".$config['mysql']['db_pass']." -h".$config['mysql']['db_host']." --port ".$config['mysql']['db_port']." -e \"SELECT s.schema_name FROM INFORMATION_SCHEMA.schemata AS s LEFT JOIN INFORMATION_SCHEMA.tables AS t ON t.table_schema = s.schema_name WHERE schema_name LIKE 'employee_db_%' ORDER BY schema_name ASC;\" | grep employee_db_ | awk -F \"employee_db_\" '{print \"DROP DATABASE \" $0 \";\"}'";

$sql_cmd = shell_exec($cmd);
$sql_cmd .= "mysql -u".$config['mysql']['db_user']." -p".$config['mysql']['db_pass']." -h".$config['mysql']['db_host']." --port ".$config['mysql']['db_port']." -e '".str_replace(PHP_EOL, " ", $sql_cmd)."'";

shell_exec($sql_cmd);