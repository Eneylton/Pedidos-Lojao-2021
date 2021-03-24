<?php 

require __DIR__.'/vendor/autoload.php';

use \App\Entidy\Produto;
use   \App\Session\Login;


Login::requireLogin();



if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
 
    header('location: index.php?status=error');

    exit;
}

$produto = Produto::getID($_GET['id']);

if(!$produto instanceof Produto){
    header('location: index.php?status=error');

    exit;
}



if(!isset($_POST['excluir'])){
    
 
    $produto->excluir();

    header('location: produto-list.php?status=success');

    exit;
}

