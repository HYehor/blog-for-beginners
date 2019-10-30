<?php

require_once 'config.php';

//для подключения БД берутся данные из файла config
$connection = mysqli_connect(
    $config['db']['server'],
    $config['db']['username'],
    $config['db']['password'],
    $config['db']['db_name']
);

if($connection == false){
    echo 'False connection to database!';
    echo mysqli_connect_error();
    exit();
}

define('BR', '<br>');