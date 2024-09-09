<?php

$servidor = "localhost";
$bd = "colegio";
$username = "root";
$password = "";

try {
    $conexion = new PDO("mysql:host=$servidor;dbname=$bd", $username, $password);
} catch (Exception $e) {
    echo $e->getMessage();
}
