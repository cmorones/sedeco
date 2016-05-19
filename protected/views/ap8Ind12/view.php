<?php
/* @var $this Ap8Ind12Controller */
/* @var $model Ap8Ind12 */

$this->breadcrumbs=array(
	'Ap8 Ind12s'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Ap8Ind12', 'url'=>array('index')),
	array('label'=>'Create Ap8Ind12', 'url'=>array('create')),
	array('label'=>'Update Ap8Ind12', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Ap8Ind12', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Ap8Ind12', 'url'=>array('admin')),
);
?>

<h1>View Ap8Ind12 #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'anio',
		'mes',
		'compras_n_ma',
		'compras_df_ma',
		'compras_n_me',
		'compras_df_me',
		'fecha_reg',
		'fecha_mod',
		'user_reg',
		'user_mod',
		'periodo_id',
	),
)); ?>
