<?php
/* @var $this Ap1Ind2bHistController */
/* @var $model Ap1Ind2bHist */

$this->breadcrumbs=array(
	'Ap1 Ind2b Hists'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Ap1Ind2bHist', 'url'=>array('index')),
	array('label'=>'Manage Ap1Ind2bHist', 'url'=>array('admin')),
);
?>

<h1>Create Ap1Ind2bHist</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>