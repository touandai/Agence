<?php

$host ='localhost';
$dbname ='applications';
$username ='postgres';
$password ='Zidane1010.,';

$dsn = "pgsql:host=$host;port=5433;dbname=$dbname;";

try{
    $conn = new PDO ($dsn, $username, $password);
    if($conn){
       //echo 'connexion ok';//
    }
}catch (PDOException $e){
    echo 'message erreur de connexion' .$e->getMessage();die;
}

