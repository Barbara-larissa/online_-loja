<?php
session_start();
require_once("conexao.php");

if (!isset($_POST['id_usuario']) || empty($_POST['senha'])) {
    $_SESSION['msg'] = "Preencha a nova senha.";
    $_SESSION['msg_tipo'] = "erro";
    header("Location: minha-conta.php");
    exit;
}

$id = $_POST['id_usuario'];
$senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

// Atualiza senha e remove token
$sql = $conn->prepare("UPDATE usuarios SET senha = :senha, token_recuperacao = NULL, token_expira = NULL WHERE id = :id");
$sql->bindParam(":senha", $senha);
$sql->bindParam(":id", $id);
$sql->execute();

$_SESSION['msg'] = "Senha alterada com sucesso! Faça login.";
$_SESSION['msg_tipo'] = "sucesso";
header("Location: minha-conta.php");
exit;
?>
