<?php 
    $db_host = 'localhost';
    $db_name = 'gameden';
    $username = 'root';
    $password = '';

    try{
        $db = new PDO("mysql:dbname=$db_name;dbhost=$db_host",$username,$password);
        echo("database connected!");
    } catch(PDOException $ex){
        echo("Failed to connect to Database");
        echo($ex->getMessage());
        exit; 
    }
?>