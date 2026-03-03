

<?php require_once('header-loja.php'); ?>

<?php if (isset($_SESSION['nome_usuario'])): ?>
    <div class="mensagem-boasvindas">
        👋 Bem-vindo(a), <strong><?= htmlspecialchars($_SESSION['nome_usuario']); ?></strong>
         
    </div>
<?php endif; ?>

<div class="linha">
    <div class="col-2">
        <h1>Escolha um novo <br> estilo de vida!</h1>
        <p>Lorem Ipsum é simplesmente um texto fictício da indústria tipográfica e de impressão.</p>
        <br><a href="#" class="btn">Mais informações &#8594;</a>
    </div>
    <div class="col-2">
        <img src="./img/banner-1.png" alt="Banner">
    </div>
</div>

<!-- FIM TEXTO DO BANNER -->
</div>
<!-- FIM CONTAINER -->
</div>
<!-- FIM BANNER -->

<!-- INICIO CATEGORIAS EM DESTAQUE DOCEPIMENTA.COM.BR  -->
<div class="categorias">
    <div class="corpo-categorias">
        <!-- INICIO LINHA CORPO CATEGORIAS -->
        <div class="linha">
            <div class="col-3"><img src="./img/categoria-1.jpg" alt=""></div>
            <div class="col-3"><img src="./img/categoria-2.jpg" alt=""></div>
            <div class="col-3"><img src="./img/categoria-3.jpg" alt=""></div>
        </div>
        <!-- FIM LINHA CORPO CATEGORIAS -->
    </div>
    <!-- FIM  CORPO CATEGORIAS -->
</div>
<!-- FIM CATEGORIAS -->
<!-- INICIO PRODUTOS EM DESTAQUE -->
<div class="corpo-categorias">
    <h2 class="titulo">Produtos em Destaque</h2>
    <!-- INICIO LINHA DO PRODUTOS EM DESTAQUE -->
    <div class="linha">
        <!-- ITEM 1 -->
        <div class="col-4">
            <a href="ver-blazer.php" title="">
                <img src="./img/produto-1.jpg" alt="">
            </a>
            <h4>Compras Recorrentes</h4>
            <div class="classificacao">
                <ion-icon name="star"></ion-icon>
                <ion-icon name="star"></ion-icon>
                <ion-icon name="star"></ion-icon>
                <ion-icon name="star"></ion-icon>
            </div>
        </div>
        <!-- FIM ITEM 1 -->
        <!-- ITEM 2 -->
        <div class="col-4">
            <a href="ver-roupaFeminina.php" title="">
                <img src="./img/produto-2.jpg" alt="">
            </a>
            <h4>Compras Recorrentes</h4>
            <div class="classificacao">
                <ion-icon name="star"></ion-icon>
                <ion-icon name="star"></ion-icon>
                <ion-icon name="star"></ion-icon>
                <ion-icon name="star"></ion-icon>
            </div>
        </div>
        <!-- ITEM 3 -->
        <div class="col-4">
            <a href="ver-terno.php" title="">
                <img src="./img/produto-3.jpg" alt="">
            </a>
            <h4>Compras Recorrentes</h4>
            <div class="classificacao">
                <ion-icon name="star"></ion-icon>
                <ion-icon name="star"></ion-icon>
                <ion-icon name="star"></ion-icon>
                <ion-icon name="star"></ion-icon>
            </div>
        </div>
        <!-- ITEM 4 -->
        <div class="col-4">
            <a href="ver-camiseta.php" title="">
                <img src="./img/produto-4.jpg" alt="">
            </a>
            <h4>Compras Recorrentes</h4>
            <div class="classificacao">
                <ion-icon name="star"></ion-icon>
                <ion-icon name="star"></ion-icon>
                <ion-icon name="star"></ion-icon>
                <ion-icon name="star"></ion-icon>
            </div>
        </div>
    </div>
    <!-- FIM LINHA DO PRODUTOS EM DESTAQUE -->
    <h2 class="titulo">Novidades</h2>
    <!-- NOVIDADES - NOVA LINHA -->
    <div class="linha">
        <!-- ITEM 5 -->
        <div class="col-4">
            <a href="ver-rolex.php" title="">
                <img src="./img/produto-5.jpg" alt="">
            </a>
            <h4>Relógios</h4>
            <div class="classificacao">
                <ion-icon name="star"></ion-icon>
                <ion-icon name="star"></ion-icon>
                <ion-icon name="star"></ion-icon>
                <ion-icon name="star"></ion-icon>
            </div>
            <p>R$ 15,000</p>
        </div>
        <!-- ITEM 6 -->
        <div class="col-4">
            <a href="ver-tenisM.php" title="">
                <img src="./img/produto-6.jpg" alt="">
            </a>
            <h4>Tênis Masculinos</h4>
            <div class="classificacao">
                <ion-icon name="star"></ion-icon>
                <ion-icon name="star"></ion-icon>
                <ion-icon name="star"></ion-icon>
                <ion-icon name="star"></ion-icon>
            </div>
            <p>R$ 150,99</p>
        </div>
        <!-- ITEM 7 -->
        <div class="col-4">
            <a href="ver-meias.php" title="">
                <img src="./img/produto-7.jpg" alt="">
            </a>
            <h4>Meias</h4>
            <div class="classificacao">
                <ion-icon name="star"></ion-icon>
                <ion-icon name="star"></ion-icon>
                <ion-icon name="star"></ion-icon>
                <ion-icon name="star"></ion-icon>
            </div>
            <p>R$ 30,99</p>
        </div>
        <!-- ITEM 8 -->
        <div class="col-4">
            <a href="ver-roupaAcademia.php" title="">
                <img src="./img/produto-8.jpg" alt="">
            </a>
            <h4>Roupas de Academia</h4>
            <div class="classificacao">
                <ion-icon name="star"></ion-icon>
                <ion-icon name="star"></ion-icon>
                <ion-icon name="star"></ion-icon>
                <ion-icon name="star"></ion-icon>
            </div>
            <p>R$ 99,90</p>
        </div>
    </div>
    <!-- FIM LINHA NOVIDADES -->
    <!-- ABAIXO: outra linha de itens  -->
    <div class="linha">
        <div class="col-4">
            <a href="ver-fones.php" title="" id="fones">
                <img src="./img/produto-9.jpg" alt="">
            </a>
            <h4>Fones de ouvidos</h4>
            <div class="classificacao">
                <ion-icon name="star"></ion-icon>
                <ion-icon name="star"></ion-icon>
                <ion-icon name="star"></ion-icon>
                <ion-icon name="star"></ion-icon>
            </div>
            <p>R$ 199,90</p>
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
            <p>R$ 99,90</p>
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
            <p>R$ 150,00</p>
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
            <p>R$ 199,90</p>
        </div>
    </div>
    <!-- FIM LINHA (9-12) -->
</div>
<!-- FIM DO PRODUTO EM DESTAQUE -->
<!-- INICIO OFERTAS -->
<div class="ofertas">
    <div class="corpo-categorias">
        <div class="linha">
            <div class="col-2">
                <img src="./img/banner-2.png" alt="" class="oferta-img">
            </div>
            <div class="col-2">
                <p> Produtos exclusivos da Loja</p>
                <h1>Apartir de 99.90</h1>
                <small>Lorem Ipsum é simplesmente um texto fictício da indústria tipográfica e de impressão.
                    Lorem Ipsum tem sido o texto fictício</small>
                <br><br> <a href="" class="btn">Compre Agora&#8594; </a>
            </div>
        </div>
    </div>
</div>
<!-- FIM OFERTAS -->
<!-- INICIO DEPOIMENTOS -->
<div class="depoimentos">
    <div class="corpo-categorias">
        <div class="linha">
            <!-- ITEM DEPOIMENTO -->
            <div class="col-3">
                <ion-icon name="ribbon" class="depoimento-icone"></ion-icon>
                <p> Lorem Ipsum é simplesmente um texto fictício da indústria tipográfica e de impressão.</p>
                <div class="classificacao">
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                </div>
                <img src="./img/cliente-1.png" alt="">
                <h3>Barbara Larissa</h3>
            </div>
            <!-- ITEM DEPOIMENTO -->
            <div class="col-3">
                <ion-icon name="ribbon" class="depoimento-icone"></ion-icon>
                <p> Lorem Ipsum é simplesmente um texto fictício da indústria tipográfica e de impressão.</p>
                <div class="classificacao">
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                </div>
                <img src="./img/cliente-2.png" alt="">
                <h3>Jorge</h3>
            </div>
            <!-- ITEM DEPOIMENTO -->
            <div class="col-3">
                <ion-icon name="ribbon" class="depoimento-icone"></ion-icon>
                <p> Lorem Ipsum é simplesmente um texto fictício da indústria tipográfica e de impressão.</p>
                <div class="classificacao">
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                </div>
                <img src="./img/cliente-3.png" alt="">
                <h3>Beatriz</h3>
            </div>
            <!-- FIM ITEM DEPOIMENTO -->
        </div>
    </div>
</div>
<!-- FIM DEPOIMENTOS -->
<!-- INICIO MARCAS -->
<div class="marcas">
    <div class="corpo-categorias">
        <div class="linha">
            <div class="col-5">
                <img src="./img/marca-1.png" alt="">
            </div>
            <div class="col-5">
                <img src="./img/marca-2.png" alt="">
            </div>
            <div class="col-5">
                <img src="./img/marca-3.png" alt="">
            </div>
            <div class="col-5">
                <img src="./img/marca-4.png" alt="">
            </div>
            <div class="col-5">
                <img src="./img/marca-5.png" alt="">
            </div>
        </div>
    </div>
</div>
<?php require_once('footer.php') ?>
