<?php

require __DIR__.'/vendor/autoload.php';
session_start();

use \App\Entidy\Pedido;
use \App\Entidy\Estatistica;
use   \App\Session\Login;

Login::requireLogin();
$usuariologado = Login:: getUsuarioLogado();
$usuario_id = $usuariologado['id'];

foreach ($_SESSION['dados'] as $key) {
  
        $item = new Pedido;
        $item->nome          = $key['nome'];
        $item->codigo        = $key['codigo'];
        $item->barra         = $key['barra'];
        $item->qtd           = $key['qtd'];
        $item->valor_compra  = $key['valor_compra'];
        $item->subtotal      = $key['subtotal'];
        $item->usuarios_id   = $usuario_id;
        $item->produtos_id   = $key['produtos_id'];
        $item->status        = 1;
        $item-> cadastar();


        $item2 = new Estatistica;
        $item2->nome          = $key['nome'];
        $item2->codigo        = $key['codigo'];
        $item2->barra         = $key['barra'];
        $item2->qtd           = $key['qtd'];
        $item2->valor_compra  = $key['valor_compra'];
        $item2->subtotal      = $key['subtotal'];
        $item2->usuarios_id   = $usuario_id;
        $item2->produtos_id   = $key['produtos_id'];
        $item2->status        = 1;
        $item2-> cadastar();
    
    }    
    
    header('location:pedido-sucesso.php?status=success');
    



