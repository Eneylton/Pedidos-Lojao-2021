<section class="content">
     <div class="container-fluid">
          <div class="row">
               <div class="col-6">
               <form method="post" enctype="multipart/form-data">
                         <div class="card card-danger">
                              <div class="card-header ">
                                   <h3 class="card-title">Formulário de cadastro de novas categorias...</h3>

                                   <div class="align-items-end" style="margin-left: 86%;">
                                        <button type="submit" class="btn btn-warning">
                                             <i class="fas fa-check"></i> Editar
                                        </button>
                                   </div>

                              </div>
                              <!-- /.card-header -->

                              <div class="card-body">

                                        <div class="form-group">
                                             <img src="assets/02.jpg" style="width: 70px;">
                                             <label>Upload</label>
                                             <input type="file" name="arquivo" class="form-control">

                                        </div>


                                        <div class="form-group">
                                             <label>Nome</label>
                                             <input type="text" class="form-control" name="nome" required value="<?= $value->nome ?>">
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