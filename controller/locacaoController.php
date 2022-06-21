<?php 
include_once 'conexaoController.php';

class LocacaoController{
    
    public static function getListLocacoes(){
        $query = 'SELECT locacoes.*, imagens.nome as img from locacoes INNER JOIN imagens ON locacoes.id = imagens.fk_locacoes';
        $result = ConexaoController::consultar($query);
        $jsonLista = [];
        foreach ($result as $r) {
            array_push($jsonLista, $r);
        }
        return json_encode($jsonLista);
    }

    public static function getLocacaoById($id) {
        $query = 'SELECT locacoes.*, imagens.nome as img from locacoes INNER JOIN imagens ON locacoes.id = imagens.fk_locacoes where locacoes.id = '.$id;
        $result = ConexaoController::consultar($query);
        $jsonLista = [];
        foreach ($result as $r) {
            array_push($jsonLista, $r);
        }
        return $jsonLista;
    }
    
    public static function updateLocacao($id, $nome, $preco, $desc, $capacidade){
        $query = "UPDATE locacoes SET nome = '$nome', preco = $preco, descricao = '$desc', capacidade = $capacidade WHERE id = $id";
        ConexaoController::executar($query);
    }
    
    public static function UploadImg($nome_arquivo, $id){
        $query = 'UPDATE imagens SET nome = "'.$nome_arquivo.'" WHERE imagens.fk_locacoes ='.$id;
        conexaoController::executar($query);
    }
    
    public static function insertImg($nome_arquivo, $id){
        $query = "INSERT INTO imagens (nome, fk_locacoes) VALUES ('$nome_arquivo', $id)";
        conexaoController::executar($query);
    }
    
    public static function createLocacao($nome, $preco, $desc, $capacidade){
        $query = "INSERT INTO locacoes (nome, preco, descricao, capacidade) VALUES ('$nome', $preco, '$desc', $capacidade)";
        ConexaoController::executar($query);
        $query2 = "SELECT id from locacoes where nome = '$nome' and preco = $preco and descricao = '$desc' and capacidade = $capacidade";
        $result = ConexaoController::consultar($query2);

        $jsonLista = [];
        foreach ($result as $r) {
            array_push($jsonLista, $r);
        }
        return $jsonLista;
    }
    
    public static function excluirById($id) {
        $query = "DELETE FROM locacoes where id = $id";
        conexaoController::executar($query);
        $query2 = "DELETE FROM imagens where fk_locacoes = $id";
        conexaoController::executar($query2);
    }
}