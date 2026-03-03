 <?php require_once('header.php') ?>
 <div class="corpo-categorias ver-produto">
        <div class="linha">
            <div class="col-2">
                <img src="./img/relogiodigital/relogio-1.png" alt="" id="produtoImg">
                <!--INICIO LINHA da  GALERIA-->
                <div class="img-linha">
                    <!--INICIO ITEM GALERIA-->
                    <div class="img-col">
                        <img src="./img/relogiodigital/relogio-1.png" alt="" width="100%" class="produtoMiniatura">
                    </div>
                    <!--FIM ITEM GALERIA-->
                    <!--INICIO ITEM GALERIA-->
                    <div class="img-col">
                        <img src="./img/relogiodigital/relogio-2.jpg" alt="" width="100%" class="produtoMiniatura">
                    </div>
                    <!--FIM ITEM GALERIA-->
                    <!--INICIO ITEM GALERIA-->
                    <div class="img-col">
                        <img src="./img/relogiodigital/relogiorosa.jpg" alt="" width="100%" class="produtoMiniatura">
                    </div>
                    <!--FIM ITEM GALERIA-->
                </div>
                <!--FIM  LINHA GALERIA-->
            </div>
            <div class="col-2">
                <h1>relógio Digital</h1>
                <h4>R$ 29,90</h4>
                   <form action="adicionar.php" method="POST">

                <input type="hidden" name="id_produto" value="relogio_digital_02">
                <input type="hidden" name="nome" value="Relogio Digital">
                <input type="hidden" name="preco" value="29">
                <input type="hidden" name="imagem" value="./img/relogiodigital/relogio-1.png">

                <select name="cor" required>
                    <option value="">Selecione a cor</option>
                    <option value="preto">Preto</option>
                    <option value="verde">Verde</option>
                    <option value="rosa">Rosa</option>
                </select>

                <input type="number" name="quantidade" value="1" min="1" required>

                <button type="submit" class="btn">Adicionar ao carrinho</button>
            </form>
                <h3>Descrição:</h3>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                    industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type
                    and scrambled it to make a type specimen book. It has survived not only five centuries, but also the
                    leap into electronic typesetting, remaining essentially unchanged.</p>
            </div>
        </div>
    </div>
    <!--FIM PRODUTOS DETALHE-->
    <!-- INICIO PRODUTOS EM DESTAQUE -->
    <div class="corpo-categorias">
        <div class="linha linha2">
            <h2>Produtos Relacionados</h2>
            <p>Veja Mais </p>
        </div>
        <!-- INICIO LINHA DO PRODUTOS EM DESTAQUE -->
        <div class="linha">
            <!-- ABAIXO: outra linha de itens  -->
            <div class="linha">
                <div class="col-4">
                    <a href="ver-fones.php" title="">
                        <img src="./img/produto-9.jpg" alt="">
                    </a>
                    <h4>Fones de ouvidos</h4>
                    <div class="classificacao">
                        <ion-icon name="star"></ion-icon>
                        <ion-icon name="star"></ion-icon>
                        <ion-icon name="star"></ion-icon>
                        <ion-icon name="star"></ion-icon>
                    </div>
                </div>
                <div class="col-4">
                    <a href="ver-relogio.php" title="">
                        <img src="./img/produto-10.jpg" alt="">
                    </a>
                    <h4>Relógio Digital</h4>
                    <div class="classificacao">
                        <ion-icon name="star"></ion-icon>
                        <ion-icon name="star"></ion-icon>
                        <ion-icon name="star"></ion-icon>
                        <ion-icon name="star"></ion-icon>
                    </div>
                </div>
                <div class="col-4">
                    <a href="ver-tenisf.php" title="">
                        <img src="./img/produto-11.jpg" alt="">
                    </a>
                    <h4>Tênis Feminino</h4>
                    <div class="classificacao">
                        <ion-icon name="star"></ion-icon>
                        <ion-icon name="star"></ion-icon>
                        <ion-icon name="star"></ion-icon>
                        <ion-icon name="star"></ion-icon>
                    </div>
                </div>
                <div class="col-4">
                    <a href="ver-leggin.php" title="">
                        <img src="./img/produto-12.jpg" alt="">
                    </a>
                    <h4>Leggings</h4>
                    <div class="classificacao">
                        <ion-icon name="star"></ion-icon>
                        <ion-icon name="star"></ion-icon>
                        <ion-icon name="star"></ion-icon>
                        <ion-icon name="star"></ion-icon>
                    </div>
                </div>
                <!-- FIM ITEM DO PRODUTOS EM DESTAQUE -->
            </div>
            <!-- FIM LINHA DO CORPO -->
        </div>
    </div>

<script>
const selectCor = document.querySelector('select[name="cor"]');
const inputImagem = document.querySelector('input[name="imagem"]');

selectCor.addEventListener('change', function () {
    if (this.value === "preto") {
        inputImagem.value = "./img/relogiodigital/relogio-1.png";
    } else if (this.value === "verde") {
        inputImagem.value = "./img/relogiodigital/relogio-2.jpg";
    } else if (this.value === "rosa") {
        inputImagem.value = "./img/relogiodigital/relogiorosa.jpg";
    }
});
</script>

    <?php require_once('footer.php') ?>