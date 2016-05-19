<?php
/* @var $this Ap1Ind4aController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ap1 Ind4as',
);

$this->menu=array(
	array('label'=>'Create Ap1Ind4a', 'url'=>array('create')),
	array('label'=>'Manage Ap1Ind4a', 'url'=>array('admin')),
);
?>

<h1>Ap1 Ind4as</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
