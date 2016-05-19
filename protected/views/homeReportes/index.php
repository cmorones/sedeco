<?php
/* @var $this HomeReportesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Home Reportes',
);

$this->menu=array(
	array('label'=>'Create HomeReportes', 'url'=>array('create')),
	array('label'=>'Manage HomeReportes', 'url'=>array('admin')),
);
?>

<h1>Home Reportes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
