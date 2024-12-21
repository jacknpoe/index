//***********************************************************************************************
// AUTOR: Ricardo Erick Rebêlo
// Objetivo: confeccionar o HTML dos items de menu a partir da API em PHP
// Alterações:
// 0.1   10/12/2023 - primeira implementação
// 0.2   21/12/2023 - versão que usa JSON (no lugar de HTML)
// 0.3   22/12/2023 - versão com filtro
// 0.4   28/12/2023 - filtro feito pelo contido no HTML das divs .item
// 0.4.1 28/12/2023 - filtro feto pelo innerText, apenas da descrição
// 0.5   02/01/2024 - agora monta um div inteiro como link
// 0.5.1 02/01/2024 - corrigida a pesquisa pela descrição
// 0.6   03/01/2024 - pega o campo NM_TECNOLOGIA
// 0.6.1 03/01/2024 - colore NM_TECNOLOGIA e acrescenta "?v=2" nas imagens
// 0.7   21/12/2024 - os links agora veem de link.php

const grade = window.document.getElementById("grade");
const links = window.document.getElementById("links");
const fFiltro = window.document.getElementById("fFiltro");
const btnCarregar = window.document.getElementById("btnCarregar");

const preencheGrade = () => {
    // grade de menu
    const endPointMenu = 'menu.php';
    fetch(endPointMenu)
    .then(res => res.json())
    .then(res => {
        let composicaoGrade = "";
        res.forEach(el => {
            composicaoGrade += '<a href="';
            composicaoGrade += el.NM_LINK;
            composicaoGrade += '"><div class="item"><img src="';
            composicaoGrade += el.NM_IMAGEM;
            composicaoGrade += '?v=2"></br>';
            composicaoGrade += el.NM_DESCRICAO;
            composicaoGrade += ' <span class="tecnologia">' + el.NM_TECNOLOGIA + "</span>" ;  // teste dia 03/01/2024
            composicaoGrade += '</div></a>';

            // Guarda a forma antiga, se precisar voltar a ter link já acessado
            // composicaoGrade += '<div class="item"><p><a href="';
            // composicaoGrade += el.NM_LINK;
            // composicaoGrade += '"><img src="';
            // composicaoGrade += el.NM_IMAGEM;
            // composicaoGrade += '"></br>';
            // composicaoGrade += el.NM_DESCRICAO;
            // composicaoGrade += '</a></p></div>';
        })
        grade.innerHTML = composicaoGrade;
    })

    // grade de menu
    const endPointLinks = 'links.php';
    fetch(endPointLinks)
    .then(res => res.json())
    .then(res => {
        let composicaoLinks = "";
        res.forEach(el => {
            if ( composicaoLinks != "" ) {
                composicaoLinks += " | ";
            }
            composicaoLinks += '<a href=';
            composicaoLinks += el.NM_LINK;
            composicaoLinks += '>';
            composicaoLinks += el.NM_DESCRICAO;
            composicaoLinks += '</a>';
        })
        links.innerHTML = composicaoLinks;
    })

}

fFiltro.addEventListener("keyup", (evt) => {
    const filtro = fFiltro.value.toUpperCase();
    const items = [...window.document.getElementsByClassName("item")];
    for(let i = 0; i < items.length; i++){
//        if(items[i].children[0].children[0].innerText.toUpperCase().includes(filtro)){    // forma antiga
        if(items[i].innerText.toUpperCase().includes(filtro)){
            items[i].classList.remove("ocultaritem");  // mostrar
        } else {
            items[i].classList.add("ocultaritem");  // ocultar
        }
    }
})

// btnCarregar.addEventListener("click", (evt) => {
//    preencheGrade();
// })

preencheGrade();
