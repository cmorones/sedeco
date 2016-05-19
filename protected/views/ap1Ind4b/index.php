<?php
/* @var $this Ap1Ind4bController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ap1 Ind4bs',
);

$this->menu=array(
	array('label'=>'Create Ap1Ind4b', 'url'=>array('create')),
	array('label'=>'Manage Ap1Ind4b', 'url'=>array('admin')),
);
?>

<h1>Ap1 Ind4bs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
