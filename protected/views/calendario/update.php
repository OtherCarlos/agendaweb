<?php
$this->breadcrumbs=array(
	'Calendarios'=>array('index'),
	$model->id_calendario=>array('view','id'=>$model->id_calendario),
	'Update',
);

	$this->menu=array(
	array('label'=>'List Calendario','url'=>array('index')),
	array('label'=>'Create Calendario','url'=>array('create')),
	array('label'=>'View Calendario','url'=>array('view','id'=>$model->id_calendario)),
	array('label'=>'Manage Calendario','url'=>array('admin')),
	);
	?>

	<h1>Update Calendario <?php echo $model->id_calendario; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>