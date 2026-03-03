<?php
session_start();
require_once ('header.php');
// Dados esperados
$pedido      = $_GET['pedido'] ?? '00000';
$nome        = $_GET['nome'] ?? 'Cliente';
$valor       = $_GET['valor'] ?? '0,00';
$metodo      = $_GET['metodo'] ?? 'PIX';
$data        = date('d/m/Y H:i');
$status      = $_GET['status'] ?? 'pendente'; // pendente | aprovado
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Comprovante de Pagamento</title>
<link rel="stylesheet" href="comprovante.css"> <!-- arquivo CSS externo -->
</head>

<body>

<div class="container-cliente">
    <h2>Comprovante de Pagamento</h2>

    <div class="status-cliente <?= $status ?>"><?= ucfirst($status) ?></div>

    <p class="linha"><strong>Nº do Pedido:</strong> <?= $pedido ?></p>
    <p class="linha"><strong>Cliente:</strong> <?= $nome ?></p>
    <p class="linha"><strong>Valor Pago:</strong> R$ <?= $valor ?></p>
    <p class="linha"><strong>Forma de Pagamento:</strong> <?= $metodo ?></p>
    <p class="linha"><strong>Data do Pagamento:</strong> <?= $data ?></p>

    <div class="btn-area">
        <button class="btn-cliente" onclick="window.print()">Imprimir / Salvar PDF</button>
        <br><br>
        <a href="produtos.php" class="btn-cliente">Voltar à Loja</a>
    </div>
</div>

</body>
</html>