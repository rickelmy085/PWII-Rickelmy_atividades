let title = document.getElementById("title1");
title.innerText = "DOM feito na maior boa";
title.style.color = "blue";
title.style.textAlign = "center";

let paragrafo = document.querySelector(".texto");
paragrafo.style.backgroundColor = "yellow";
paragrafo.style.fontWeight = "bold";

let botao = document.getElementById("botao");
botao.addEventListener("click", function() {
    alert("Agora tem interação, ebaaa. ODEIO FRONT-END E JS, amo Golang");
});

let lista = document.getElementById("lista");

let novoItem = document.getElementById("li");

novoItem.innerText = "Nasci para ser back-end";
novoItem.style.color = "green";

lista.appendChild(novoItem);
<li style="color: green;"></li>