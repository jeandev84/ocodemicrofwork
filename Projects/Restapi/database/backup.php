<?php

$pdo = require_once __DIR__ . '/connect/pdo.php';

/*
$tableName = 'posts';
$backupFile = __DIR__.'/storage/ocode_micro_framework.sql';

$sql = sprintf('SELECT * INTO OUTFILE %s FROM %s', $backupFile, $tableName);

try {

    if($pdo->prepare($sql)->execute())
    {
        echo "table users backup successfully!\n";
    }

} catch (Exception $e){
    die($e->getMessage());
}
*/

/*
Dump all database
exec(sprintf('mysqldump -u root -h localhost -p --all-databases > ./database/dumps/ocode_micro_framework.sql'));
*/

# Resources : https://www.jotform.com/blog/how-to-backup-mysql-database/

# cli: php database/backup.php
$database = 'ocode_restapi';
$path = './database/dumps/ocode_restapi.sql';

shell_exec('mysqldump -u root -h localhost -p ocode_restapi > ./database/dumps/ocode_restapi.sql');

