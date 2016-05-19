<?php
/* @var $this HomeReportesController */
/* @var $model HomeReportes */

$this->breadcrumbs=array(
	'Home Reportes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List HomeReportes', 'url'=>array('index')),
	array('label'=>'Manage HomeReportes', 'url'=>array('admin')),
);
?>

<h3>Registrar Nuevo Reporte</h3>
<hr/>
<?php $this->renderPartial('_form', array('model'=>$model)); ?>