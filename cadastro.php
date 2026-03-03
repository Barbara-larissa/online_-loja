<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
require_once __DIR__ . '/DAO/UsuarioDAO.php';

if (isset($_POST['sendCad']) || isset($_POST['btnfinalizar'])) {
    $nome = $_POST['nome'] ?? '';
    $email = $_POST['email'] ?? '';
    $senha = $_POST['senha'] ?? '';
    $rsenha = $_POST['rsenha'] ?? null;

    $dao = new UsuarioDAO();
    $ret = $dao->CriarCadastro($nome, $email, $senha, $rsenha);

    $_SESSION['msg'] = $ret['msg'];
    $_SESSION['msg_tipo'] = $ret['ok'] ? 'sucesso' : 'erro';
    header("Location: minha-conta.php?abrir=cadastro");
    exit;
}

$_SESSION['msg'] = "Requisição inválida.";
$_SESSION['msg_tipo'] = "erro";
header("Location: minha-conta.php?abrir=cadastro");
exit;
