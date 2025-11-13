<?php
require_once "models/Produto.php";

class ProdutoController {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function index() {
        $produto = new Produto($this->db);
        $stmt = $produto->listar();
        include "views/listar.php";
    }

    public function adicionar() {
        if ($_POST) {
            $produto = new Produto($this->db);
            $produto->nome = $_POST['nome'];
            $produto->preco = $_POST['preco'];
            $produto->categoria = $_POST['categoria'];
            if ($produto->criar()) header("Location: index.php");
        }
        include "views/adicionar.php";
    }

    public function editar($id) {
        $produto = new Produto($this->db);
        $produto->id = $id;
        $dados = $produto->buscarPorId();
        if ($_POST) {
            $produto->nome = $_POST['nome'];
            $produto->preco = $_POST['preco'];
            $produto->categoria = $_POST['categoria'];
            $produto->id = $id;
            if ($produto->atualizar()) header("Location: index.php");
        }
        include "views/editar.php";
    }

    public function excluir($id) {
        $produto = new Produto($this->db);
        $produto->id = $id;
        $produto->excluir();
        header("Location: index.php");
    }
}
?>