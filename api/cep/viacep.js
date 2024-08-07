'use strict';

const limparFormulario = () => {
    document.getElementById('endereco').value = '';
    document.getElementById('bairro').value = '';
    document.getElementById('cidade').value = '';
    document.getElementById('uf').value = '';
}

const preencherFormulario = (endereco) => {
    document.getElementById('endereco').value = endereco.logradouro;
    document.getElementById('bairro').value = endereco.bairro;
    document.getElementById('cidade').value = endereco.localidade;
    document.getElementById('uf').value = endereco.uf;
}

const eNumero = (numero) => /^\d+$/.test(numero);
const cepValido = (cep) => cep.length == 8 && eNumero(cep);

const pesquisarCep = async () => {
    limparFormulario();
    
    const cep = document.getElementById('cep').value;
    const url = `https://viacep.com.br/ws/${cep}/json`;

    if (cepValido(cep)) {
        const dados = await fetch(url);
        const endereco = await dados.json();

        if (endereco.hasOwnProperty('erro')) {
            document.getElementById('cep').value = 'CEP não encontrado!';
        } else {
            preencherFormulario(endereco);
        }
    } else {
        document.getElementById('cep').value = 'CEP incorreto!';
    }
}

document.getElementById('cep').addEventListener('focusout', pesquisarCep);