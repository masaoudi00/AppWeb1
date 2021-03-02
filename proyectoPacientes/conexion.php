<?php

$dsn='mysql:host=localhost;dbname=mouhcine';
$user="root";
$password="";


try {
    $connection = new PDO($dsn, $user, $password);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $message) {
   echo "something is wrong ....".$message;
}