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
        <link rel="stylesheet" type="text/css" href="/SAPINRS/css/colaboradorPerfil.css">
        <title>Locação info</title>
        <?php
        $frame = "colaborador";
        include_once '../menu.php';
        include_once '../../controller/usuarioController.php';
        include_once '../../controller/aluguelController.php';
        ?>
        <script>
            $(document).ready(function () {
                changeAba('#aba_logo');
            });
            
            function changeAba(aba){
                $("#aba_logo").hide();
                $("#aba_perfil_editar").hide();
                $("#aba_locacoes_editar").hide();
                $("#aba_usuarios_editar").hide();
                $("#aba_alugueis").hide();
                $("#aba_relatorio").hide();
                $(aba).show();
            }
        </script>
    </head>
    <body>
        <div id="perfil_info">
            <ul>
                <li class="aba"">Perfil
                    <ul  class="sub_aba">
                        <li onclick="changeAba('#aba_perfil_editar')">Editar Perfil</li>
                    </ul>
                </li>
                <li class="aba">Administrativo
                    <ul class="sub_aba">
                        <li onclick="changeAba('#aba_locacoes_editar')">Locações<hr></li>
                        <li onclick="changeAba('#aba_usuarios_editar')">Usuários<hr></li>
                        <li onclick="changeAba('#aba_alugueis')">Alugueis<hr></li>
                    </ul>
                </li>
                <?php if($_SESSION['permissao'] == 'gerente'){?>
                <li class="aba" onclick="changeAba('#aba_relatorio')">Relatório</li>
                <?php } ?>
            </ul>
        </div>
        <div id="div_colaborador">
            <div class="div_interna" id="div_info_colaborador">
                <img src="/SAPINRS/img/usuarios/<?= $img = usuarioController::getFoto($_SESSION['logado']);?>" width="100px" height="100px"/><br>
                <b><label><?=$_SESSION['nome']?></label></b><br>
                <label>CPF: <?=usuarioController::getCpf($_SESSION['logado'])?></label><br>
                <label>Setor: <?=$_SESSION['permissao']?></label>
                <hr>
                Atalhos
            </div>
            <div class="div_interna" id="div_view_colaborador">
                <img id="aba_logo" src="/SAPINRS/img/logo.png" width="150px" height="150px"/>
                <?php
                    include_once '../forms/form_editar_perfil.php';
                    include_once '../forms/form_locacoes.php';
                    include_once '../forms/form_usuarios.php';
                    include_once '../forms/form_alugueis.php';
                    include_once '../forms/form_relatorio.php';

                ?>
            </div>
        </div>
    </body>
</html>