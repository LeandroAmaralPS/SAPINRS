<?php

include_once '../controller/aluguelController.php';

if($_POST['acao'] == 'confirmar'){
    print_r(aluguelController::confirmarAluguel($_POST['id'], $_POST['data'], $_POST['turno']));
}else{
    print_r(aluguelController::cancelarAluguel($_POST['id']));
}
