<?php
/* @var $this ActividadesEconomicasController */
/* @var $model ActividadesEconomicas */

$this->breadcrumbs=array(
	'Actividades Economicases'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ActividadesEconomicas', 'url'=>array('index')),
	array('label'=>'Manage ActividadesEconomicas', 'url'=>array('admin')),
);
?>

<h1>Create ActividadesEconomicas</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>