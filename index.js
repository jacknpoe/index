//***********************************************************************************************
// AUTOR: Ricardo Erick Rebêlo
// Objetivo: confeccionar o HTML dos items de menu a partir da API em PHP
// Alterações:
// 0.1   10/12/2023 - primeira implementação
// 0.2   21/12/2023 - versão que usa JSON (no lugar de HTML)
// 0.3   22/12/2023 - versão com filtro
// 0.4   28/12/2023 - filtro feito pelo contido no HTML das divs .item
// 0.4.1 28/12/2023 - filtro feto pelo innerText, apenas da descrição

const grade = window.document.getElementById("grade");
const fFiltro = window.document.getElementById("fFiltro");

const preencheGrade = () => {
    const endPoint = `menu.php`;
    fetch(endPoint)
    .then(res => res.json())
    .then(res => {
        let composicao = "";
        res.forEach(el => {
            composicao += '<a href="';
            composicao += el.NM_LINK;
            composicao += '"><div class="item"><img src="';
            composicao += el.NM_IMAGEM;
            composicao += '"><br>';
            composicao += el.NM_DESCRICAO;
            composicao += '</div></a>';

            // Guarda a forma antiga, se precisar voltar a ter link já acessado
            // composicao += '<div class="item"><p><a href="';
            // composicao += el.NM_LINK;
            // composicao += '"><img src="';
            // composicao += el.NM_IMAGEM;
            // composicao += '"><br>';
            // composicao += el.NM_DESCRICAO;
            // composicao += '</a></p></div>';
        })
        grade.innerHTML = composicao;
    })
}

fFiltro.addEventListener("keyup", (evt) => {
    const filtro = fFiltro.value.toUpperCase();
    const items = [...window.document.getElementsByClassName("item")];
    for(let i = 0; i < items.length; i++){
        if(items[i].children[0].children[0].innerText.toUpperCase().includes(filtro)){
            items[i].classList.remove("ocultaritem");  // mostrar
        } else {
            items[i].classList.add("ocultaritem");  // ocultar
        }
    }
})

preencheGrade();
