<?php
/* @var $this Ap1Ind4gController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ap1 Ind4gs',
);

$this->menu=array(
	array('label'=>'Create Ap1Ind4g', 'url'=>array('create')),
	array('label'=>'Manage Ap1Ind4g', 'url'=>array('admin')),
);
?>

<h1>Ap1 Ind4gs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
