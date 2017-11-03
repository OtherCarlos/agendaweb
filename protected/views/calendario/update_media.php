<?php
$baseUrl = Yii::app()->baseUrl;
$validaciones = Yii::app()->getClientScript()->registerScriptFile($baseUrl . '/js/util.js');
?>
<h1>Actualizar contenido para la actividad <?php echo $model->fecha_calendario; ?></h1>

<?php echo $this->renderPartial('_form_media',array('model'=>$model,'contenido'=>$contenido,'image'=>$image,'video'=>$video,)); ?>