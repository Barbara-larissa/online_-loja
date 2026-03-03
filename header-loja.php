<?php session_start(); ?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loja Virtual</title>
    <link rel="stylesheet" href="./style.css">
</head>

<body>


    <?php

    $boasVindas = "";
    if (isset($_SESSION['nome_usuario'])) {
        $boasVindas = "Bem-vindo(a), " . $_SESSION['nome_usuario'] . "!";
    }
    ?>
    <!-- INÍCIO BANNER -->
    <div class="banner">
        <!-- INÍCIO CONTAINER -->
        <div class="container">
            <!-- INÍCIO DA NAVEGAÇÃO -->
            <div class="navebar">
                <div class="logo">
                </div>
                <nav>
                    <ul id="MenuItens">
                        <li><a href="loja_virtual.php">Início</a></li>
                        <li><a href="produtos.php">Produtos</a></li>
                        <li><a href="empresa.php">Empresa</a></li>
                        <li><a href="contato.php">Contatos</a></li>

                        <!-- Sempre aparece -->


                        <!-- Só aparece quando está logado -->
                        <?php if (isset($_SESSION['nome_usuario']) && !empty($_SESSION['nome_usuario'])): ?>
                            <li><a href="meus_pedidos.php">Meus Pedidos</a></li>
                            <li><a href="logout.php">Sair</a></li>

                            <!-- Se NÃO estiver logado -->
                        <?php else: ?>
                            <li><a href="login.php">Entrar</a></li>
                        <?php endif; ?>
                    </ul>
                </nav>
                <a href="carrinho.php" title="">
                    <img src="./img/carrinho.png" alt="Carrinho" width="30" height="30">
                </a>
                <img src="./img/menu.png" alt="" class="menu-celular" onclick="menucelular()">
            </div>
        
        <!-- FIM DA NAVEGAÇÃO -->
  
