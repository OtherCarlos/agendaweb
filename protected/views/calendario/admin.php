<script>
$('#nav-calendario').addClass('active');
</script>

<div class="card">
<?php
setlocale(LC_TIME, 'es_ES', 'Spanish_Spain', 'Spanish');
$fecha = str_replace("/","-",$date);
?>

<div class="span-12">
    <div class="row" style="display: flex; margin: 0 auto; padding: 0px 20px;">
        <div class="col-md-10">
            <h1>Detalle de Actividades para el <?= $date ?></h1>
        </div>
        <?php 
        if(isset($count)){
        ?>
        <div class="col-md-2 form-actions btn-button-with-icon">
            <button onclick="location.href='<?= Yii::app()->request->baseUrl ?>/calendario/create/date/<?= $date ?>';"><div><span class="pe-7s-date"></span></div><div>Crear</div></button>
        </div>
        <?php
        }
        ?>
    </div>
    <?php
    if (isset($count)) {
        ?>
    <hr style="width: 95%; margin: 0 auto; height: 1px; background-color: #FB404B; border: none; margin-top: 20px; margin-bottom: 20px;" />
        <?php
    }
    ?>
    

<?php 
if(isset($count)){
    ?>
    <div class="row" style="margin: 0 auto; padding: 0px 20px; padding-bottom: 20px;">
    <?php
$this->widget('booster.widgets.TbGridView',array(
'id'=>'calendario-grid',
'type'=>'striped bordered condense',
'responsiveTable' => true,
'filter'=>$model,
'dataProvider' => $model->searchByDate($date),
'columns'=>array(
		'fecha_calendario' => array(
                    'name'=> 'fecha_calendario',
                    'header'=> 'FECHA',
                    'value'=>'$data->fecha_calendario'
                ),
		'fecha_calendario_day' => array(
                    'name'=> 'fecha_calendario',
                    'header'=> 'DÍA',
                    'value'=>'strftime("%A",strtotime($data->fecha_calendario))',
                    'htmlOptions'=>array(
                        'style'=>'text-transform: capitalize', 
                    ),
                ),
		'titulo' => array(
                    'name'=> 'titulo',
                    'header'=> 'TÍTULO',
                    'value'=>'$data->titulo',
                    'htmlOptions'=>array(
                        'style'=>'width: 450px;', 
                    ),
                ),
		'created_date' => array(
                    'name'=> 'created_date',
                    'header'=> 'HORA',
                    'value'=> 'date("H:i",strtotime($data->created_date))'
                ),
                array(
                'class'=>'booster.widgets.TbButtonColumn',
                'template'=>'{contenido}{multimedia}{publicar}{ver}{eliminar}',
                'htmlOptions'=>array(
                    'style'=>'width: 150px; text-align:center; letter-spacing: 4px;', 
                ),
                'buttons'=>array(
                        'contenido' => array
                        (
                            'label'=>'Agregar Contenido',
                            'icon'=>'file',
                            'url'=>'Yii::app()->createUrl("calendario/update", array("id"=>$data->id_calendario))',
                            'visible'=>'Yii::app()->user->checkAccess("contenido")',
                        ),
                        'multimedia' => array
                        (
                            'label'=>'Modificar Multimedia',
                            'icon'=>'film',
                            'url'=>'Yii::app()->createUrl("calendario/update_media", array("id"=>$data->id_calendario))',
                            'visible'=>'Yii::app()->user->checkAccess("multimedia")',
                        ),
                        'publicar' => array
                        (
                            'label'=>'Crear Publicación',
                            'icon'=>'comment',
                            'url'=>'Yii::app()->createUrl("calendario/publicar", array("id"=>$data->id_calendario))',
                            'visible'=>'Yii::app()->user->checkAccess("publicador")',
                        ),
                        'ver' => array
                        (
                                    'label' => 'Ver Actividad',
                                    'icon' => 'eye-open',
                                    'size' => 'medium',
                                    'url' => 'Yii::app()->createUrl("Calendario/View", array("id" => $data->id_calendario))',
                        ),
                        'eliminar' => array
                        (
                            'label'=>'Eliminar',
                            'icon'=>'trash',
                            'url'=>'Yii::app()->createUrl("calendario/delete", array("id"=>$data->id_calendario))',
                            'visible'=>'Yii::app()->user->checkAccess("agenda")',
                        ),
                    ),
                ),
),
)); 
?>
   </div>     
        <?php
} else {

    ?>
<div class="row" style="margin-top: 20px; padding: 20px; display: flex;">
<div class="col-md-8" style="flex: 1;">
    <div class="alert alert-info" style="margin-bottom: 0px;">
        <div class="row">
            <div class="col-md-4 text-center"><span class="fa fa-info" style="font-size: 10em;"></span></div>
        <div class="col-md-8"><span><b>No se encontraron registros para esta fecha.</b><br/>Por favor, haga clic en el botón del calendario con la fecha actual para crear un nuevo registro.</span></div>
        </div>
    </div>
</div>
<button onclick="location.href='<?= Yii::app()->request->baseUrl ?>/calendario/create/date/<?= $date ?>';" class="btn-button-animate col-md-4" style="flex: 1;">
    <span class="calendar-button-top"><?= strftime('%B',strtotime($fecha)) ?></span>
    <hr>
    <span class="calendar-button-content"><?= strftime('%d',strtotime($date)) ?></span>
</button>
</div>
<?php
}
?>
</div>
</div>
