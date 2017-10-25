<?php
$this->breadcrumbs=array(
	'User Profiles'=>array('index'),
	$model->id_user_profile,
);

$this->menu=array(
array('label'=>'List UserProfile','url'=>array('index')),
array('label'=>'Create UserProfile','url'=>array('create')),
array('label'=>'Update UserProfile','url'=>array('update','id'=>$model->id_user_profile)),
array('label'=>'Delete UserProfile','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_user_profile),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage UserProfile','url'=>array('admin')),
);
?>

<h1>View UserProfile #<?php echo $model->id_user_profile; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_user_profile',
		'id_user',
		'nombres',
		'apellidos',
		'sobre_mi',
		'direccion',
		'ciudad',
		'pais',
		'foto_perfil',
),
)); ?>
