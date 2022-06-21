<?php

include_once '../controller/conexaoController.php';

$idUser = $_POST['id'];
$senha = $_POST['senha'];

$nome_arquivo = "";


    if( isset( $_FILES['foto']['name'] ) && $_FILES['foto']['name'] != "" ){
        $nome_arquivo = date("YmdHis") . basename( $_FILES['foto']['name'] ); 
        $diretorio = "../img/usuarios/";
        $caminho = $diretorio.$nome_arquivo;
        UploadImg($nome_arquivo, $idUser);
        
        if(  ! move_uploaded_file( $_FILES['foto']['tmp_name']  , $caminho )  ){
            $nome_arquivo = "usuario.jpg";
            UploadImg($nome_arquivo, $idUsuario);
        }
        
        mudarSenha($idUser, $senha);
    }

    header("Location: /SAPINRS/views/perfis/perfil_colaborador.php?msg='Perfil alterado com sucesso!'");
    
        
    function UploadImg($nome_arquivo, $idUser){
        $query = 'UPDATE login SET foto = "'.$nome_arquivo.'" WHERE login.id ='.$idUser;
        conexaoController::executar($query);
    }

    function mudarSenha($idUser, $senha){
        $query = 'UPDATE login SET senha = "'.md5($senha).'" WHERE login.id = '.$idUser;
        conexaoController::executar($query);
    }