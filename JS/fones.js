
const selectCor = document.querySelector('select[name="cor"]');
const inputImagem = document.querySelector('input[name="imagem"]');
const inputID = document.querySelector('input[name="id_produto"]');
const produtoImg = document.getElementById('produtoImg');

selectCor.addEventListener('change', function () {
    if (this.value === "preto") {
        inputImagem.value = "./img/fonesdeouvido/fonepreto.jpg";
        inputID.value = "fones_02_preto";
        produtoImg.src = "./img/fonesdeouvido/fonepreto.jpg";
    } else if (this.value === "azul") {
        inputImagem.value = "./img/fonesdeouvido/foneazull.png";
        inputID.value = "fones_02_azul";
        produtoImg.src = "./img/fonesdeouvido/foneazull.png";
    } else if (this.value === "rosa") {
        inputImagem.value = "./img/fonesdeouvido/fone1.jpg";
        inputID.value = "fones_02_rosa";
        produtoImg.src = "./img/fonesdeouvido/fone1.jpg";
    }
});