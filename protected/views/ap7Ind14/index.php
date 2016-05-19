<?php
/* @var $this Ap7Ind14Controller */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ap7 Ind14s',
);

$this->menu=array(
	array('label'=>'Create Ap7Ind14', 'url'=>array('create')),
	array('label'=>'Manage Ap7Ind14', 'url'=>array('admin')),
);
?>

<h1>Ap7 Ind14s</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
