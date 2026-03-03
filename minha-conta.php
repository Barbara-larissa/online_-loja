<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
require_once('header.php');

?>
<div class="minha-conta">
    <div class="container">
        <div class="linha">
            <div class="col-2">
                <img src="./img/banner-1.png" alt="" width="100%">
            </div>
            <div class="col-2">
                <div class="formulario">

                    <!-- MENSAGENS PADRÃO -->
                    <?php
                    if (isset($_SESSION['msg'])) {
                        $classe = (isset($_SESSION['msg_tipo']) && $_SESSION['msg_tipo'] == "sucesso") ? "msg-sucesso" : "msg-erro";
                        echo "<p class='$classe'>" . $_SESSION['msg'] . "</p>";
                        unset($_SESSION['msg'], $_SESSION['msg_tipo']);
                    }
                    ?>

                    <!-- MENSAGEM: PRECISA ESTAR LOGADO -->
                    <?php
                    if (isset($_SESSION['msg_login'])) {
                        echo "<div id='msgLoginAviso' style='background:#ffecec; border:1px solid #f5a4a4; padding:12px; border-radius:5px; color:#d60000; margin-bottom:15px; font-size:16px;'>
                                " . $_SESSION['msg_login'] . "
                              </div>";

                        unset($_SESSION['msg_login']);

                        // AQUI: força abrir a aba Entrar
                        echo "
                        <script>
                            document.addEventListener('DOMContentLoaded', function () {
                                if (typeof Entrar === 'function') {
                                    Entrar();  
                                }
                                var indicador = document.getElementById('Indicador');
                                if (indicador) {
                                    indicador.style.transform = 'translateX(0px)';
                                }
                            });
                        </script>
                        ";
                    }
                    ?>

                    <div class="btn-form">
                        <span onclick="Entrar()" id="btnEntrar">Entrar</span>
                        <span onclick="Cadastro()" id="btnCadastro">Cadastro</span>
                        <hr id="Indicador">
                    </div>

                    <!-- LOGIN -->
                    <form action="login.php" method="POST" id="EntrarPainel">
                        <input type="email" name="email" placeholder="E-mail de acesso">
                        <input type="password" name="senha" placeholder="Digite sua senha">
                        <button type="submit" name="sendEntrar" class="btn">Entrar</button>
                        <p style="text-align: center; margin-top: 8px;">
                            <a href="#" onclick="EsqueceuSenha(); return false;" id="btnEsqueceuSenha" style="text-decoration: underline; color: var(--cor-padrao);">
                                Esqueceu a senha?
                            </a>
                        </p>
                    </form>

                    <!-- CADASTRO -->
                    <form action="cadastro.php" method="POST" id="CadastroSite">
                        <input type="text" name="nome" placeholder="Nome Completo" required>
                        <input type="email" name="email" placeholder="E-mail de acesso" required>
                        <input type="password" name="senha" placeholder="Digite sua senha" required>
                        <button type="submit" name="sendCad" class="btn">Cadastre-se</button>

                        <p style="text-align: center; margin-top: 12px;">
                            <a href="#"
                                onclick="Entrar(); ocultarMsgLogin(); return false;"
                                style="text-decoration: underline; color: var(--cor-padrao); font-weight: bold;">
                                Já tenho conta
                            </a>
                        </p>

                    </form>

                    <!-- FORMULÁRIO ESQUECEU SENHA -->
                    <form id="FormEsqueceuSenha" action="esqueceu-senha.php" method="POST" style="display:none;">
                        <h2>Recuperar Senha</h2>
                        <p>Digite seu e-mail e enviaremos um link para redefinir sua senha.</p>
                        <input type="email" name="email" placeholder="Digite seu e-mail" required>
                        <button type="submit" class="btn">Enviar link de recuperação</button>

                        <a href="#"
                            onclick="Entrar(); document.getElementById('FormEsqueceuSenha').style.display='none'; document.getElementById('EntrarPainel').style.display='block'; return false;"
                            style="display:block; text-align:center; margin-top:15px; text-decoration: underline; color: var(--cor-padrao); font-weight: bold;">
                            Voltar para login
                        </a>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
<?php require_once('footer-conta.php') ?>
