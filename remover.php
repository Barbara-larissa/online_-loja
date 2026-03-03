<?php
session_start();
$id = $_GET['id'];
unset($_SESSION['carrinho'][$id]);
header("location: carrinho.php");
exit;
?>
