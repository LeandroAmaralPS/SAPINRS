<?php

include_once '../controller/usuarioController.php';

if (isset($_REQUEST['tipo'])) {

    $return = usuarioController::getUsuarioById($_REQUEST['id']);
    print_r(json_encode($return));
} else {

    if (isset($_POST['excluir'])) {
        $idUsuario = $_POST['id'];

        usuarioController::excluirById($idUsuario);
    } else {

        $idUsuario = $_POST['id'];
        $nome = $_POST['nome'];
        $login = $_POST['login'];
        $cpf = $_POST['cpf'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];
        $status = $_POST['status'];
        $perm = $_POST['perm'];
        $senha = $_POST['senha'];
        $confirmSenha = $_POST['confirmSenha'];

        if ($confirmSenha == $senha) {
            if ($idUsuario != null) {
                usuarioController::updateUsuario($idUsuario, $nome, $login, $cpf, $email, $telefone, $status, $senha, $perm);

                header("Location: /SAPINRS/views/perfis/perfil_colaborador.php?msg='Alterações feitas com sucesso!'");
            } else {
                    usuarioController::createUsuario($nome, $login, $cpf, $email, $telefone, $status, $senha, $perm);

                    header("Location: /SAPINRS/views/perfis/perfil_colaborador.php?msg='Usuario Salvo com sucesso!'");
            }
        } else {
            header("Location: /SAPINRS/views/perfis/perfil_colaborador.php?msg='As duas Senhas devem ser iguais!'");
        }
    }
}

