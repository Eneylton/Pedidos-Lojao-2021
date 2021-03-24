<?php 

require __DIR__.'/vendor/autoload.php';

use \App\Entidy\Categoria;
use   \App\Session\Login;


Login::requireLogin();



if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
 
    header('location: index.php?status=error');

    exit;
}

$categoria = Categoria::getID($_GET['id']);

if(!$categoria instanceof Categoria){
    header('location: index.php?status=error');

    exit;
}



if(!isset($_POST['excluir'])){
    
 
    $categoria->excluir();

    header('location: categoria-list.php?status=success');

    exit;
}

