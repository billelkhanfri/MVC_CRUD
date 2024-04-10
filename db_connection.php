<?php
require_once(__DIR__ . '/config/mysql.php');
require_once(__DIR__ . '/db_connection.php');
try{
  $mysqlClient = new PDO(sprintf('mysql:host=%s;dbname=%s;charset=utf8',$host, $dbname), $username, $password);

    if (!$mysqlClient){
        echo 'connection failed';
    }
}
catch (Exception $e){

    die( 'Erreur : ' . $e->getMessage());

}

