<?php
require 'enviroment.php';

if(ENVIROMENT == 'development'){
    define("BASE_URL", "http://localhost/projetoEnfermagem/");
    $config['dbname'] = "projetoEnfermagem";
    $config['host'] = "localhost";
    $config['dbuser'] = "root";
    $config['dbpass'] = "";
}else{
    $config['dbname'] = "";
    $config['host'] = "";
    $config['dbuser'] = "";
    $config['dbpass'] = "";
}

global $db;
try{
    $db = new PDO("mysql:dbname=".$config['dbname'].";host=".$config['host'], $config['dbuser'], $config['dbpass']);
}catch(PDOException $e){
    echo "Error: ".$e->getMessage();
    exit;
}
?>