<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
              integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="/SAPINRS/css/locacao.css">
        <title>Locações</title>
        <?php
        $frame = "Locações";
        include_once '../menu.php';
        

        ?>
        <script>
            var locacoesArray = <?php echo json_encode($locacoes); ?>;
            var countLocal = 6;
            var paginaAtual = 0;
            var DISPLAY_QTD = 4;
            $(document).ready(function () {
                configuraView();
                numPaginas = Math.floor(countLocal / DISPLAY_QTD);

                if (0 < countLocal % DISPLAY_QTD) {
                    numPaginas++;
                }
                ;
                atualizarPagina("+");

                $('#pagNext').click(function () {
                    atualizarPagina("+");
                });

                $('#pagBack').click(function () {
                    atualizarPagina("-");
                });
            });

            function configuraView() {
                x = 0;
                html = "";
                while (x < DISPLAY_QTD) {
                    html += '<div class="div_pai" id="div' + x + '">\n\
                                <img />\n\
                                <b><label id="nome_local"></label></b><br>\n\
                                <span id="descricao"></span>\n\
                                <label id="preco"></label>\n\
                                <a><button class="btn btn-info">Reservar</button></a>\n\
                            </div>';
                    x++;
                }
                $("#locacao_div").prepend(html);
            }

            function atualizarPagina(acao) {
                if (acao === "+") {
                    if (paginaAtual < numPaginas)
                        paginaAtual++;
                } else if (paginaAtual > 1) {
                    paginaAtual--;
                }
                text = paginaAtual + " de " + numPaginas;
                $('#pagina').text(text);

                atualizaLocacoes();
            }

            function atualizaLocacoes() {
                max = DISPLAY_QTD * paginaAtual;
                count = max - DISPLAY_QTD;
                x = 0;
                while (count < max) {
                    div = "#div" + x;

                    if (locacoesArray[count] == undefined) {
                        $(div).hide();
                    } else {
                        $(div).show();
                        $(div).find('img').attr('src', "/SAPINRS/img/" + locacoesArray[count].img);
                        $(div).find('#nome_local').text(locacoesArray[count].nome);
                        $(div).find('#descricao').text(locacoesArray[count].descricao);
                        $(div).find('#preco').text("Preço: "+locacoesArray[count].preco);
                        $(div).find('a').attr('href', 'locacao.php?id='+count);
                    }
                    count++;
                    x++;
                }
            }
        </script>
    </head>
    <body>

        <div class="paginas">
            <i id="pagBack" class="fa fa-arrow-left"></i>
            <label id="pagina"></label>
            <i id="pagNext" class="fa fa-arrow-right"></i>
        </div>
        <div>
            <div id="locacao_div">
            </div>
        </div>

    </body>
</html>