<?php
session_start();
require_once('conexao.php'); // deve definir $pdo

if (!isset($_GET['token'])) {
    die("Token inválido.");
}

$token = $_GET['token'];

// VERIFICAR TOKEN
$stmt = $pdo->prepare("SELECT * FROM usuarios WHERE token = :token");
$stmt->bindValue(':token', $token, PDO::PARAM_STR); // ✅ PDO correto
$stmt->execute();


$usuario = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$usuario) {
    die("Token inválido ou expirado.");
}

// ATUALIZAR A SENHA
if (isset($_POST['updatePassword'])) {
    $nova_senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

    $stmtUpdate = $pdo->prepare("UPDATE usuarios SET senha = :senha, token = NULL WHERE token = :token");
    $stmtUpdate->bindValue(':senha', $nova_senha, PDO::PARAM_STR);
    $stmtUpdate->bindValue(':token', $token, PDO::PARAM_STR);

    if ($stmtUpdate->execute()) {
        $_SESSION['msg'] = "<p class='msg-sucesso'>Senha redefinida com sucesso! Faça login com a nova senha.</p>";
        header("Location: login.php");
        exit();
    } else {
        $erro = "Erro ao atualizar senha. Tente novamente.";
    }
}

require_once('header.php');
?>
