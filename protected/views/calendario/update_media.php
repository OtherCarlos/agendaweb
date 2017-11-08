<?php
$baseUrl = Yii::app()->baseUrl;
$validaciones = Yii::app()->getClientScript()->registerScriptFile($baseUrl . '/js/util.js');
?>
<script>
    $('#nav-calendario').addClass('active');
</script>
<section style="text-align: center">
    <h1>Actualizar Contenido de la Actividad del día <?php echo $model["fecha_calendario"] ?></h1>
</section>

<?php echo $this->renderPartial('_form_media', array('model' => $model, 'contenido' => $contenido, 'image' => $image, 'video' => $video,)); ?>