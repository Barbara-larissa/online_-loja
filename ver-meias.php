<?php require_once('header.php') ?>

<div class="corpo-categorias ver-produto">
    <div class="linha">

        <div class="col-2">
            <img src="./img/meias/foto1.avif" alt="" id="produtoImg">

            <!-- INICIO LINHA GALERIA -->
            <div class="img-linha">
                <div class="img-col">
                    <img src="./img/meias/foto1.avif" alt="" width="100%" class="produtoMiniatura">
                </div>
                <div class="img-col">
                    <img src="./img/meias/foto2.avif" alt="" width="100%" class="produtoMiniatura">
                </div>
                <div class="img-col">
                    <img src="" alt="" width="100%" class="produtoMiniatura">
                </div>
            </div>
            <!-- FIM LINHA GALERIA -->
        </div>

        <div class="col-2">
            <p>Tamanho único</p>
            <h1>Meias</h1>
            <h4>R$ 15,90</h4>

            <form action="adicionar.php" method="POST">
                <input type="hidden" name="id_produto" value="meias01">
                <input type="hidden" name="nome" value="Meia esportiva">
                <input type="hidden" name="preco" value="15">

                <!-- imagem atual -->
                <input type="hidden" name="imagem" id="inputImagem" value="./img/meias/foto1.avif">

                <!-- cor atual -->
                <input type="hidden" name="cor" id="inputCor">

                <select name="corSelecionada" id="corSelect" required>
                    <option value="">Selecione a cor</option>
                    <option value="branco">Branco</option>
                    <option value="preto">Preto</option>
                </select>

                <input type="number" name="quantidade" value="1" min="1" required>
                <button type="submit" class="btn">Adicionar ao carrinho</button>
            </form>

            <h3>Descrição:</h3>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                industry's standard dummy text ever since the 1500s...</p>
        </div>

    </div>
</div>
<!-- FIM PRODUTOS DETALHE -->

<script>
// troca miniaturas
document.querySelectorAll('.produtoMiniatura').forEach(img => {
    img.addEventListener('click', function () {
        document.getElementById('produtoImg').src = this.src;
        document.getElementById('inputImagem').value = this.src;
    });
});

// troca imagem pela cor
const corSelect = document.getElementById('corSelect');
const inputImagem = document.getElementById('inputImagem');
const inputCor = document.getElementById('inputCor');

corSelect.addEventListener('change', function () {
    inputCor.value = this.value;

    if (this.value === "branco") {
        inputImagem.value = "./img/meias/foto1.avif";
        document.getElementById("produtoImg").src = "./img/meias/foto1.avif";
    } else if (this.value === "preto") {
        inputImagem.value = "./img/meias/foto2.avif";
        document.getElementById("produtoImg").src = "./img/meias/foto2.avif";
    }
});
</script>

<?php require_once('footer.php') ?>
