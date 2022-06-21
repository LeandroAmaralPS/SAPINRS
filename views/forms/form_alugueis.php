<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
<script>
    $(document).ready(function (event) {
        $('#alugueisList').dataTable();
    });
</script>
<style>
    .abaForm{
        padding: 15px;
        position: relative;
    }

    .abaForm{
        width: 45%;
    }

    .interna{
        padding: 5px;
        background-color: white !important;
    }

</style>
<div id="aba_alugueis" class="abaForm" style="padding-bottom: 100px;">
    <div id="divTablealuguel">
        <table id="alugueisList" class="cell-border stripe" width="100%">
            <thead>
                <tr>
                    <td>Nome</td>
                    <td>Socio</td>
                    <td>Locação</td>
                    <td>CPF</td>
                    <td>Email</td>
                    <td>Telefone</td>
                    <td>Data</td>
                    <td>Turno</td>
                    <td>Status</td>
                    <td>Ações</td>
                </tr>
            </thead>
            <tbody>
                <?php
                $alugueis = aluguelController::getAlugueis();

                foreach (json_decode($alugueis) as $aluguel) {
                    if($aluguel->socio == null){
                        $nome = $aluguel->user;
                        $socio = '<td style="color: red;">não sócio</td>';
                        $cpf = $aluguel->gcpf;
                        $email = $aluguel->gemail;
                        $telefone = $aluguel->gtelefone;
                    }else{
                        $nome = $aluguel->socio;
                        $socio = '<td style="color: green;">sócio</td>';
                        $cpf = $aluguel->cpf;
                        $email = $aluguel->email;
                        $telefone = $aluguel->telefone;
                    }
                    if($aluguel->status == 'analise'){
                        $color = 'style="color: blue"';
                    }elseif ($aluguel->status == 'alugado') {
                        $color = 'style="color: green"';
                    }else{
                        $color = 'style="color: red"';
                    }
                    echo '<tr>';
                    echo "  <td>$nome</td>";
                    echo  $socio;
                    echo "  <td>$aluguel->locacao</td>";
                    echo "  <td>$cpf</td>";
                    echo "  <td>$email</td>";
                    echo "  <td>$telefone</td>";
                    echo "  <td>".date_format(date_create($aluguel->data), 'd/m/Y')."</td>";
                    echo "  <td>$aluguel->turno</td>";
                    echo "  <td $color>$aluguel->status</td>";
                    echo "  <td><button style='width: 120px' class='btn btn-success' onclick=\"confirmarAluguel($aluguel->id, '$aluguel->data', '$aluguel->turno')\"><i class='fa fa-check'></i> Confirmar</button>"
                    . "<button style='width: 120px' class='btn btn-primary' onclick='editarAluguel($aluguel->id)'><i class='fa fa-edit'></i> Editar</button>"
                    . "<button style='width: 120px' class='btn btn-danger' onclick='excluirAluguel($aluguel->id)'><i class='fa fa-trash'></i> Cancelar</button></td>";
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
    </div>

    <div id="divFormAluguel">
        <form id="editAluguel" method="POST" action="/SAPINRS/process/AluguelHelper.php">
            <input type="text" name="id" id="idAluguel" hidden/>
            <input type="text" name="acao" value="confirmar" hidden/>
            <label>Data</label><br>
            <input type="date" name="data" id="dataAluguel"><br>
            <label>Turno</label><br>
            <select id="selectAluguel" name="turno">
                <option value="manha">manhã</option>
                <option value="meio-dia">meio-dia</option>
                <option value="tarde">tarde</option>
                <option value="noite">noite</option>
            </select>
            <div class="btn_forms">
                <button type="button" onclick="salvarAluguel()" class="btn btn-success">Salvar</button>
                <button type="button" onclick="voltarAluguel()" class="btn btn-danger">Cancelar</button>
            </div>
        </form>
    </div>
</div>

<script>
    $("#divFormAluguel").hide();

    function confirmarAluguel(id, date, turno) {
        $.ajax({
            type: 'post',
            url: '/SAPINRS/process/aluguelHelper.php',
            data: {id: id, acao: 'confirmar', data: date, turno: turno},
            success: function (res) {
                alert(res);
            }
        });


    }

    function excluirAluguel(id) {

        $.ajax({
            type: 'post',
            url: '/SAPINRS/process/aluguelHelper.php',
            data: {id: id, acao: 'excluir'},
            success: function (res) {
                alert(res);
            }
        });

    }

    function editarAluguel(id) {
        $('#idAluguel').val(id);

        $("#divTablealuguel").hide();
        $("#divFormAluguel").show();
    }

    function salvarAluguel() {
        id = $('#idAluguel').val();
        date = $('#dataAluguel').val();
        turno = $('#selectAluguel').val();

        if (date != '') {
            confirmarAluguel(id, date, turno);
            voltarAluguel();
        }else{
            alert('Informe a data.');
        }
    }

    function voltarAluguel() {
        $("#divTablealuguel").show();
        $("#divFormAluguel").hide();
    }

</script>

