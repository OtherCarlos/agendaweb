<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'user-profile-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldGroup($model,'id_user',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

	<?php echo $form->textFieldGroup($model,'nombres',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>50)))); ?>

	<?php echo $form->textFieldGroup($model,'apellidos',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>50)))); ?>

	<?php echo $form->textFieldGroup($model,'sobre_mi',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>1000)))); ?>

	<?php echo $form->textFieldGroup($model,'direccion',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>500)))); ?>

	<?php echo $form->textFieldGroup($model,'ciudad',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>50)))); ?>

	<?php echo $form->textFieldGroup($model,'pais',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>50)))); ?>

	<?php echo $form->textFieldGroup($model,'foto_perfil',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>100)))); ?>

<div class="form-actions">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>
