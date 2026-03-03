<?php require_once('header.php') ?>
<!----INICIO MINHA CONTA-->
<div class="minha-conta">
    <div class="container">
        <div class="linha">
            <div class="col-2">
                <img src="./img/banner-1.png" alt="" width="100%">
            </div>
            <div class="col-2">
                <div class="formulario">
                    <div class="btn-form">
                    </div>
                    <form action="" method="POST">
                        <input type="text" name="nome" placeholder="Seu nome completo" required>
                        <input type="email" name="email" placeholder="Seu e-mail" required>
                        <input type="text" name="assunto" placeholder="Assunto" required>
                        <textarea name="mensagem" placeholder="Digite sua mensagem" rows="5"
                            style="width:100%; height:50px; border:1px solid #ccc; border-radius:5px;" required></textarea>
                        <button type="submit" name="sendContato" class="btn">Enviar Mensagem</button>
                    </form>
                    <p><strong>WhatsApp:</strong> (00) 00000-0000</p>
                    <p><strong>E-mail:</strong> atendimento@loja.com.br</p>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<?php require_once('footer.php') ?>