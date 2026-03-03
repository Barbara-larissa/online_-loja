

const selectCor = document.querySelector('select[name="cor"]');
const inputImagem = document.querySelector('#inputImagem');
const inputCor = document.querySelector('#inputCor');

selectCor.addEventListener('change', function () {
    inputCor.value = this.value;

    if (this.value === "branco") {
        inputImagem.value = "./img/meias/foto1.avif";
        document.getElementById("produtoImg").src = "./img/meias/foto1.avif";
    } 
    else if (this.value === "preto") {
        inputImagem.value = "./img/meias/foto2.avif";
        document.getElementById("produtoImg").src = "./img/meias/foto2.avif";
    }
});

