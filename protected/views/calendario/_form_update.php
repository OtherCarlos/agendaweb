<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'calendario-update-form',
	'enableAjaxValidation'=>false,
        'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldGroup($model,'titulo',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>50)))); ?>

	<?php echo $form->textFieldGroup($model,'resumen',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>1000)))); ?>
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

<div class="form-actions">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit', 
			'context'=>'primary',
                        'htmlOptions'=> array('onclick' => 'makeSubmit()'),
			'label'=>$model->isNewRecord ? 'Guardar' : 'Guardar',
		)); ?>
</div>

<?php $this->endWidget(); ?>
