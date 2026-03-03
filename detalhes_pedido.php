<?php
session_start();
require_once('conexao.php');
require_once('header.php');

// Usuário precisa estar logado
if (!isset($_SESSION['id_usuario'])) {
    echo "<div class='alert alert-warning text-center mt-4'>
            Você precisa estar logado para ver os detalhes do pedido.
          </div>";
    require_once('footer.php');
    exit;
}

$id_pedido = $_GET['id'];
$id_usuario = $_SESSION['id_usuario'];

// Buscar pedido
$stmt = $conn->prepare("SELECT * FROM pedidos WHERE id = :id AND id_usuario = :uid");
$stmt->bindParam(':id', $id_pedido);
$stmt->bindParam(':uid', $id_usuario);
$stmt->execute();
$pedido = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$pedido) {
    echo "<div class='alert alert-danger text-center mt-4'>
            Pedido não encontrado.
          </div>";
    require_once('footer.php');
    exit;
}

// Converter itens JSON
$itens = json_decode($pedido['itens'], true);
?>

<div class="corpo-categorias carrinho-compras" style="padding:40px; max-width:900px; margin:0 auto;">
    <h2 style="text-align:center;">🧾 Detalhes do Pedido #<?= $pedido['id']; ?></h2>
    <h3 style="text-align:center; color:<?= $pedido['status'] == 'pago' ? 'green' : 'orange'; ?>">
        STATUS: <?= strtoupper($pedido['status']); ?>
    </h3>
    <br>

    <h3>📦 Itens do Pedido</h3>
    <table style="width:100%; border-collapse:collapse; margin-bottom:20px;">
        <tr style="background:#f3f3f3; font-weight:bold;">
            <td style="padding:10px;">Produto</td>
            <td style="padding:10px;">Qtd</td>
            <td style="padding:10px;">Preço</td>
            <td style="padding:10px;">Subtotal</td>
        </tr>

        <?php foreach ($itens as $item): ?>
            <tr style="border-bottom:1px solid #ddd;">
                <td style="padding:10px;"><?= $item['nome']; ?></td>
                <td style="padding:10px;"><?= $item['quantidade']; ?></td>
                <td style="padding:10px;">R$ <?= number_format($item['preco'], 2, ',', '.'); ?></td>
                <td style="padding:10px;">R$ <?= number_format($item['preco'] * $item['quantidade'], 2, ',', '.'); ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <h3>🚚 Entrega</h3>
    <p><strong>Tipo:</strong> <?= $pedido['tipo_entrega'] == 'entrega' ? 'Entrega no Endereço' : 'Retirada na Loja'; ?></p>
    <?php if ($pedido['tipo_entrega'] == 'entrega'): ?>
        <p><strong>Endereço:</strong> <?= $pedido['endereco']; ?></p>
    <?php endif; ?>

    <h3>💳 Pagamento</h3>
    <p><strong>Forma:</strong> <?= strtoupper($pedido['forma_pagamento']); ?></p>

    <h3>💰 Valores</h3>
    <p style="font-size:20px;">
        <strong>Total Pago:</strong> R$ <?= number_format($pedido['valor_total'], 2, ',', '.'); ?>
    </p>

    <br><br>

    <!-- BOTÕES -->
    <?php if ($pedido['status'] !== 'pago' && $pedido['forma_pagamento'] == 'pix'): ?>
        <a href="confirmar_pagamento.php?id=<?= $pedido['id']; ?>" class="btn" style="background:green;">
            Confirmar pagamento manualmente ✔
        </a>
        <br><br>
    <?php endif; ?>

    <a href="meus_pedidos.php" class="btn">Voltar</a>
</div>

<?php require_once('footer.php'); ?>
