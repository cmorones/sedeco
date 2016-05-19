<?php
/* @var $this Ap1Ind71Controller */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ap1 Ind71s',
);

$this->menu=array(
	array('label'=>'Create Ap1Ind71', 'url'=>array('create')),
	array('label'=>'Manage Ap1Ind71', 'url'=>array('admin')),
);
?>

<h1>Ap1 Ind71s</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
