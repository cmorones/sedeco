<?php
/* @var $this Ap8Ind11Controller */
/* @var $model Ap8Ind11 */

$this->breadcrumbs=array(
	'Ap8 Ind11s'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Ap8Ind11', 'url'=>array('index')),
	array('label'=>'Create Ap8Ind11', 'url'=>array('create')),
	array('label'=>'Update Ap8Ind11', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Ap8Ind11', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Ap8Ind11', 'url'=>array('admin')),
);
?>

<h1>View Ap8Ind11 #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'anio',
		'mes',
		'p_ocupadas_n_ma',
		'p_ocupadas_df_ma',
		'p_ocupadas_n_me',
		'p_ocupadas_df_me',
		'remuneraciones_n_ma',
		'remuneraciones_df_ma',
		'remuneraciones_n_me',
		'remuneraciones_df_me',
		'remuneraciones_pp_n_ma',
		'remuneraciones_pp_df_ma',
		'remuneraciones_pp_n_me',
		'remuneraciones_pp_df_me',
		'ingreso_n_ma',
		'ingreso_df_ma',
		'ingreso_n_me',
		'ingreso_df_me',
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
