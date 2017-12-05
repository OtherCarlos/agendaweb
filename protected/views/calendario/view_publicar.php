<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'calendario-update-form',
	'enableAjaxValidation'=>false,
        'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>

<script>
$('#nav-calendario').addClass('active');
</script>

<section style="text-align: center">
    <h1>Detalle de Actividad del día <?php echo $view["fecha_calendario"] ?></h1>
</section>

<section>
    <div class="row-create">
        TÍTULO: <?php echo $view['titulo'] ?>
    </div>

    <div style="text-align: justify; margin-top: 30px;"> 
        DESCRIPCIÓN: <?php echo $view['resumen'] ?> 
    </div>  
</section>

<section>
    <div class="row">
        <div class="col-md-12">PUBLICACIÓN: <?= $publicacion->publicacion ?></div>
    </div>
    <div class="row">
        <div class="col-md-12" id="image">
            <?php 
             $i = 0;
             foreach($image as $img) { 
             ?>
            <div class="row" id="image_content">
                <?php $url = str_replace('/', '-', $img->url); ?>
                <a href="<?= $this->createUrl('/calendario/download/url/' . $url . '/name/' . $img->nombre); ?>"><span class="fa fa-save"></span>
                <div class="col-md-12"><img src="<?= Yii::app()->baseUrl . $img->url . '/' . $img->nombre ?>" width="100%"/></div></a>  
            </div>
            <hr>
             <?php 
             $i++;
             } 
             ?>
            
        </div>
        
    </div>
    <div class="row media-content">
        <div class="col-md-12" id="video">
            <?php 
             $i = 0;
             foreach($video as $vid) { 
             ?>
            <div class="row" id="video_content">
                <?php $url = str_replace('/', '-', $vid->url); ?>
                <a href="<?= $this->createUrl('/calendario/download/url/' . $url . '/name/' . $vid->nombre); ?>"<?= Yii::app()->baseUrl . $vid->url . $vid->nombre ?>><span class="fa fa-save"></span>
                <div class="col-md-12"><video width="100%" controls><source src="<?= Yii::app()->baseUrl . $vid->url . '/' . $vid->nombre ?>" type="video/mp4"></video></div></a>  
            </div>
            <hr>
            <?php 
             $i++;
             } 
             ?>            
        </div>
        
    </div>
    <div class="row">
        <div class="col-md-12">MENCIONADOS: <?= $publicacion->mencionados ?></div>
    </div>
</section>

<section class="col-md-12">
    <section class="col-md-4 info-calendario text-center" style="text-align: center; background-color: #63d8f1; border: none;" >
        <span class="fa fa-twitter" style="font-size: 100px; margin-top: 10px; color: #FFF; display: inline;"></span>
        <div style="margin-top: 10px; font-size: 14px;">Esta actividad está lista para ser publicada en la Red Social.</div>
    </section>

    <section  class="col-md-8" style="text-align: right">
        <div style="font-size: 80px;"> <?php echo date("H:i a", strtotime($view["created_date"])) ?>
            <div class="glyphicon glyphicon-time" style="font-size: 150px; margin-top: 30px;"></div>
        </div>
    </section>

</section>

<?php $this->endWidget(); ?>