<?php
/* @var $this ActividadesEconomicasController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Actividades Economicases',
);

$this->menu=array(
	array('label'=>'Create ActividadesEconomicas', 'url'=>array('create')),
	array('label'=>'Manage ActividadesEconomicas', 'url'=>array('admin')),
);
?>

<h1>Actividades Economicases</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
