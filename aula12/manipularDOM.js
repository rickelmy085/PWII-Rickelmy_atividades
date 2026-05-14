//O JS precisa criar os "radares" para encontrar os elementos do HTML
let botao = document.getElementById("btn-registrar");

//Radares dos campos onde o usuário digita
let campoNome = document.getElementById("input-nome");
let campoLinguagem = document.getElementById("input-linguagem");

//Radares das tags no cartão onde o texto vai aparecer depois
let spanNome = document.getElementById("cartao-nome");
let spanLinguagem = document.getElementById("cartao-linguagem");

//Colocamos o "ouvinte" no botão esperando o clique (addEventListener)
botao.addEventListener("click", function () {
    //Pegamos os valores (.value) que o usuário digitou nas caixinhas
    let nomeDigitado = campoNome.value;
    let linguagemDigitada = campoLinguagem.value;

    // Injetamos esses valores como texto (.innerText) lá no cartão de baixo
    spanNome.innerHTML = nomeDigitado;
    spanLinguagem.innerHTML = linguagemDigitada;

    //Limpa os campos de input depois de registrar para o formulário ficar pronto para um novo uso
    campoNome.value = "";
    campoLinguagem.value = "";
});