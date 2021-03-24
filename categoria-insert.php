<?php 

require __DIR__.'/vendor/autoload.php';

define('TITLE','Novo Categoria');
define('BRAND','Cadastrar Categoria');

use \App\Entidy\Categoria;
use  \App\Session\Login;
use   \App\File\Upload;

$alertaLogin  = '';
$alertaCadastro = '';

$usuariologado = Login:: getUsuarioLogado();

$usuarios = Categoria::getList(null,null,null);

Login::requireLogin();

if(isset($_FILES['arquivo'])){
    $obUpload = new Upload ($_FILES['arquivo']);
    $sucesso = $obUpload->upload(__DIR__.'/imgs',false);
    $obUpload->gerarNovoNome();

    if($sucesso){

        echo 'Arquivo Enviado ' .$obUpload->getBasename(). "com Sucesso" ;

        if(isset($_POST['nome'])){


            $item = new Categoria;
            $item->nome = $_POST['nome'];
            $item->foto = $obUpload->getBasename();
            $item->cadastar();
    
            header('location: categoria-list.php?status=success');
            exit;
        }

    }

}



include __DIR__.'/includes/layout/header.php';
include __DIR__.'/includes/layout/top.php';
include __DIR__.'/includes/layout/menu.php';
include __DIR__.'/includes/layout/content.php';
include __DIR__.'/includes/categoria/categoria-form-insert.php';
include __DIR__.'/includes/layout/footer.php';