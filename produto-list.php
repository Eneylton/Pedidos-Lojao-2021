<?php
require __DIR__ . '/vendor/autoload.php';

use  \App\Db\Pagination;
use   \App\Entidy\Produto;
use     \App\Session\Login;

define('TITLE', 'Lista de Produtos');
define('BRAND', 'Produtos');


Login::requireLogin();


$buscar = filter_input(INPUT_GET, 'buscar', FILTER_SANITIZE_STRING);

$condicoes = [
    strlen($buscar) ? 'p.nome LIKE "%' . str_replace(' ', '%', $buscar) . '%" 
                       or 
                       p.codigo LIKE "%' . str_replace(' ', '%', $buscar) . '%"
                       or 
                       c.nome LIKE "%' . str_replace(' ', '%', $buscar) . '%"
                       or 
                       p.barra LIKE "%' . str_replace(' ', '%', $buscar) . '%"
                       or 
                       p.data LIKE "%' . str_replace(' ', '%', $buscar) . '%"' : null
];

$condicoes = array_filter($condicoes);

$where = implode(' AND ', $condicoes);

$qtd = Produto::qtdCount($where);


$pagination = new Pagination($qtd, $_GET['pagina'] ?? 1, 40);

// $produtos = Produto::getList($where, 'id DESC',$pagination->getLimit());

$produtos2 = Produto::getRelacinadas($where, 'id DESC', $pagination->getLimit());


include __DIR__ . '/includes/layout/header.php';
include __DIR__ . '/includes/layout/top.php';
include __DIR__ . '/includes/layout/menu.php';
include __DIR__ . '/includes/layout/content.php';
include __DIR__ . '/includes/produto/produto-form-list.php';
include __DIR__ . '/includes/layout/footer.php';
