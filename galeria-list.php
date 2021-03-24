<?php 

require __DIR__.'/vendor/autoload.php';

define('TITLE','Galeria e Imagens');
define('BRAND','Galeria e Imagens');


use  \App\Entidy\Galeria;
use   \App\Session\Login;


Login::requireLogin();

if (!isset($_GET['id']) ) {    
         
}else{
    
    $galerias = Galeria::getGaleriaImg($_GET['id']);
}



include __DIR__ . '/includes/layout/header.php';
include __DIR__ . '/includes/layout/top.php';
include __DIR__ . '/includes/layout/menu.php';
include __DIR__ . '/includes/layout/content.php';
include __DIR__ . '/includes/produto/produto-form-galeria.php';
include __DIR__ . '/includes/layout/footer.php';