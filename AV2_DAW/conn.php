<?php

$servidor = "localhost";
$usuario = "root";
$senha = "";
$database = "AV2_DAW";

// Conexão de banco de dados por PDO
try {
    $conn = new PDO("mysql:host=$servidor;dbname=$database", $usuario, $senha);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch(PDOException $e) {
    echo "Conexão falhou: " . $e->getMessage();
}




?>