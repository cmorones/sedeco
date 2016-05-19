<?php
/* @var $this IndicadoresController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Indicadores',
);

$this->menu=array(
	array('label'=>'Create Indicadores', 'url'=>array('create')),
	array('label'=>'Manage Indicadores', 'url'=>array('admin')),
);
?>

<h1>Indicadores</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
