<?php

require __DIR__ . '/vendor/autoload.php';

$alertaCadastro = '';

define('TITLE', 'Editar Produto');
define('BRAND', 'Produto');

use \App\Entidy\Produto;
use \App\Entidy\Categoria;
use  \App\Session\Login;
use   \App\File\Upload;


Login::requireLogin();



if (!isset($_GET['id']) or !is_numeric($_GET['id'])) {

    header('location: index.php?status=error');

    exit;
}

$value = Produto::getID($_GET['id']);

$categorias = Categoria::getList(null,null,null);


if (!$value instanceof Produto) {
    header('location: index.php?status=error');

    exit;
}

if (isset($_FILES['arquivo'])) {
    $obUpload = new Upload($_FILES['arquivo']);
    $sucesso = $obUpload->upload(__DIR__ . '/imgs', false);
    $obUpload->gerarNovoNome();

    if ($sucesso) {

        echo 'Arquivo Enviado ' . $obUpload->getBasename() . "com Sucesso";

        if (isset($_POST['nome'])) {

            $value->codigo          = $_POST['codigo'];
            $value->barra           = $_POST['barra'];
            $value->nome            = $_POST['nome'];
            $value->qtd             = 1;
            $value->status          = 0;
            $value->estoque         = $_POST['estoque'];
            $value->valor_compra    = $_POST['valor_compra'];
            $value->valor_venda     = $_POST['valor_venda'];
            $value->foto            = $obUpload->getBasename();
            $value->categorias_id   = $_POST['categorias_id'];
            $value->usuarios_id     = 7;
            
            $value->atualizar();

            header('location: produto-list.php?status=success');

            exit;
        } 
        }else {

            if (isset($_POST['nome'])) {

                $value->codigo          = $_POST['codigo'];
                $value->barra           = $_POST['barra'];
                $value->nome            = $_POST['nome'];
                $value->qtd             = 1;
                $value->status          = 0;
                $value->estoque         = $_POST['estoque'];
                $value->valor_compra    = $_POST['valor_compra'];
                $value->valor_venda     = $_POST['valor_venda'];
                $value->categorias_id   = $_POST['categorias_id'];
                $value->usuarios_id     = 7;
                $value->atualizar();

                header('location: produto-list.php?status=success');

                exit;
            }
    }
}







include __DIR__ . '/includes/layout/header.php';
include __DIR__ . '/includes/layout/top.php';
include __DIR__ . '/includes/layout/menu.php';
include __DIR__ . '/includes/layout/content.php';
include __DIR__ . '/includes/produto/produto-form-edit.php';
include __DIR__ . '/includes/layout/footer.php';
