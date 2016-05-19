<?php
/* @var $this Ap1Ind9Controller */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ap1 Ind9s',
);

$this->menu=array(
	array('label'=>'Create Ap1Ind9', 'url'=>array('create')),
	array('label'=>'Manage Ap1Ind9', 'url'=>array('admin')),
);
?>

<h1>Ap1 Ind9s</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
