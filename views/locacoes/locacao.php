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
        <title>Locação info</title>
        <?php
        $frame = "Locações";
        include_once '../menu.php';
        include_once '../../controller/locacaoController.php';
        
        ?>
        <script>
        </script>
    </head>
    <body>
        <style>
            .buttons{
                width: 100%;
                height: 20px;
                text-align: center; 
                position: absolute;
                bottom:
                <?php if(isset($_SESSION["logado"])){
                    echo '10%';
                }else{
                    echo '-30%';
                }?>
                
            }
        </style>
        <div id="locacao_info">
            <?php
            $locacoes = LocacaoController::getLocacaoById($_REQUEST['id']);
            echo '<img id="locacao_img" class="center" src="/SAPINRS/img/' . $locacoes[0]["img"] . '"/><br>';
            echo '<div style="height: 680px;" id="locacao_content">';
            echo '<b><span>' . $locacoes[0]['nome'] . '</span><br>';
            echo '<span>Capacidade para ' . $locacoes[0]['capacidade'] . ' pessoas</span><br>';
            echo '<span>Preço por Turno: R$ ' . $locacoes[0]['preco'] . '</span></b>';
            echo '<form method="POST" id="locacao_form" action="/SAPINRS/process/alugar.php">';
            echo '<input type="text" name="local" value="' . $_REQUEST['id'] . '" hidden/>';
            if (!isset($_SESSION["logado"])) {
                echo '<div class="label_separator"><label>Informe seu nome</label></div>';
                echo '<input class="form-control" name="nome" type="text" required/><br>';
                echo '<div class="label_separator"><label>Informe seu cpf</label></div>';
                echo '<input class="form-control" name="cpf" type="text" required/><br>';
                echo '<div class="label_separator"><label>Informe seu e-mail</label></div>';
                echo '<input class="form-control" name="email" type="email" required/><br>';
                echo '<div class="label_separator"><label>Informe seu telefone</label></div>';
                echo '<input class="form-control" name="telefone" type="phone" required/><br>';
            }
            echo '<div class="label_separator"><label>Data da reserva</label></div>';
            echo '<input type="date" name="date" required/><br>';
            echo '<div class="label_separator"><label>Turno da reserva</label></div>';
            echo '<div class="checkbox_div">';
            echo '<input type="checkbox" name="manha" id="manha"/>Manhã (8:00 ~ 11:00)';
            echo '<input type="checkbox" name="meio-dia" id="meio-dia"/>Meio Dia (11:10 ~ 14:10)';
            echo '<input type="checkbox" name="tarde" id="tarde"/>Tarde (14:30 ~ 17:30)';
            echo '<input type="checkbox" name="noite" id="noite"/>Noite (18:00 ~ 21:00)';
            echo '</div><br>';
            echo '<div class="buttons">';
            echo '<a href="locacoes-list.php"><button type="button" class="btn btn-info">Voltar</button></a>';
            echo '<a><button id="Reservar" class="btn btn-success">Reservar</button></a>';
            echo '</div></form>';
            echo '</div>';
            ?>
        </div>
    </body>
    <script>
        $("#locacao_form").submit(function (event) {
            if ($('#manha').is(':checked') || $('#meio-dia').is(':checked') || $('#tarde').is(':checked') || $('#noite').is(':checked')) {
                return true;
            } else {
                alert('Informe um ou mais turnos');
                return false;
            }
        });
        
        $( document ).ready(function() {
            if(<?= isset($_REQUEST['msg']) ?>){
                alert( <?=$_REQUEST['msg']?> );
            }
        });
    </script>
</html>