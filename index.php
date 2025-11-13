<?php
require_once "config/Database.php";
require_once "controllers/ProdutoController.php";

$database = new Database();
$db = $database->getConnection();
$controller = new ProdutoController($db);

$acao = $_GET['acao'] ?? 'index';
$id = $_GET['id'] ?? null;

switch ($acao) {
    case 'adicionar':
        $controller->adicionar();
        break;
    case 'editar':
        $controller->editar($id);
        break;
    case 'excluir':
        $controller->excluir($id);
        break;
    default:
        $controller->index();
}
?>