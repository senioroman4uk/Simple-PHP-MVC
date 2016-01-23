<?php
$config['database'] = [
    'host' => $_ENV["OPENSHIFT_MYSQL_DB_HOST"],
    'username' => $_ENV["OPENSHIFT_MYSQL_DB_USERNAME"],
    'password' => $_ENV["OPENSHIFT_MYSQL_DB_PASSWORD"],
    'database' => 'kaktus'
];