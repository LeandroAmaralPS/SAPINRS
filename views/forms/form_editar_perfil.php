
    <style>
        #aba_perfil_editar{
            padding: 15px;
            position: relative;
        }
        
        #aba_perfil_editar input{
            width: 45%;
        }
        

    </style>
    <div id="aba_perfil_editar">
        <form method="POST" id="editarPerfil_form" action="/SAPINRS/process/editarPerfil.php" enctype="multipart/form-data">
            <input type="text" id="id" name="id" value="<?=$_SESSION['logado']?>" hidden>
            <b><label>Editar Perfil</label></b>
            <hr style="width:35%;text-align:left;margin-left:0">
            <b><label>Editar Perfil</label></b><br>
            <input class="form-control" type="file" name="foto">
            <hr style="width:35%;text-align:left;margin-left:0">
            <b><label>Confirmar Nova Senha</label></b><br>
            <b><label>Alterar Senha</label></b><br>
            <input class="form-control" id="senha" name="senha" type="password" required><br>
            <b><label>Confirmar Nova Senha</label></b><br>
            <input class="form-control" id="confirmSenha" name="confirmSenha" type="password" required>
            <br><br><br>
            <div class="btn_forms">
                <a><button type="submit" id="Salvar" class="btn btn-success">Salvar</button></a>
            </div>
        </form>
    </div>
    
    <script>
        $("#editarPerfil_form").submit(function (event) {
            if ($('#senha').val() == $('#confirmSenha').val()) {
                return true;
            } else {
                alert('As senhas não são iguais');
                return false;
            }
        });
        
        $( document ).ready(function() {
        if(<?= isset($_REQUEST['msg']) ?>){
            alert( <?=$_REQUEST['msg']?> );
        }
        });
        
    </script>

