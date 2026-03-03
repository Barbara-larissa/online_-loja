<?php
session_start();

if (!isset($_SESSION['carrinho'])) {
    $_SESSION['carrinho'] = [];
}

$id_produto = $_POST['id_produto'];
$nome = $_POST['nome'];
$preco = $_POST['preco'];
$tamanho = $_POST['tamanho'];
$quantidade = $_POST['quantidade'];
$imagem = $_POST['imagem'];
$cor = $_POST['cor'] ?? ''; // aceita produto sem cor

$chave = $id_produto . '-' . $tamanho . '-' . $cor;

// se já existir no carrinho, aumenta a quantidade
if (isset($_SESSION['carrinho'][$chave])) {
    $_SESSION['carrinho'][$chave]['quantidade'] += $quantidade;
} else {
    $_SESSION['carrinho'][$chave] = [
        'id_produto' => $id_produto,
        'nome' => $nome,
        'preco' => $preco,
        'cor' => $cor,
        'tamanho' => $tamanho,
        'quantidade' => $quantidade,
        'imagem' => $imagem
    ];
}

header("location: carrinho.php");
exit;
