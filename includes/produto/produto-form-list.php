<?php

$resultados = '';

foreach ($produtos2 as $item) {

   $resultados .= '<tr>
                      <td>
                      <a href="galeria-list.php?id=' . $item->id . '">
                      <img style="width:80px; heigth:70px;object-fit: contain;" src="' . $item->foto . '" class="img-thumbnail">
                      </a>
                      </td>
                      <td>' . $item->codigo . '</td>
                      <td>' . $item->barra . '</td>
                      <td>' . date('d/m/Y à\s H:i:s', strtotime($item->data)) . '</td>
                      <td style="text-transform: uppercase;">' . $item->nome . '</td>
                      <td style="text-transform: uppercase;">' . $item->categoria . '</td>
                      <td>
                      
                      <span style="font-size:16px" class="' . ($item->estoque <= 3 ? 'badge badge-danger' : 'badge badge-success') . '">' . $item->estoque . '</span>
                      
                      </td>
                      <td> <button type="button" class="btn btn-dark"> R$ ' . number_format($item->valor_compra, "2", ",", ".") . '</button></td>
                      <td style="text-align: center;">
                      
                      <a href="galeria-insert.php?id=' . $item->id . '">
                         <button type="button" class="btn btn-warning"> <i class="fas fa-images"></i></button>
                       </a>

                       <a href="produto-edit.php?id=' . $item->id . '">
                         <button type="button" class="btn btn-primary"> <i class="fas fa-paint-brush"></i> </button>
                       </a>

                       <a href="produto-delete.php?id=' . $item->id . '">
                       <button type="button" class="btn btn-danger"> <i class="fas fa-trash"></i></button>
                       </a>


                      </td>
                      </tr>

                      ';
}

$resultados = strlen($resultados) ? $resultados : '<tr>
                                                     <td colspan="6" class="text-center" > Nenhuma Vaga Encontrada !!!!! </td>
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

                           <label>Pesquisar </label>
                           <input type="text" class="form-control" name="buscar" value="<?= $buscar ?>">

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

               <div class="card-body">

                  <div class="col d-flex align-items-end">

                     <a href="produto-insert.php">
                        <button type="submit" class="btn btn-success"> <i class="fas fa-plus"></i> Adicionar novo produto</button>
                     </a>

                  </div>
                  <br>
                  <table id="example1" class="table table-bordered table-hover table-striped">
                     <thead>
                        <tr>
                           <th> IMAGEM </th>
                           <th> CÓDIGO </th>
                           <th> BARRA </th>
                           <th> DATA CADASTRO </th>
                           <th> NOME </th>
                           <th> CATEGORIA </th>
                           <th> QTD </th>
                           <th> VALOR </th>
                           <th style="text-align: center;"> AÇÃO </th>
                        </tr>
                     </thead>
                     <tbody>
                        <?= $resultados ?>
                     </tbody>

                  </table>
               </div>

            </div>

         </div>

      </div>

   </div>
</section>

<?= $paginacao ?>


