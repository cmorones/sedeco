<?php
/* @var $this Ap7Ind12Controller */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ap7 Ind12s',
);

$this->menu=array(
	array('label'=>'Create Ap7Ind12', 'url'=>array('create')),
	array('label'=>'Manage Ap7Ind12', 'url'=>array('admin')),
);
?>

<h1>Ap7 Ind12s</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
