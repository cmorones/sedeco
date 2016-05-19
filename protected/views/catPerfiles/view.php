<?php
/* @var $this CatPerfilesController */
/* @var $model CatPerfiles */

$this->breadcrumbs=array(
	'Cat Perfiles'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List CatPerfiles', 'url'=>array('index')),
	array('label'=>'Create CatPerfiles', 'url'=>array('create')),
	array('label'=>'Update CatPerfiles', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete CatPerfiles', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CatPerfiles', 'url'=>array('admin')),
);
?>

<h1>View CatPerfiles #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nombre',
	),
)); ?>
