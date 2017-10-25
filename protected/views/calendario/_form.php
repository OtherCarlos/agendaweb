<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'calendario-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldGroup($model,'titulo',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>50)))); ?>

	<?php echo $form->textFieldGroup($model,'resumen',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>1000)))); ?>

<div class="form-actions">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>$model->isNewRecord ? 'Guardar' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>
