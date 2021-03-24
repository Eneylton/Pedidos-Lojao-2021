<?php

require __DIR__ . '/vendor/autoload.php';

use   \App\Session\Login;

define('TITLE', 'Painel de controle');
define('BRAND', 'Painel de controle ');


Login::requireLogin();


include __DIR__ . '/includes/layout/header.php';
include __DIR__ . '/includes/layout/top.php';
include __DIR__ . '/includes/layout/menu.php';
include __DIR__ . '/includes/layout/content.php';
include __DIR__ . '/includes/layout/box-infor.php';
include __DIR__ . '/includes/layout/footer.php';
