//***********************************************************************************************
// AUTOR: Ricardo Erick Rebêlo
// Objetivo: confeccionar o HTML dos items de menu a partir da API em PHP
// Alterações:
// 0.1   10/12/2023 - primeira implementação
// 0.2   21/12/2023 - versão que usa JSON (no lugar de HTML)
// 0.3   22/12/2023 - versão com filtro

const grade = window.document.getElementById("grade");
const fFiltro = window.document.getElementById("fFiltro");

const preencheGrade = () => {
    const endPoint = `menu.php`;
    fetch(endPoint)
    .then(res => res.json())
    .then(res => {
        let composicao = "";
        const filtro = fFiltro.value.toUpperCase();
        res.forEach(el => {
            if(el.NM_DESCRICAO.toUpperCase().includes(filtro)) {
                composicao += '<div class="item"><p><a href="';
                composicao += el.NM_LINK;
                composicao += '"><img src="';
                composicao += el.NM_IMAGEM;
                composicao += '"><br>';
                composicao += el.NM_DESCRICAO;
                composicao += '</a></p></div>';
            }
        })    
         grade.innerHTML = composicao;
    })
}

fFiltro.addEventListener("keyup", (evt) => {
    preencheGrade();
})

preencheGrade();
