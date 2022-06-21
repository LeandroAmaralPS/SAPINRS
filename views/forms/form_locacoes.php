<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
<script>
    $(document).ready(function (event) {
        $('#locacoesList').dataTable();
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
<div id="aba_locacoes_editar" class="abaForm" style="padding-bottom: 100px;">
    <button onclick="criarNovoLocacao()" class="btn btn-success"><i class="fa fa-plus"></i> Criar Novo</button>
    <div id="divTableLocacao">
        <table id="locacoesList" width="100%">
            <thead>
                <tr>
                    <td>Nome</td>
                    <td>Preço</td>
                    <td>Descricão</td>
                    <td>Capacidade</td>
                    <td>Ações</td>
                </tr>
            </thead>
            <tbody>
                    <?php
                        include_once '../../controller/locacaoController.php';
                        
                        $locacoes = LocacaoController::getListLocacoes();
                        
                        foreach (json_decode($locacoes) as $local){
                            echo '<tr>';
                            echo "  <td>$local->nome</td>";
                            echo "  <td>$local->preco</td>";
                            echo "  <td>$local->descricao</td>";
                            echo "  <td>$local->capacidade</td>";
                            echo "  <td><button class='btn btn-primary' onclick='editarLocacao($local->id)'><i class='fa fa-edit'></i> Editar</button>"
                                    . "<button class='btn btn-danger' onclick='excluirLocacao($local->id)'><i class='fa fa-trash'></i> Excluir</button></td>";
                            echo '</tr>';
                        }
                    ?>
            </tbody>
        </table>
    </div>
    
    <div id="divFormLocacao">
        <form id="editLocacao" method="POST" action="/SAPINRS/process/locacaoHelper.php" enctype="multipart/form-data">
            <input type="text" name="id" id="idLocacao" hidden/>
            <label>Nome:</label><br>
            <input type="text" name="nome" id="nomeLocacao" style="width:350px;" required><br>
            <label>Preço</label><br>
            <input type="number" name="preco" id="precoLocacao" required><br>
            <label>Descrição</label><br>
            <textarea name="desc" id="descLocacao" rows="4" cols="50" required></textarea><br>
            <label>Capacidade</label><br>
            <input type="number" name="capacidade" id="capacidadeLocacao" required><br>
            <label>Escolher Nova Foto:</label><br>
            <input type="file" name="foto" id="fotoLocacao">
            <div class="btn_forms">
                    <button class="btn btn-success">Salvar</button>
                    <button type="button" onclick="voltarLocacao()" class="btn btn-danger">Cancelar</button>
            </div>
        </form>
    </div>
</div>

<script>
    $("#divFormLocacao").hide();

    function editarLocacao(id){ 
        $("#divTableLocacao").hide();
        $("#divFormLocacao").show();
        
        $("#fotoLocacao").prop('required', false);
        $.ajax({
            type: 'get',
            url: '/SAPINRS/process/locacaoHelper.php',
            data: {id : id, tipo:'getDados'},
            success: function (res) {
                var locacao = JSON.parse(res);
                
                $("#idLocacao").val(locacao[0]['id']);
                $("#nomeLocacao").val(locacao[0]['nome']);
                $("#precoLocacao").val(locacao[0]['preco']);
                $("#descLocacao").val(locacao[0]['descricao']);
                $("#capacidadeLocacao").val(locacao[0]['capacidade']);
            }
        });
        
        
    }
    
    function criarNovoLocacao(){
        $("#divTableLocacao").hide();
        $("#divFormLocacao").show();
        
        $("#idLocacao").val(null);
        $("#nomeLocacao").val(null);
        $("#precoLocacao").val(null);
        $("#descLocacao").val(null);
        $("#capacidadeLocacao").val(null);
        
        $("#fotoLocacao").prop('required', true);
    }
    
    function excluirLocacao(id){
        
        $.ajax({
            type: 'post',
            url: '/SAPINRS/process/locacaoHelper.php',
            data: {id : id, excluir:'true'},
            success: function (res) {
                alert('Locação excluida com sucesso.');
                window.location.replace("http://localhost/SAPINRS/views/perfis/perfil_colaborador.php");
            }
        });
        
    }
    
    function voltarLocacao(){
        $("#divTableLocacao").show();
        $("#divFormLocacao").hide();
    }
</script>

