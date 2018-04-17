<?php

$servername = "localhost";
$username = "root";
$password = "vertrigo";
$db = "igo";

//criar conexao
$con = mysqli_connect($servername, $username, $password,$db);

// testar essa merda de mysqli
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

function conectar(){
$pdo = new PDO("mysql:host=localhost;dbname=igo","root","vertrigo");


return $pdo;
}
$pdo=conectar();
?>