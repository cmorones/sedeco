<?php
/* @var $this HomePrincipalController */
/* @var $model HomePrincipal */

$this->breadcrumbs=array(
	'Home Principals'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List HomePrincipal', 'url'=>array('index')),
	array('label'=>'Create HomePrincipal', 'url'=>array('create')),
	array('label'=>'Update HomePrincipal', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete HomePrincipal', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'¿Estás seguro de querer eliminar este registro?')),
	array('label'=>'Manage HomePrincipal', 'url'=>array('admin')),
);
?>

<h1>View HomePrincipal #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'titulo',
		'subtutulo',
		'nombre_btn',
		'archivo',
		'fecha_reg',
		'fecha_mod',
		'user_reg',
		'user_mod',
	),
)); ?>
