<?php
$modal = '';
$i = 0;

if (isset($galerias)) {
    foreach ($galerias as $item) {
        $actives = '';

        if ($i == 0) {
            $actives = 'active';
        }
        $i++;

        $modal .= '<div class="col-sm-2">
                   <a href="'.$item->foto.'" data-toggle="lightbox" data-title="sample 1 - white" data-gallery="gallery">
                   <img src="'.$item->foto.'" class="img-fluid mb-2" alt="white sample"/>
        </a>
      </div>';
    }
}

?>

<div class="col-12">
            <div class="card card-danger">
              <div class="card-header">
              <div class="align-items-end" style="margin-left: 94%;">
                                <a href="produto-list.php" class="btn btn-dark">
                                    <i class="fas fa-check"></i> voltar
                                </a>
                            </div>
              </div>
              <div class="card-body">
                <div class="row">
                  <?=$modal?>
                </div>
              </div>
            </div>
          </div>