<?php $i=0?>

<div class="breadcumb_area bg-img" style="background-image: url(<?= base_url('TWFF/vendor/template/front_end/img/bg-img/bg-acerca.jpg')?>);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="page-title text-center">
                        <h2>Pregungtas Frecuentes</h2>
                    </div>
                </div>
            </div>
        </div>
</div>
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8">
            <div class="regular-page-content-wrapper section-padding-80">
                <div class="regular-page-text">


                <?php foreach($faqs as $fa): 
                    $i = $i + 1;?>
                <a class="collapsed card-link" data-toggle="collapse" href="#<?=$i;?>">
                    <h3><i class="fa fa-plus-square-o" aria-hidden="true"></i> <?=$fa['pregunta'];?></h3>
                </a>

                    <div id="<?=$i;?>" class="collapse">
                        <p><?=$fa['respuesta'];?></p> 
                    </div>
                    <br>
                <?php endforeach; ?>

                </div>
            </div>
        </div>
    </div>
</div>