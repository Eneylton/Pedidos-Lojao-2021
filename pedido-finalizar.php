<?php

require __DIR__.'/vendor/autoload.php';
session_start();



use \App\Entidy\Pedido;
use   \App\Session\Login;

Login::requireLogin();
$usuariologado = Login:: getUsuarioLogado();
$usuario_id = $usuariologado['id'];

foreach ($_SESSION['dados'] as $key) {
  
        $item = new Pedido;
        $item->nome          = $key['nome'];
        $item->qtd           = $key['qtd'];
        $item->subtotal      = $key['subtotal'];
        $item->usuarios_id   = $usuario_id;
        $item->produtos_id   = $key['produtos_id'];
        $item->status        = 1;
        $item-> cadastar();
    
    }    
    
    header('location:pedido-sucesso.php?status=success');
    



