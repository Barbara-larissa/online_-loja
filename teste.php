<?php
$host = "localhost";
$usuario = "root";
$senha = "";
$banco = "loja";

try {
    $conn = new PDO("mysql:host=$host;dbname=$banco;charset=utf8", $usuario, $senha);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Conectado com sucesso!";
} catch(PDOException $e) {
    echo "Erro na conexão: " . $e->getMessage();
}
?>
