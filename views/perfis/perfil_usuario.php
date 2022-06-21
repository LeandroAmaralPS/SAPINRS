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
        include_once '../../controller/usuarioController.php';

        $user = usuarioController::getUsuarioById($_SESSION['logado'])[0];

        $alugueis = usuarioController::getLocacoesUser($user['id']);
        $valor = 0;
        foreach (json_decode($alugueis) as $aluguel) {
            if (date('m',strtotime($aluguel->data)) == date('m')) {
                $valor += $aluguel->preco;
            }
        }
        
        ?>
        <script>
            $(document).ready(function () {
                changeAba('#aba_perfil');
            });

            function cancelarAluguel(id) {
                $.ajax({
                    type: 'post',
                    url: '/SAPINRS/process/aluguelHelper.php',
                    data: {id: id, acao: 'excluir'},
                    success: function (res) {
                        alert(res);
                    }
                });
            }

            function changeAba(aba) {
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
                <img src="/SAPINRS/img/usuarios/<?= $user['foto'] ?>" width="100px" height="100px"/>
                <div class="div_pai"  id="aba_perfil">Dados do usuário
                    <p>CPF: <?= $user['cpf'] ?></p>
                    <p>Data de nascimento: <?= date_format(date_create($user['dt_nasc']), 'd/m/Y') ?></p>
                    <p>E-mail: <?= $user['email'] ?></p>
                </div>

                <div class="div_pai" id="aba_pagamentos">Pagamenos do usuário
                    <p><?= $user['nome'] ?></p>
                    <p>CPF: <?= $user['cpf'] ?></p>
                    <p>Valor: R$ <?=number_format((float)$valor, 2, ',', '')?></p>
                                      
                </div>
                <div class="div_pai" id="aba_locacoes">Locações do usuário
                    <table>
                        <thead class="td_locacoes">
                        <th class="td_locacoes">Nome</th>
                        <th class="td_locacoes">Data</th>
                        <th class="td_locacoes">Preço</th>
                        <th class="td_locacoes">Cancelar</th>
                        </thead>
                        <tbody>
                            <?php
                            foreach (json_decode($alugueis) as $aluguel) {
                                echo '<tr>';
                                echo "<td class = 'td_locacoes'>$aluguel->nome</td>";
                                echo "<td class = 'td_locacoes'>" . date_format(date_create($aluguel->data), 'd/m/Y') . "</td>";
                                echo "<td class = 'td_locacoes'>$aluguel->preco</td>";
                                echo "<td class = 'td_locacoes'><button class = 'btn btn-danger' onClick='cancelarAluguel($aluguel->id)'>Cancelar</button></td>";
                                echo '</tr>';
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>