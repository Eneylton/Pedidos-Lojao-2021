<?php

$resultados ='';

foreach ($categorias as $item ) {
   
   $resultados .= '<option value="'.$item->id.'">'.$item->nome.'</option>';

}

?>


<section class="content">
     <div class="container-fluid">
          <div class="row">
               <div class="col-6">
                    <form method="post" enctype="multipart/form-data">
                         <div class="card card-danger">
                              <div class="card-header ">
                                   <h3 class="card-title">Formulário de cadastro de novos produtos...</h3>

                                   <div class="align-items-end" style="margin-left: 86%;">
                                        <button type="submit" class="btn btn-warning">
                                             <i class="fas fa-check"></i> Cadastrar
                                        </button>
                                   </div>

                              </div>
                              <!-- /.card-header -->

                              <div class="card card-default">

                                   <!-- /.card-header -->
                                   <div class="card-body">
                                        <div class="row">
                                             <div class="col-md-6">
                                                  <div class="form-group">
                                                       <label>Foto</label>

                                                       <div class="input-group">
                                                            <div class="custom-file">
                                                                 <input type="file" class="custom-file-input" id="exampleInputFile" name="arquivo">
                                                                 <label class="custom-file-label" for="exampleInputFile">Adicionar imagem</label>
                                                            </div>
                                                            <div class="input-group-append">
                                                                 <span class="input-group-text">Upload</span>
                                                            </div>
                                                       </div>
                                                  </div>
                                                  <!-- /.form-group -->
                                                  <div class="form-group">
                                                       <label>Nome do Produto</label>
                                                       <input type="text" class="form-control" name="nome" required>

                                                  </div>

                                                  <div class="form-group">
                                                       <label>Quantidade</label>
                                                       <div class="range-wrap">
                                                            <input type="range" class="range" min="1" max="500" name="estoque">
                                                            <output class="bubble"></output>
                                                       </div>

                                                  </div>

                                                  <div class="form-group">
                                                       <label>Valor de compra</label>
                                                       <input type="text" class="form-control" name="valor_compra" required>

                                                  </div>


                                                  <div class="form-group">
                                                       <label>Valor de venda</label>
                                                       <input type="text" class="form-control" name="valor_venda" required>

                                                  </div>

                                             </div>
                                             <!-- /.col -->
                                             <div class="col-md-6">
                                                  <div class="form-group">
                                                       <label>Categoria</label>
                                                       <select class="form-control select2bs4" style="width: 100%;" name="categorias_id">
                                                       <option value="">Selecione uma Categoria !!!</option>
          
                                                       <?=$resultados ?>
          
                                                       </select>
                                                  </div>

                                                  <div class="form-group">
                                                       <label>Código</label>
                                                       <input type="text" class="form-control" name="codigo" required>

                                                  </div>

                                                  <div class="form-group">
                                                       <label>Código de Barra</label>
                                                       <input type="text" class="form-control" name="barra" required>

                                                  </div>

                                             </div>
                                             <!-- /.col -->
                                        </div>
                                        <!-- /.row -->
                                   </div>
                                   <!-- /.card-body -->
                                   <div class="card-footer">
                                        Entre em cotato: <a href="#">eneylton@hotmail.com - (98) 99158-1962</a> em caso de dúvidas e problemas no sistema...
                                   </div>
                              </div>


                         </div>

               </div>

          </div>
          </form>

     </div>


</section>

</div>
</section>