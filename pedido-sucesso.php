<?php

require __DIR__.'/vendor/autoload.php';
session_start();

$_SESSION['carrinho'];

if (isset($_SESSION['carrinho'])) {
    unset($_SESSION['carrinho']);
}



define('TITLE', 'Pedido realizado com sucesso.....');
define('BRAND', 'Pedido');

use   \App\Session\Login;

Login::requireLogin();
$usuariologado = Login:: getUsuarioLogado();
$usuario_id = $usuariologado['id'];


include __DIR__ . '/includes/layout/header.php';
include __DIR__ . '/includes/layout/top.php';
include __DIR__ . '/includes/layout/menu.php';
include __DIR__ . '/includes/layout/content.php';
include __DIR__ . '/includes/pedido/pedido-form-sucesso.php';
include __DIR__ . '/includes/layout/footer.php';
