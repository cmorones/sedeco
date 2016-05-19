<?php
/* @var $this Ap1Ind5aController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ap1 Ind5as',
);

$this->menu=array(
	array('label'=>'Create Ap1Ind5a', 'url'=>array('create')),
	array('label'=>'Manage Ap1Ind5a', 'url'=>array('admin')),
);
?>

<h1>Ap1 Ind5as</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
