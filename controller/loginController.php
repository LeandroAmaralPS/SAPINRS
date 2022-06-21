<?php

    include_once 'conexaoController.php';

    $header = "Location: /SAPINRS/index.php";
    
    session_start();
    if(!isset($_SESSION["logado"])){
        
        $login = $_POST['nome_login'];
        $senha = md5($_POST['email_login']);

        $query = "SELECT login.id, login.nome, tu.nome as perm FROM login left join tipo_usuario as tu on tu.id = login.fk_tipo_usuario where usuario = '$login' and senha = '$senha'";
        $result = ConexaoController::consultar($query);

        
        if(  mysqli_num_rows($result) > 0 ){
        
            $usuario = mysqli_fetch_assoc($result);
            
            $_SESSION["logado"] = $usuario['id'];   
            $_SESSION["nome"] = $usuario['nome'];   
            $_SESSION["permissao"] = $usuario['perm'];   
            
            
        } else {
            $header = "Location: /SAPINRS/views/login.php?erroLogin";
        }

    } else {
        unset ($_SESSION['logado']);
        unset ($_SESSION['nome']);
        unset ($_SESSION["permissao"]);
        session_destroy();
    }
    
    header( $header );