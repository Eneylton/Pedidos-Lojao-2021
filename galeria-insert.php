<?php 

require __DIR__.'/vendor/autoload.php';

define('TITLE','Adicionar imagens a galeria');
define('BRAND','Cadastrar imagens');

use \App\Entidy\Produto;
use  \App\Entidy\Galeria;
use   \App\Session\Login;
use    \App\File\Upload;


Login::requireLogin();



if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
 
    header('location: index.php?status=error');

    exit;
}

$produtos = Produto::getID($_GET['id']);

$produtos_id = $produtos->id;

if(!$produtos instanceof Produto){
    header('location: index.php?status=error');

    exit;
}

if(isset($_FILES['arquivo'])){

    $uploads = Upload::createMultpleUpload($_FILES['arquivo']);

    foreach ($uploads as $obUpload) {

        $sucesso = $obUpload->upload(__DIR__.'/imgs',false);

        $obUpload->gerarNovoNome();

        if($sucesso){

            if(isset($_FILES['arquivo'])){
    
                $item = new Galeria;
                $item->produtos_id = $produtos_id;
                $item->foto = $obUpload->getBasename();
                $item-> cadastar();
            
                header('location: produto-list.php?status=success');
            
                continue;
                
            }
        }
    
       echo "Problemas ao eviar arquivos !!!!! <br>";
        
    }

}

include __DIR__.'/includes/layout/header.php';
include __DIR__.'/includes/layout/top.php';
include __DIR__.'/includes/layout/menu.php';
include __DIR__.'/includes/layout/content.php';
include __DIR__.'/includes/galeria/galeria-form-insert.php';
include __DIR__.'/includes/layout/footer.php';