<?php
session_start();
require_once("conexao.php");

if (!isset($_POST['email']) || empty($_POST['email'])) {
    $_SESSION['msg'] = "Informe o e-mail.";
    $_SESSION['msg_tipo'] = "erro";
    header("Location: minha-conta.php");
    exit;
}

$email = $_POST['email'];

// Verifica se o e-mail existe
$stmt = $conn->prepare("SELECT id FROM usuarios WHERE email = :email LIMIT 1");
$stmt->bindParam(":email", $email);
$stmt->execute();

if ($stmt->rowCount() == 0) {
    $_SESSION['msg'] = "E-mail não encontrado!";
    $_SESSION['msg_tipo'] = "erro";
    header("Location: minha-conta.php");
    exit;
}

$usuario = $stmt->fetch(PDO::FETCH_ASSOC);
$id = $usuario['id'];

// Criar token
$token = bin2hex(random_bytes(32));
$expira = date('Y-m-d H:i:s', strtotime('+1 hour'));

// Salvar token
$stmt = $conn->prepare("UPDATE usuarios SET token_recuperacao = :token, token_expira = :expira WHERE id = :id");
$stmt->bindParam(":token", $token);
$stmt->bindParam(":expira", $expira);
$stmt->bindParam(":id", $id);
$stmt->execute();

// Link que será enviado

// Link que será enviado
$link = "http://localhost/loja_virtual/recuperar-senha.php?token=$token";
// depois você usa o $link dentro do envio do e-mail

// Agora, mensagem para tela SEM mostrar o link
$_SESSION['msg'] = "Link de recuperação enviado! Verifique seu e-mail 📩";
$_SESSION['msg_tipo'] = "sucesso";
header("Location: minha-conta.php");
exit;






?>
