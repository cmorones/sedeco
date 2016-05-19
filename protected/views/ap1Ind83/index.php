<?php
/* @var $this Ap1Ind83Controller */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ap1 Ind83s',
);

$this->menu=array(
	array('label'=>'Create Ap1Ind83', 'url'=>array('create')),
	array('label'=>'Manage Ap1Ind83', 'url'=>array('admin')),
);
?>

<h1>Ap1 Ind83s</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
