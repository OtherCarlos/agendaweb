<?php
$baseUrl = Yii::app()->baseUrl;
$validaciones = Yii::app()->getClientScript()->registerScriptFile($baseUrl . '/js/util.js');
?>
<h1>Actualizar Información para el día <?php echo $model->fecha_calendario; ?></h1>

<?php echo $this->renderPartial('_form_update',array('model'=>$model, 'contenido'=>$contenido)); ?>