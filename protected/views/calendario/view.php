<?php
$this->breadcrumbs=array(
	'Calendarios'=>array('index'),
	$model->id_calendario,
);

$this->menu=array(
array('label'=>'List Calendario','url'=>array('index')),
array('label'=>'Create Calendario','url'=>array('create')),
array('label'=>'Update Calendario','url'=>array('update','id'=>$model->id_calendario)),
array('label'=>'Delete Calendario','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_calendario),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Calendario','url'=>array('admin')),
);
?>

<h1>View Calendario #<?php echo $model->id_calendario; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_calendario',
		'titulo',
		'resumen',
		'fecha_calendario',
		'created_date',
		'created_by',
		'modified_date',
		'modified_by',
		'fk_estatus',
		'es_activo',
),
)); ?>
