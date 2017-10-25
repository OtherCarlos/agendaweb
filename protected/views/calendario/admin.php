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
if(isset($count)){
    ?>
    <div class="row" style="margin: 0 auto; padding: 0px 20px;">
    <?php
$this->widget('booster.widgets.TbGridView',array(
'id'=>'calendario-grid',
'type'=>'striped bordered condense',
'responsiveTable' => true,
'filter'=>$model,
'dataProvider' => $model->searchByDate($date),
'columns'=>array(
		'id_calendario' => array(
                    'name'=> 'id_calendario',
                    'header'=> 'ID',
                    'value'=>'$data->id_calendario'
                ),
		'titulo' => array(
                    'name'=> 'titulo',
                    'header'=> 'TÍTULO',
                    'value'=>'$data->titulo'
                ),
		'fecha_calendario' => array(
                    'name'=> 'fecha_calendario',
                    'header'=> 'FECHA',
                    'value'=>'$data->fecha_calendario'
                ),
		'created_date' => array(
                    'name'=> 'created_date',
                    'header'=> 'HORA',
                    'value'=> 'date("H:i",strtotime($data->created_date))'
                ),
                array(
                'class'=>'booster.widgets.TbButtonColumn',
                ),
),
)); 
?>
   </div>     
        <?php
} else {

    ?>
<div class="alert alert-info">
    <span>No se encontraron registros para esta fecha.</span>
</div>
<div class="form-actions btn-button-animate">
    <button onclick="location.href='<?= Yii::app()->request->baseUrl ?>/calendario/create/date/<?= $date ?>';"><div class="calendar-button-top"><?= strftime('%B',strtotime($fecha)) ?></div><div class="calendar-button-content"><?= strftime('%d',strtotime($date)) ?></div></button>
</div>

<?php
}
?>
</div>
</div>
