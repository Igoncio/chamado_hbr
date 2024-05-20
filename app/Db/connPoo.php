<?php

$dbHost = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "chamado_hbr";

$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

if ($db ->connect_error){
    die("Nao funfou" . $db->connect_error);

}