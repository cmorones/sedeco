<?php
/* @var $this ActividadesEconomicasController */
/* @var $model ActividadesEconomicas */

$this->breadcrumbs=array(
	'Actividades Economicases'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ActividadesEconomicas', 'url'=>array('index')),
	array('label'=>'Create ActividadesEconomicas', 'url'=>array('create')),
	array('label'=>'View ActividadesEconomicas', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ActividadesEconomicas', 'url'=>array('admin')),
);
?>

<h1>Update ActividadesEconomicas <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>