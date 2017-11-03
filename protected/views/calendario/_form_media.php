<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'calendario-update-form',
	'enableAjaxValidation'=>false,
        'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>

	<?php echo $form->textFieldGroup($model,'titulo',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>50)))); ?>

	<?php echo $form->textFieldGroup($model,'resumen',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>1000)))); ?>

<div class="row media-content">
    <div class="col-md-6">
        <div class="row"><h1>Imágenes</h1></div>
        <div class="row"><div id="image">
             <?php 
             $i = 0;
             foreach($image as $img) { 
             ?>
            <div class="row">
                <div class="col-md-12"><img src="<?= Yii::app()->baseUrl . $img->url . '/' . $img->nombre ?>" width="100%"/></div>  
            </div>
            <div class="row" id="img_input">
                <div class="col-md-12"><?php echo $form->fileField($contenido, 'image['.$i.']'); ?></div>
            </div>
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
            <div class="row">
                <div class="col-md-12"><a href="<?= Yii::app()->baseUrl . $vid->url . '/' . $vid->nombre ?>"<?= Yii::app()->baseUrl . $vid->url . $vid->nombre ?>></a></div>  
            </div>
            <div class="row" id="video_input">
                <div class="col-md-12"><?php echo $form->fileField($contenido, 'video['.$i.']'); ?></div>
            </div>
            <?php 
             $i++;
             } 
             ?>
        </div></div>
    </div>
</div>

<div class="form-actions">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit', 
			'context'=>'primary',
                        'htmlOptions'=> array('onclick' => 'makeSubmit()'),
			'label'=>$model->isNewRecord ? 'Guardar' : 'Guardar',
		)); ?>
</div>

<?php $this->endWidget(); ?>
