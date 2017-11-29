<?php
$baseUrl = Yii::app()->baseUrl;
$validaciones = Yii::app()->getClientScript()->registerScriptFile($baseUrl . '/js/util.js');
?>
<script>
    $('#nav-calendario').addClass('active');
</script>
<section style="text-align: center">
    <h1>Publicar Actividad del día <?php echo $model["fecha_calendario"] ?></h1>
</section>

<?php echo $this->renderPartial('_form_publicar', array('model' => $model, 'publicar' => $publicar, 'image' => $image, 'video' => $video,)); ?>