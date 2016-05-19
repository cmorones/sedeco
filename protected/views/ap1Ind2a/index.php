<?php
/* @var $this Ap1Ind2aController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ap1 Ind2as',
);

$this->menu=array(
	array('label'=>'Create Ap1Ind2a', 'url'=>array('create')),
	array('label'=>'Manage Ap1Ind2a', 'url'=>array('admin')),
);
?>

<h1>Ap1 Ind2as</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
