<?php 

require __DIR__.'/vendor/autoload.php';

define('TITLE','Novo Produto');
define('BRAND','Cadastrar Produtos
');

use \App\Entidy\Produto;
use \App\Entidy\Categoria;
use  \App\Session\Login;
use   \App\File\Upload;

$alertaLogin  = '';
$alertaCadastro = '';

$usuariologado = Login:: getUsuarioLogado();

$usuarios = Produto::getList(null,null,null);
$categorias = Categoria::getList(null,null,null);

Login::requireLogin();

if(isset($_FILES['arquivo'])){
    $obUpload = new Upload ($_FILES['arquivo']);
    $sucesso = $obUpload->upload(__DIR__.'/imgs',false);
    $obUpload->gerarNovoNome();

    if($sucesso){

        echo 'Arquivo Enviado ' .$obUpload->getBasename(). "com sucesso" ;

        if(isset($_POST['nome'])){
            $item = new Produto;

            $item->codigo          = $_POST['codigo'];
            $item->barra           = $_POST['barra'];
            $item->nome            = $_POST['nome'];
            $item->qtd             = 1;
            $item->status          = 0;
            $item->estoque         = $_POST['estoque'];
            $item->valor_compra    = $_POST['valor_compra'];
            $item->valor_venda     = $_POST['valor_venda'];
            $item->foto            = $obUpload->getBasename();
            $item->categorias_id   = $_POST['categorias_id'];
            $item->usuarios_id     = 7;
            $item->cadastar();
    
            header('location: produto-list.php?status=success');
            exit;
        }

    }

}



include __DIR__.'/includes/layout/header.php';
include __DIR__.'/includes/layout/top.php';
include __DIR__.'/includes/layout/menu.php';
include __DIR__.'/includes/layout/content.php';
include __DIR__.'/includes/produto/produto-form-insert.php';
include __DIR__.'/includes/layout/footer.php';