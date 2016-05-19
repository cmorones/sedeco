<?php
/* @var $this Ap1Ind10Controller */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ap1 Ind10s',
);

$this->menu=array(
	array('label'=>'Create Ap1Ind10', 'url'=>array('create')),
	array('label'=>'Manage Ap1Ind10', 'url'=>array('admin')),
);
?>

<h1>Ap1 Ind10s</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
