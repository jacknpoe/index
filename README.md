# index

Este é o código (um pouco alterado por questões de segurança) que monta o menu encontrado em https://jacknpoe.rf.gd/.

Isso inclui todo o banco de dados (em [jacknpoe.sql](https://github.com/jacknpoe/index/blob/main/jacknpoe.sql)).

A API [menu.php](https://github.com/jacknpoe/index/blob/main/menu.php) acessa o banco de dados MySQL e gera um JSON que é lido por [index.js](https://github.com/jacknpoe/index/blob/main/index.js), que coloca o conteúdo, formatado, no innerHTML na grade de [index.html](https://github.com/jacknpoe/index/blob/main/index.html), ocultando os itens que não contém a string no campo de filtro, usando uma classe definida como display: none, em [index.css](https://github.com/jacknpoe/index/blob/main/index.css).
