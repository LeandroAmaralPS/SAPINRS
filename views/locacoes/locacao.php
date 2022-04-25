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
        
        $locacoes = array(
            array("nome" => "Salão de Festas", "descricao" => "Bla bla bla", "preco" => 66.69, "img" => "1.png", "capacidade" => "X cabeças"),
            array("nome" => "Piscina", "descricao" => "Bla bla bla", "preco" => 66.69, "img" => "2.png", "capacidade" => "X cabeças"),
            array("nome" => "Churrasqueira", "descricao" => "Bla bla bla", "preco" => 66.69, "img" => "3.png", "capacidade" => "X cabeças"),
            array("nome" => "Salão de Festas 2", "descricao" => "Bla bla bla", "preco" => 66.69, "img" => "4.png", "capacidade" => "X cabeças"),
            array("nome" => "Auditório", "descricao" => "Bla bla bla", "preco" => 66.69, "img" => "5.png", "capacidade" => "X cabeças"),
            array("nome" => "Churrasqueira 2", "descricao" => "Bla bla bla", "preco" => 66.69, "img" => "6.jpg", "capacidade" => "X cabeças"),
        );
        ?>
        <script>
        </script>
    </head>
    <body>
        <div id="locacao_info">
            <?php
                echo '<img id="locacao_img" class="center" src="/SAPINRS/img/'.$locacoes[$_REQUEST['id']]["img"].'"/><br>';
                echo '<div id="locacao_content">';
                echo '<b><span>'.$locacoes[$_REQUEST['id']]['nome'].'</span><br>';
                echo '<span>Capacidade para '.$locacoes[$_REQUEST['id']]['capacidade'].'</span></b>';
                echo '<form action="#">';
                if(!isset($_SESSION["logado"])){
                    echo '<div class="label_separator"><label>Informe seu nome</label></div>';
                    echo '<input class="form-control" name="nome" type="text"/><br>';
                    echo '<div class="label_separator"><label>Informe seu e-mail</label></div>';
                    echo '<input class="form-control" name="email" type="text"/><br>';
                    echo '<div class="label_separator"><label>Informe seu telefone</label></div>';
                    echo '<input class="form-control" name="telefone" type="text"/><br>';
                }
                echo '<input type="date"/><br>';
                echo '<div class="buttons">';
                echo '<a href="locacoes-list.php"><button type="button" class="btn btn-info">Cancelar</button></a>';
                echo '<a><button type="button" id="Reservar" class="btn btn-info">Reservar</button></a>';
                echo '</div></form>';
                echo '</div>';
            ?>
        </div>
    </body>
</html>