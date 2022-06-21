<?php

include_once 'conexaoController.php';

class usuarioController {

    public static function getFoto($idUser) {
        $query = "SELECT foto FROM login where id = $idUser";
        $result = ConexaoController::consultar($query);

        $r = mysqli_fetch_assoc($result);
        return $r['foto'];
    }
    
    public static function getCpf($idUser) {
        $query = "SELECT cpf FROM login where id = $idUser";
        $result = ConexaoController::consultar($query);

        $r = mysqli_fetch_assoc($result);
        return $r['cpf'];
    }

    public static function getListUsuarios() {
        $query = 'SELECT * FROM login';
        $result = ConexaoController::consultar($query);
        $jsonLista = [];
        foreach ($result as $r) {
            array_push($jsonLista, $r);
        }
        return json_encode($jsonLista);
    }

    public static function getUsuarioById($id) {
        $query = 'SELECT * from login where id = ' . $id;
        $result = ConexaoController::consultar($query);
        $jsonLista = [];
        foreach ($result as $r) {
            array_push($jsonLista, $r);
        }
        return $jsonLista;
    }

    public static Function updateUsuario($idUsuario, $nome, $login, $cpf, $email, $telefone, $status, $senha, $perm) {

        if ($senha == null) {
            $query = "UPDATE login SET nome = '$nome', usuario = '$login', cpf = '$cpf', email = '$email' , telefone = '$telefone', status = '$status', fk_tipo_usuario = $perm WHERE id = $idUsuario";
            ConexaoController::executar($query);
        } else {
            $s = md5($senha);
            $query = "UPDATE login SET nome = '$nome', usuario = '$login', cpf = '$cpf', email = '$email' , telefone = '$telefone', status = '$status', fk_tipo_usuario = $perm, senha = '$s'  WHERE id = $idUsuario";
            ConexaoController::executar($query);
        }
    }

    public static function createUsuario($nome, $login, $cpf, $email, $telefone, $status, $senha) {
        $s = md5($senha);
        $query = "INSERT INTO login (nome, usuario, cpf, email, telefone, status, senha) VALUES ('$nome', '$login', '$cpf', '$email', '$telefone', '$status', '$s')";

        ConexaoController::executar($query);
    }

    
    public static function excluirById($id) {
        $query = "UPDATE login set status = 'inativo' where id = $id";
        conexaoController::executar($query);
    }
    
    public static function getLocacoesUser($id) {
        $query = "SELECT aluguel.*, locacoes.preco, locacoes.nome FROM login inner join aluguel on login.id = aluguel.fk_login inner join locacoes on locacoes.id = aluguel.fk_location where aluguel.fk_login = $id and aluguel.status = 'alugado'";
        $result = ConexaoController::consultar($query);
        $jsonLista = [];
        foreach ($result as $r) {
            array_push($jsonLista, $r);
        }
        return json_encode($jsonLista);
    }
}
