<?php
session_start();
$id = $_POST['id'];
$qtd = intval($_POST['quantidade']);

if ($qtd > 0) {
    $_SESSION['carrinho'][$id]['quantidade'] = $qtd;
}

header("Location: carrinho.php");
exit;

session_start();

$id = $_POST['id'];
$acao = $_POST['acao'];

if(isset($_SESSION['carrinho'][$id])) {
    if($acao == 'aumentar') {
        $_SESSION['carrinho'][$id]['quantidade'] += 1;
    } elseif($acao == 'diminuir' && $_SESSION['carrinho'][$id]['quantidade'] > 1) {
        $_SESSION['carrinho'][$id]['quantidade'] -= 1;
    }
}

header("Location: carrinho.php");
exit;
