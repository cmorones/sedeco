<?php
/* @var $this HistoricoPeriodosController */
/* @var $model HistoricoPeriodos */
error_reporting(0);
$this->breadcrumbs=array(
	'Historico Periodoses'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List HistoricoPeriodos', 'url'=>array('index')),
	array('label'=>'Manage HistoricoPeriodos', 'url'=>array('admin')),
);
?>


<div class="page-header">
  <h2>Agregar Periodo<small> </small></h2>
</div>

<?php $this->renderPartial('_form', array('model'=>$model,'id'=>$id)); ?>