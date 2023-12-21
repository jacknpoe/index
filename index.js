//***********************************************************************************************
// AUTOR: Ricardo Erick Rebêlo
// Objetivo: confeccionar o HTML dos items de menu a partir da API em PHP
// Alterações:
// 0.1   10/12/2023 - primeira implementação
// 0.2   21/12/2023 - versão que usa JSON (no lugar de HTML)

const grade = window.document.getElementById("grade");

const endPoint = `menu.php`;
fetch(endPoint)
.then(res => res.json())
.then(res => {
    console.log(res);
    let composicao = "";
    res.forEach(el => {
        composicao += '<div class="item"><p><a href="';
        composicao += el.NM_LINK;
        composicao += '"><img src="';
        composicao += el.NM_IMAGEM;
        composicao += '"><br>';
        composicao += el.NM_DESCRICAO;
        composicao += '</a></p></div>';
    })    
     grade.innerHTML = composicao;
})