<?php
require __DIR__.'/vendor/autoload.php';

use  \App\Db\Pagination;
use App\Entidy\Categoria;
use   \App\Session\Login;

define('TITLE','Lista de Categorias');
define('BRAND','Categorias');


Login::requireLogin();


$buscar = filter_input(INPUT_GET, 'buscar', FILTER_SANITIZE_STRING);

$condicoes = [
    strlen($buscar) ? 'nome LIKE "%'.str_replace(' ','%',$buscar).'%" or 
                       id LIKE "%'.str_replace(' ','%',$buscar).'%"' : null
];

$condicoes = array_filter($condicoes);

$where = implode(' AND ', $condicoes);

$qtd = Categoria:: getQtd($where);


$pagination = new Pagination($qtd, $_GET['pagina'] ?? 1, 5);

$categorias = Categoria::getList($where, 'id desc',$pagination->getLimit());


include __DIR__ . '/includes/layout/header.php';
include __DIR__ . '/includes/layout/top.php';
include __DIR__ . '/includes/layout/menu.php';
include __DIR__ . '/includes/layout/content.php';
include __DIR__ . '/includes/categoria/categoria-form-list.php';
include __DIR__ . '/includes/layout/footer.php';
