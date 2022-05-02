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
        <link rel="stylesheet" type="text/css" href="/SAPINRS/css/colaborador_Perfil.css">
        <title>Locação info</title>
        <?php
        $frame = "colaborador";
        include_once '../menu.php';
        ?>
        <script>
            $(document).ready(function () {
                changeAba('#aba_logo');
            });
            
            function changeAba(aba){
                $("#aba_logo").hide();
                $("#aba_perfil_editar").hide();
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
                        <li>Locações<hr></li>
                        <li>Permições<hr></li>
                        <li>Usuários<hr></li>
                    </ul>
                </li>
                <li class="aba" >Financeiro
                    <ul class="sub_aba">
                        <li>Despesas <hr></li>
                        <li>Formas de Pagamento<hr></li>
                        <li>Gerentes<hr></li>
                        <li>NFS-E<hr></li>
                    </ul>
                </li>
                <li class="aba" >Relatório</li>
                <li class="aba" onclick="window.location.href = '/SAPINRS/index.php'" >Portal</li>
            </ul>
        </div>
        <div id="div_colaborador">
            <div class="div_interna" id="div_info_colaborador">
                <img src="/SAPINRS/img/usuario.jpg" width="100px" height="100px"/><br>
                <b><label>Nome do Colaborador</label></b><br>
                <label>Matricula: 123123</label><br>
                <label>Setor: TI</label>
                <hr>
                Atalhos
            </div>
            <div class="div_interna" id="div_view_colaborador">
                <img id="aba_logo" src="/SAPINRS/img/logo.png" width="150px" height="150px"/>
                <?php
                    include_once '../forms/form_editar_perfil.php';
//                    include_once '/SAPINRS/views/forms/';
//                    include_once '/SAPINRS/views/forms/';
//                    include_once '/SAPINRS/views/forms/';
                ?>
            </div>
        </div>
    </body>
</html>