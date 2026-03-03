<?php
session_start();
require_once('header.php');

// Se o carrinho estiver vazio
if (!isset($_SESSION['carrinho']) || count($_SESSION['carrinho']) == 0) {
    echo "<div class='corpo-categorias carrinho-compras'>
            <h2>Seu carrinho está vazio 🛒</h2><br>
            <a href='produtos.php' class='btn'>Ver produtos</a>
          </div>";
    require_once('footer.php');
    exit;
}

// Calcular totals
$subtotal = 0;
foreach ($_SESSION['carrinho'] as $item) {
    $subtotal += $item['preco'] * $item['quantidade'];
}
$frete = 20;
$total = $subtotal + $frete;
?>

<div class="corpo-categorias carrinho-compras">

    <!-- TABELA DO CARRINHO -->
    <table>
        <tr>
            <th>Produto</th>
            <th>Quantidade</th>
            <th>Valor</th>
        </tr>

        <?php foreach ($_SESSION['carrinho'] as $id => $item): ?>
            <tr>
                <td>
                    <div class="info-carrinho">
                        <img src="<?= $item['imagem'] ?>" alt="<?= $item['nome'] ?>">
                        <div>
                            <p><?= $item['nome'] ?></p>
                            <small>Valor: R$ <?= number_format($item['preco'], 2, ',', '.') ?></small><br>
                            <small>Tamanho: <?= $item['tamanho'] ?></small><br>
                            <small>Cor: <?= $item['cor'] ?></small><br>
                            <a href="remover.php?id=<?= $id ?>">Remover</a>
                        </div>
                    </div>
                </td>

                <td>
                    <form action="atualizar.php" method="POST" style="display:flex; align-items:center; gap:5px;">
                        <input type="hidden" name="id" value="<?= $id ?>">
                        <input type="number" name="quantidade" value="<?= $item['quantidade'] ?>" min="1">
                        <button type="submit" class="btn-atualizar">Atualizar</button>
                    </form>
                </td>

                <td>
                    R$ <?= number_format($item['preco'] * $item['quantidade'], 2, ',', '.') ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    <!-- VALOR TOTAL -->
    <div class="valor-total">
        <table>
            <tr>
                <td>Sub-Total</td>
                <td>R$ <?= number_format($subtotal, 2, ',', '.') ?></td>
            </tr>
            <tr>
                <td>Frete</td>
                <td>R$ <?= number_format($frete, 2, ',', '.') ?></td>
            </tr>
            <tr>
                <td>Total</td>
                <td>R$ <?= number_format($total, 2, ',', '.') ?></td>
            </tr>
        </table>


    </div>
    <div class="botoes-carrinho">
        <a href="produtos.php" class="btn-finalizar">Continuar comprando</a>
        <a href="finaliza-compra.php" class="btn-finalizar">Finalizar Compra</a>

    </div>

</div>

<?php require_once('footer.php'); ?>