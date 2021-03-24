<?php

require __DIR__ . '/vendor/autoload.php';

$alertaCadastro = '';

define('TITLE', 'Editar Categoria');
define('BRAND', 'Categoria');

use \App\Entidy\Categoria;
use  \App\Session\Login;
use   \App\File\Upload;


Login::requireLogin();

if (!isset($_GET['id']) or !is_numeric($_GET['id'])) {

    header('location: index.php?status=error');

    exit;
}

$value = Categoria::getID($_GET['id']);


if (!$value instanceof Categoria) {
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

            $value->nome = $_POST['nome'];
            $value->foto = $obUpload->getBasename();
            $value->atualizar();

            header('location: categoria-list.php?status=success');

            exit;
        } 
        }else {

            if (isset($_POST['nome'])) {

                $value->nome = $_POST['nome'];
                $value->atualizar();

                header('location: categoria-list.php?status=success');

                exit;
            }
    }
}







include __DIR__ . '/includes/layout/header.php';
include __DIR__ . '/includes/layout/top.php';
include __DIR__ . '/includes/layout/menu.php';
include __DIR__ . '/includes/layout/content.php';
include __DIR__ . '/includes/categoria/categoria-form-edit.php';
include __DIR__ . '/includes/layout/footer.php';
