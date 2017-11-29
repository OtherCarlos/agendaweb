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
        <div class="row"><div id="plus_img" class="col-md-2" style="float: none; margin: 0 auto; margin-bottom: 5px;">+</div></div>
        <div class="row"><div id="image">
            <div class="row" id="img_input">
            <div class="col-md-10"><?php echo $form->fileField($contenido, 'image[]'); ?></div>
            <div id="remove_img" class="col-md-2 remove_img" style="display: none;">-</div>
            </div>
        </div></div>
    </div>
    <div class="col-md-6">
        <div class="row"><h1>Video</h1></div>
        <div class="row"><div id="plus" class="col-md-2" style="float: none; margin: 0 auto; margin-bottom: 5px;">+</div></div>
        <div class="row"><div id="video">
            <div class="row" id="video_input">
            <div class="col-md-10"><?php echo $form->fileField($contenido, 'video[]'); ?></div>
            <div id="remove" class="col-md-2 remove" style="display: none;">-</div>
            </div>
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
