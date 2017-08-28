<?php
$config = parse_ini_file('config.ini', true);

$cmd = "mysql -u".$config['mysql']['db_user']." -p".$config['mysql']['db_pass']." -h".$config['mysql']['db_host']." --port ".$config['mysql']['db_port']."
 -e \"SELECT s.schema_name FROM INFORMATION_SCHEMA.schemata AS s LEFT JOIN INFORMATION_SCHEMA.tables AS t ON t.table_schema = s.schema_name WHERE schema_name LIKE 'test_%' ORDER BY schema_name ASC;\" | grep test | awk -F \"test\" '{print \"DROP DATABASE \" $0 \";\"}'";

echo shell_exec($cmd);