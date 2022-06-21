<?php

include_once 'conexaoController.php';

class aluguelController {

    public static function checkDisponibilidade($turno, $data) {
        $query = "select turno, status from aluguel where turno = '$turno' and data = '$data'";
        $result = ConexaoController::consultar($query);

        $msg = null;

        foreach ($result as $r) {
            if ($r['status'] == 'alugado') {
                $t = $r['turno'];
                $msg = "Este local já está alugado pelo turno da $t";
                break;
            }
        }
        return $msg;
    }

    public static function registraAluguel($fk, $data, $turno, $status, $idUser, $localId) {
        $queryAluguel = "INSERT INTO aluguel (data, turno, status, $fk, fk_location) VALUES ('$data', '$turno', '$status', $idUser, $localId)";
        ConexaoController::executar($queryAluguel);
    }

    public static function getAlugueis() {
        $query = "SELECT aluguel.id, aluguel.data, aluguel.turno, guest.nome as user, guest.cpf as gcpf, aluguel.status, guest.telefone as gtelefone, guest.email as gemail, locacoes.nome as locacao, login.nome as socio, login.cpf, login.telefone, login.email from aluguel "
                . "left join guest on aluguel.fk_guest = guest.id inner join locacoes on locacoes.id = aluguel.fk_location "
                . "left join login on login.id = aluguel.fk_login";

        $result = ConexaoController::consultar($query);
        $jsonLista = [];
        foreach ($result as $r) {
            array_push($jsonLista, $r);
        }
        return json_encode($jsonLista);
    }

    public static function confirmarAluguel($id, $data, $turno) {
        $msg = aluguelController::checkDisponibilidade($turno, $data);

        if ($msg == null) {
            $query = "UPDATE aluguel SET status = 'alugado', data = '$data', turno = '$turno' where id = $id";
            ConexaoController::executar($query);
            $msg = 'Aluguel cadastrado com sucesso!';
            return $msg;
        } else {
            $msg = 'Esta data não está mais disponível!';
            return $msg;
        }
    }

    public static function cancelarAluguel($id) {
        $query = "UPDATE aluguel SET status = 'cancelado' where id = $id";
        ConexaoController::executar($query);
        $msg = 'Aluguel cancelado com sucesso!';
        return $msg;
    }

    public static function getRelatorio() {
        $query = "SELECT * from locacoes";
        $result = ConexaoController::consultar($query);
        $obj = array();

        $count = 0;
        foreach ($result as $r) {
            $query2 = "SELECT aluguel.data FROM aluguel where fk_location = " . $r['id'];
            $result2 = ConexaoController::consultar($query2);

            $qtd = 0;

            foreach ($result2 as $r2) {
                if (date('m', strtotime($r2["data"])) == date('m')) {
                    $qtd++;
                }
            }
            $obj[$count] = ["nome" => $r["nome"], "preco" => $r["preco"], "qtd" => $qtd];
            $count++;
        }


        return json_encode($obj);
    }

}
