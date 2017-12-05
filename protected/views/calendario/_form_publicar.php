<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'calendario-update-form',
	'enableAjaxValidation'=>false
)); ?>
        

        <section>
            <div class="row-create">
                TÍTULO: <?php echo $model['titulo'] ?>
            </div>

            <div style="text-align: justify; margin-top: 30px;"> 
                <?php echo $model['resumen'] ?> 
            </div>  
        </section>
<div class="row">
    <div class="col-md-8">
        <?php
        echo $form->textAreaGroup($publicar, 'publicacion', array('label' => 'Publicación',
            'widgetOptions' => array(
                'htmlOptions' => array(
                    'class' => 'span5',
                    'maxlength' => 140,
        ))));
        ?>   
    </div>
    <div class="col-md-4">
        <span class="countdown"></span>
    </div>
</div>
	
<div class="row media-content">
    <div class="col-md-12">
        <div class="row"><h1>Imágenes</h1></div>
        <div class="row"><div id="image">
             <?php 
             $i = 0;
             foreach($image as $img) { 
             ?>
            <div class="row image_content_<?= $img->id_contenido ?> <?= ($img->publicar==TRUE)?'selected':'' ?>" id="image_content" onclick="selected('image', <?= $img->id_contenido ?>)">
                <input type="checkbox" name="VswCalendario[imagenes][]" value="<?= $img->id_contenido ?>" <?= ($img->publicar==TRUE)?'checked':'' ?> hidden>
                <a href="#"><span class="fa fa-check"></span>
                <div class="col-md-12"><img src="<?= Yii::app()->baseUrl . $img->url . '/' . $img->nombre ?>" width="100%"/></div></a>  
            </div>
            <hr>
             <?php 
             $i++;
             } 
             ?>
        </div></div>
    </div>
    <div class="col-md-12">
        <div class="row"><h1>Video</h1></div>
        <div class="row"><div id="video">
            <?php 
             $i = 0;
             foreach($video as $vid) { 
             ?>
            <div class="row video_content_<?= $vid->id_contenido ?> <?= ($vid->publicar==TRUE)?'selected':'' ?>" id="video_content" onclick="selected('video', <?= $img->id_contenido ?>)">
                 <input type="checkbox" name="VswCalendario[videos][]" value="<?= $vid->id_contenido ?>" <?= ($vid->publicar==TRUE)?'checked':'' ?> hidden>
                <a href="#"><span class="fa fa-check"></span>
                <div class="col-md-12"><video width="100%" controls><source src="<?= Yii::app()->baseUrl . $vid->url . '/' . $vid->nombre ?>" type="video/mp4"></video></div></a>  
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
    <div class="col-md-12">
        <?php
        echo $form->textFieldGroup($publicar, 'mencionados', array('label' => 'Mencionados',
            'widgetOptions' => array(
                'htmlOptions' => array(
                    'class' => 'span5',
        ))));
        ?>   
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
