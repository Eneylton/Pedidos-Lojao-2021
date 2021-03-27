<?php

require __DIR__ . '/vendor/autoload.php';

use \App\Entidy\Estatistica;
use   \App\Session\Login;

define('TITLE', 'Painel de controle');
define('BRAND', 'Painel de controle ');


Login::requireLogin();

$estatistica = Estatistica:: getRank();
$despesas    = Estatistica:: getDespesas();



include __DIR__ . '/includes/layout/header.php';
include __DIR__ . '/includes/layout/top.php';
include __DIR__ . '/includes/layout/menu.php';
include __DIR__ . '/includes/layout/content.php';
include __DIR__ . '/includes/layout/box-infor.php';
include __DIR__ . '/includes/layout/footer.php';

?>

<script type="text/javascript">
var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: [

            <?php
            foreach ($estatistica as $item) {
                echo "'".$item->nome."',";
            }
             
            ?>
        ]
        ,
        datasets: [{
            label: '• PRODUTOS MAIS VENDIDOS •',
            data: [
                <?php
            foreach ($estatistica as $item) {
                echo "'".$item->contagem."',";
            }
             
            ?>
            ],
            backgroundColor: [
                '#6fe633a8',
                '#9d64a480',
                '#ee901d8f',
                '#d12f61',
                '#3d606c',
                '#F0379A',
                '#763dd986',
                '#d0ff0093',
                '#3794F0',
                '#33b092'
            ],
            borderColor: [
                '#6EE633',
                '#9d64a4',
                '#ee911d',
                '#d12f61',
                '#3d606c',
                '#F0379A',
                '#763DD9',
                '#d0ff00',
                '#3794F0',
                '#33b092'
             
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
</script>

