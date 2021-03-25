<?php

require __DIR__ . '/vendor/autoload.php';

$alertaCadastro = '';

define('TITLE', 'Editar Pedido');
define('BRAND', 'Pedido');

use \App\Entidy\Pedido;
use \App\Entidy\Produto;
use  \App\Session\Login;

Login::requireLogin();

if(isset($_POST['submit'])){
    if(isset($_POST['id'])){
        
        foreach ($_POST['id'] as $id) {
            $item   =  Pedido::getITem($id);
            $estoque = Produto::getID($id);
            $soma = $estoque->estoque + $item->qtd;
            $estoque->estoque = $soma; 
            $estoque->atualizar();

            $item->status = 0;
            $item->atualizar();

            header('location: pedido-receber.php?status=success');
           
        }
    }
}

