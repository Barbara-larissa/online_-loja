<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

require_once('header.php');

// Checa se o usuário está logado
if (!isset($_SESSION['usuario_id'])) {
    $_SESSION['msg_login'] = "Você precisa estar logado para finalizar a compra.";
    header("Location: minha-conta.php?abrir=login");
    exit;
}



if (isset($_SESSION['compra_sucesso']) && $_SESSION['compra_sucesso'] === true) {
    echo "<div class='alert alert-success text-center mt-4'>
            Compra realizada com sucesso! 🎉 Obrigado pela preferência.
          </div>";
    unset($_SESSION['compra_sucesso']);
}

if (!isset($_SESSION['carrinho']) || count($_SESSION['carrinho']) == 0) {
    echo "<div class='corpo-categorias carrinho-compras'>
            <h2>Seu carrinho está vazio 🛒</h2>
            <a href='produtos.php' class='btn'>Ver produtos</a>
          </div>";
    require_once('footer.php');
    exit;
}

if (!isset($_POST['finalizar'])):
?>
    <div class="corpo-categorias carrinho-compras" style="padding:50px 0;">
        <form method="POST" action="">
            <h2 style="text-align:center;">Escolha a forma de recebimento e pagamento</h2>

            <div class="opcoes-checkout" style="display:flex; justify-content:center; gap:50px; margin:30px 0;">
                <div class="opcao-coluna">
                    <h3>🚚 Forma de Recebimento</h3>
                    <label><input type="radio" name="tipo_entrega" value="entrega" checked onclick="mostrarEndereco(true)"> Entrega (R$20 de frete)</label><br>
                    <label><input type="radio" name="tipo_entrega" value="retirar" onclick="mostrarEndereco(false)"> Retirar na loja (Grátis)</label>
                </div>

                <div class="opcao-coluna">
                    <h3>💳 Forma de Pagamento</h3>
                    <label><input type="radio" name="forma_pagamento" value="pix" checked onclick="mostrarCartao('pix')"> PIX</label><br>
                    <label><input type="radio" name="forma_pagamento" value="debito" onclick="mostrarCartao('debito')"> Cartão de Débito</label><br>
                    <label><input type="radio" name="forma_pagamento" value="credito" onclick="mostrarCartao('credito')"> Cartão de Crédito</label>
                </div>
            </div>

            <hr>

            <div id="checkout-detalhes" style="display:flex; justify-content:center; gap:40px; flex-wrap:wrap;">

                <div id="campo-endereco" style="text-align:left;">
                    <h3>Endereço de Entrega</h3>
                    <div style="display:grid; gap:10px; width:300px;">
                        <input type="text" name="cep" placeholder="CEP" required style="width:100%; padding:8px;">
                        <input type="text" name="rua" placeholder="Rua" required style="width:100%; padding:8px;">
                        <input type="text" name="numero" placeholder="Número" required style="width:100%; padding:8px;">
                        <input type="text" name="bairro" placeholder="Bairro" required style="width:100%; padding:8px;">
                        <input type="text" name="cidade" placeholder="Cidade" required style="width:100%; padding:8px;">
                        <input type="text" name="uf" placeholder="Estado" required style="width:100%; padding:8px;">
                    </div>
                </div>

                <div id="dados-cartao" style="display:none; text-align:left;">
                    <h3>Dados do Cartão</h3>
                    <div style="display:grid; gap:10px; width:300px;">
                        <input type="text" name="numero_cartao" placeholder="Número do cartão" style="width:100%; padding:8px;">
                        <input type="text" name="nome_cartao" placeholder="Nome no cartão" style="width:100%; padding:8px;">
                        <input type="month" name="validade_cartao" style="width:100%; padding:8px;">
                        <input type="text" name="cvv_cartao" placeholder="CVV" style="width:100%; padding:8px;">
                    </div>
                    <div id="campo-parcelas" style="display:none; margin-top:10px;">
                        <label>Parcelas:</label>
                        <select name="parcelas" style="width:100%; padding:8px;">
                            <option>1x sem juros</option>
                            <option>2x sem juros</option>
                            <option>3x sem juros</option>
                            <option>4x sem juros</option>
                            <option>5x sem juros</option>
                            <option>6x sem juros</option>
                        </select>
                    </div>
                </div>

            </div>

            <div style="margin-top:20px; text-align:center;">
                <button type="submit" name="finalizar" class="btn" style="padding:10px 25px;">Finalizar Compra</button>
            </div>

        </form>
    </div>

    <script>
        function mostrarEndereco(mostrar) {
            const campo = document.getElementById('campo-endereco');
            campo.style.display = mostrar ? 'block' : 'none';
            campo.querySelectorAll('input').forEach(input => input.required = mostrar);
        }

        function mostrarCartao(tipo) {
            const dados = document.getElementById('dados-cartao');
            const parcelas = document.getElementById('campo-parcelas');
            if (tipo === 'credito') {
                dados.style.display = 'block';
                parcelas.style.display = 'block';
            } else if (tipo === 'debito') {
                dados.style.display = 'block';
                parcelas.style.display = 'none';
            } else {
                dados.style.display = 'none';
                parcelas.style.display = 'none';
            }
        }
    </script>

<?php
else:
    $tipo_entrega = $_POST['tipo_entrega'];
    $frete = ($tipo_entrega === 'entrega') ? 20 : 0;
    $forma_pagamento = $_POST['forma_pagamento'];
    $parcelas = ($forma_pagamento === 'credito') ? ($_POST['parcelas'] ?? '1x') : '1x';

    $cep = $_POST['cep'] ?? '';
    $rua = $_POST['rua'] ?? '';
    $numero = $_POST['numero'] ?? '';
    $bairro = $_POST['bairro'] ?? '';
    $cidade = $_POST['cidade'] ?? '';
    $uf = $_POST['uf'] ?? '';

    $pedido = $_SESSION['carrinho'];
    $subtotal = 0;
    foreach ($pedido as $item) $subtotal += $item['preco'] * $item['quantidade'];
    $total = $subtotal + $frete;

    $id_pedido = $id_pedido ?? rand(111111, 999999);

    unset($_SESSION['carrinho']);
?>

    <div class="corpo-categorias carrinho-compras" style="padding:50px 0;">
        <h2 style="text-align:center;">Pedido gerado com sucesso! 🎉</h2>
        <h3 style="text-align:center; color:red;">Status: aguardando pagamento</h3>

        <?php if ($forma_pagamento === 'pix'): ?>
            <div style="text-align:center; margin:30px 0;">
                <p style="font-size:16px;">💰 Pagamento via PIX. Use a chave PIX: <strong>seuemail@pix.com</strong> ou escaneie o QR Code abaixo:</p>
                <img src="./img/QR.jpg" alt="QR Code PIX" style="width:230px; height:230px; margin:15px auto; display:block;">
                <p style="margin-top:10px;">Finalize o pagamento para concluir sua compra.</p>

                <a href="meus_pedidos.php" class="btn" style="padding:10px 25px; display:inline-block;">Ver meus pedidos</a>
            </div>
        <?php endif; ?>

    </div>

<?php
endif;
require_once('footer.php');
?>
