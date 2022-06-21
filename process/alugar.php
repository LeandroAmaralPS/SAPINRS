<?php

include_once '../controller/locacaoController.php';
include_once '../controller/conexaoController.php';
include_once '../controller/aluguelController.php';
include_once '../controller/guestController.php';

$localId = $_POST['local'];
$data = $_POST['date'];

$manha = isset($_POST['manha']) ? 'manha' : null;
$meio_dia = isset($_POST['meio-dia']) ? 'meio-dia' : null;
$tarde = isset($_POST['tarde']) ? 'tarde' : null;
$noite = isset($_POST['noite']) ? 'noite' : null;
$arrayTurno = array($manha, $meio_dia, $tarde, $noite);

session_start();
if (isset($_SESSION['logado'])) {
    $idUser = $_SESSION['logado'];
    $fk = 'fk_login';
    $status = 'alugado';
} else {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $cpf = $_POST['cpf'];
    
    $idUser = guestController::createGuest($nome, $email, $telefone, $cpf);

    $fk = 'fk_guest';
    $status = 'analise';
}
$header = '';
foreach ($arrayTurno as $turno) {
    if ($turno != null) {
        $disponibilidade = aluguelController::checkDisponibilidade($turno, $data);

        if ($disponibilidade != null) {
            $header = "Location: ../views/locacoes/locacao.php?id=$localId&msg='$disponibilidade'";
            break;
        }
    }
}

if($header == ''){
    foreach ($arrayTurno as $turno) {
        if ($turno != null) {
            aluguelController::registraAluguel($fk, $data, $turno, $status, $idUser, $localId);
        }
    }

    if (isset($_SESSION['logado'])) {
        $header = "Location: ../views/locacoes/locacao.php?id=$localId&msg='Local alugado com sucesso!'";
    } else {
        $header = "Location: ../views/locacoes/locacao.php?id=$localId&msg='Seu pedido foi registrado em nosso sistema, aguarde nosso contato para confirmação.'";
    }
}

header($header);