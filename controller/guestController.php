<?php

include_once 'conexaoController.php';

class guestController {
    
    public static function createGuest($nome, $email, $telefone, $cpf) {
        $guest = bin2hex(random_bytes(18));
        $query = "insert into guest ( guest, nome, email, telefone, cpf) VALUES ( '$guest', '$nome', '$email', '$telefone', '$cpf')";
        ConexaoController::executar($query);

        $query2 = "select id FROM guest where guest = '$guest'";
        $result = ConexaoController::consultar($query2);

        $usuario = mysqli_fetch_assoc($result);
        return $usuario['id'];
    }
}
