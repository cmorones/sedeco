<?php
/* @var $this HomeApartadosController */
/* @var $model HomeApartados */

$this->breadcrumbs=array(
	'Home Apartadoses'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List HomeApartados', 'url'=>array('index')),
	array('label'=>'Create HomeApartados', 'url'=>array('create')),
	array('label'=>'Update HomeApartados', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete HomeApartados', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage HomeApartados', 'url'=>array('admin')),
);
?>

<h1>View HomeApartados #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'titulo',
		'detalle',
		'nombre_btn',
		'id_apartado',
		'fecha_reg',
		'fecha_mod',
		'user_reg',
		'user_mod',
	),
)); ?>
