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
        <link rel="stylesheet" type="text/css" href="/SAPINRS/css/usuario_Perfil.css">
        <title>Locação info</title>
        <?php
        $frame = "usuario";
        include_once '../menu.php';
        ?>
        <script>
            $(document).ready(function () {
                changeAba('#aba_perfil');
            });
            
            function changeAba(aba){
                $("#aba_perfil").hide();
                $("#aba_pagamentos").hide();
                $("#aba_locacoes").hide();
                $(aba).show();
            }
        </script>
    </head>
    <body>
        <div id="perfil_info">

            <div id="perfil_header">
                <div class="aba" onclick="changeAba('#aba_perfil')">Perfil</div>
                <div class="aba" onclick="changeAba('#aba_pagamentos')">Pagamentos</div>
                <div class="aba" onclick="changeAba('#aba_locacoes')">Locações</div>
            </div>
            
            <div id="perfil_content">
                <div class="div_pai" id="aba_perfil">perfil</div>
                <div class="div_pai" id="aba_pagamentos">pagamentos</div>
                <div class="div_pai" id="aba_locacoes">locações</div>
            </div>
        </div>
    </body>
</html>