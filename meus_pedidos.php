<?php


require_once('conexao.php');
require_once('header.php');

// Usuário precisa estar logado
if (empty($_SESSION['usuario_id'])) {
    $_SESSION['msg'] = "Você precisa estar logado para acessar seus pedidos.";
    $_SESSION['msg_tipo'] = "erro";
    header("Location: minha-conta.php?abrir=login");
    exit;
}

$id_usuario = $_SESSION['usuario_id'];

// Buscar pedidos do usuário
$stmt = $conn->prepare("SELECT * FROM pedidos WHERE id_usuario = :id ORDER BY id DESC");
$stmt->bindParam(':id', $id_usuario);
$stmt->execute();
$pedidos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="corpo-categorias carrinho-compras" style="padding:40px;">
    <h2 style="text-align:center; margin-bottom:25px;">📦 Meus Pedidos</h2>

    <?php if (count($pedidos) == 0): ?>
       <div class="alert alert-info" style="text-align:center; margin:0 auto; width:100%; font-size:18px; padding:20px;">
            Você ainda não realizou nenhum pedido.
        </div>
    <?php else: ?>
        <table style="width:100%; border-collapse:collapse; text-align:center;">
            <tr style="background:#f3f3f3; font-weight:bold;">
                <td style="padding:12px;">ID Pedido</td>
                <td style="padding:12px;">Total</td>
                <td style="padding:12px;">Forma de Pagamento</td>
                <td style="padding:12px;">Status</td>
                <td style="padding:12px;">Data</td>
                <td style="padding:12px;">Ação</td>
            </tr>

            <?php foreach ($pedidos as $p): ?>
                <tr style="border-bottom:1px solid #ddd;">
                    <td style="padding:10px;"><?= $p['id']; ?></td>
                    <td style="padding:10px;">R$ <?= number_format($p['total'], 2, ',', '.'); ?></td>
                    <td style="padding:10px;"><?= strtoupper($p['forma_pagamento']); ?></td>
                    <td style="padding:10px;
                               font-weight:bold;
                               color:<?= $p['status'] == 'pago' ? 'green' : ($p['status'] == 'aguardando pagamento' ? 'orange' : 'red'); ?>">
                        <?= $p['status']; ?>
                    </td>
                    <td style="padding:10px;"><?= date('d/m/Y H:i', strtotime($p['data'])); ?></td>
                    <td style="padding:10px;">
                        <a href="detalhes_pedido.php?id=<?= $p['id']; ?>" class="btn btn-primary">Ver</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>

</div>

<?php require_once('footer.php'); ?>
<style>
   
   
</style>