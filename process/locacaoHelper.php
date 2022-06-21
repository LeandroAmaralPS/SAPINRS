<?php

include_once '../controller/locacaoController.php';

if (isset($_REQUEST['tipo'])) {
    switch ($_REQUEST['tipo']) {
        case "getDados":
            $return = LocacaoController::getLocacaoById($_REQUEST['id']);
            print_r(json_encode($return));
            break;
    }
} else {

    if (isset($_POST['excluir'])) {
        $idLocacao = $_POST['id'];
        
        LocacaoController::excluirById($idLocacao);
        
    } else {
        $idLocacao = $_POST['id'];
        $nome = $_POST['nome'];
        $preco = $_POST['preco'];
        $desc = $_POST['desc'];
        $capacidade = $_POST['capacidade'];

        if ($idLocacao != null) {
            LocacaoController::updateLocacao($idLocacao, $nome, $preco, $desc, $capacidade);

            if (isset($_FILES['foto']['name']) && $_FILES['foto']['name'] != "") {
                $nome_arquivo = date("YmdHis") . basename($_FILES['foto']['name']);
                $diretorio = "../img/";
                $caminho = $diretorio . $nome_arquivo;

                if (!move_uploaded_file($_FILES['foto']['tmp_name'], $caminho)) {
                    
                } else {
                    LocacaoController::UploadImg($nome_arquivo, $idLocacao);
                }
            }

            header("Location: /SAPINRS/views/perfis/perfil_colaborador.php?msg='Alterações feitas com sucesso!'");
        } else {
            $idNovo = LocacaoController::createLocacao($nome, $preco, $desc, $capacidade);

            if (isset($_FILES['foto']['name']) && $_FILES['foto']['name'] != "") {
                $nome_arquivo = date("YmdHis") . basename($_FILES['foto']['name']);
                $diretorio = "../img/";
                $caminho = $diretorio . $nome_arquivo;

                if (!move_uploaded_file($_FILES['foto']['tmp_name'], $caminho)) {
                    
                } else {
                    LocacaoController::insertImg($nome_arquivo, $idNovo[0]['id']);
                }
            }

            header("Location: /SAPINRS/views/perfis/perfil_colaborador.php?msg='Locação Salva com sucesso!'");
        }
    }
}

