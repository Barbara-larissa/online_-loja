var MenuItens = document.getElementById("MenuItens");

MenuItens.style.maxHeight = "0px";
function menucelular() {
    if (MenuItens.style.maxHeight == "0px") {
        MenuItens.style.maxHeight = "200px";
    } else {
        MenuItens.style.maxHeight = "0px";
    }
}

const btnEntrar = document.getElementById("btnEntrar");
const btnCadastro = document.getElementById("btnCadastro");
const EntrarPainel = document.getElementById("EntrarPainel");
const CadastroSite = document.getElementById("CadastroSite");
const Indicador = document.getElementById("Indicador");
const FormEsqueceuSenha = document.getElementById("FormEsqueceuSenha");

// Inicializa mostrando login
EntrarPainel.classList.add("active");

function Cadastro() {
    CadastroSite.style.transform = "translateX(0px)";
    EntrarPainel.style.transform = "translateX(0px)";
    Indicador.style.transform = "translateX(100px)";
}

function Entrar() {
    CadastroSite.style.transform = "translateX(300px)";
    EntrarPainel.style.transform = "translateX(300px)";
    Indicador.style.transform = "translateX(0px)";
}

function EsqueceuSenha() {
    EntrarPainel.style.display = "none";
    CadastroSite.style.display = "none";
    FormEsqueceuSenha.style.display = "block";
    Indicador.style.transform = "translateX(0px)";
}

/* 🔥 Função que remove a mensagem de "precisa estar logado" */
function ocultarMsgLogin() {
    // Remove qualquer mensagem exibida no topo
    let msg1 = document.querySelector("p.msg-erro, p.msg-sucesso");
    let msg2 = document.querySelector("div[style*='background:#ffecec']");

    if (msg1) msg1.style.display = "none";
    if (msg2) msg2.style.display = "none";
}