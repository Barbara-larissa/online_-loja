// O JavaScript permanece o mesmo e é essencial
function mostrarEndereco(mostrar) {
    const campo = document.getElementById('campo-endereco');
    campo.style.display = mostrar ? 'block' : 'none';
    campo.querySelectorAll('input').forEach(input => input.required = mostrar);
}

document.getElementById('cep').addEventListener('blur', function() {
    let cep = this.value.replace(/\D/g, '');
    if (cep.length === 8) {
        fetch(`https://viacep.com.br/ws/${cep}/json/`)
        .then(response => response.json())
        .then(data => {
            if (!data.erro) {
                document.getElementById('rua').value = data.logradouro;
                document.getElementById('bairro').value = data.bairro;
                document.getElementById('cidade').value = data.localidade;
                document.getElementById('uf').value = data.uf;
            } else {
                alert('CEP não encontrado!');
            }
        })
        .catch(() => alert('Erro ao buscar CEP'));
    }
});

 
    
  function mostrarEndereco(mostrar) {
    const campo = document.getElementById('campo-endereco');
    campo.style.display = mostrar ? 'block' : 'none';
    
    // Define a obrigatoriedade dos campos de endereço
    // Isso é crucial, pois se for 'Retirar', o endereço não é necessário.
    campo.querySelectorAll('input').forEach(input => input.required = mostrar);
}

/**
 * 2. Lógica de preenchimento automático de endereço usando a API ViaCEP.
 */
document.getElementById('cep').addEventListener('blur', function() {
    let cep = this.value.replace(/\D/g, '');
    if (cep.length === 8) {
        fetch(`https://viacep.com.br/ws/${cep}/json/`)
        .then(response => response.json())
        .then(data => {
            if (!data.erro) {
                document.getElementById('rua').value = data.logradouro;
                document.getElementById('bairro').value = data.bairro;
                document.getElementById('cidade').value = data.localidade;
                document.getElementById('uf').value = data.uf;
                document.getElementById('numero').focus(); // Foca no campo 'Número'
            } else {
                alert('CEP não encontrado!');
            }
        })
        .catch(() => alert('Erro ao buscar CEP'));
    }
});

// --- FUNÇÃO MOSTRARCARTAO (CORRIGIDA) ---
// Função única que gerencia a visibilidade e obrigatoriedade dos campos do cartão e parcelas.
function mostrarCartao(tipo) {
    const card = document.getElementById("dados-cartao"); 
    const campoParcelas = document.getElementById("campo-parcelas"); 
    
    // Seleciona inputs e selects dentro do bloco de dados do cartão para controle de 'required'
    const camposCartao = card.querySelectorAll('input:not([type="radio"]), select');
    
    const isCardPayment = (tipo === 'debito' || tipo === 'credito');

    if (isCardPayment) {
        // 1. Visibilidade: Exibe o bloco de dados do cartão
        card.style.display = "block";
        
        // 2. Obrigatoriedade: Torna os campos de cartão obrigatórios
        camposCartao.forEach(input => input.required = true);

        // 3. Parcelas: Controla a visibilidade das parcelas
        if (tipo === 'credito') {
            campoParcelas.style.display = "block"; // Crédito tem parcelas
        } else { // 'debito'
            campoParcelas.style.display = "none"; // Débito não tem parcelas
        }
    } 
    else { // Tipo é 'pix'
        // 1. Visibilidade: Oculta o bloco de dados do cartão e parcelas
        card.style.display = "none";
        campoParcelas.style.display = "none";
        
        // 2. Obrigatoriedade: Remove a obrigatoriedade dos campos de cartão
        camposCartao.forEach(input => input.required = false);
    }
}