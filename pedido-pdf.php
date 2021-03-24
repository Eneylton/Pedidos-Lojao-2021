<?php

require __DIR__ . '/vendor/autoload.php';

use \App\Entidy\Pedido;
use   \App\Session\Login;


Login::requireLogin();


$pedidos = Pedido::getList();

$res = "";

foreach ($pedidos as $item) {

    $res .= '
<tr>
<td>'.date('d/m/Y à\s H:i:s ', strtotime($item->data)).'</td>
<td style="text-align:left;text-transform: uppercase;">' . $item->nome . '</td>
<td>' . $item->qtd . '</td>
<td style="text-align:left"> R$ ' . number_format($item->subtotal, "2",",",".") . '</td>
</tr>
';
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        @page{
            margin: 70px 0;
        }

        body{
            margin:0;
            padding: 0;
            font-family:"Open Sans", sans-serif;
        }
        
        .header{
            position: fixed;
            top:-70px;
            left: 0;
            right: 0;
            width: 100%;
            text-align: center;
            background-color: #555555;
            padding: 10px;
        }

        .header img {
            width: 160px;
        }

        .footer{
            bottom: -27px;
            left: 0;
            width: 100%;
            padding: 5px 10px 10px 10px;
            text-align: center;
            background: #555555;
            color: #fff;
            }     
            
            .footer .page:after{
                content: counter(page);
            }

            table{
                width: 100%;
                border: 1px solid #555555;
                margin: 0;
                padding: 0;
            }

            th{
                text-transform: uppercase;
            }

            table, th, td {
                border: 1px solid #555555;
                border-collapse:collapse;
                text-align: center;
                padding: 5px;

            }

            tr:nth-child(2n+0){
                background: #eeeeee;
            }

            p{
                color:#888888;
                margin: 0;
                text-align: center;
            }

            h2{
                text-align: center;
            }

    </style>

    <title>Lista de Pedidos</title>
</head>

<body>

    <img style="width:120px; height:50px; margin-left:10px; margin-top:-10px;" src="01.png">

    <table>
        <tbody>
            <tr style="background-color: #000; color:#fff">
                <td>DATA</td>
                <td>NOME</td>
                <td>QTD</td>
                <td>SUBTOTAL</td>
            </tr>

            <?= $res ?>

        </tbody>
    </table>

</body>

</html>