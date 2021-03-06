<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'calendario-update-form',
	'enableAjaxValidation'=>false,
        'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>
        

        <section>
            <div class="row-create">
                TÍTULO: <?php echo $model['titulo'] ?>
            </div>

            <div style="text-align: justify; margin-top: 30px;"> 
                <?php echo $model['resumen'] ?> 
            </div>  
        </section>
	
<div class="row media-content">
    <div class="col-md-6">
        <div class="row"><h1>Imágenes</h1></div>
        <div class="row"><div id="image">
             <?php 
             $i = 0;
             foreach($image as $img) { 
             ?>
            <div class="row" id="image_content">
                <?php $url = str_replace('/', '-', $img->url); ?>
                <a href="<?= $this->createUrl('/calendario/download/url/' . $url . '/name/' . $img->nombre); ?>"><span class="fa fa-save"></span>
                <div class="col-md-12"><img src="<?= Yii::app()->baseUrl . $img->url . '/' . $img->nombre ?>" width="100%"/></div></a>  
            </div>
            <div class="row" id="img_input">
                <div class="col-md-12"><?php echo $form->fileField($contenido, 'image['.$i.']', array ('required' => 'true')); ?></div>
            </div>
            <hr>
             <?php 
             $i++;
             } 
             ?>
        </div></div>
    </div>
    <div class="col-md-6">
        <div class="row"><h1>Video</h1></div>
        <div class="row"><div id="video">
            <?php 
             $i = 0;
             foreach($video as $vid) { 
             ?>
            <div class="row" id="video_content">
                <?php $url = str_replace('/', '-', $vid->url); ?>
                <a href="<?= $this->createUrl('/calendario/download/url/' . $url . '/name/' . $vid->nombre); ?>"<?= Yii::app()->baseUrl . $vid->url . $vid->nombre ?>><span class="fa fa-save"></span>
                <div class="col-md-12"><video width="100%" controls><source src="<?= Yii::app()->baseUrl . $vid->url . '/' . $vid->nombre ?>" type="video/mp4"></video></div></a>  
            </div>
            <div class="row" id="video_input">
                <div class="col-md-12"><?php echo $form->fileField($contenido, 'video['.$i.']', array ('required' => 'true')); ?></div>
            </div>
            <hr>
            <?php 
             $i++;
             } 
             ?>
        </div></div>
    </div>
</div>

<div class="row">
<section class="col-md-12">
    <div class="col-md-6" style="text-align: right">
  
            <?php
            $this->widget('booster.widgets.TbButton', array(
                'buttonType' => 'submit',
                'htmlOptions' => array(
                    'class' => 'boton_css',
                    'style' => 'border: 2px solid #36302D;',
                ),
                'label' => $model->isNewRecord ? 'GUARDAR' : 'ACTUALIZAR',
            ));
            ?>
     
    </div>

    <div class="col-md-6" style="text-align: left">
        <?php
        $this->widget('booster.widgets.TbButton', array(
            'buttonType' => 'link',
            'url' => Yii::app()->createUrl("/Calendario/index"),
            'htmlOptions' => array(
                'class' => 'boton_css',
                'style' => 'border: 2px solid #36302D',
            ),
            'label' => 'REGRESAR',
        ));
        ?>
    </div>

</section>
</div>

<?php $this->endWidget(); ?>
