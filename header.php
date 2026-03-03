
<?php
// Inicia sessão somente se ainda não existir (evita Notice de session_start duplicado)
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Compatibilidade: pega o nome que o login possa ter gravado
$userName = $_SESSION['usuario_nome'] ?? $_SESSION['nome_usuario'] ?? null;
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Loja Virtual</title>
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</head>
<body>


<div class="banner">
    <div class="container">
        <div class="navebar"> <!-- note: seu código original usava 'navebar' -->
          

            <nav>
                <ul id="MenuItens">
                    <li><a href="loja_virtual.php">Início</a></li>
                    <li><a href="produtos.php">Produtos</a></li>
                    <li><a href="empresa.php">Empresa</a></li>
                    <li><a href="contato.php">Contatos</a></li>
                    

                    <!-- Sempre aparece (conforme seu layout) -->
                    

                    <!-- Itens que dependem de login -->
                    <?php if (!empty($userName)): ?>
                        <li><a href="meus_pedidos.php">Meus Pedidos</a></li>
                        <li><a href="logout.php" style="color: #fff6f5ff;">Sair</a></li>
                    <?php else: ?>
                        <li><a href="login.php">Entrar</a></li>
                    <?php endif; ?>
                </ul>
            </nav>

            <a href="carrinho.php" title="Carrinho">
                <img src="./img/carrinho.png" alt="Carrinho" width="30" height="30">
            </a>

            <img src="./img/menu.png" alt="menu" class="menu-celular" onclick="menucelular()">
        </div>

  
    </div>
</div>


