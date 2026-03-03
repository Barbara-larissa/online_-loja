let produtoImg = document.getElementById("produtoImg");
let miniaturas = document.getElementsByClassName("produtoMiniatura");

for (let i = 0; i < miniaturas.length; i++) {
    miniaturas[i].onclick = function () {
        produtoImg.src = miniaturas[i].src;
    };
}



