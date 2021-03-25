<?php

$resultados = '';
$total=0;
foreach ($produtos as $item) {
    $total += $item->subtotal;
    $resultados .= '<tr>

                      <td> <input type="checkbox" value="'.$item->produtos_id.'" name="id[]"></td>
                      <td>' . $item->codigo . '</td>
                      <td>' . $item->barra . '</td>
                      <td style="text-transform:uppercase">' . $item->nome . '</td>
                      <td>
                      
                      <span style="font-size:16px" class="' . ($item->qtd <= 3 ? 'badge badge-danger' : 'badge badge-success') . '">' . $item->qtd . '</span>
                      
                      </td>
                      
                      <td> R$ ' . number_format($item->valor_compra, "2",",",".") . '</td>
                      <td> <button type="button" class="btn btn-dark"> R$ ' . number_format($item->subtotal, "2", ",", ".") . '</button></td>

                      </tr>

                      ';
}

$resultados = strlen($resultados) ? $resultados : '<tr>
                                                     <td colspan="7" class="text-center" > Nenhuma Produto Encontrada !!!!! </td>
                                                     </tr>';

unset($_GET['status']);
unset($_GET['pagina']);
$gets = http_build_query($_GET);

//PAGINAÇÂO

$paginacao = '';
$paginas = $pagination->getPages();

foreach ($paginas as $key => $pagina) {
    $class = $pagina['atual'] ? 'btn-primary' : 'btn-secondary';
    $paginacao .= '<a href="?pagina=' . $pagina['pagina'] . '&' . $gets . '">

                  <button type="button" class="btn ' . $class . '">' . $pagina['pagina'] . '</button>
                  </a>';
}

?>
<section class="content">
   <div class="container-fluid">
      <div class="row">
         <div class="col-12">
            <div class="card card-danger">
               <div class="card-header">

                  <form method="get">
                     <div class="row my-7">
                        <div class="col">

                           <label>Pesquisar</label>
                           <input type="text" class="form-control" name="buscar" value="<?=$buscar?>">

                        </div>


                        <div class="col d-flex align-items-end">
                           <button type="submit" class="btn btn-warning" name="">
                              <i class="fas fa-search"></i>

                              Pesquisar

                           </button>

                        </div>


                     </div>

                  </form>

               </div>

                  <form id="form1" action="receber-insert.php" method="post">
               <div class="card-body">

                  <div class="col d-flex align-items-end">

                     <input type="submit" name="submit" value="Receber" onclick="return confirm('Produtos Atualizados com sucesso !!!')"  class="btn btn-danger" >
                  </div>
                  <br>
                  <table id="example1" class="table table-bordered table-hover table-striped">
                     <thead>
                        <tr>
                        
                           <th><input type="checkbox" id="select-all" > </th>
                           <th> CÓDIGO </th>
                           <th> BARRA </th>
                           <th> NOME </th>
                           <th> QTD </th>
                           <th> VALOR UNITÁRO </th>
                           <th> SUBTOTAL </th>
                        </tr>
                     </thead>
                     <tbody>
                        <?=$resultados?>
                     </tbody>

                        <tr>
                        <td colspan="6" style="text-align: right; ">TOTAL</td>

                        <td>

                        <button type="submit" class="btn btn-primary btn-lg" >
                         R$ <?=  number_format($total, "2",",",".") ?>
                        </button>
                        </td>
                        </tr>

                  </table>
               </div>

            </div>

         </div>
      </form>

      </div>

   </div>
</section>

<?=$paginacao?>


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Recipient:</label>
            <input type="text" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Message:</label>
            <textarea class="form-control" id="message-text"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Send message</button>
      </div>
    </div>
  </div>
</div>
