document.addEventListener("DOMContentLoaded", function() {
    // Seu código JavaScript aqui
    document.getElementById("voltarBtn").addEventListener("click", function() {
        window.location.href = "index.html"; // Substitua "sua_pagina.html" pela URL da página para onde deseja redirecionar
    });
      // Adicione um manipulador de evento de clique ao botão
  document.getElementById("button").addEventListener("click", function() {
    // Simule o clique no botão de submit oculto
    document.getElementById("meuInput").click();
  });
});