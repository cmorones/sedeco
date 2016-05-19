<?php
/* @var $this Ap1Ind2bController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ap1 Ind2bs',
);

$this->menu=array(
	array('label'=>'Create Ap1Ind2b', 'url'=>array('create')),
	array('label'=>'Manage Ap1Ind2b', 'url'=>array('admin')),
);
?>

<h1>Ap1 Ind2bs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
