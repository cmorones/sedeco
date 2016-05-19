<?php
/* @var $this Ap3Ind2aController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ap3 Ind2as',
);

$this->menu=array(
	array('label'=>'Create Ap3Ind2a', 'url'=>array('create')),
	array('label'=>'Manage Ap3Ind2a', 'url'=>array('admin')),
);
?>

<h1>Ap3 Ind2as</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
