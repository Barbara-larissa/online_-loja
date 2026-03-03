<?php
session_start();
$id = $_GET['id'];
if (isset($_SESSION['carrinho'][$id])) {
    $_SESSION['carrinho'][$id]['quantidade']++;
}
header("Location: carrinho.php");
