<?php
/* @var $this Ap1Ind5bController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ap1 Ind5bs',
);

$this->menu=array(
	array('label'=>'Create Ap1Ind5b', 'url'=>array('create')),
	array('label'=>'Manage Ap1Ind5b', 'url'=>array('admin')),
);
?>

<h1>Ap1 Ind5bs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
