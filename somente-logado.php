<?php
session_status();

// Se não estiver logado, manda para login
if (!isset($_SESSION['usuario_id'])) {
    // Salva mensagem
    $_SESSION['msg_login'] = "⚠ Você precisa estar logado para finalizar a compra.";

    // Salva a página atual para redirecionar após login
    $_SESSION['retorno_url'] = $_SERVER['REQUEST_URI'];

    header("Location: login.php");
    exit;
}

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

if(!isset($_SESSION['usuario_id'])){
    $_SESSION['msg_login'] = "⚠ Você precisa estar logado para finalizar a compra.";
    $_SESSION['retorno_url'] = $_SERVER['REQUEST_URI'];
    header("Location: login.php");
    exit;
}
?>
