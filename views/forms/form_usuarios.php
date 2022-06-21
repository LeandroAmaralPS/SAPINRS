<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
<script>
    $(document).ready(function (event) {
        $('#usuariosList').dataTable();
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
<div id="aba_usuarios_editar" class="abaForm" style="padding-bottom: 100px;">
    <button onclick="criarNovoUsuario()" class="btn btn-success"><i class="fa fa-plus"></i> Criar Novo</button>
    <div id="divTableUsuario">
        <table id="usuariosList" width="100%">
            <thead>
                <tr>
                    <td>Nome</td>
                    <td>Login</td>
                    <td>CPF</td>
                    <td>Email</td>
                    <td>Telefone</td>
                    <td>Status</td>
                    <td>Ações</td>
                </tr>
            </thead>
            <tbody>
                <?php
                $usuarios = usuarioController::getListUsuarios();

                foreach (json_decode($usuarios) as $user) {
                    echo '<tr>';
                    echo "  <td>$user->nome</td>";
                    echo "  <td>$user->usuario</td>";
                    echo "  <td>$user->cpf</td>";
                    echo "  <td>$user->email</td>";
                    echo "  <td>$user->telefone</td>";
                    echo "  <td>$user->status</td>";
                    echo "  <td><button class='btn btn-primary' onclick='editarUsuario($user->id)'><i class='fa fa-edit'></i> Editar</button>"
                    . "<button class='btn btn-danger' onclick='excluirUsuario($user->id)'><i class='fa fa-trash'></i> Excluir</button></td>";
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
    </div>

    <div id="divFormUsuario">
        <form id="editUsuario" method="POST" action="/SAPINRS/process/UsuarioHelper.php">
            <input type="text" name="id" id="idUsuario" hidden/>
            <label>Nome:</label><br>
            <input type="text" name="nome" id="nomeUsuario" style="width:350px;" required><br>
            <label>Login:</label><br>
            <input type="text" name="login" id="loginUsuario" style="width:350px;" required><br>
            <label>CPF:</label><br>
            <input type="text" name="cpf" id="cpfUsuario" style="width:350px;" required><br>
            <label>Email:</label><br>
            <input type="email" name="email" id="emailUsuario" style="width:350px;" required><br>
            <label>Telefone:</label><br>
            <input type="text" name="telefone" id="telefoneUsuario" style="width:350px;" required><br>
            <label>Status:</label><br>
            <select id="statusUsuario" name="status">
                <option value="ativo">Ativo</option>
                <option value="inativo">Inativo</option>
                <option value="analise">Análise</option>
            </select><br>
            <label>Permissão:</label><br>
            <select id="permUsuario" name="perm">
                <option value="1">Sócio</option>
                <option value="2">Colaborador</option>
                <option value="3">Gerente</option>
            </select><br>
            <label>Senha:</label><br>
            <input type="password" name="senha" id="senhaUsuario" style="width:350px;" ><br>
            <label>Confirmar Senha:</label><br>
            <input type="password" name="confirmSenha" id="senhaConfirmUsuario" style="width:350px;" ><br>
            <div class="btn_forms">
                <button class="btn btn-success">Salvar</button>
                <button type="button" onclick="voltarUsuario()" class="btn btn-danger">Cancelar</button>
            </div>
        </form>
    </div>
</div>

<script>
    $("#divFormUsuario").hide();

    function editarUsuario(id) {
        $("#divTableUsuario").hide();
        $("#divFormUsuario").show();

        $("#senhaUsuario").prop('required', false);
        $.ajax({
            type: 'get',
            url: '/SAPINRS/process/UsuarioHelper.php',
            data: {id: id, tipo: 'getDados'},
            success: function (res) {
                var user = JSON.parse(res);

                $("#idUsuario").val(user[0]['id']);
                $("#nomeUsuario").val(user[0]['nome']);
                $("#loginUsuario").val(user[0]['usuario']);
                $("#cpfUsuario").val(user[0]['cpf']);
                $("#emailUsuario").val(user[0]['email']);
                $("#telefoneUsuario").val(user[0]['telefone']);
                
                $("#statusUsuario").val(user[0]['status']).change();
                $("#permUsuario").val(user[0]['fk_tipo_usuario']).change();
            }
        });


    }

    function criarNovoUsuario() {
        $("#divTableUsuario").hide();
        $("#divFormUsuario").show();

        $("#idUsuario").val(null);
        $("#nomeUsuario").val(null);
        $("#loginUsuario").val(null);
        $("#cpfUsuario").val(null);
        $("#emailUsuario").val(null);
        $("#telefoneUsuario").val(null);
        
        $("#senhaUsuario").prop('required', true);
    }

    function excluirUsuario(id) {

        $.ajax({
            type: 'post',
            url: '/SAPINRS/process/UsuarioHelper.php',
            data: {id: id, excluir: 'true'},
            success: function (res) {
                alert('Usuario excluido com sucesso.');
            }
        });

    }

    function voltarUsuario() {
        $("#divTableUsuario").show();
        $("#divFormUsuario").hide();
    }

</script>

