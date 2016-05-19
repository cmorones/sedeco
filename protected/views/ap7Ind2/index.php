<?php
/* @var $this Ap7Ind2Controller */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ap7 Ind2s',
);

$this->menu=array(
	array('label'=>'Create Ap7Ind2', 'url'=>array('create')),
	array('label'=>'Manage Ap7Ind2', 'url'=>array('admin')),
);
?>

<h1>Ap7 Ind2s</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
