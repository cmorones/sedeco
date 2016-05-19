<?php
/* @var $this Ap7Ind3Controller */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ap7 Ind3s',
);

$this->menu=array(
	array('label'=>'Create Ap7Ind3', 'url'=>array('create')),
	array('label'=>'Manage Ap7Ind3', 'url'=>array('admin')),
);
?>

<h1>Ap7 Ind3s</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
